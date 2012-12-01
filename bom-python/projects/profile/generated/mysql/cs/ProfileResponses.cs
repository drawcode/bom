using System;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

using profile;
using profile.ent;

namespace profile {
       
    public class BaseResponse {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseString : BaseResponse {
        public string data = "";
    }
    
    public class ResponseBool : BaseResponse {
        public bool data;
    }
    
    public class ResponseInt : BaseResponse {
        public int data;
    }
    
    public class ResponseObject : BaseResponse {
        public object data = new object();
    }
    
    public class ResponseList : BaseResponse {
        public List<object> data = new List<object>();
    }
    
    public class ResponseDict : BaseResponse {
        public Dictionary<string, object> data
            = new Dictionary<string, object>();
    }
       
//------------------------------------------------------------------------------
        
    public class BaseResponseProfile {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileString : BaseResponseProfile {
        public string data = "";
    }
    
    public class ResponseProfileBool : BaseResponseProfile {
        public bool data;
    }
    
    public class ResponseProfileInt : BaseResponseProfile {
        public int data;
    }
    
    public class ResponseProfileObject : BaseResponseProfile {
        public Profile data = new Profile();
    }
    
    public class ResponseProfileResult : BaseResponseProfile {
        public ProfileResult data = new ProfileResult();
    }
    
    public class ResponseProfileList : BaseResponseProfile {
        public List<Profile> data = new List<Profile>();
    }
    
