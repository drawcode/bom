using System;
using System.Collections.Generic;
using System.Linq;
using System.IO;
using System.Text;
using System.Text.RegularExpressions;
using System.Web;
using System.Web.Compilation;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;

using ah.core;
using ah.core.data;
using ah.core.handlers;
using ah.core.util;

using profile;
using profile.ent;

namespace profile {

    public class BaseProfileService : IBaseHandler  {	
    
	private static readonly log4net.ILog log = log4net.LogManager.GetLogger("main");
                
        public string path = "";
        public string path_parsed = "";
        public string path_info = "";
        public string qstring = "";

        public string action = "";
        public string action_params = "";

        public string url = "";
        public string ext = ".ashx";

        public HttpContext _context;
        public ServiceUtil util = new ServiceUtil();
        
        public string _format = "json";
    
        public ProfileAPI api = new ProfileAPI();
        
        public BaseProfileService(){
        
        }
        
        public void ParseServiceParams() {
            _format = util.GetParamValue(_context, "format");
            if(String.IsNullOrEmpty(_format)){
               _format = util.FORMAT_JSON; 
            }
            
        }
        
        public bool IsSet {
            get {
                return (_context.Request.RequestType == "POST"
                    || _context.Request.RequestType == "PUT");
            }
        }

        public bool IsGet {
            get {
                return (_context.Request.RequestType == "GET");
            }
        }

        public bool IsDelete {
            get {
                return (_context.Request.RequestType == "DELETE");
            }
        }
        
        public virtual void Render(HttpContext context) {

            _context = context;
            
            log.Debug("------------------------------------------------------------------------->");
            log.Debug(String.Format("Start Render URL: {0}", HttpContext.Current.Request.Url.ToString()));

            path = context.Request.Url.ToString();
            path_parsed = path.Replace("api/v1/", "");
            path_info = context.Request.PathInfo;
            if(path_parsed.IndexOf("?") > -1)
                    qstring = path_parsed.Split('?')[1];
			
            ParseServiceParams();
                    
            BaseProcessRequest();
            
            // If you need to render a page in the service...
            //StringWriter writer = new StringWriter();
            //HttpContext.Current.Server.Execute("~/main.aspx", writer);
            //string html = writer.ToString();
            //writer.Close();
            //writer.Dispose();
            // Emit the rendered HTML
            //context.Response.Write(html);
        }        
        
        public virtual bool IsContext(string actionRegex) {
            if (Regex.Match(path, actionRegex).Success) {
                return true;
            }
            return false;
        }

