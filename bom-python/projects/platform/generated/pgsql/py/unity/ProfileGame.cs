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
    public  game_id { get; set; }
    public  profile_id { get; set; }
    public  game_profile { get; set; }
    public  profile_version { get; set; }
    public  type_id { get; set; }

    public ProfileGame() {
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
	if (game_profile != null) {
	    dict = DataUtil.SetDictValue(dict, "game_profile", game_profile);
	}
	if (profile_version != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_version", profile_version);
	}
	if (type_id != null) {
	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	}
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
	if(dict.ContainsKey("game_profile")) {
	    if(dict["game_profile"] != null) {
	    	game_profile = DataType.Instance.Fill(dict["game_profile"]);
	    }		
	}
	if(dict.ContainsKey("profile_version")) {
	    if(dict["profile_version"] != null) {
	    	profile_version = DataType.Instance.Fill(dict["profile_version"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.Fill(dict["type_id"]);
	    }		
	}
    }
}








