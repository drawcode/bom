using System;

public class ProfileGameDataAttributes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileGameDataAttributes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_game_data_attribute-data";

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

    public static ProfileGameDataAttributes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileGameDataAttributes<T>();
                }
            }
            return instance;
        }
    }

    public ProfileGameDataAttributes() {
        Reset();
    }

    public ProfileGameDataAttributes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileGameDataAttribute : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string code { get; set; }
    public string uuid { get; set; }
    public string val { get; set; }
    public string profile_id { get; set; }
    public string otype { get; set; }
    public string game_id { get; set; }
    public string type { get; set; }
    public string name { get; set; }

    public ProfileGameDataAttribute() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (code != null) {
	    dict = DataUtil.SetDictValue(dict, "code", code);
	}
	if (uuid != null) {
	    dict = DataUtil.SetDictValue(dict, "uuid", uuid);
	}
	if (val != null) {
	    dict = DataUtil.SetDictValue(dict, "val", val);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (otype != null) {
	    dict = DataUtil.SetDictValue(dict, "otype", otype);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	if (name != null) {
	    dict = DataUtil.SetDictValue(dict, "name", name);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("code")) {
	    if(dict["code"] != null) {
	    	code = DataType.Instance.FillString(dict["code"]);
	    }		
	}
	if(dict.ContainsKey("uuid")) {
	    if(dict["uuid"] != null) {
	    	uuid = DataType.Instance.FillString(dict["uuid"]);
	    }		
	}
	if(dict.ContainsKey("val")) {
	    if(dict["val"] != null) {
	    	val = DataType.Instance.FillString(dict["val"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("otype")) {
	    if(dict["otype"] != null) {
	    	otype = DataType.Instance.FillString(dict["otype"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.FillString(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("name")) {
	    if(dict["name"] != null) {
	    	name = DataType.Instance.FillString(dict["name"]);
	    }		
	}
    }
}








