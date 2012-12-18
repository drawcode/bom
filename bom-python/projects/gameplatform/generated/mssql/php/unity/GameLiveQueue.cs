using System;

public class GameLiveQueues<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameLiveQueues<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_live_queue-data";

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

    public static GameLiveQueues<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameLiveQueues<T>();
                }
            }
            return instance;
        }
    }

    public GameLiveQueues() {
        Reset();
    }

    public GameLiveQueues(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameLiveQueue : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string game_id { get; set; }
    public string profile_id { get; set; }
    public string data_stat { get; set; }
    public string data_ad { get; set; }

    public GameLiveQueue() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (data_stat != null) {
	    dict = DataUtil.SetDictValue(dict, "data_stat", data_stat);
	}
	if (data_ad != null) {
	    dict = DataUtil.SetDictValue(dict, "data_ad", data_ad);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("data_stat")) {
	    if(dict["data_stat"] != null) {
	    	data_stat = DataType.Instance.FillString(dict["data_stat"]);
	    }		
	}
	if(dict.ContainsKey("data_ad")) {
	    if(dict["data_ad"] != null) {
	    	data_ad = DataType.Instance.FillString(dict["data_ad"]);
	    }		
	}
    }
}








