using System;

public class GameProfileStatisticTimestamps<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameProfileStatisticTimestamps<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_profile_statistic_timestamp-data";

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

    public static GameProfileStatisticTimestamps<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameProfileStatisticTimestamps<T>();
                }
            }
            return instance;
        }
    }

    public GameProfileStatisticTimestamps() {
        Reset();
    }

    public GameProfileStatisticTimestamps(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameProfileStatisticTimestamp : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string profile_id { get; set; }
    public string game_id { get; set; }
    public string code { get; set; }
    public Date timestamp { get; set; }

    public GameProfileStatisticTimestamp() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (code != null) {
	    dict = DataUtil.SetDictValue(dict, "code", code);
	}
	dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("code")) {
	    if(dict["code"] != null) {
	    	code = DataType.Instance.FillString(dict["code"]);
	    }		
	}
	if(dict.ContainsKey("timestamp")) {
	    if(dict["timestamp"] != null) {
	    	timestamp = DataType.Instance.FillDate(dict["timestamp"]);
	    }		
	}
    }
}








