using System;

public class RewardCompetitions<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile RewardCompetitions<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "reward_competition-data";

    public static T Current {
        get {
            if (current == null) {
                lock (syncRoot) {
                    if (current == null)
                        current = new T();
                }
            }
            return current;
        }
        set {
            current = value;
        }
    }

    public static RewardCompetitions<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new RewardCompetitions<T>();
                }
            }
            return instance;
        }
    }

    public RewardCompetitions() {
        Reset();
    }

    public RewardCompetitions(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class RewardCompetition : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  sort { get; set; }
    public  visible { get; set; }
    public  date_end { get; set; }
    public  date_start { get; set; }
    public  results { get; set; }
    public  fulfilled { get; set; }
    public  channel_id { get; set; }
    public  winners { get; set; }
    public  template_url { get; set; }
    public  template { get; set; }
    public  path { get; set; }
    public  data { get; set; }
    public  completed { get; set; }
    public  trigger_data { get; set; }

    public RewardCompetition() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (sort != null) {
	    dict = DataUtil.SetDictValue(dict, "sort", sort);
	}
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
	    	sort = DataType.Instance.Fill(dict["sort"]);
	    }		
	}
	if(dict.ContainsKey("visible")) {
	    if(dict["visible"] != null) {
	    	visible = DataType.Instance.Fill(dict["visible"]);
	    }		
	}
	if(dict.ContainsKey("date_end")) {
	    if(dict["date_end"] != null) {
	    	date_end = DataType.Instance.Fill(dict["date_end"]);
	    }		
	}
	if(dict.ContainsKey("date_start")) {
	    if(dict["date_start"] != null) {
	    	date_start = DataType.Instance.Fill(dict["date_start"]);
	    }		
	}
	if(dict.ContainsKey("results")) {
	    if(dict["results"] != null) {
	    	results = DataType.Instance.Fill(dict["results"]);
	    }		
	}
	if(dict.ContainsKey("fulfilled")) {
	    if(dict["fulfilled"] != null) {
	    	fulfilled = DataType.Instance.Fill(dict["fulfilled"]);
	    }		
	}
	if(dict.ContainsKey("channel_id")) {
	    if(dict["channel_id"] != null) {
	    	channel_id = DataType.Instance.Fill(dict["channel_id"]);
	    }		
	}
	if(dict.ContainsKey("winners")) {
	    if(dict["winners"] != null) {
	    	winners = DataType.Instance.Fill(dict["winners"]);
	    }		
	}
	if(dict.ContainsKey("template_url")) {
	    if(dict["template_url"] != null) {
	    	template_url = DataType.Instance.Fill(dict["template_url"]);
	    }		
	}
	if(dict.ContainsKey("template")) {
	    if(dict["template"] != null) {
	    	template = DataType.Instance.Fill(dict["template"]);
	    }		
	}
	if(dict.ContainsKey("path")) {
	    if(dict["path"] != null) {
	    	path = DataType.Instance.Fill(dict["path"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("completed")) {
	    if(dict["completed"] != null) {
	    	completed = DataType.Instance.Fill(dict["completed"]);
	    }		
	}
	if(dict.ContainsKey("trigger_data")) {
	    if(dict["trigger_data"] != null) {
	    	trigger_data = DataType.Instance.Fill(dict["trigger_data"]);
	    }		
	}
    }
}








