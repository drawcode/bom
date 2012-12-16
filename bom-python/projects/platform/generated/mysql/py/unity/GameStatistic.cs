using System;

public class GameStatistics<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameStatistics<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_statistic-data";

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

    public static GameStatistics<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameStatistics<T>();
                }
            }
            return instance;
        }
    }

    public GameStatistics() {
        Reset();
    }

    public GameStatistics(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameStatistic : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  username { get; set; }
    public  level { get; set; }
    public  type { get; set; }
    public  profile_id { get; set; }
    public  key { get; set; }
    public  timestamp { get; set; }
    public  game_id { get; set; }
    public  data { get; set; }
    public  stat_value { get; set; }

    public GameStatistic() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public  username { get; set; }
    public  level { get; set; }
    public  type { get; set; }
    public  profile_id { get; set; }
    public  key { get; set; }
    public  timestamp { get; set; }
    public  game_id { get; set; }
    public  data { get; set; }
    public  stat_value { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (username != null) {
	    dict = DataUtil.SetDictValue(dict, "username", username);
	}
	if (level != null) {
	    dict = DataUtil.SetDictValue(dict, "level", level);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (key != null) {
	    dict = DataUtil.SetDictValue(dict, "key", key);
	}
	if (timestamp != null) {
	    dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
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
	if(dict.ContainsKey("level")) {
	    if(dict["level"] != null) {
	    	level = DataType.Instance.Fill(dict["level"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.Fill(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("key")) {
	    if(dict["key"] != null) {
	    	key = DataType.Instance.Fill(dict["key"]);
	    }		
	}
	if(dict.ContainsKey("timestamp")) {
	    if(dict["timestamp"] != null) {
	    	timestamp = DataType.Instance.Fill(dict["timestamp"]);
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








