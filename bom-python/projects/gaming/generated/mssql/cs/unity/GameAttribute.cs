using System;

public class GameAttributes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameAttributes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_attribute-data";

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

    public static GameAttributes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameAttributes<T>();
                }
            }
            return instance;
        }
    }

    public GameAttributes() {
        Reset();
    }

    public GameAttributes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameAttribute : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public int sort { get; set; }
    public string game_id { get; set; }
    public int group { get; set; }
    public int order { get; set; }
    public int type { get; set; }

    public GameAttribute() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	dict = DataUtil.SetDictValue(dict, "sort", sort);
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	dict = DataUtil.SetDictValue(dict, "group", group);
	dict = DataUtil.SetDictValue(dict, "order", order);
	dict = DataUtil.SetDictValue(dict, "type", type);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("sort")) {
	    if(dict["sort"] != null) {
	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("group")) {
	    if(dict["group"] != null) {
	    	group = DataType.Instance.FillInt(dict["group"]);
	    }		
	}
	if(dict.ContainsKey("order")) {
	    if(dict["order"] != null) {
	    	order = DataType.Instance.FillInt(dict["order"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.FillInt(dict["type"]);
	    }		
	}
    }
}








