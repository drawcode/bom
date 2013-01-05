using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class RewardTypeResult : BaseObjectResult {
    
        public List<RewardType> data = new List<RewardType>();

        public RewardTypeResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<RewardType> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (RewardType obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<RewardType> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    RewardType objectValue = (RewardType)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class RewardType : BaseMeta {
    
        public RewardType() {
	
        }
    
        public string data { get; set; }
        public string type_url { get; set; }
        public string type { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (type_url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type_url", type_url);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type_url")) {
	    	    if(dict["type_url"] != null) {
	    	    	type_url = DataType.Instance.FillString(dict["type_url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
	    	    }		
	    	}
        }
    }
}





