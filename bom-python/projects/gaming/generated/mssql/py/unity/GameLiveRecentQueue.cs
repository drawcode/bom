using System;

public class GameLiveRecentQueues<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameLiveRecentQueues<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_live_recent_queue-data";

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

    public static GameLiveRecentQueues<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameLiveRecentQueues<T>();
                }
            }
            return instance;
        }
    }

    public GameLiveRecentQueues() {
        Reset();
    }

    public GameLiveRecentQueues(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameLiveRecentQueue : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  username { get; set; }
    public  data { get; set; }
    public  profile_id { get; set; }
    public  game { get; set; }
    public  game_id { get; set; }
    public  type { get; set; }

    public GameLiveRecentQueue() {
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
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (game != null) {
	    dict = DataUtil.SetDictValue(dict, "game", game);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("username")) {
	    if(dict["username"] != null) {
	    	username = DataType.Instance.Fill(dict["username"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("game")) {
	    if(dict["game"] != null) {
	    	game = DataType.Instance.Fill(dict["game"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.Fill(dict["type"]);
	    }		
	}
    }
}








