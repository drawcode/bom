using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class ProfileGameDataAttributeResult : BaseObjectResult {
    
        public List<ProfileGameDataAttribute> data = new List<ProfileGameDataAttribute>();

        public ProfileGameDataAttributeResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileGameDataAttribute> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileGameDataAttribute obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileGameDataAttribute> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileGameDataAttribute objectValue = (ProfileGameDataAttribute)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileGameDataAttribute : BaseEntity {
    
        public ProfileGameDataAttribute() {
	
        }
    
        public string code { get; set; }
        public string uuid { get; set; }
        public string val { get; set; }
        public string profile_id { get; set; }
        public string otype { get; set; }
        public string game_id { get; set; }
        public string type { get; set; }
        public string name { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (code != null) {
	    	    dict = DataUtil.SetDictValue(dict, "code", code);
	    	}
	    	if (uuid != null) {
	    	    dict = DataUtil.SetDictValue(dict, "uuid", uuid);
	    	}
	    	if (val != null) {
	    	    dict = DataUtil.SetDictValue(dict, "val", val);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (otype != null) {
	    	    dict = DataUtil.SetDictValue(dict, "otype", otype);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
	    	if (name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "name", name);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("code")) {
	    	    if(dict["code"] != null) {
	    	    	code = DataType.Instance.FillString(dict["code"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("uuid")) {
	    	    if(dict["uuid"] != null) {
	    	    	uuid = DataType.Instance.FillString(dict["uuid"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("val")) {
	    	    if(dict["val"] != null) {
	    	    	val = DataType.Instance.FillString(dict["val"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("otype")) {
	    	    if(dict["otype"] != null) {
	    	    	otype = DataType.Instance.FillString(dict["otype"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("name")) {
	    	    if(dict["name"] != null) {
	    	    	name = DataType.Instance.FillString(dict["name"]);
	    	    }		
	    	}
        }
    }
}





