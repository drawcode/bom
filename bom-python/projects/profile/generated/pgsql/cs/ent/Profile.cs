using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace profile.ent {

        public class ProfileResult : BaseObjectResult {
    
        public List<Profile> data = new List<Profile>();

        public ProfileResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<Profile> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (Profile obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<Profile> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    Profile objectValue = (Profile)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class Profile : BaseEntity {
    
        public Profile() {
	
        }
    
        public string username { get; set; }
        public string first_name { get; set; }
        public string last_name { get; set; }
        public string hash { get; set; }
        public string name { get; set; }
        public string email { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (username != null) {
	    	    dict = DataUtil.SetDictValue(dict, "username", username);
	    	}
	    	if (first_name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "first_name", first_name);
	    	}
	    	if (last_name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "last_name", last_name);
	    	}
	    	if (hash != null) {
	    	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	    	}
	    	if (name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "name", name);
	    	}
	    	if (email != null) {
	    	    dict = DataUtil.SetDictValue(dict, "email", email);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("username")) {
	    	    if(dict["username"] != null) {
	    	    	username = DataType.Instance.FillString(dict["username"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("first_name")) {
	    	    if(dict["first_name"] != null) {
	    	    	first_name = DataType.Instance.FillString(dict["first_name"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("last_name")) {
	    	    if(dict["last_name"] != null) {
	    	    	last_name = DataType.Instance.FillString(dict["last_name"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("hash")) {
	    	    if(dict["hash"] != null) {
	    	    	hash = DataType.Instance.FillString(dict["hash"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("name")) {
	    	    if(dict["name"] != null) {
	    	    	name = DataType.Instance.FillString(dict["name"]);
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





