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
    public int sort { get; set; }
    public boolean visible { get; set; }
    public Date date_end { get; set; }
    public Date date_start { get; set; }
    public string results { get; set; }
    public boolean fulfilled { get; set; }
    public string channel_id { get; set; }
    public string winners { get; set; }
    public string template_url { get; set; }
    public string template { get; set; }
    public string path { get; set; }
    public string data { get; set; }
    public boolean completed { get; set; }
    public string trigger_data { get; set; }

    public RewardCompetition() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

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
	    	visible = DataType.Instance.FillBoolean(dict["visible"]);
	    }		
	}
	if(dict.ContainsKey("date_end")) {
	    if(dict["date_end"] != null) {
	    	date_end = DataType.Instance.FillDate(dict["date_end"]);
	    }		
	}
	if(dict.ContainsKey("date_start")) {
	    if(dict["date_start"] != null) {
	    	date_start = DataType.Instance.FillDate(dict["date_start"]);
	    }		
	}
	if(dict.ContainsKey("results")) {
	    if(dict["results"] != null) {
	    	results = DataType.Instance.FillString(dict["results"]);
	    }		
	}
	if(dict.ContainsKey("fulfilled")) {
	    if(dict["fulfilled"] != null) {
	    	fulfilled = DataType.Instance.FillBoolean(dict["fulfilled"]);
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
	    	completed = DataType.Instance.FillBoolean(dict["completed"]);
	    }		
	}
	if(dict.ContainsKey("trigger_data")) {
	    if(dict["trigger_data"] != null) {
	    	trigger_data = DataType.Instance.FillString(dict["trigger_data"]);
	    }		
	}
    }
}








