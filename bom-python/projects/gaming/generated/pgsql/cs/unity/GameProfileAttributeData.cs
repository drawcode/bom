using System;

public class GameProfileAttributeDatas<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameProfileAttributeDatas<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_profile_attribute_data-data";

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

    public static GameProfileAttributeDatas<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameProfileAttributeDatas<T>();
                }
            }
            return instance;
        }
    }

    public GameProfileAttributeDatas() {
        Reset();
    }

    public GameProfileAttributeDatas(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameProfileAttributeData : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public int sort { get; set; }
    public int group { get; set; }
    public string profile_id { get; set; }
    public string attribute_id { get; set; }
    public string attribute_value { get; set; }
    public string game_id { get; set; }
    public int type { get; set; }
    public int order { get; set; }

    public GameProfileAttributeData() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	dict = DataUtil.SetDictValue(dict, "sort", sort);
	dict = DataUtil.SetDictValue(dict, "group", group);
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (attribute_id != null) {
	    dict = DataUtil.SetDictValue(dict, "attribute_id", attribute_id);
	}
	if (attribute_value != null) {
	    dict = DataUtil.SetDictValue(dict, "attribute_value", attribute_value);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	dict = DataUtil.SetDictValue(dict, "type", type);
	dict = DataUtil.SetDictValue(dict, "order", order);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("sort")) {
	    if(dict["sort"] != null) {
	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    }		
	}
	if(dict.ContainsKey("group")) {
	    if(dict["group"] != null) {
	    	group = DataType.Instance.FillInt(dict["group"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("attribute_id")) {
	    if(dict["attribute_id"] != null) {
	    	attribute_id = DataType.Instance.FillString(dict["attribute_id"]);
	    }		
	}
	if(dict.ContainsKey("attribute_value")) {
	    if(dict["attribute_value"] != null) {
	    	attribute_value = DataType.Instance.FillString(dict["attribute_value"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.FillInt(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("order")) {
	    if(dict["order"] != null) {
	    	order = DataType.Instance.FillInt(dict["order"]);
	    }		
	}
    }
}








