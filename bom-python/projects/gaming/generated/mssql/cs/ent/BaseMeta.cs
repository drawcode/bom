using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class BaseMetaResult : BaseObjectResult {
    
        public List<BaseMeta> data = new List<BaseMeta>();

        public BaseMetaResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<BaseMeta> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (BaseMeta obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<BaseMeta> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    BaseMeta objectValue = (BaseMeta)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class BaseMeta : BaseEntity {
    
        public BaseMeta() {
	
        }
    
        public string code { get; set; }
        public string display_name { get; set; }
        public string name { get; set; }
        public string description { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (code != null) {
	    	    dict = DataUtil.SetDictValue(dict, "code", code);
	    	}
	    	if (display_name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "display_name", display_name);
	    	}
	    	if (name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "name", name);
	    	}
	    	if (description != null) {
	    	    dict = DataUtil.SetDictValue(dict, "description", description);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("code")) {
	    	    if(dict["code"] != null) {
	    	    	code = DataType.Instance.FillString(dict["code"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("display_name")) {
	    	    if(dict["display_name"] != null) {
	    	    	display_name = DataType.Instance.FillString(dict["display_name"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("name")) {
	    	    if(dict["name"] != null) {
	    	    	name = DataType.Instance.FillString(dict["name"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("description")) {
	    	    if(dict["description"] != null) {
	    	    	description = DataType.Instance.FillString(dict["description"]);
	    	    }		
	    	}
        }
    }
}