        public virtual void BaseProcessRequest() {        
            if(IsContext("profile/count")){
                CountProfile();
            }
            else if(IsContext("profile/count/uuid")){
                CountProfileUuid();
            }
            else if(IsContext("profile/count/username/hash")){
                CountProfileUsernameHash();
            }
            else if(IsContext("profile/count/username")){
                CountProfileUsername();
            }
            else if(IsContext("profile/browse/filter")){
                BrowseProfileListFilter();
            }
            else if(IsContext("profile/set/uuid")){
                SetProfileUuid();
            }
            else if(IsContext("profile/set/username")){
                SetProfileUsername();
            }
            else if(IsContext("profile/del/uuid")){
                DelProfileUuid();
            }
            else if(IsContext("profile/del/username")){
                DelProfileUsername();
            }
            else if(IsContext("profile/get/uuid")){
                GetProfileListUuid();
            }
            else if(IsContext("profile/get/username/hash")){
                GetProfileListUsernameHash();
            }
            else if(IsContext("profile/get/username")){
                GetProfileListUsername();
            }
            if(IsContext("profile-type/count")){
                CountProfileType();
            }
            else if(IsContext("profile-type/count/uuid")){
                CountProfileTypeUuid();
            }
            else if(IsContext("profile-type/count/type-id")){
                CountProfileTypeTypeId();
            }
            else if(IsContext("profile-type/browse/filter")){
                BrowseProfileTypeListFilter();
            }
            else if(IsContext("profile-type/set/uuid")){
                SetProfileTypeUuid();
            }
            else if(IsContext("profile-type/del/uuid")){
                DelProfileTypeUuid();
            }
            else if(IsContext("profile-type/get/uuid")){
                GetProfileTypeListUuid();
            }
            else if(IsContext("profile-type/get/code")){
                GetProfileTypeListCode();
            }
            else if(IsContext("profile-type/get/type-id")){
                GetProfileTypeListTypeId();
            }
            if(IsContext("profile-attribute/count")){
                CountProfileAttribute();
            }
            else if(IsContext("profile-attribute/count/uuid")){
                CountProfileAttributeUuid();
            }
            else if(IsContext("profile-attribute/count/code")){
                CountProfileAttributeCode();
            }
            else if(IsContext("profile-attribute/count/type")){
                CountProfileAttributeType();
            }
            else if(IsContext("profile-attribute/count/group")){
                CountProfileAttributeGroup();
            }
            else if(IsContext("profile-attribute/count/code/type")){
                CountProfileAttributeCodeType();
            }
            else if(IsContext("profile-attribute/browse/filter")){
                BrowseProfileAttributeListFilter();
            }
            else if(IsContext("profile-attribute/set/uuid")){
                SetProfileAttributeUuid();
            }
            else if(IsContext("profile-attribute/set/code")){
                SetProfileAttributeCode();
            }
            else if(IsContext("profile-attribute/del/uuid")){
                DelProfileAttributeUuid();
            }
            else if(IsContext("profile-attribute/del/code")){
                DelProfileAttributeCode();
            }
            else if(IsContext("profile-attribute/get/uuid")){
                GetProfileAttributeListUuid();
            }
            else if(IsContext("profile-attribute/get/code")){
                GetProfileAttributeListCode();
            }
            else if(IsContext("profile-attribute/get/type")){
                GetProfileAttributeListType();
            }
            else if(IsContext("profile-attribute/get/group")){
                GetProfileAttributeListGroup();
            }
            else if(IsContext("profile-attribute/get/code/type")){
                GetProfileAttributeListCodeType();
            }
            if(IsContext("profile-attribute-text/count")){
                CountProfileAttributeText();
            }
            else if(IsContext("profile-attribute-text/count/uuid")){
                CountProfileAttributeTextUuid();
            }
            else if(IsContext("profile-attribute-text/count/profile-id")){
                CountProfileAttributeTextProfileId();
            }
            else if(IsContext("profile-attribute-text/count/profile-id/attribute-id")){
                CountProfileAttributeTextProfileIdAttributeId();
            }
            else if(IsContext("profile-attribute-text/browse/filter")){
                BrowseProfileAttributeTextListFilter();
            }
            else if(IsContext("profile-attribute-text/set/uuid")){
                SetProfileAttributeTextUuid();
            }
            else if(IsContext("profile-attribute-text/set/profile-id")){
                SetProfileAttributeTextProfileId();
            }
            else if(IsContext("profile-attribute-text/set/profile-id/attribute-id")){
                SetProfileAttributeTextProfileIdAttributeId();
            }
            else if(IsContext("profile-attribute-text/del/uuid")){
                DelProfileAttributeTextUuid();
            }
            else if(IsContext("profile-attribute-text/del/profile-id")){
                DelProfileAttributeTextProfileId();
            }
            else if(IsContext("profile-attribute-text/del/profile-id/attribute-id")){
                DelProfileAttributeTextProfileIdAttributeId();
            }
            else if(IsContext("profile-attribute-text/get/uuid")){
                GetProfileAttributeTextListUuid();
            }
            else if(IsContext("profile-attribute-text/get/profile-id")){
                GetProfileAttributeTextListProfileId();
            }
            else if(IsContext("profile-attribute-text/get/profile-id/attribute-id")){
                GetProfileAttributeTextListProfileIdAttributeId();
            }
            if(IsContext("profile-attribute-data/count")){
                CountProfileAttributeData();
            }
            else if(IsContext("profile-attribute-data/count/uuid")){
                CountProfileAttributeDataUuid();
            }
            else if(IsContext("profile-attribute-data/count/profile-id")){
                CountProfileAttributeDataProfileId();
            }
            else if(IsContext("profile-attribute-data/count/profile-id/attribute-id")){
                CountProfileAttributeDataProfileIdAttributeId();
            }
            else if(IsContext("profile-attribute-data/browse/filter")){
                BrowseProfileAttributeDataListFilter();
            }
            else if(IsContext("profile-attribute-data/set/uuid")){
                SetProfileAttributeDataUuid();
            }
            else if(IsContext("profile-attribute-data/set/profile-id")){
                SetProfileAttributeDataProfileId();
            }
            else if(IsContext("profile-attribute-data/set/profile-id/attribute-id")){
                SetProfileAttributeDataProfileIdAttributeId();
            }
            else if(IsContext("profile-attribute-data/del/uuid")){
                DelProfileAttributeDataUuid();
            }
            else if(IsContext("profile-attribute-data/del/profile-id")){
                DelProfileAttributeDataProfileId();
            }
            else if(IsContext("profile-attribute-data/del/profile-id/attribute-id")){
                DelProfileAttributeDataProfileIdAttributeId();
            }
            else if(IsContext("profile-attribute-data/get/uuid")){
                GetProfileAttributeDataListUuid();
            }
            else if(IsContext("profile-attribute-data/get/profile-id")){
                GetProfileAttributeDataListProfileId();
            }
            else if(IsContext("profile-attribute-data/get/profile-id/attribute-id")){
                GetProfileAttributeDataListProfileIdAttributeId();
            }
            if(IsContext("profile-device/count")){
                CountProfileDevice();
            }
            else if(IsContext("profile-device/count/uuid")){
                CountProfileDeviceUuid();
            }
            else if(IsContext("profile-device/count/profile-id/device-id")){
                CountProfileDeviceProfileIdDeviceId();
            }
            else if(IsContext("profile-device/count/profile-id/token")){
                CountProfileDeviceProfileIdToken();
            }
            else if(IsContext("profile-device/count/profile-id")){
                CountProfileDeviceProfileId();
            }
            else if(IsContext("profile-device/count/device-id")){
                CountProfileDeviceDeviceId();
            }
            else if(IsContext("profile-device/count/token")){
                CountProfileDeviceToken();
            }
            else if(IsContext("profile-device/browse/filter")){
                BrowseProfileDeviceListFilter();
            }
            else if(IsContext("profile-device/set/uuid")){
                SetProfileDeviceUuid();
            }
            else if(IsContext("profile-device/del/uuid")){
                DelProfileDeviceUuid();
            }
            else if(IsContext("profile-device/del/profile-id/device-id")){
                DelProfileDeviceProfileIdDeviceId();
            }
            else if(IsContext("profile-device/del/profile-id/token")){
                DelProfileDeviceProfileIdToken();
            }
            else if(IsContext("profile-device/del/token")){
                DelProfileDeviceToken();
            }
            else if(IsContext("profile-device/get/uuid")){
                GetProfileDeviceListUuid();
            }
            else if(IsContext("profile-device/get/profile-id/device-id")){
                GetProfileDeviceListProfileIdDeviceId();
            }
            else if(IsContext("profile-device/get/profile-id/token")){
                GetProfileDeviceListProfileIdToken();
            }
            else if(IsContext("profile-device/get/profile-id")){
                GetProfileDeviceListProfileId();
            }
            else if(IsContext("profile-device/get/device-id")){
                GetProfileDeviceListDeviceId();
            }
            else if(IsContext("profile-device/get/token")){
                GetProfileDeviceListToken();
            }
            if(IsContext("country/count")){
                CountCountry();
            }
            else if(IsContext("country/count/uuid")){
                CountCountryUuid();
            }
            else if(IsContext("country/count/code")){
                CountCountryCode();
            }
            else if(IsContext("country/browse/filter")){
                BrowseCountryListFilter();
            }
            else if(IsContext("country/set/uuid")){
                SetCountryUuid();
            }
            else if(IsContext("country/set/code")){
                SetCountryCode();
            }
            else if(IsContext("country/del/uuid")){
                DelCountryUuid();
            }
            else if(IsContext("country/del/code")){
                DelCountryCode();
            }
            else if(IsContext("country/get")){
                GetCountryList();
            }
            else if(IsContext("country/get/uuid")){
                GetCountryListUuid();
            }
            else if(IsContext("country/get/code")){
                GetCountryListCode();
            }
            if(IsContext("state/count")){
                CountState();
            }
            else if(IsContext("state/count/uuid")){
                CountStateUuid();
            }
            else if(IsContext("state/count/code")){
                CountStateCode();
            }
            else if(IsContext("state/browse/filter")){
                BrowseStateListFilter();
            }
            else if(IsContext("state/set/uuid")){
                SetStateUuid();
            }
            else if(IsContext("state/set/code")){
                SetStateCode();
            }
            else if(IsContext("state/del/uuid")){
                DelStateUuid();
            }
            else if(IsContext("state/del/code")){
                DelStateCode();
            }
            else if(IsContext("state/get")){
                GetStateList();
            }
            else if(IsContext("state/get/uuid")){
                GetStateListUuid();
            }
            else if(IsContext("state/get/code")){
                GetStateListCode();
            }
            if(IsContext("city/count")){
                CountCity();
            }
            else if(IsContext("city/count/uuid")){
                CountCityUuid();
            }
            else if(IsContext("city/count/code")){
                CountCityCode();
            }
            else if(IsContext("city/browse/filter")){
                BrowseCityListFilter();
            }
            else if(IsContext("city/set/uuid")){
                SetCityUuid();
            }
            else if(IsContext("city/set/code")){
                SetCityCode();
            }
            else if(IsContext("city/del/uuid")){
                DelCityUuid();
            }
            else if(IsContext("city/del/code")){
                DelCityCode();
            }
            else if(IsContext("city/get")){
                GetCityList();
            }
            else if(IsContext("city/get/uuid")){
                GetCityListUuid();
            }
            else if(IsContext("city/get/code")){
                GetCityListCode();
            }
            if(IsContext("postal-code/count")){
                CountPostalCode();
            }
            else if(IsContext("postal-code/count/uuid")){
                CountPostalCodeUuid();
            }
            else if(IsContext("postal-code/count/code")){
                CountPostalCodeCode();
            }
            else if(IsContext("postal-code/browse/filter")){
                BrowsePostalCodeListFilter();
            }
            else if(IsContext("postal-code/set/uuid")){
                SetPostalCodeUuid();
            }
            else if(IsContext("postal-code/set/code")){
                SetPostalCodeCode();
            }
            else if(IsContext("postal-code/del/uuid")){
                DelPostalCodeUuid();
            }
            else if(IsContext("postal-code/del/code")){
                DelPostalCodeCode();
            }
            else if(IsContext("postal-code/get")){
                GetPostalCodeList();
            }
            else if(IsContext("postal-code/get/uuid")){
                GetPostalCodeListUuid();
            }
            else if(IsContext("postal-code/get/code")){
                GetPostalCodeListCode();
            }
        }    
        
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfile() {
        

            ResponseProfileInt wrapper = new ResponseProfileInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/count";

            int i = api.CountProfile(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileInt wrapper = new ResponseProfileInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/count/uuid";

            int i = api.CountProfileUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileUsernameHash() {
        
            string _username = (string)util.GetParamValue(_context, "username");
            string _hash = (string)util.GetParamValue(_context, "hash");

            ResponseProfileInt wrapper = new ResponseProfileInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/count/username/hash";

            int i = api.CountProfileUsernameHash(
                _username
                , _hash
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseProfileInt wrapper = new ResponseProfileInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/count/username";

            int i = api.CountProfileUsername(
                _username
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileListFilter()  {
        
            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileResult result = api.BrowseProfileListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileUuid()  {
        
            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/set/uuid";
                        
            Profile obj = new Profile();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _first_name = util.GetParamValue(_context, "first_name");
            if(!String.IsNullOrEmpty(_first_name))
                obj.first_name = (string)_first_name;
            
            string _last_name = util.GetParamValue(_context, "last_name");
            if(!String.IsNullOrEmpty(_last_name))
                obj.last_name = (string)_last_name;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _email = util.GetParamValue(_context, "email");
            if(!String.IsNullOrEmpty(_email))
                obj.email = (string)_email;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            
            // get data
            wrapper.data = api.SetProfileUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileUsername()  {
        
            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/set/username";
                        
            Profile obj = new Profile();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _first_name = util.GetParamValue(_context, "first_name");
            if(!String.IsNullOrEmpty(_first_name))
                obj.first_name = (string)_first_name;
            
            string _last_name = util.GetParamValue(_context, "last_name");
            if(!String.IsNullOrEmpty(_last_name))
                obj.last_name = (string)_last_name;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _email = util.GetParamValue(_context, "email");
            if(!String.IsNullOrEmpty(_email))
                obj.email = (string)_email;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            
            // get data
            wrapper.data = api.SetProfileUsername(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/del/uuid";

            bool completed = api.DelProfileUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/del/username";

            bool completed = api.DelProfileUsername(
                        
                _username
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/get/uuid";

            List<Profile> objs = api.GetProfileListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileListUsernameHash() {
        
            string _username = (string)util.GetParamValue(_context, "username");
            string _hash = (string)util.GetParamValue(_context, "hash");

            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/get/username/hash";

            List<Profile> objs = api.GetProfileListUsernameHash(
                _username
                , _hash
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileListUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/get/username";

            List<Profile> objs = api.GetProfileListUsername(
                _username
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileType() {
        

            ResponseProfileTypeInt wrapper = new ResponseProfileTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/count";

            int i = api.CountProfileType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileTypeInt wrapper = new ResponseProfileTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/count/uuid";

            int i = api.CountProfileTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileTypeTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseProfileTypeInt wrapper = new ResponseProfileTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/count/type-id";

            int i = api.CountProfileTypeTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileTypeListFilter()  {
        
            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileTypeResult result = api.BrowseProfileTypeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileTypeUuid()  {
        
            ResponseProfileTypeBool wrapper = new ResponseProfileTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/set/uuid";
                        
            ProfileType obj = new ProfileType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetProfileTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileTypeBool wrapper = new ResponseProfileTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/del/uuid";

            bool completed = api.DelProfileTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileTypeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/get/uuid";

            List<ProfileType> objs = api.GetProfileTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileTypeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/get/code";

            List<ProfileType> objs = api.GetProfileTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileTypeListTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/get/type-id";

            List<ProfileType> objs = api.GetProfileTypeListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttribute() {
        

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count";

            int i = api.CountProfileAttribute(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/uuid";

            int i = api.CountProfileAttributeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/code";

            int i = api.CountProfileAttributeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeType() {
        
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/type";

            int i = api.CountProfileAttributeType(
                _type
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeGroup() {
        
            int _group = int.Parse(util.GetParamValue(_context, "group"));

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/group";

            int i = api.CountProfileAttributeGroup(
                _group
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeCodeType() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/code/type";

            int i = api.CountProfileAttributeCodeType(
                _code
                , _type
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAttributeListFilter()  {
        
            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileAttributeResult result = api.BrowseProfileAttributeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeUuid()  {
        
            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/set/uuid";
                        
            ProfileAttribute obj = new ProfileAttribute();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetProfileAttributeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeCode()  {
        
            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/set/code";
                        
            ProfileAttribute obj = new ProfileAttribute();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetProfileAttributeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/del/uuid";

            bool completed = api.DelProfileAttributeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/del/code";

            bool completed = api.DelProfileAttributeCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/uuid";

            List<ProfileAttribute> objs = api.GetProfileAttributeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/code";

            List<ProfileAttribute> objs = api.GetProfileAttributeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListType() {
        
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/type";

            List<ProfileAttribute> objs = api.GetProfileAttributeListType(
                _type
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListGroup() {
        
            int _group = int.Parse(util.GetParamValue(_context, "group"));

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/group";

            List<ProfileAttribute> objs = api.GetProfileAttributeListGroup(
                _group
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListCodeType() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/code/type";

            List<ProfileAttribute> objs = api.GetProfileAttributeListCodeType(
                _code
                , _type
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeText() {
        

            ResponseProfileAttributeTextInt wrapper = new ResponseProfileAttributeTextInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/count";

            int i = api.CountProfileAttributeText(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeTextUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeTextInt wrapper = new ResponseProfileAttributeTextInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/count/uuid";

            int i = api.CountProfileAttributeTextUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeTextProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeTextInt wrapper = new ResponseProfileAttributeTextInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/count/profile-id";

            int i = api.CountProfileAttributeTextProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeTextProfileIdAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeTextInt wrapper = new ResponseProfileAttributeTextInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/count/profile-id/attribute-id";

            int i = api.CountProfileAttributeTextProfileIdAttributeId(
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAttributeTextListFilter()  {
        
            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileAttributeTextResult result = api.BrowseProfileAttributeTextListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeTextUuid()  {
        
            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/set/uuid";
                        
            ProfileAttributeText obj = new ProfileAttributeText();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _attribute_id = util.GetParamValue(_context, "attribute_id");
            if(!String.IsNullOrEmpty(_attribute_id))
                obj.attribute_id = (string)_attribute_id;
            
            string _attribute_value = util.GetParamValue(_context, "attribute_value");
            if(!String.IsNullOrEmpty(_attribute_value))
                obj.attribute_value = (string)_attribute_value;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            
            // get data
            wrapper.data = api.SetProfileAttributeTextUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeTextProfileId()  {
        
            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/set/profile-id";
                        
            ProfileAttributeText obj = new ProfileAttributeText();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _attribute_id = util.GetParamValue(_context, "attribute_id");
            if(!String.IsNullOrEmpty(_attribute_id))
                obj.attribute_id = (string)_attribute_id;
            
            string _attribute_value = util.GetParamValue(_context, "attribute_value");
            if(!String.IsNullOrEmpty(_attribute_value))
                obj.attribute_value = (string)_attribute_value;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            
            // get data
            wrapper.data = api.SetProfileAttributeTextProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeTextProfileIdAttributeId()  {
        
            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/set/profile-id/attribute-id";
                        
            ProfileAttributeText obj = new ProfileAttributeText();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _attribute_id = util.GetParamValue(_context, "attribute_id");
            if(!String.IsNullOrEmpty(_attribute_id))
                obj.attribute_id = (string)_attribute_id;
            
            string _attribute_value = util.GetParamValue(_context, "attribute_value");
            if(!String.IsNullOrEmpty(_attribute_value))
                obj.attribute_value = (string)_attribute_value;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            
            // get data
            wrapper.data = api.SetProfileAttributeTextProfileIdAttributeId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeTextUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/del/uuid";

            bool completed = api.DelProfileAttributeTextUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeTextProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/del/profile-id";

            bool completed = api.DelProfileAttributeTextProfileId(
                        
                _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeTextProfileIdAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/del/profile-id/attribute-id";

            bool completed = api.DelProfileAttributeTextProfileIdAttributeId(
                        
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeTextListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/get/uuid";

            List<ProfileAttributeText> objs = api.GetProfileAttributeTextListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeTextListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/get/profile-id";

            List<ProfileAttributeText> objs = api.GetProfileAttributeTextListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeTextListProfileIdAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/get/profile-id/attribute-id";

            List<ProfileAttributeText> objs = api.GetProfileAttributeTextListProfileIdAttributeId(
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeData() {
        

            ResponseProfileAttributeDataInt wrapper = new ResponseProfileAttributeDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/count";

            int i = api.CountProfileAttributeData(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeDataUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeDataInt wrapper = new ResponseProfileAttributeDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/count/uuid";

            int i = api.CountProfileAttributeDataUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeDataProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeDataInt wrapper = new ResponseProfileAttributeDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/count/profile-id";

            int i = api.CountProfileAttributeDataProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeDataProfileIdAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeDataInt wrapper = new ResponseProfileAttributeDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/count/profile-id/attribute-id";

            int i = api.CountProfileAttributeDataProfileIdAttributeId(
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAttributeDataListFilter()  {
        
            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileAttributeDataResult result = api.BrowseProfileAttributeDataListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeDataUuid()  {
        
            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/set/uuid";
                        
            ProfileAttributeData obj = new ProfileAttributeData();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _attribute_id = util.GetParamValue(_context, "attribute_id");
            if(!String.IsNullOrEmpty(_attribute_id))
                obj.attribute_id = (string)_attribute_id;
            
            string _attribute_value = util.GetParamValue(_context, "attribute_value");
            if(!String.IsNullOrEmpty(_attribute_value))
                obj.attribute_value = (string)_attribute_value;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            
            // get data
            wrapper.data = api.SetProfileAttributeDataUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeDataProfileId()  {
        
            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/set/profile-id";
                        
            ProfileAttributeData obj = new ProfileAttributeData();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _attribute_id = util.GetParamValue(_context, "attribute_id");
            if(!String.IsNullOrEmpty(_attribute_id))
                obj.attribute_id = (string)_attribute_id;
            
            string _attribute_value = util.GetParamValue(_context, "attribute_value");
            if(!String.IsNullOrEmpty(_attribute_value))
                obj.attribute_value = (string)_attribute_value;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            
            // get data
            wrapper.data = api.SetProfileAttributeDataProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeDataProfileIdAttributeId()  {
        
            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/set/profile-id/attribute-id";
                        
            ProfileAttributeData obj = new ProfileAttributeData();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _group = util.GetParamValue(_context, "group");
            if(!String.IsNullOrEmpty(_group))
                obj.group = Convert.ToInt32(_group);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _attribute_id = util.GetParamValue(_context, "attribute_id");
            if(!String.IsNullOrEmpty(_attribute_id))
                obj.attribute_id = (string)_attribute_id;
            
            string _attribute_value = util.GetParamValue(_context, "attribute_value");
            if(!String.IsNullOrEmpty(_attribute_value))
                obj.attribute_value = (string)_attribute_value;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = Convert.ToInt32(_type);
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = Convert.ToInt32(_order);
            
            
            // get data
            wrapper.data = api.SetProfileAttributeDataProfileIdAttributeId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeDataUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/del/uuid";

            bool completed = api.DelProfileAttributeDataUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeDataProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/del/profile-id";

            bool completed = api.DelProfileAttributeDataProfileId(
                        
                _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeDataProfileIdAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/del/profile-id/attribute-id";

            bool completed = api.DelProfileAttributeDataProfileIdAttributeId(
                        
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeDataListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/get/uuid";

            List<ProfileAttributeData> objs = api.GetProfileAttributeDataListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeDataListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/get/profile-id";

            List<ProfileAttributeData> objs = api.GetProfileAttributeDataListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeDataListProfileIdAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/get/profile-id/attribute-id";

            List<ProfileAttributeData> objs = api.GetProfileAttributeDataListProfileIdAttributeId(
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDevice() {
        

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count";

            int i = api.CountProfileDevice(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/uuid";

            int i = api.CountProfileDeviceUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceProfileIdDeviceId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/profile-id/device-id";

            int i = api.CountProfileDeviceProfileIdDeviceId(
                _profile_id
                , _device_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceProfileIdToken() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/profile-id/token";

            int i = api.CountProfileDeviceProfileIdToken(
                _profile_id
                , _token
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/profile-id";

            int i = api.CountProfileDeviceProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceDeviceId() {
        
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/device-id";

            int i = api.CountProfileDeviceDeviceId(
                _device_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceToken() {
        
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/token";

            int i = api.CountProfileDeviceToken(
                _token
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileDeviceListFilter()  {
        
            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileDeviceResult result = api.BrowseProfileDeviceListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileDeviceUuid()  {
        
            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/set/uuid";
                        
            ProfileDevice obj = new ProfileDevice();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _token = util.GetParamValue(_context, "token");
            if(!String.IsNullOrEmpty(_token))
                obj.token = (string)_token;
            
            string _secret = util.GetParamValue(_context, "secret");
            if(!String.IsNullOrEmpty(_secret))
                obj.secret = (string)_secret;
            
            string _device_version = util.GetParamValue(_context, "device_version");
            if(!String.IsNullOrEmpty(_device_version))
                obj.device_version = (string)_device_version;
            
            string _device_type = util.GetParamValue(_context, "device_type");
            if(!String.IsNullOrEmpty(_device_type))
                obj.device_type = (string)_device_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _device_os = util.GetParamValue(_context, "device_os");
            if(!String.IsNullOrEmpty(_device_os))
                obj.device_os = (string)_device_os;
            
            string _device_id = util.GetParamValue(_context, "device_id");
            if(!String.IsNullOrEmpty(_device_id))
                obj.device_id = (string)_device_id;
            
            string _device_platform = util.GetParamValue(_context, "device_platform");
            if(!String.IsNullOrEmpty(_device_platform))
                obj.device_platform = (string)_device_platform;
            
            
            // get data
            wrapper.data = api.SetProfileDeviceUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/uuid";

            bool completed = api.DelProfileDeviceUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceProfileIdDeviceId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/profile-id/device-id";

            bool completed = api.DelProfileDeviceProfileIdDeviceId(
                        
                _profile_id
                , _device_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceProfileIdToken() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/profile-id/token";

            bool completed = api.DelProfileDeviceProfileIdToken(
                        
                _profile_id
                , _token
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceToken() {
        
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/token";

            bool completed = api.DelProfileDeviceToken(
                        
                _token
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/uuid";

            List<ProfileDevice> objs = api.GetProfileDeviceListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListProfileIdDeviceId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/profile-id/device-id";

            List<ProfileDevice> objs = api.GetProfileDeviceListProfileIdDeviceId(
                _profile_id
                , _device_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListProfileIdToken() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/profile-id/token";

            List<ProfileDevice> objs = api.GetProfileDeviceListProfileIdToken(
                _profile_id
                , _token
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/profile-id";

            List<ProfileDevice> objs = api.GetProfileDeviceListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListDeviceId() {
        
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/device-id";

            List<ProfileDevice> objs = api.GetProfileDeviceListDeviceId(
                _device_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListToken() {
        
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/token";

            List<ProfileDevice> objs = api.GetProfileDeviceListToken(
                _token
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCountry() {
        

            ResponseCountryInt wrapper = new ResponseCountryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/count";

            int i = api.CountCountry(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCountryUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCountryInt wrapper = new ResponseCountryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/count/uuid";

            int i = api.CountCountryUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCountryCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCountryInt wrapper = new ResponseCountryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/count/code";

            int i = api.CountCountryCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseCountryListFilter()  {
        
            ResponseCountryList wrapper = new ResponseCountryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            CountryResult result = api.BrowseCountryListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCountryUuid()  {
        
            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/set/uuid";
                        
            Country obj = new Country();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetCountryUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCountryCode()  {
        
            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/set/code";
                        
            Country obj = new Country();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetCountryCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCountryUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/del/uuid";

            bool completed = api.DelCountryUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCountryCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/del/code";

            bool completed = api.DelCountryCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCountryList() {
        

            ResponseCountryList wrapper = new ResponseCountryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/get";

            List<Country> objs = api.GetCountryList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCountryListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCountryList wrapper = new ResponseCountryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/get/uuid";

            List<Country> objs = api.GetCountryListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCountryListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCountryList wrapper = new ResponseCountryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/get/code";

            List<Country> objs = api.GetCountryListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountState() {
        

            ResponseStateInt wrapper = new ResponseStateInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/count";

            int i = api.CountState(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountStateUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseStateInt wrapper = new ResponseStateInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/count/uuid";

            int i = api.CountStateUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountStateCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseStateInt wrapper = new ResponseStateInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/count/code";

            int i = api.CountStateCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseStateListFilter()  {
        
            ResponseStateList wrapper = new ResponseStateList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            StateResult result = api.BrowseStateListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetStateUuid()  {
        
            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/set/uuid";
                        
            State obj = new State();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetStateUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetStateCode()  {
        
            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/set/code";
                        
            State obj = new State();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetStateCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelStateUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/del/uuid";

            bool completed = api.DelStateUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelStateCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/del/code";

            bool completed = api.DelStateCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetStateList() {
        

            ResponseStateList wrapper = new ResponseStateList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/get";

            List<State> objs = api.GetStateList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetStateListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseStateList wrapper = new ResponseStateList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/get/uuid";

            List<State> objs = api.GetStateListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetStateListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseStateList wrapper = new ResponseStateList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/get/code";

            List<State> objs = api.GetStateListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCity() {
        

            ResponseCityInt wrapper = new ResponseCityInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/count";

            int i = api.CountCity(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCityUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCityInt wrapper = new ResponseCityInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/count/uuid";

            int i = api.CountCityUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCityCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCityInt wrapper = new ResponseCityInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/count/code";

            int i = api.CountCityCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseCityListFilter()  {
        
            ResponseCityList wrapper = new ResponseCityList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            CityResult result = api.BrowseCityListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCityUuid()  {
        
            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/set/uuid";
                        
            City obj = new City();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetCityUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCityCode()  {
        
            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/set/code";
                        
            City obj = new City();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetCityCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCityUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/del/uuid";

            bool completed = api.DelCityUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCityCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/del/code";

            bool completed = api.DelCityCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCityList() {
        

            ResponseCityList wrapper = new ResponseCityList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/get";

            List<City> objs = api.GetCityList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCityListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCityList wrapper = new ResponseCityList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/get/uuid";

            List<City> objs = api.GetCityListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCityListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCityList wrapper = new ResponseCityList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/get/code";

            List<City> objs = api.GetCityListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPostalCode() {
        

            ResponsePostalCodeInt wrapper = new ResponsePostalCodeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/count";

            int i = api.CountPostalCode(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPostalCodeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePostalCodeInt wrapper = new ResponsePostalCodeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/count/uuid";

            int i = api.CountPostalCodeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPostalCodeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponsePostalCodeInt wrapper = new ResponsePostalCodeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/count/code";

            int i = api.CountPostalCodeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowsePostalCodeListFilter()  {
        
            ResponsePostalCodeList wrapper = new ResponsePostalCodeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            PostalCodeResult result = api.BrowsePostalCodeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPostalCodeUuid()  {
        
            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/set/uuid";
                        
            PostalCode obj = new PostalCode();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetPostalCodeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPostalCodeCode()  {
        
            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/set/code";
                        
            PostalCode obj = new PostalCode();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetPostalCodeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPostalCodeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/del/uuid";

            bool completed = api.DelPostalCodeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPostalCodeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/del/code";

            bool completed = api.DelPostalCodeCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPostalCodeList() {
        

            ResponsePostalCodeList wrapper = new ResponsePostalCodeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/get";

            List<PostalCode> objs = api.GetPostalCodeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPostalCodeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePostalCodeList wrapper = new ResponsePostalCodeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/get/uuid";

            List<PostalCode> objs = api.GetPostalCodeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPostalCodeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponsePostalCodeList wrapper = new ResponsePostalCodeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/get/code";

            List<PostalCode> objs = api.GetPostalCodeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
    }
}






