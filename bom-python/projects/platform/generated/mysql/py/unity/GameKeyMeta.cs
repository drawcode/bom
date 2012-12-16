using System;

public class GameKeyMetas<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameKeyMetas<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_key_meta-data";

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

    public static GameKeyMetas<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameKeyMetas<T>();
                }
            }
            return instance;
        }
    }

    public GameKeyMetas() {
        Reset();
    }

    public GameKeyMetas(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameKeyMeta : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  sort { get; set; }
    public  store_count { get; set; }
    public  level { get; set; }
    public  data { get; set; }
    public  key_level { get; set; }
    public  key_stat { get; set; }
    public  key { get; set; }
    public  game_id { get; set; }
    public  type { get; set; }
    public  order { get; set; }

    public GameKeyMeta() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public  sort { get; set; }
    public  store_count { get; set; }
    public  level { get; set; }
    public  data { get; set; }
    public  key_level { get; set; }
    public  key_stat { get; set; }
    public  key { get; set; }
    public  game_id { get; set; }
    public  type { get; set; }
    public  order { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (sort != null) {
	    dict = DataUtil.SetDictValue(dict, "sort", sort);
	}
	if (store_count != null) {
	    dict = DataUtil.SetDictValue(dict, "store_count", store_count);
	}
	if (level != null) {
	    dict = DataUtil.SetDictValue(dict, "level", level);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (key_level != null) {
	    dict = DataUtil.SetDictValue(dict, "key_level", key_level);
	}
	if (key_stat != null) {
	    dict = DataUtil.SetDictValue(dict, "key_stat", key_stat);
	}
	if (key != null) {
	    dict = DataUtil.SetDictValue(dict, "key", key);
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
	if(dict.ContainsKey("store_count")) {
	    if(dict["store_count"] != null) {
	    	store_count = DataType.Instance.Fill(dict["store_count"]);
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
	if(dict.ContainsKey("key_level")) {
	    if(dict["key_level"] != null) {
	    	key_level = DataType.Instance.Fill(dict["key_level"]);
	    }		
	}
	if(dict.ContainsKey("key_stat")) {
	    if(dict["key_stat"] != null) {
	    	key_stat = DataType.Instance.Fill(dict["key_stat"]);
	    }		
	}
	if(dict.ContainsKey("key")) {
	    if(dict["key"] != null) {
	    	key = DataType.Instance.Fill(dict["key"]);
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








