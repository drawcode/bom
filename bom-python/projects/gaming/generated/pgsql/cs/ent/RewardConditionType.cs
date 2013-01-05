using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class RewardConditionTypeResult : BaseObjectResult {
    
        public List<RewardConditionType> data = new List<RewardConditionType>();

        public RewardConditionTypeResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<RewardConditionType> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (RewardConditionType obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<RewardConditionType> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    RewardConditionType objectValue = (RewardConditionType)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class RewardConditionType : BaseMeta {
    
        public RewardConditionType() {
	
        }
    
        public string data { get; set; }
        public string type { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
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
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
	    	    }		
	    	}
        }
    }
}





