using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class BaseLocationResult : BaseObjectResult {
    
        public List<BaseLocation> data = new List<BaseLocation>();

        public BaseLocationResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<BaseLocation> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (BaseLocation obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<BaseLocation> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    BaseLocation objectValue = (BaseLocation)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class BaseLocation : BaseMeta {
    
        public BaseLocation() {
	
        }
    
        public string state_province { get; set; }
        public string city { get; set; }
        public string fax { get; set; }
        public string twitter { get; set; }
        public DateTime dob { get; set; }
        public string address1 { get; set; }
        public string address2 { get; set; }
        public DateTime date_start { get; set; }
        public double longitude { get; set; }
        public string phone { get; set; }
        public DateTime date_end { get; set; }
        public string postal_code { get; set; }
        public string country_code { get; set; }
        public double latitude { get; set; }
        public string facebook { get; set; }
        public string email { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (state_province != null) {
	    	    dict = DataUtil.SetDictValue(dict, "state_province", state_province);
	    	}
	    	if (city != null) {
	    	    dict = DataUtil.SetDictValue(dict, "city", city);
	    	}
	    	if (fax != null) {
	    	    dict = DataUtil.SetDictValue(dict, "fax", fax);
	    	}
	    	if (twitter != null) {
	    	    dict = DataUtil.SetDictValue(dict, "twitter", twitter);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "dob", dob);
	    	if (address1 != null) {
	    	    dict = DataUtil.SetDictValue(dict, "address1", address1);
	    	}
	    	if (address2 != null) {
	    	    dict = DataUtil.SetDictValue(dict, "address2", address2);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "date_start", date_start);
	    	dict = DataUtil.SetDictValue(dict, "longitude", longitude);
	    	if (phone != null) {
	    	    dict = DataUtil.SetDictValue(dict, "phone", phone);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "date_end", date_end);
	    	if (postal_code != null) {
	    	    dict = DataUtil.SetDictValue(dict, "postal_code", postal_code);
	    	}
	    	if (country_code != null) {
	    	    dict = DataUtil.SetDictValue(dict, "country_code", country_code);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "latitude", latitude);
	    	if (facebook != null) {
	    	    dict = DataUtil.SetDictValue(dict, "facebook", facebook);
	    	}
	    	if (email != null) {
	    	    dict = DataUtil.SetDictValue(dict, "email", email);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("state_province")) {
	    	    if(dict["state_province"] != null) {
	    	    	state_province = DataType.Instance.FillString(dict["state_province"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("city")) {
	    	    if(dict["city"] != null) {
	    	    	city = DataType.Instance.FillString(dict["city"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("fax")) {
	    	    if(dict["fax"] != null) {
	    	    	fax = DataType.Instance.FillString(dict["fax"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("twitter")) {
	    	    if(dict["twitter"] != null) {
	    	    	twitter = DataType.Instance.FillString(dict["twitter"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("dob")) {
	    	    if(dict["dob"] != null) {
	    	    	dob = DataType.Instance.FillDateTime(dict["dob"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("address1")) {
	    	    if(dict["address1"] != null) {
	    	    	address1 = DataType.Instance.FillString(dict["address1"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("address2")) {
	    	    if(dict["address2"] != null) {
	    	    	address2 = DataType.Instance.FillString(dict["address2"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("date_start")) {
	    	    if(dict["date_start"] != null) {
	    	    	date_start = DataType.Instance.FillDateTime(dict["date_start"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("longitude")) {
	    	    if(dict["longitude"] != null) {
	    	    	longitude = DataType.Instance.FillDouble(dict["longitude"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("phone")) {
	    	    if(dict["phone"] != null) {
	    	    	phone = DataType.Instance.FillString(dict["phone"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("date_end")) {
	    	    if(dict["date_end"] != null) {
	    	    	date_end = DataType.Instance.FillDateTime(dict["date_end"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("postal_code")) {
	    	    if(dict["postal_code"] != null) {
	    	    	postal_code = DataType.Instance.FillString(dict["postal_code"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("country_code")) {
	    	    if(dict["country_code"] != null) {
	    	    	country_code = DataType.Instance.FillString(dict["country_code"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("latitude")) {
	    	    if(dict["latitude"] != null) {
	    	    	latitude = DataType.Instance.FillDouble(dict["latitude"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("facebook")) {
	    	    if(dict["facebook"] != null) {
	    	    	facebook = DataType.Instance.FillString(dict["facebook"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("email")) {
	    	    if(dict["email"] != null) {
	    	    	email = DataType.Instance.FillString(dict["email"]);
	    	    }		
	    	}
        }
    }
}





