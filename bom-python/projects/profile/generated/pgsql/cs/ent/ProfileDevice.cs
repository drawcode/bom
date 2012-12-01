using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace profile.ent {

        public class ProfileDeviceResult : BaseObjectResult {
    
        public List<ProfileDevice> data = new List<ProfileDevice>();

        public ProfileDeviceResult() {
            Reset();
        }

        public override void Reset() {
            base.Reset();
        }
        
        public override Dictionary<string, object> ToDictionary() {
            Dictionary<string, object> dict = base.ToDictionary();

            if (data != null) {
                dict.Add("data", GetListDict(data));
            }

            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict) {

            base.FillFromDictionary(dict);

            if (dict.ContainsKey("data")) {
                if (dict["data"] != null) {
                    data = GetList((List<Dictionary<string, object>>)dict["data"]);
                }
            }
        }

        public List<Dictionary<string, object>> GetListDict(List<ProfileDevice> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileDevice obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileDevice> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileDevice objectValue = (ProfileDevice)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileDevice : BaseEntity {
    
        public ProfileDevice() {
	
        }
    
        public string profile_id { get; set; }
        public string secret { get; set; }
        public string token { get; set; }
        public string device_version { get; set; }
        public string device_type { get; set; }
        public string device_os { get; set; }
        public string device_platform { get; set; }
        public string device_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (secret != null) {
	    	    dict = DataUtil.SetDictValue(dict, "secret", secret);
	    	}
	    	if (token != null) {
	    	    dict = DataUtil.SetDictValue(dict, "token", token);
	    	}
	    	if (device_version != null) {
	    	    dict = DataUtil.SetDictValue(dict, "device_version", device_version);
	    	}
	    	if (device_type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "device_type", device_type);
	    	}
	    	if (device_os != null) {
	    	    dict = DataUtil.SetDictValue(dict, "device_os", device_os);
	    	}
	    	if (device_platform != null) {
	    	    dict = DataUtil.SetDictValue(dict, "device_platform", device_platform);
	    	}
	    	if (device_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "device_id", device_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("secret")) {
	    	    if(dict["secret"] != null) {
	    	    	secret = DataType.Instance.FillString(dict["secret"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("token")) {
	    	    if(dict["token"] != null) {
	    	    	token = DataType.Instance.FillString(dict["token"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("device_version")) {
	    	    if(dict["device_version"] != null) {
	    	    	device_version = DataType.Instance.FillString(dict["device_version"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("device_type")) {
	    	    if(dict["device_type"] != null) {
	    	    	device_type = DataType.Instance.FillString(dict["device_type"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("device_os")) {
	    	    if(dict["device_os"] != null) {
	    	    	device_os = DataType.Instance.FillString(dict["device_os"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("device_platform")) {
	    	    if(dict["device_platform"] != null) {
	    	    	device_platform = DataType.Instance.FillString(dict["device_platform"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("device_id")) {
	    	    if(dict["device_id"] != null) {
	    	    	device_id = DataType.Instance.FillString(dict["device_id"]);
	    	    }		
	    	}
        }
    }
}





