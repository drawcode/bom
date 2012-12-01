using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class ProfileGameNetworkResult : BaseObjectResult {
    
        public List<ProfileGameNetwork> data = new List<ProfileGameNetwork>();

        public ProfileGameNetworkResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileGameNetwork> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileGameNetwork obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileGameNetwork> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileGameNetwork objectValue = (ProfileGameNetwork)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileGameNetwork : BaseEntity {
    
        public ProfileGameNetwork() {
	
        }
    
        public string hash { get; set; }
        public string profile_id { get; set; }
        public string token { get; set; }
        public string game_network_id { get; set; }
        public string secret { get; set; }
        public string network_username { get; set; }
        public string game_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (hash != null) {
	    	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (token != null) {
	    	    dict = DataUtil.SetDictValue(dict, "token", token);
	    	}
	    	if (game_network_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_network_id", game_network_id);
	    	}
	    	if (secret != null) {
	    	    dict = DataUtil.SetDictValue(dict, "secret", secret);
	    	}
	    	if (network_username != null) {
	    	    dict = DataUtil.SetDictValue(dict, "network_username", network_username);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("hash")) {
	    	    if(dict["hash"] != null) {
	    	    	hash = DataType.Instance.FillString(dict["hash"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("token")) {
	    	    if(dict["token"] != null) {
	    	    	token = DataType.Instance.FillString(dict["token"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_network_id")) {
	    	    if(dict["game_network_id"] != null) {
	    	    	game_network_id = DataType.Instance.FillString(dict["game_network_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("secret")) {
	    	    if(dict["secret"] != null) {
	    	    	secret = DataType.Instance.FillString(dict["secret"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("network_username")) {
	    	    if(dict["network_username"] != null) {
	    	    	network_username = DataType.Instance.FillString(dict["network_username"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    	    }		
	    	}
        }
    }
}





