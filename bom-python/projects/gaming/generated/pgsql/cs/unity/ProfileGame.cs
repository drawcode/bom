using System;

public class ProfileGames<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileGames<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_game-data";

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

    public static ProfileGames<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileGames<T>();
                }
            }
            return instance;
        }
    }

    public ProfileGames() {
        Reset();
    }

    public ProfileGames(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileGame : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string type_id { get; set; }
    public string profile_version { get; set; }
    public string profile_id { get; set; }
    public string profile_iteration { get; set; }
    public string game_profile { get; set; }
    public string game_id { get; set; }

    public ProfileGame() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (type_id != null) {
	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	}
	if (profile_version != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_version", profile_version);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (profile_iteration != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_iteration", profile_iteration);
	}
	if (game_profile != null) {
	    dict = DataUtil.SetDictValue(dict, "game_profile", game_profile);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    }		
	}
	if(dict.ContainsKey("profile_version")) {
	    if(dict["profile_version"] != null) {
	    	profile_version = DataType.Instance.FillString(dict["profile_version"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("profile_iteration")) {
	    if(dict["profile_iteration"] != null) {
	    	profile_iteration = DataType.Instance.FillString(dict["profile_iteration"]);
	    }		
	}
	if(dict.ContainsKey("game_profile")) {
	    if(dict["game_profile"] != null) {
	    	game_profile = DataType.Instance.FillString(dict["game_profile"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
    }
}








