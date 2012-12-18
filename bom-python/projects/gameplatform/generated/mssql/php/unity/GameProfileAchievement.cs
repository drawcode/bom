using System;

public class GameProfileAchievements<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameProfileAchievements<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_profile_achievement-data";

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

    public static GameProfileAchievements<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameProfileAchievements<T>();
                }
            }
            return instance;
        }
    }

    public GameProfileAchievements() {
        Reset();
    }

    public GameProfileAchievements(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameProfileAchievement : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string username { get; set; }
    public string level { get; set; }
    public string type { get; set; }
    public boolean completed { get; set; }
    public string profile_id { get; set; }
    public string key { get; set; }
    public float timestamp { get; set; }
    public string game_id { get; set; }
    public float achievement_value { get; set; }
    public string data { get; set; }

    public GameProfileAchievement() {
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
	if (level != null) {
	    dict = DataUtil.SetDictValue(dict, "level", level);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	dict = DataUtil.SetDictValue(dict, "completed", completed);
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (key != null) {
	    dict = DataUtil.SetDictValue(dict, "key", key);
	}
	dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	dict = DataUtil.SetDictValue(dict, "achievement_value", achievement_value);
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("username")) {
	    if(dict["username"] != null) {
	    	username = DataType.Instance.FillString(dict["username"]);
	    }		
	}
	if(dict.ContainsKey("level")) {
	    if(dict["level"] != null) {
	    	level = DataType.Instance.FillString(dict["level"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.FillString(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("completed")) {
	    if(dict["completed"] != null) {
	    	completed = DataType.Instance.FillBoolean(dict["completed"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("key")) {
	    if(dict["key"] != null) {
	    	key = DataType.Instance.FillString(dict["key"]);
	    }		
	}
	if(dict.ContainsKey("timestamp")) {
	    if(dict["timestamp"] != null) {
	    	timestamp = DataType.Instance.FillFloat(dict["timestamp"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("achievement_value")) {
	    if(dict["achievement_value"] != null) {
	    	achievement_value = DataType.Instance.FillFloat(dict["achievement_value"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
    }
}