    public class ResponseProfileDict : BaseResponseProfile {
        public Dictionary<string, Profile> data
            = new Dictionary<string, Profile>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileType {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileTypeString : BaseResponseProfileType {
        public string data = "";
    }
    
    public class ResponseProfileTypeBool : BaseResponseProfileType {
        public bool data;
    }
    
    public class ResponseProfileTypeInt : BaseResponseProfileType {
        public int data;
    }
    
    public class ResponseProfileTypeObject : BaseResponseProfileType {
        public ProfileType data = new ProfileType();
    }
    
    public class ResponseProfileTypeResult : BaseResponseProfileType {
        public ProfileTypeResult data = new ProfileTypeResult();
    }
    
    public class ResponseProfileTypeList : BaseResponseProfileType {
        public List<ProfileType> data = new List<ProfileType>();
    }
    
    public class ResponseProfileTypeDict : BaseResponseProfileType {
        public Dictionary<string, ProfileType> data
            = new Dictionary<string, ProfileType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileAttribute {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileAttributeString : BaseResponseProfileAttribute {
        public string data = "";
    }
    
    public class ResponseProfileAttributeBool : BaseResponseProfileAttribute {
        public bool data;
    }
    
    public class ResponseProfileAttributeInt : BaseResponseProfileAttribute {
        public int data;
    }
    
    public class ResponseProfileAttributeObject : BaseResponseProfileAttribute {
        public ProfileAttribute data = new ProfileAttribute();
    }
    
    public class ResponseProfileAttributeResult : BaseResponseProfileAttribute {
        public ProfileAttributeResult data = new ProfileAttributeResult();
    }
    
    public class ResponseProfileAttributeList : BaseResponseProfileAttribute {
        public List<ProfileAttribute> data = new List<ProfileAttribute>();
    }
    
    public class ResponseProfileAttributeDict : BaseResponseProfileAttribute {
        public Dictionary<string, ProfileAttribute> data
            = new Dictionary<string, ProfileAttribute>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileAttributeText {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileAttributeTextString : BaseResponseProfileAttributeText {
        public string data = "";
    }
    
    public class ResponseProfileAttributeTextBool : BaseResponseProfileAttributeText {
        public bool data;
    }
    
    public class ResponseProfileAttributeTextInt : BaseResponseProfileAttributeText {
        public int data;
    }
    
    public class ResponseProfileAttributeTextObject : BaseResponseProfileAttributeText {
        public ProfileAttributeText data = new ProfileAttributeText();
    }
    
    public class ResponseProfileAttributeTextResult : BaseResponseProfileAttributeText {
        public ProfileAttributeTextResult data = new ProfileAttributeTextResult();
    }
    
    public class ResponseProfileAttributeTextList : BaseResponseProfileAttributeText {
        public List<ProfileAttributeText> data = new List<ProfileAttributeText>();
    }
    
    public class ResponseProfileAttributeTextDict : BaseResponseProfileAttributeText {
        public Dictionary<string, ProfileAttributeText> data
            = new Dictionary<string, ProfileAttributeText>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileAttributeData {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileAttributeDataString : BaseResponseProfileAttributeData {
        public string data = "";
    }
    
    public class ResponseProfileAttributeDataBool : BaseResponseProfileAttributeData {
        public bool data;
    }
    
    public class ResponseProfileAttributeDataInt : BaseResponseProfileAttributeData {
        public int data;
    }
    
    public class ResponseProfileAttributeDataObject : BaseResponseProfileAttributeData {
        public ProfileAttributeData data = new ProfileAttributeData();
    }
    
    public class ResponseProfileAttributeDataResult : BaseResponseProfileAttributeData {
        public ProfileAttributeDataResult data = new ProfileAttributeDataResult();
    }
    
    public class ResponseProfileAttributeDataList : BaseResponseProfileAttributeData {
        public List<ProfileAttributeData> data = new List<ProfileAttributeData>();
    }
    
    public class ResponseProfileAttributeDataDict : BaseResponseProfileAttributeData {
        public Dictionary<string, ProfileAttributeData> data
            = new Dictionary<string, ProfileAttributeData>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileDevice {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileDeviceString : BaseResponseProfileDevice {
        public string data = "";
    }
    
    public class ResponseProfileDeviceBool : BaseResponseProfileDevice {
        public bool data;
    }
    
    public class ResponseProfileDeviceInt : BaseResponseProfileDevice {
        public int data;
    }
    
    public class ResponseProfileDeviceObject : BaseResponseProfileDevice {
        public ProfileDevice data = new ProfileDevice();
    }
    
    public class ResponseProfileDeviceResult : BaseResponseProfileDevice {
        public ProfileDeviceResult data = new ProfileDeviceResult();
    }
    
    public class ResponseProfileDeviceList : BaseResponseProfileDevice {
        public List<ProfileDevice> data = new List<ProfileDevice>();
    }
    
    public class ResponseProfileDeviceDict : BaseResponseProfileDevice {
        public Dictionary<string, ProfileDevice> data
            = new Dictionary<string, ProfileDevice>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseCountry {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseCountryString : BaseResponseCountry {
        public string data = "";
    }
    
    public class ResponseCountryBool : BaseResponseCountry {
        public bool data;
    }
    
    public class ResponseCountryInt : BaseResponseCountry {
        public int data;
    }
    
    public class ResponseCountryObject : BaseResponseCountry {
        public Country data = new Country();
    }
    
    public class ResponseCountryResult : BaseResponseCountry {
        public CountryResult data = new CountryResult();
    }
    
    public class ResponseCountryList : BaseResponseCountry {
        public List<Country> data = new List<Country>();
    }
    
    public class ResponseCountryDict : BaseResponseCountry {
        public Dictionary<string, Country> data
            = new Dictionary<string, Country>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseState {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseStateString : BaseResponseState {
        public string data = "";
    }
    
    public class ResponseStateBool : BaseResponseState {
        public bool data;
    }
    
    public class ResponseStateInt : BaseResponseState {
        public int data;
    }
    
    public class ResponseStateObject : BaseResponseState {
        public State data = new State();
    }
    
    public class ResponseStateResult : BaseResponseState {
        public StateResult data = new StateResult();
    }
    
    public class ResponseStateList : BaseResponseState {
        public List<State> data = new List<State>();
    }
    
    public class ResponseStateDict : BaseResponseState {
        public Dictionary<string, State> data
            = new Dictionary<string, State>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseCity {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseCityString : BaseResponseCity {
        public string data = "";
    }
    
    public class ResponseCityBool : BaseResponseCity {
        public bool data;
    }
    
    public class ResponseCityInt : BaseResponseCity {
        public int data;
    }
    
    public class ResponseCityObject : BaseResponseCity {
        public City data = new City();
    }
    
    public class ResponseCityResult : BaseResponseCity {
        public CityResult data = new CityResult();
    }
    
    public class ResponseCityList : BaseResponseCity {
        public List<City> data = new List<City>();
    }
    
    public class ResponseCityDict : BaseResponseCity {
        public Dictionary<string, City> data
            = new Dictionary<string, City>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponsePostalCode {
        public string message = "Success";
        public int code = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public Dictionary<string, object> validation
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponsePostalCodeString : BaseResponsePostalCode {
        public string data = "";
    }
    
    public class ResponsePostalCodeBool : BaseResponsePostalCode {
        public bool data;
    }
    
    public class ResponsePostalCodeInt : BaseResponsePostalCode {
        public int data;
    }
    
    public class ResponsePostalCodeObject : BaseResponsePostalCode {
        public PostalCode data = new PostalCode();
    }
    
    public class ResponsePostalCodeResult : BaseResponsePostalCode {
        public PostalCodeResult data = new PostalCodeResult();
    }
    
    public class ResponsePostalCodeList : BaseResponsePostalCode {
        public List<PostalCode> data = new List<PostalCode>();
    }
    
    public class ResponsePostalCodeDict : BaseResponsePostalCode {
        public Dictionary<string, PostalCode> data
            = new Dictionary<string, PostalCode>();
    }
    
}






