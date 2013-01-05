using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class ContentPageResult : BaseObjectResult {
    
        public List<ContentPage> data = new List<ContentPage>();

        public ContentPageResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ContentPage> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ContentPage obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ContentPage> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ContentPage objectValue = (ContentPage)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ContentPage : BaseMeta {
    
        public ContentPage() {
	
        }
    
        public DateTime date_end { get; set; }
        public DateTime date_start { get; set; }
        public string site_id { get; set; }
        public string template { get; set; }
        public string path { get; set; }
        public string data { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "date_end", date_end);
	    	dict = DataUtil.SetDictValue(dict, "date_start", date_start);
	    	if (site_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "site_id", site_id);
	    	}
	    	if (template != null) {
	    	    dict = DataUtil.SetDictValue(dict, "template", template);
	    	}
	    	if (path != null) {
	    	    dict = DataUtil.SetDictValue(dict, "path", path);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
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
	    	if(dict.ContainsKey("site_id")) {
	    	    if(dict["site_id"] != null) {
	    	    	site_id = DataType.Instance.FillString(dict["site_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("template")) {
	    	    if(dict["template"] != null) {
	    	    	template = DataType.Instance.FillString(dict["template"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("path")) {
	    	    if(dict["path"] != null) {
	    	    	path = DataType.Instance.FillString(dict["path"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
        }
    }
}





