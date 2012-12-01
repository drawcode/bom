using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class PhotoResult : BaseObjectResult {
    
        public List<Photo> data = new List<Photo>();

        public PhotoResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<Photo> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (Photo obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<Photo> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    Photo objectValue = (Photo)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class Photo : BaseMeta {
    
        public Photo() {
	
        }
    
        public string third_party_oembed { get; set; }
        public string url { get; set; }
        public string third_party_data { get; set; }
        public string third_party_url { get; set; }
        public string third_party_id { get; set; }
        public string content_type { get; set; }
        public string external_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (third_party_oembed != null) {
	    	    dict = DataUtil.SetDictValue(dict, "third_party_oembed", third_party_oembed);
	    	}
	    	if (url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "url", url);
	    	}
	    	if (third_party_data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "third_party_data", third_party_data);
	    	}
	    	if (third_party_url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "third_party_url", third_party_url);
	    	}
	    	if (third_party_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "third_party_id", third_party_id);
	    	}
	    	if (content_type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "content_type", content_type);
	    	}
	    	if (external_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "external_id", external_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("third_party_oembed")) {
	    	    if(dict["third_party_oembed"] != null) {
	    	    	third_party_oembed = DataType.Instance.FillString(dict["third_party_oembed"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("url")) {
	    	    if(dict["url"] != null) {
	    	    	url = DataType.Instance.FillString(dict["url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("third_party_data")) {
	    	    if(dict["third_party_data"] != null) {
	    	    	third_party_data = DataType.Instance.FillString(dict["third_party_data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("third_party_url")) {
	    	    if(dict["third_party_url"] != null) {
	    	    	third_party_url = DataType.Instance.FillString(dict["third_party_url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("third_party_id")) {
	    	    if(dict["third_party_id"] != null) {
	    	    	third_party_id = DataType.Instance.FillString(dict["third_party_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("content_type")) {
	    	    if(dict["content_type"] != null) {
	    	    	content_type = DataType.Instance.FillString(dict["content_type"]);
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





