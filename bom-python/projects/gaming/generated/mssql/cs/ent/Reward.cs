using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class RewardResult : BaseObjectResult {
    
        public List<Reward> data = new List<Reward>();

        public RewardResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<Reward> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (Reward obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<Reward> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    Reward objectValue = (Reward)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class Reward : BaseMeta {
    
        public Reward() {
	
        }
    
        public string type_url { get; set; }
        public string url { get; set; }
        public string type { get; set; }
        public string org_id { get; set; }
        public string data { get; set; }
        public string channel_id { get; set; }
        public int usage_count { get; set; }
        public string external_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (type_url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type_url", type_url);
	    	}
	    	if (url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "url", url);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
	    	if (org_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (channel_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "usage_count", usage_count);
	    	if (external_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "external_id", external_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("type_url")) {
	    	    if(dict["type_url"] != null) {
	    	    	type_url = DataType.Instance.FillString(dict["type_url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("url")) {
	    	    if(dict["url"] != null) {
	    	    	url = DataType.Instance.FillString(dict["url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
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
	    	if(dict.ContainsKey("channel_id")) {
	    	    if(dict["channel_id"] != null) {
	    	    	channel_id = DataType.Instance.FillString(dict["channel_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("usage_count")) {
	    	    if(dict["usage_count"] != null) {
	    	    	usage_count = DataType.Instance.FillInt(dict["usage_count"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("external_id")) {
	    	    if(dict["external_id"] != null) {
	    	    	external_id = DataType.Instance.FillString(dict["external_id"]);
	    	    }		
	    	}
        }
    }
}





