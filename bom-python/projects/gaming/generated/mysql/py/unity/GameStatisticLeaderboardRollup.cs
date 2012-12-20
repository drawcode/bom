using System;

public class GameStatisticLeaderboardRollups<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameStatisticLeaderboardRollups<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_statistic_leaderboard_rollup-data";

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

    public static GameStatisticLeaderboardRollups<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameStatisticLeaderboardRollups<T>();
                }
            }
            return instance;
        }
    }

    public GameStatisticLeaderboardRollups() {
        Reset();
    }

    public GameStatisticLeaderboardRollups(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameStatisticLeaderboardRollup : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  username { get; set; }
    public  rank_change { get; set; }
    public  network { get; set; }
    public  timestamp { get; set; }
    public  level { get; set; }
    public  stat_value_formatted { get; set; }
    public  profile_id { get; set; }
    public  rank_total_count { get; set; }
    public  rank { get; set; }
    public  key { get; set; }
    public  type { get; set; }
    public  game_id { get; set; }
    public  data { get; set; }
    public  stat_value { get; set; }

    public GameStatisticLeaderboardRollup() {
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
	if (rank_change != null) {
	    dict = DataUtil.SetDictValue(dict, "rank_change", rank_change);
	}
	if (network != null) {
	    dict = DataUtil.SetDictValue(dict, "network", network);
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
	if (rank_total_count != null) {
	    dict = DataUtil.SetDictValue(dict, "rank_total_count", rank_total_count);
	}
	if (rank != null) {
	    dict = DataUtil.SetDictValue(dict, "rank", rank);
	}
	if (key != null) {
	    dict = DataUtil.SetDictValue(dict, "key", key);
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
	if(dict.ContainsKey("rank_change")) {
	    if(dict["rank_change"] != null) {
	    	rank_change = DataType.Instance.Fill(dict["rank_change"]);
	    }		
	}
	if(dict.ContainsKey("network")) {
	    if(dict["network"] != null) {
	    	network = DataType.Instance.Fill(dict["network"]);
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
	if(dict.ContainsKey("rank_total_count")) {
	    if(dict["rank_total_count"] != null) {
	    	rank_total_count = DataType.Instance.Fill(dict["rank_total_count"]);
	    }		
	}
	if(dict.ContainsKey("rank")) {
	    if(dict["rank"] != null) {
	    	rank = DataType.Instance.Fill(dict["rank"]);
	    }		
	}
	if(dict.ContainsKey("key")) {
	    if(dict["key"] != null) {
	    	key = DataType.Instance.Fill(dict["key"]);
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








