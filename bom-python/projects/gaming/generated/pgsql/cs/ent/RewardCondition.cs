using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class RewardConditionResult : BaseObjectResult {
    
        public List<RewardCondition> data = new List<RewardCondition>();

        public RewardConditionResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<RewardCondition> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (RewardCondition obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<RewardCondition> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    RewardCondition objectValue = (RewardCondition)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class RewardCondition : BaseMeta {
    
        public RewardCondition() {
	
        }
    
        public DateTime end_date { get; set; }
        public string data { get; set; }
        public string org_id { get; set; }
        public string channel_id { get; set; }
        public int amount { get; set; }
        public string reward_id { get; set; }
        public bool global_reward { get; set; }
        public string type { get; set; }
        public DateTime start_date { get; set; }
        public string condition { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "end_date", end_date);
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (org_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	    	}
	    	if (channel_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "amount", amount);
	    	if (reward_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "reward_id", reward_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "global_reward", global_reward);
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "start_date", start_date);
	    	if (condition != null) {
	    	    dict = DataUtil.SetDictValue(dict, "condition", condition);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("end_date")) {
	    	    if(dict["end_date"] != null) {
	    	    	end_date = DataType.Instance.FillDateTime(dict["end_date"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("org_id")) {
	    	    if(dict["org_id"] != null) {
	    	    	org_id = DataType.Instance.FillString(dict["org_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("channel_id")) {
	    	    if(dict["channel_id"] != null) {
	    	    	channel_id = DataType.Instance.FillString(dict["channel_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("amount")) {
	    	    if(dict["amount"] != null) {
	    	    	amount = DataType.Instance.FillInt(dict["amount"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("reward_id")) {
	    	    if(dict["reward_id"] != null) {
	    	    	reward_id = DataType.Instance.FillString(dict["reward_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("global_reward")) {
	    	    if(dict["global_reward"] != null) {
	    	    	global_reward = DataType.Instance.FillBool(dict["global_reward"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("start_date")) {
	    	    if(dict["start_date"] != null) {
	    	    	start_date = DataType.Instance.FillDateTime(dict["start_date"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("condition")) {
	    	    if(dict["condition"] != null) {
	    	    	condition = DataType.Instance.FillString(dict["condition"]);
	    	    }		
	    	}
        }
    }
}





