using System;

public class GameProfileStatistics<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameProfileStatistics<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_profile_statistic-data";

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

    public static GameProfileStatistics<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameProfileStatistics<T>();
                }
            }
            return instance;
        }
    }

    public GameProfileStatistics() {
        Reset();
    }

    public GameProfileStatistics(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameProfileStatistic : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string username { get; set; }
    public string code { get; set; }
    public float timestamp { get; set; }
    public string level { get; set; }
    public string stat_value_formatted { get; set; }
    public string profile_id { get; set; }
    public float points { get; set; }
    public string type { get; set; }
    public string game_id { get; set; }
    public string data { get; set; }
    public float stat_value { get; set; }

    public GameProfileStatistic() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (username != null) {
	    dict = DataUtil.SetDictValue(dict, "username", username);
	}
	if (code != null) {
	    dict = DataUtil.SetDictValue(dict, "code", code);
	}
	dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
	if (level != null) {
	    dict = DataUtil.SetDictValue(dict, "level", level);
	}
	if (stat_value_formatted != null) {
	    dict = DataUtil.SetDictValue(dict, "stat_value_formatted", stat_value_formatted);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	dict = DataUtil.SetDictValue(dict, "points", points);
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	dict = DataUtil.SetDictValue(dict, "stat_value", stat_value);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("username")) {
	    if(dict["username"] != null) {
	    	username = DataType.Instance.FillString(dict["username"]);
	    }		
	}
	if(dict.ContainsKey("code")) {
	    if(dict["code"] != null) {
	    	code = DataType.Instance.FillString(dict["code"]);
	    }		
	}
	if(dict.ContainsKey("timestamp")) {
	    if(dict["timestamp"] != null) {
	    	timestamp = DataType.Instance.FillFloat(dict["timestamp"]);
	    }		
	}
	if(dict.ContainsKey("level")) {
	    if(dict["level"] != null) {
	    	level = DataType.Instance.FillString(dict["level"]);
	    }		
	}
	if(dict.ContainsKey("stat_value_formatted")) {
	    if(dict["stat_value_formatted"] != null) {
	    	stat_value_formatted = DataType.Instance.FillString(dict["stat_value_formatted"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("points")) {
	    if(dict["points"] != null) {
	    	points = DataType.Instance.FillFloat(dict["points"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.FillString(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("stat_value")) {
	    if(dict["stat_value"] != null) {
	    	stat_value = DataType.Instance.FillFloat(dict["stat_value"]);
	    }		
	}
    }
}








