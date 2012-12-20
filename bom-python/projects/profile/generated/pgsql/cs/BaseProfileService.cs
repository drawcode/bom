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

    public class BaseProfileRequestHandler : IBaseHandler  {	
    
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
        
        public BaseProfileRequestHandler(){
        
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
            else if(IsContext("profile/count/by-uuid")){
                CountProfileByUuid();
            }
            else if(IsContext("profile/count/by-username/by-hash")){
                CountProfileByUsernameByHash();
            }
            else if(IsContext("profile/count/by-username")){
                CountProfileByUsername();
            }
            else if(IsContext("profile/browse/by-filter")){
                BrowseProfileListByFilter();
            }
            else if(IsContext("profile/set/by-uuid")){
                SetProfileByUuid();
            }
            else if(IsContext("profile/set/by-username")){
                SetProfileByUsername();
            }
            else if(IsContext("profile/del/by-uuid")){
                DelProfileByUuid();
            }
            else if(IsContext("profile/del/by-username")){
                DelProfileByUsername();
            }
            else if(IsContext("profile/get/by-uuid")){
                GetProfileListByUuid();
            }
            else if(IsContext("profile/get/by-username/by-hash")){
                GetProfileListByUsernameByHash();
            }
            else if(IsContext("profile/get/by-username")){
                GetProfileListByUsername();
            }
            if(IsContext("profile-type/count")){
                CountProfileType();
            }
            else if(IsContext("profile-type/count/by-uuid")){
                CountProfileTypeByUuid();
            }
            else if(IsContext("profile-type/count/by-type-id")){
                CountProfileTypeByTypeId();
            }
            else if(IsContext("profile-type/browse/by-filter")){
                BrowseProfileTypeListByFilter();
            }
            else if(IsContext("profile-type/set/by-uuid")){
                SetProfileTypeByUuid();
            }
            else if(IsContext("profile-type/del/by-uuid")){
                DelProfileTypeByUuid();
            }
            else if(IsContext("profile-type/get/by-uuid")){
                GetProfileTypeListByUuid();
            }
            else if(IsContext("profile-type/get/by-code")){
                GetProfileTypeListByCode();
            }
            else if(IsContext("profile-type/get/by-type-id")){
                GetProfileTypeListByTypeId();
            }
            if(IsContext("profile-attribute/count")){
                CountProfileAttribute();
            }
            else if(IsContext("profile-attribute/count/by-uuid")){
                CountProfileAttributeByUuid();
            }
            else if(IsContext("profile-attribute/count/by-code")){
                CountProfileAttributeByCode();
            }
            else if(IsContext("profile-attribute/count/by-type")){
                CountProfileAttributeByType();
            }
            else if(IsContext("profile-attribute/count/by-group")){
                CountProfileAttributeByGroup();
            }
            else if(IsContext("profile-attribute/count/by-code/by-type")){
                CountProfileAttributeByCodeByType();
            }
            else if(IsContext("profile-attribute/browse/by-filter")){
                BrowseProfileAttributeListByFilter();
            }
            else if(IsContext("profile-attribute/set/by-uuid")){
                SetProfileAttributeByUuid();
            }
            else if(IsContext("profile-attribute/set/by-code")){
                SetProfileAttributeByCode();
            }
            else if(IsContext("profile-attribute/del/by-uuid")){
                DelProfileAttributeByUuid();
            }
            else if(IsContext("profile-attribute/del/by-code")){
                DelProfileAttributeByCode();
            }
            else if(IsContext("profile-attribute/get/by-uuid")){
                GetProfileAttributeListByUuid();
            }
            else if(IsContext("profile-attribute/get/by-code")){
                GetProfileAttributeListByCode();
            }
            else if(IsContext("profile-attribute/get/by-type")){
                GetProfileAttributeListByType();
            }
            else if(IsContext("profile-attribute/get/by-group")){
                GetProfileAttributeListByGroup();
            }
            else if(IsContext("profile-attribute/get/by-code/by-type")){
                GetProfileAttributeListByCodeByType();
            }
            if(IsContext("profile-attribute-text/count")){
                CountProfileAttributeText();
            }
            else if(IsContext("profile-attribute-text/count/by-uuid")){
                CountProfileAttributeTextByUuid();
            }
            else if(IsContext("profile-attribute-text/count/by-profile-id")){
                CountProfileAttributeTextByProfileId();
            }
            else if(IsContext("profile-attribute-text/count/by-profile-id/by-attribute-id")){
                CountProfileAttributeTextByProfileIdByAttributeId();
            }
            else if(IsContext("profile-attribute-text/browse/by-filter")){
                BrowseProfileAttributeTextListByFilter();
            }
            else if(IsContext("profile-attribute-text/set/by-uuid")){
                SetProfileAttributeTextByUuid();
            }
            else if(IsContext("profile-attribute-text/set/by-profile-id")){
                SetProfileAttributeTextByProfileId();
            }
            else if(IsContext("profile-attribute-text/set/by-profile-id/by-attribute-id")){
                SetProfileAttributeTextByProfileIdByAttributeId();
            }
            else if(IsContext("profile-attribute-text/del/by-uuid")){
                DelProfileAttributeTextByUuid();
            }
            else if(IsContext("profile-attribute-text/del/by-profile-id")){
                DelProfileAttributeTextByProfileId();
            }
            else if(IsContext("profile-attribute-text/del/by-profile-id/by-attribute-id")){
                DelProfileAttributeTextByProfileIdByAttributeId();
            }
            else if(IsContext("profile-attribute-text/get/by-uuid")){
                GetProfileAttributeTextListByUuid();
            }
            else if(IsContext("profile-attribute-text/get/by-profile-id")){
                GetProfileAttributeTextListByProfileId();
            }
            else if(IsContext("profile-attribute-text/get/by-profile-id/by-attribute-id")){
                GetProfileAttributeTextListByProfileIdByAttributeId();
            }
            if(IsContext("profile-attribute-data/count")){
                CountProfileAttributeData();
            }
            else if(IsContext("profile-attribute-data/count/by-uuid")){
                CountProfileAttributeDataByUuid();
            }
            else if(IsContext("profile-attribute-data/count/by-profile-id")){
                CountProfileAttributeDataByProfileId();
            }
            else if(IsContext("profile-attribute-data/count/by-profile-id/by-attribute-id")){
                CountProfileAttributeDataByProfileIdByAttributeId();
            }
            else if(IsContext("profile-attribute-data/browse/by-filter")){
                BrowseProfileAttributeDataListByFilter();
            }
            else if(IsContext("profile-attribute-data/set/by-uuid")){
                SetProfileAttributeDataByUuid();
            }
            else if(IsContext("profile-attribute-data/set/by-profile-id")){
                SetProfileAttributeDataByProfileId();
            }
            else if(IsContext("profile-attribute-data/set/by-profile-id/by-attribute-id")){
                SetProfileAttributeDataByProfileIdByAttributeId();
            }
            else if(IsContext("profile-attribute-data/del/by-uuid")){
                DelProfileAttributeDataByUuid();
            }
            else if(IsContext("profile-attribute-data/del/by-profile-id")){
                DelProfileAttributeDataByProfileId();
            }
            else if(IsContext("profile-attribute-data/del/by-profile-id/by-attribute-id")){
                DelProfileAttributeDataByProfileIdByAttributeId();
            }
            else if(IsContext("profile-attribute-data/get/by-uuid")){
                GetProfileAttributeDataListByUuid();
            }
            else if(IsContext("profile-attribute-data/get/by-profile-id")){
                GetProfileAttributeDataListByProfileId();
            }
            else if(IsContext("profile-attribute-data/get/by-profile-id/by-attribute-id")){
                GetProfileAttributeDataListByProfileIdByAttributeId();
            }
            if(IsContext("profile-device/count")){
                CountProfileDevice();
            }
            else if(IsContext("profile-device/count/by-uuid")){
                CountProfileDeviceByUuid();
            }
            else if(IsContext("profile-device/count/by-profile-id/by-device-id")){
                CountProfileDeviceByProfileIdByDeviceId();
            }
            else if(IsContext("profile-device/count/by-profile-id/by-token")){
                CountProfileDeviceByProfileIdByToken();
            }
            else if(IsContext("profile-device/count/by-profile-id")){
                CountProfileDeviceByProfileId();
            }
            else if(IsContext("profile-device/count/by-device-id")){
                CountProfileDeviceByDeviceId();
            }
            else if(IsContext("profile-device/count/by-token")){
                CountProfileDeviceByToken();
            }
            else if(IsContext("profile-device/browse/by-filter")){
                BrowseProfileDeviceListByFilter();
            }
            else if(IsContext("profile-device/set/by-uuid")){
                SetProfileDeviceByUuid();
            }
            else if(IsContext("profile-device/del/by-uuid")){
                DelProfileDeviceByUuid();
            }
            else if(IsContext("profile-device/del/by-profile-id/by-device-id")){
                DelProfileDeviceByProfileIdByDeviceId();
            }
            else if(IsContext("profile-device/del/by-profile-id/by-token")){
                DelProfileDeviceByProfileIdByToken();
            }
            else if(IsContext("profile-device/del/by-token")){
                DelProfileDeviceByToken();
            }
            else if(IsContext("profile-device/get/by-uuid")){
                GetProfileDeviceListByUuid();
            }
            else if(IsContext("profile-device/get/by-profile-id/by-device-id")){
                GetProfileDeviceListByProfileIdByDeviceId();
            }
            else if(IsContext("profile-device/get/by-profile-id/by-token")){
                GetProfileDeviceListByProfileIdByToken();
            }
            else if(IsContext("profile-device/get/by-profile-id")){
                GetProfileDeviceListByProfileId();
            }
            else if(IsContext("profile-device/get/by-device-id")){
                GetProfileDeviceListByDeviceId();
            }
            else if(IsContext("profile-device/get/by-token")){
                GetProfileDeviceListByToken();
            }
            if(IsContext("country/count")){
                CountCountry();
            }
            else if(IsContext("country/count/by-uuid")){
                CountCountryByUuid();
            }
            else if(IsContext("country/count/by-code")){
                CountCountryByCode();
            }
            else if(IsContext("country/browse/by-filter")){
                BrowseCountryListByFilter();
            }
            else if(IsContext("country/set/by-uuid")){
                SetCountryByUuid();
            }
            else if(IsContext("country/set/by-code")){
                SetCountryByCode();
            }
            else if(IsContext("country/del/by-uuid")){
                DelCountryByUuid();
            }
            else if(IsContext("country/del/by-code")){
                DelCountryByCode();
            }
            else if(IsContext("country/get")){
                GetCountryList();
            }
            else if(IsContext("country/get/by-uuid")){
                GetCountryListByUuid();
            }
            else if(IsContext("country/get/by-code")){
                GetCountryListByCode();
            }
            if(IsContext("state/count")){
                CountState();
            }
            else if(IsContext("state/count/by-uuid")){
                CountStateByUuid();
            }
            else if(IsContext("state/count/by-code")){
                CountStateByCode();
            }
            else if(IsContext("state/browse/by-filter")){
                BrowseStateListByFilter();
            }
            else if(IsContext("state/set/by-uuid")){
                SetStateByUuid();
            }
            else if(IsContext("state/set/by-code")){
                SetStateByCode();
            }
            else if(IsContext("state/del/by-uuid")){
                DelStateByUuid();
            }
            else if(IsContext("state/del/by-code")){
                DelStateByCode();
            }
            else if(IsContext("state/get")){
                GetStateList();
            }
            else if(IsContext("state/get/by-uuid")){
                GetStateListByUuid();
            }
            else if(IsContext("state/get/by-code")){
                GetStateListByCode();
            }
            if(IsContext("city/count")){
                CountCity();
            }
            else if(IsContext("city/count/by-uuid")){
                CountCityByUuid();
            }
            else if(IsContext("city/count/by-code")){
                CountCityByCode();
            }
            else if(IsContext("city/browse/by-filter")){
                BrowseCityListByFilter();
            }
            else if(IsContext("city/set/by-uuid")){
                SetCityByUuid();
            }
            else if(IsContext("city/set/by-code")){
                SetCityByCode();
            }
            else if(IsContext("city/del/by-uuid")){
                DelCityByUuid();
            }
            else if(IsContext("city/del/by-code")){
                DelCityByCode();
            }
            else if(IsContext("city/get")){
                GetCityList();
            }
            else if(IsContext("city/get/by-uuid")){
                GetCityListByUuid();
            }
            else if(IsContext("city/get/by-code")){
                GetCityListByCode();
            }
            if(IsContext("postal-code/count")){
                CountPostalCode();
            }
            else if(IsContext("postal-code/count/by-uuid")){
                CountPostalCodeByUuid();
            }
            else if(IsContext("postal-code/count/by-code")){
                CountPostalCodeByCode();
            }
            else if(IsContext("postal-code/browse/by-filter")){
                BrowsePostalCodeListByFilter();
            }
            else if(IsContext("postal-code/set/by-uuid")){
                SetPostalCodeByUuid();
            }
            else if(IsContext("postal-code/set/by-code")){
                SetPostalCodeByCode();
            }
            else if(IsContext("postal-code/del/by-uuid")){
                DelPostalCodeByUuid();
            }
            else if(IsContext("postal-code/del/by-code")){
                DelPostalCodeByCode();
            }
            else if(IsContext("postal-code/get")){
                GetPostalCodeList();
            }
            else if(IsContext("postal-code/get/by-uuid")){
                GetPostalCodeListByUuid();
            }
            else if(IsContext("postal-code/get/by-code")){
                GetPostalCodeListByCode();
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
                    
        public virtual void CountProfileByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileInt wrapper = new ResponseProfileInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/count/by-uuid";

            int i = api.CountProfileByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileByUsernameByHash() {
        
            string _username = (string)util.GetParamValue(_context, "username");
            string _hash = (string)util.GetParamValue(_context, "hash");

            ResponseProfileInt wrapper = new ResponseProfileInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/count/by-username/by-hash";

            int i = api.CountProfileByUsernameByHash(
                _username
                , _hash
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseProfileInt wrapper = new ResponseProfileInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/count/by-username";

            int i = api.CountProfileByUsername(
                _username
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileListByFilter()  {
        
            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileResult result = api.BrowseProfileListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileByUuid()  {
        
            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/set/by-uuid";
                        
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
            wrapper.data = api.SetProfileByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileByUsername()  {
        
            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/set/by-username";
                        
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
            wrapper.data = api.SetProfileByUsername(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/del/by-uuid";

            bool completed = api.DelProfileByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseProfileBool wrapper = new ResponseProfileBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/del/by-username";

            bool completed = api.DelProfileByUsername(
                        
                _username
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/get/by-uuid";

            List<Profile> objs = api.GetProfileListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileListByUsernameByHash() {
        
            string _username = (string)util.GetParamValue(_context, "username");
            string _hash = (string)util.GetParamValue(_context, "hash");

            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/get/by-username/by-hash";

            List<Profile> objs = api.GetProfileListByUsernameByHash(
                _username
                , _hash
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileListByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseProfileList wrapper = new ResponseProfileList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile/get/by-username";

            List<Profile> objs = api.GetProfileListByUsername(
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
                    
        public virtual void CountProfileTypeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileTypeInt wrapper = new ResponseProfileTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/count/by-uuid";

            int i = api.CountProfileTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileTypeByTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseProfileTypeInt wrapper = new ResponseProfileTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/count/by-type-id";

            int i = api.CountProfileTypeByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileTypeListByFilter()  {
        
            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileTypeResult result = api.BrowseProfileTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileTypeByUuid()  {
        
            ResponseProfileTypeBool wrapper = new ResponseProfileTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/set/by-uuid";
                        
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
            wrapper.data = api.SetProfileTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileTypeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileTypeBool wrapper = new ResponseProfileTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/del/by-uuid";

            bool completed = api.DelProfileTypeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileTypeListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/get/by-uuid";

            List<ProfileType> objs = api.GetProfileTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileTypeListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/get/by-code";

            List<ProfileType> objs = api.GetProfileTypeListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileTypeListByTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseProfileTypeList wrapper = new ResponseProfileTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-type/get/by-type-id";

            List<ProfileType> objs = api.GetProfileTypeListByTypeId(
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
                    
        public virtual void CountProfileAttributeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/by-uuid";

            int i = api.CountProfileAttributeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/by-code";

            int i = api.CountProfileAttributeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeByType() {
        
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/by-type";

            int i = api.CountProfileAttributeByType(
                _type
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeByGroup() {
        
            int _group = int.Parse(util.GetParamValue(_context, "group"));

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/by-group";

            int i = api.CountProfileAttributeByGroup(
                _group
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeByCodeByType() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeInt wrapper = new ResponseProfileAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/count/by-code/by-type";

            int i = api.CountProfileAttributeByCodeByType(
                _code
                , _type
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAttributeListByFilter()  {
        
            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileAttributeResult result = api.BrowseProfileAttributeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeByUuid()  {
        
            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/set/by-uuid";
                        
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
            wrapper.data = api.SetProfileAttributeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeByCode()  {
        
            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/set/by-code";
                        
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
            wrapper.data = api.SetProfileAttributeByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/del/by-uuid";

            bool completed = api.DelProfileAttributeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileAttributeBool wrapper = new ResponseProfileAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/del/by-code";

            bool completed = api.DelProfileAttributeByCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/by-uuid";

            List<ProfileAttribute> objs = api.GetProfileAttributeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/by-code";

            List<ProfileAttribute> objs = api.GetProfileAttributeListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListByType() {
        
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/by-type";

            List<ProfileAttribute> objs = api.GetProfileAttributeListByType(
                _type
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListByGroup() {
        
            int _group = int.Parse(util.GetParamValue(_context, "group"));

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/by-group";

            List<ProfileAttribute> objs = api.GetProfileAttributeListByGroup(
                _group
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeListByCodeByType() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            int _type = int.Parse(util.GetParamValue(_context, "type"));

            ResponseProfileAttributeList wrapper = new ResponseProfileAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute/get/by-code/by-type";

            List<ProfileAttribute> objs = api.GetProfileAttributeListByCodeByType(
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
                    
        public virtual void CountProfileAttributeTextByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeTextInt wrapper = new ResponseProfileAttributeTextInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/count/by-uuid";

            int i = api.CountProfileAttributeTextByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeTextByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeTextInt wrapper = new ResponseProfileAttributeTextInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/count/by-profile-id";

            int i = api.CountProfileAttributeTextByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeTextByProfileIdByAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeTextInt wrapper = new ResponseProfileAttributeTextInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/count/by-profile-id/by-attribute-id";

            int i = api.CountProfileAttributeTextByProfileIdByAttributeId(
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAttributeTextListByFilter()  {
        
            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileAttributeTextResult result = api.BrowseProfileAttributeTextListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeTextByUuid()  {
        
            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/set/by-uuid";
                        
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
            wrapper.data = api.SetProfileAttributeTextByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeTextByProfileId()  {
        
            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/set/by-profile-id";
                        
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
            wrapper.data = api.SetProfileAttributeTextByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeTextByProfileIdByAttributeId()  {
        
            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/set/by-profile-id/by-attribute-id";
                        
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
            wrapper.data = api.SetProfileAttributeTextByProfileIdByAttributeId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeTextByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/del/by-uuid";

            bool completed = api.DelProfileAttributeTextByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeTextByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/del/by-profile-id";

            bool completed = api.DelProfileAttributeTextByProfileId(
                        
                _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeTextByProfileIdByAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeTextBool wrapper = new ResponseProfileAttributeTextBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/del/by-profile-id/by-attribute-id";

            bool completed = api.DelProfileAttributeTextByProfileIdByAttributeId(
                        
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeTextListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/get/by-uuid";

            List<ProfileAttributeText> objs = api.GetProfileAttributeTextListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeTextListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/get/by-profile-id";

            List<ProfileAttributeText> objs = api.GetProfileAttributeTextListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeTextListByProfileIdByAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeTextList wrapper = new ResponseProfileAttributeTextList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-text/get/by-profile-id/by-attribute-id";

            List<ProfileAttributeText> objs = api.GetProfileAttributeTextListByProfileIdByAttributeId(
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
                    
        public virtual void CountProfileAttributeDataByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeDataInt wrapper = new ResponseProfileAttributeDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/count/by-uuid";

            int i = api.CountProfileAttributeDataByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeDataByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeDataInt wrapper = new ResponseProfileAttributeDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/count/by-profile-id";

            int i = api.CountProfileAttributeDataByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAttributeDataByProfileIdByAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeDataInt wrapper = new ResponseProfileAttributeDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/count/by-profile-id/by-attribute-id";

            int i = api.CountProfileAttributeDataByProfileIdByAttributeId(
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAttributeDataListByFilter()  {
        
            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileAttributeDataResult result = api.BrowseProfileAttributeDataListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeDataByUuid()  {
        
            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/set/by-uuid";
                        
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
            wrapper.data = api.SetProfileAttributeDataByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeDataByProfileId()  {
        
            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/set/by-profile-id";
                        
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
            wrapper.data = api.SetProfileAttributeDataByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAttributeDataByProfileIdByAttributeId()  {
        
            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/set/by-profile-id/by-attribute-id";
                        
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
            wrapper.data = api.SetProfileAttributeDataByProfileIdByAttributeId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeDataByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/del/by-uuid";

            bool completed = api.DelProfileAttributeDataByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeDataByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/del/by-profile-id";

            bool completed = api.DelProfileAttributeDataByProfileId(
                        
                _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAttributeDataByProfileIdByAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeDataBool wrapper = new ResponseProfileAttributeDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/del/by-profile-id/by-attribute-id";

            bool completed = api.DelProfileAttributeDataByProfileIdByAttributeId(
                        
                _profile_id
                , _attribute_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeDataListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/get/by-uuid";

            List<ProfileAttributeData> objs = api.GetProfileAttributeDataListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeDataListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/get/by-profile-id";

            List<ProfileAttributeData> objs = api.GetProfileAttributeDataListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAttributeDataListByProfileIdByAttributeId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _attribute_id = (string)util.GetParamValue(_context, "attribute_id");

            ResponseProfileAttributeDataList wrapper = new ResponseProfileAttributeDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-attribute-data/get/by-profile-id/by-attribute-id";

            List<ProfileAttributeData> objs = api.GetProfileAttributeDataListByProfileIdByAttributeId(
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
                    
        public virtual void CountProfileDeviceByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/by-uuid";

            int i = api.CountProfileDeviceByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceByProfileIdByDeviceId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/by-profile-id/by-device-id";

            int i = api.CountProfileDeviceByProfileIdByDeviceId(
                _profile_id
                , _device_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceByProfileIdByToken() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/by-profile-id/by-token";

            int i = api.CountProfileDeviceByProfileIdByToken(
                _profile_id
                , _token
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/by-profile-id";

            int i = api.CountProfileDeviceByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceByDeviceId() {
        
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/by-device-id";

            int i = api.CountProfileDeviceByDeviceId(
                _device_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileDeviceByToken() {
        
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceInt wrapper = new ResponseProfileDeviceInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/count/by-token";

            int i = api.CountProfileDeviceByToken(
                _token
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileDeviceListByFilter()  {
        
            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileDeviceResult result = api.BrowseProfileDeviceListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileDeviceByUuid()  {
        
            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/set/by-uuid";
                        
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
            wrapper.data = api.SetProfileDeviceByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/by-uuid";

            bool completed = api.DelProfileDeviceByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceByProfileIdByDeviceId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/by-profile-id/by-device-id";

            bool completed = api.DelProfileDeviceByProfileIdByDeviceId(
                        
                _profile_id
                , _device_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceByProfileIdByToken() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/by-profile-id/by-token";

            bool completed = api.DelProfileDeviceByProfileIdByToken(
                        
                _profile_id
                , _token
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileDeviceByToken() {
        
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceBool wrapper = new ResponseProfileDeviceBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/del/by-token";

            bool completed = api.DelProfileDeviceByToken(
                        
                _token
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/by-uuid";

            List<ProfileDevice> objs = api.GetProfileDeviceListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListByProfileIdByDeviceId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/by-profile-id/by-device-id";

            List<ProfileDevice> objs = api.GetProfileDeviceListByProfileIdByDeviceId(
                _profile_id
                , _device_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListByProfileIdByToken() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/by-profile-id/by-token";

            List<ProfileDevice> objs = api.GetProfileDeviceListByProfileIdByToken(
                _profile_id
                , _token
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/by-profile-id";

            List<ProfileDevice> objs = api.GetProfileDeviceListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListByDeviceId() {
        
            string _device_id = (string)util.GetParamValue(_context, "device_id");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/by-device-id";

            List<ProfileDevice> objs = api.GetProfileDeviceListByDeviceId(
                _device_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileDeviceListByToken() {
        
            string _token = (string)util.GetParamValue(_context, "token");

            ResponseProfileDeviceList wrapper = new ResponseProfileDeviceList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-device/get/by-token";

            List<ProfileDevice> objs = api.GetProfileDeviceListByToken(
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
                    
        public virtual void CountCountryByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCountryInt wrapper = new ResponseCountryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/count/by-uuid";

            int i = api.CountCountryByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCountryByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCountryInt wrapper = new ResponseCountryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/count/by-code";

            int i = api.CountCountryByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseCountryListByFilter()  {
        
            ResponseCountryList wrapper = new ResponseCountryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            CountryResult result = api.BrowseCountryListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCountryByUuid()  {
        
            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/set/by-uuid";
                        
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
            wrapper.data = api.SetCountryByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCountryByCode()  {
        
            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/set/by-code";
                        
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
            wrapper.data = api.SetCountryByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCountryByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/del/by-uuid";

            bool completed = api.DelCountryByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCountryByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCountryBool wrapper = new ResponseCountryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/del/by-code";

            bool completed = api.DelCountryByCode(
                        
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
                    
        public virtual void GetCountryListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCountryList wrapper = new ResponseCountryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/get/by-uuid";

            List<Country> objs = api.GetCountryListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCountryListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCountryList wrapper = new ResponseCountryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "country/get/by-code";

            List<Country> objs = api.GetCountryListByCode(
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
                    
        public virtual void CountStateByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseStateInt wrapper = new ResponseStateInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/count/by-uuid";

            int i = api.CountStateByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountStateByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseStateInt wrapper = new ResponseStateInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/count/by-code";

            int i = api.CountStateByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseStateListByFilter()  {
        
            ResponseStateList wrapper = new ResponseStateList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            StateResult result = api.BrowseStateListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetStateByUuid()  {
        
            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/set/by-uuid";
                        
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
            wrapper.data = api.SetStateByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetStateByCode()  {
        
            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/set/by-code";
                        
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
            wrapper.data = api.SetStateByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelStateByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/del/by-uuid";

            bool completed = api.DelStateByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelStateByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseStateBool wrapper = new ResponseStateBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/del/by-code";

            bool completed = api.DelStateByCode(
                        
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
                    
        public virtual void GetStateListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseStateList wrapper = new ResponseStateList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/get/by-uuid";

            List<State> objs = api.GetStateListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetStateListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseStateList wrapper = new ResponseStateList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "state/get/by-code";

            List<State> objs = api.GetStateListByCode(
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
                    
        public virtual void CountCityByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCityInt wrapper = new ResponseCityInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/count/by-uuid";

            int i = api.CountCityByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountCityByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCityInt wrapper = new ResponseCityInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/count/by-code";

            int i = api.CountCityByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseCityListByFilter()  {
        
            ResponseCityList wrapper = new ResponseCityList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            CityResult result = api.BrowseCityListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCityByUuid()  {
        
            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/set/by-uuid";
                        
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
            wrapper.data = api.SetCityByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetCityByCode()  {
        
            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/set/by-code";
                        
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
            wrapper.data = api.SetCityByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCityByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/del/by-uuid";

            bool completed = api.DelCityByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelCityByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCityBool wrapper = new ResponseCityBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/del/by-code";

            bool completed = api.DelCityByCode(
                        
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
                    
        public virtual void GetCityListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseCityList wrapper = new ResponseCityList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/get/by-uuid";

            List<City> objs = api.GetCityListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetCityListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseCityList wrapper = new ResponseCityList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "city/get/by-code";

            List<City> objs = api.GetCityListByCode(
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
                    
        public virtual void CountPostalCodeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePostalCodeInt wrapper = new ResponsePostalCodeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/count/by-uuid";

            int i = api.CountPostalCodeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPostalCodeByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponsePostalCodeInt wrapper = new ResponsePostalCodeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/count/by-code";

            int i = api.CountPostalCodeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowsePostalCodeListByFilter()  {
        
            ResponsePostalCodeList wrapper = new ResponsePostalCodeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            PostalCodeResult result = api.BrowsePostalCodeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPostalCodeByUuid()  {
        
            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/set/by-uuid";
                        
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
            wrapper.data = api.SetPostalCodeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPostalCodeByCode()  {
        
            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/set/by-code";
                        
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
            wrapper.data = api.SetPostalCodeByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPostalCodeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/del/by-uuid";

            bool completed = api.DelPostalCodeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPostalCodeByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponsePostalCodeBool wrapper = new ResponsePostalCodeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/del/by-code";

            bool completed = api.DelPostalCodeByCode(
                        
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
                    
        public virtual void GetPostalCodeListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePostalCodeList wrapper = new ResponsePostalCodeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/get/by-uuid";

            List<PostalCode> objs = api.GetPostalCodeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPostalCodeListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponsePostalCodeList wrapper = new ResponsePostalCodeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "postal-code/get/by-code";

            List<PostalCode> objs = api.GetPostalCodeListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
    }
}






