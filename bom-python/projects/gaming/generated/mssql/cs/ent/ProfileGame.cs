using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class ProfileGameResult : BaseObjectResult {
    
        public List<ProfileGame> data = new List<ProfileGame>();

        public ProfileGameResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileGame> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileGame obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileGame> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileGame objectValue = (ProfileGame)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileGame : BaseEntity {
    
        public ProfileGame() {
	
        }
    
        public string type_id { get; set; }
        public string profile_version { get; set; }
        public string profile_id { get; set; }
        public string profile_iteration { get; set; }
        public string game_profile { get; set; }
        public string game_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (type_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	    	}
	    	if (profile_version != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_version", profile_version);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (profile_iteration != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_iteration", profile_iteration);
	    	}
	    	if (game_profile != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_profile", game_profile);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("type_id")) {
	    	    if(dict["type_id"] != null) {
	    	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_version")) {
	    	    if(dict["profile_version"] != null) {
	    	    	profile_version = DataType.Instance.FillString(dict["profile_version"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_iteration")) {
	    	    if(dict["profile_iteration"] != null) {
	    	    	profile_iteration = DataType.Instance.FillString(dict["profile_iteration"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_profile")) {
	    	    if(dict["game_profile"] != null) {
	    	    	game_profile = DataType.Instance.FillString(dict["game_profile"]);
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





