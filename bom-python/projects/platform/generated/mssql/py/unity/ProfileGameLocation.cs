using System;

public class ProfileGameLocations<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileGameLocations<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_game_location-data";

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

    public static ProfileGameLocations<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileGameLocations<T>();
                }
            }
            return instance;
        }
    }

    public ProfileGameLocations() {
        Reset();
    }

    public ProfileGameLocations(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileGameLocation : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  game_location_id { get; set; }
    public  profile_id { get; set; }
    public  type_id { get; set; }

    public ProfileGameLocation() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public  game_location_id { get; set; }
    public  profile_id { get; set; }
    public  type_id { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (game_location_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_location_id", game_location_id);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (type_id != null) {
	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("game_location_id")) {
	    if(dict["game_location_id"] != null) {
	    	game_location_id = DataType.Instance.Fill(dict["game_location_id"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.Fill(dict["type_id"]);
	    }		
	}
    }
}








