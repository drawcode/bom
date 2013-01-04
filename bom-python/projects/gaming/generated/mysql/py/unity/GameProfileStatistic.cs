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
    public  username { get; set; }
    public  code { get; set; }
    public  timestamp { get; set; }
    public  level { get; set; }
    public  stat_value_formatted { get; set; }
    public  profile_id { get; set; }
    public  points { get; set; }
    public  type { get; set; }
    public  game_id { get; set; }
    public  data { get; set; }
    public  stat_value { get; set; }

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
	if (timestamp != null) {
	    dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
	}
	if (level != null) {
	    dict = DataUtil.SetDictValue(dict, "level", level);
	}
	if (stat_value_formatted != null) {
	    dict = DataUtil.SetDictValue(dict, "stat_value_formatted", stat_value_formatted);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (points != null) {
	    dict = DataUtil.SetDictValue(dict, "points", points);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (stat_value != null) {
	    dict = DataUtil.SetDictValue(dict, "stat_value", stat_value);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("username")) {
	    if(dict["username"] != null) {
	    	username = DataType.Instance.Fill(dict["username"]);
	    }		
	}
	if(dict.ContainsKey("code")) {
	    if(dict["code"] != null) {
	    	code = DataType.Instance.Fill(dict["code"]);
	    }		
	}
	if(dict.ContainsKey("timestamp")) {
	    if(dict["timestamp"] != null) {
	    	timestamp = DataType.Instance.Fill(dict["timestamp"]);
	    }		
	}
	if(dict.ContainsKey("level")) {
	    if(dict["level"] != null) {
	    	level = DataType.Instance.Fill(dict["level"]);
	    }		
	}
	if(dict.ContainsKey("stat_value_formatted")) {
	    if(dict["stat_value_formatted"] != null) {
	    	stat_value_formatted = DataType.Instance.Fill(dict["stat_value_formatted"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("points")) {
	    if(dict["points"] != null) {
	    	points = DataType.Instance.Fill(dict["points"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.Fill(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("stat_value")) {
	    if(dict["stat_value"] != null) {
	    	stat_value = DataType.Instance.Fill(dict["stat_value"]);
	    }		
	}
    }
}








