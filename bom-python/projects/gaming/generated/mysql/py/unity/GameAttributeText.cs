using System;

public class GameAttributeTexts<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameAttributeTexts<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_attribute_text-data";

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

    public static GameAttributeTexts<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameAttributeTexts<T>();
                }
            }
            return instance;
        }
    }

    public GameAttributeTexts() {
        Reset();
    }

    public GameAttributeTexts(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameAttributeText : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  sort { get; set; }
    public  group { get; set; }
    public  attribute_id { get; set; }
    public  attribute_value { get; set; }
    public  game_id { get; set; }
    public  type { get; set; }
    public  order { get; set; }

    public GameAttributeText() {
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
	if (group != null) {
	    dict = DataUtil.SetDictValue(dict, "group", group);
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
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	if (order != null) {
	    dict = DataUtil.SetDictValue(dict, "order", order);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("sort")) {
	    if(dict["sort"] != null) {
	    	sort = DataType.Instance.Fill(dict["sort"]);
	    }		
	}
	if(dict.ContainsKey("group")) {
	    if(dict["group"] != null) {
	    	group = DataType.Instance.Fill(dict["group"]);
	    }		
	}
	if(dict.ContainsKey("attribute_id")) {
	    if(dict["attribute_id"] != null) {
	    	attribute_id = DataType.Instance.Fill(dict["attribute_id"]);
	    }		
	}
	if(dict.ContainsKey("attribute_value")) {
	    if(dict["attribute_value"] != null) {
	    	attribute_value = DataType.Instance.Fill(dict["attribute_value"]);
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
	if(dict.ContainsKey("order")) {
	    if(dict["order"] != null) {
	    	order = DataType.Instance.Fill(dict["order"]);
	    }		
	}
    }
}








