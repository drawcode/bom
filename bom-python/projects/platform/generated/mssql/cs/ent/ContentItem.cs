using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class ContentItemResult : BaseObjectResult {
    
        public List<ContentItem> data = new List<ContentItem>();

        public ContentItemResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ContentItem> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ContentItem obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ContentItem> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ContentItem objectValue = (ContentItem)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ContentItem : BaseMeta {
    
        public ContentItem() {
	
        }
    
        public string path { get; set; }
        public DateTime date_end { get; set; }
        public DateTime date_start { get; set; }
        public string data { get; set; }
        public string type_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (path != null) {
	    	    dict = DataUtil.SetDictValue(dict, "path", path);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "date_end", date_end);
	    	dict = DataUtil.SetDictValue(dict, "date_start", date_start);
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (type_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("path")) {
	    	    if(dict["path"] != null) {
	    	    	path = DataType.Instance.FillString(dict["path"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("date_end")) {
	    	    if(dict["date_end"] != null) {
	    	    	date_end = DataType.Instance.FillDateTime(dict["date_end"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("date_start")) {
	    	    if(dict["date_start"] != null) {
	    	    	date_start = DataType.Instance.FillDateTime(dict["date_start"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
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





