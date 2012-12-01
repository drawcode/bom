using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class EventCategoryAssocResult : BaseObjectResult {
    
        public List<EventCategoryAssoc> data = new List<EventCategoryAssoc>();

        public EventCategoryAssocResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<EventCategoryAssoc> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (EventCategoryAssoc obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<EventCategoryAssoc> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    EventCategoryAssoc objectValue = (EventCategoryAssoc)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class EventCategoryAssoc : BaseEntity {
    
        public EventCategoryAssoc() {
	
        }
    
        public string event_id { get; set; }
        public string category_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (event_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "event_id", event_id);
	    	}
	    	if (category_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "category_id", category_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("event_id")) {
	    	    if(dict["event_id"] != null) {
	    	    	event_id = DataType.Instance.FillString(dict["event_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("category_id")) {
	    	    if(dict["category_id"] != null) {
	    	    	category_id = DataType.Instance.FillString(dict["category_id"]);
	    	    }		
	    	}
        }
    }
}





