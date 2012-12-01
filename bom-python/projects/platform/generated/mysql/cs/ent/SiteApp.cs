using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class SiteAppResult : BaseObjectResult {
    
        public List<SiteApp> data = new List<SiteApp>();

        public SiteAppResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<SiteApp> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (SiteApp obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<SiteApp> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    SiteApp objectValue = (SiteApp)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class SiteApp : BaseEntity {
    
        public SiteApp() {
	
        }
    
        public string site_id { get; set; }
        public string app_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (site_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "site_id", site_id);
	    	}
	    	if (app_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("site_id")) {
	    	    if(dict["site_id"] != null) {
	    	    	site_id = DataType.Instance.FillString(dict["site_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("app_id")) {
	    	    if(dict["app_id"] != null) {
	    	    	app_id = DataType.Instance.FillString(dict["app_id"]);
	    	    }		
	    	}
        }
    }
}





