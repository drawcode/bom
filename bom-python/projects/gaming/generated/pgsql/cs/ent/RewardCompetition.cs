using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class RewardCompetitionResult : BaseObjectResult {
    
        public List<RewardCompetition> data = new List<RewardCompetition>();

        public RewardCompetitionResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<RewardCompetition> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (RewardCompetition obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<RewardCompetition> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    RewardCompetition objectValue = (RewardCompetition)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class RewardCompetition : BaseMeta {
    
        public RewardCompetition() {
	
        }
    
        public int sort { get; set; }
        public bool visible { get; set; }
        public DateTime date_end { get; set; }
        public DateTime date_start { get; set; }
        public string results { get; set; }
        public bool fulfilled { get; set; }
        public string channel_id { get; set; }
        public string winners { get; set; }
        public string template_url { get; set; }
        public string template { get; set; }
        public string path { get; set; }
        public string data { get; set; }
        public bool completed { get; set; }
        public string trigger_data { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "sort", sort);
	    	dict = DataUtil.SetDictValue(dict, "visible", visible);
	    	dict = DataUtil.SetDictValue(dict, "date_end", date_end);
	    	dict = DataUtil.SetDictValue(dict, "date_start", date_start);
	    	if (results != null) {
	    	    dict = DataUtil.SetDictValue(dict, "results", results);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "fulfilled", fulfilled);
	    	if (channel_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	    	}
	    	if (winners != null) {
	    	    dict = DataUtil.SetDictValue(dict, "winners", winners);
	    	}
	    	if (template_url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "template_url", template_url);
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
	    	dict = DataUtil.SetDictValue(dict, "completed", completed);
	    	if (trigger_data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "trigger_data", trigger_data);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("sort")) {
	    	    if(dict["sort"] != null) {
	    	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("visible")) {
	    	    if(dict["visible"] != null) {
	    	    	visible = DataType.Instance.FillBool(dict["visible"]);
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
	    	if(dict.ContainsKey("results")) {
	    	    if(dict["results"] != null) {
	    	    	results = DataType.Instance.FillString(dict["results"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("fulfilled")) {
	    	    if(dict["fulfilled"] != null) {
	    	    	fulfilled = DataType.Instance.FillBool(dict["fulfilled"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("channel_id")) {
	    	    if(dict["channel_id"] != null) {
	    	    	channel_id = DataType.Instance.FillString(dict["channel_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("winners")) {
	    	    if(dict["winners"] != null) {
	    	    	winners = DataType.Instance.FillString(dict["winners"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("template_url")) {
	    	    if(dict["template_url"] != null) {
	    	    	template_url = DataType.Instance.FillString(dict["template_url"]);
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
	    	if(dict.ContainsKey("completed")) {
	    	    if(dict["completed"] != null) {
	    	    	completed = DataType.Instance.FillBool(dict["completed"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("trigger_data")) {
	    	    if(dict["trigger_data"] != null) {
	    	    	trigger_data = DataType.Instance.FillString(dict["trigger_data"]);
	    	    }		
	    	}
        }
    }
}





