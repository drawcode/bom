using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class ProfileRewardPointsResult : BaseObjectResult {
    
        public List<ProfileRewardPoints> data = new List<ProfileRewardPoints>();

        public ProfileRewardPointsResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileRewardPoints> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileRewardPoints obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileRewardPoints> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileRewardPoints objectValue = (ProfileRewardPoints)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileRewardPoints : BaseEntity {
    
        public ProfileRewardPoints() {
	
        }
    
        public string channel_id { get; set; }
        public string profile_id { get; set; }
        public string org_id { get; set; }
        public string data { get; set; }
        public int points { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (channel_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (org_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "points", points);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("channel_id")) {
	    	    if(dict["channel_id"] != null) {
	    	    	channel_id = DataType.Instance.FillString(dict["channel_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("org_id")) {
	    	    if(dict["org_id"] != null) {
	    	    	org_id = DataType.Instance.FillString(dict["org_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("points")) {
	    	    if(dict["points"] != null) {
	    	    	points = DataType.Instance.FillInt(dict["points"]);
	    	    }		
	    	}
        }
    }
}





