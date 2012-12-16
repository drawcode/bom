using System;

public class GameStatisticTimestamps<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameStatisticTimestamps<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_statistic_timestamp-data";

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

    public static GameStatisticTimestamps<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameStatisticTimestamps<T>();
                }
            }
            return instance;
        }
    }

    public GameStatisticTimestamps() {
        Reset();
    }

    public GameStatisticTimestamps(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameStatisticTimestamp : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  game_id { get; set; }
    public  profile_id { get; set; }
    public  key { get; set; }
    public  timestamp { get; set; }

    public GameStatisticTimestamp() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public  game_id { get; set; }
    public  profile_id { get; set; }
    public  key { get; set; }
    public  timestamp { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (key != null) {
	    dict = DataUtil.SetDictValue(dict, "key", key);
	}
	dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
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
    }
}








