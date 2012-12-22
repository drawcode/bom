using System;

public class GameAchievementMetas<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameAchievementMetas<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_achievement_meta-data";

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

    public static GameAchievementMetas<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameAchievementMetas<T>();
                }
            }
            return instance;
        }
    }

    public GameAchievementMetas() {
        Reset();
    }

    public GameAchievementMetas(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameAchievementMeta : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  sort { get; set; }
    public  code { get; set; }
    public  game_stat { get; set; }
    public  level { get; set; }
    public  data { get; set; }
    public  points { get; set; }
    public  game_id { get; set; }
    public  modifier { get; set; }
    public  type { get; set; }
    public  leaderboard { get; set; }

    public GameAchievementMeta() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (sort != null) {
	    dict = DataUtil.SetDictValue(dict, "sort", sort);
	}
	if (code != null) {
	    dict = DataUtil.SetDictValue(dict, "code", code);
	}
	dict = DataUtil.SetDictValue(dict, "game_stat", game_stat);
	if (level != null) {
	    dict = DataUtil.SetDictValue(dict, "level", level);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (points != null) {
	    dict = DataUtil.SetDictValue(dict, "points", points);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (modifier != null) {
	    dict = DataUtil.SetDictValue(dict, "modifier", modifier);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	dict = DataUtil.SetDictValue(dict, "leaderboard", leaderboard);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("sort")) {
	    if(dict["sort"] != null) {
	    	sort = DataType.Instance.Fill(dict["sort"]);
	    }		
	}
	if(dict.ContainsKey("code")) {
	    if(dict["code"] != null) {
	    	code = DataType.Instance.Fill(dict["code"]);
	    }		
	}
	if(dict.ContainsKey("game_stat")) {
	    if(dict["game_stat"] != null) {
	    	game_stat = DataType.Instance.Fill(dict["game_stat"]);
	    }		
	}
	if(dict.ContainsKey("level")) {
	    if(dict["level"] != null) {
	    	level = DataType.Instance.Fill(dict["level"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("points")) {
	    if(dict["points"] != null) {
	    	points = DataType.Instance.Fill(dict["points"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("modifier")) {
	    if(dict["modifier"] != null) {
	    	modifier = DataType.Instance.Fill(dict["modifier"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.Fill(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("leaderboard")) {
	    if(dict["leaderboard"] != null) {
	    	leaderboard = DataType.Instance.Fill(dict["leaderboard"]);
	    }		
	}
    }
}








