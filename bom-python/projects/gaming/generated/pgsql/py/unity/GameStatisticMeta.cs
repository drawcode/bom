using System;

public class GameStatisticMetas<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameStatisticMetas<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_statistic_meta-data";

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

    public static GameStatisticMetas<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameStatisticMetas<T>();
                }
            }
            return instance;
        }
    }

    public GameStatisticMetas() {
        Reset();
    }

    public GameStatisticMetas(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameStatisticMeta : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  sort { get; set; }
    public  store_count { get; set; }
    public  data { get; set; }
    public  points { get; set; }
    public  game_id { get; set; }
    public  type { get; set; }
    public  order { get; set; }

    public GameStatisticMeta() {
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
	if (store_count != null) {
	    dict = DataUtil.SetDictValue(dict, "store_count", store_count);
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








