using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class OfferResult : BaseObjectResult {
    
        public List<Offer> data = new List<Offer>();

        public OfferResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<Offer> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (Offer obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<Offer> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    Offer objectValue = (Offer)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class Offer : BaseMeta {
    
        public Offer() {
	
        }
    
        public string url { get; set; }
        public string data { get; set; }
        public string org_id { get; set; }
        public int usage_count { get; set; }
        public string type_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "url", url);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (org_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "usage_count", usage_count);
	    	if (type_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("url")) {
	    	    if(dict["url"] != null) {
	    	    	url = DataType.Instance.FillString(dict["url"]);
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
	    	if(dict.ContainsKey("usage_count")) {
	    	    if(dict["usage_count"] != null) {
	    	    	usage_count = DataType.Instance.FillInt(dict["usage_count"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type_id")) {
	    	    if(dict["type_id"] != null) {
	    	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    	    }		
	    	}
        }
    }
}





