using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class ProfileRewardResult : BaseObjectResult {
    
        public List<ProfileReward> data = new List<ProfileReward>();

        public ProfileRewardResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileReward> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileReward obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileReward> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileReward objectValue = (ProfileReward)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileReward : BaseMeta {
    
        public ProfileReward() {
	
        }
    
        public bool downloaded { get; set; }
        public string profile_id { get; set; }
        public string blurb { get; set; }
        public string channel_id { get; set; }
        public string reward_id { get; set; }
        public int usage_count { get; set; }
        public string data { get; set; }
        public bool viewed { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "downloaded", downloaded);
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (blurb != null) {
	    	    dict = DataUtil.SetDictValue(dict, "blurb", blurb);
	    	}
	    	if (channel_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	    	}
	    	if (reward_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "reward_id", reward_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "usage_count", usage_count);
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "viewed", viewed);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("downloaded")) {
	    	    if(dict["downloaded"] != null) {
	    	    	downloaded = DataType.Instance.FillBool(dict["downloaded"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("blurb")) {
	    	    if(dict["blurb"] != null) {
	    	    	blurb = DataType.Instance.FillString(dict["blurb"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("channel_id")) {
	    	    if(dict["channel_id"] != null) {
	    	    	channel_id = DataType.Instance.FillString(dict["channel_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("reward_id")) {
	    	    if(dict["reward_id"] != null) {
	    	    	reward_id = DataType.Instance.FillString(dict["reward_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("usage_count")) {
	    	    if(dict["usage_count"] != null) {
	    	    	usage_count = DataType.Instance.FillInt(dict["usage_count"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("viewed")) {
	    	    if(dict["viewed"] != null) {
	    	    	viewed = DataType.Instance.FillBool(dict["viewed"]);
	    	    }		
	    	}
        }
    }
}





