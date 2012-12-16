using System;

public class GameSessionDatas<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameSessionDatas<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_session_data-data";

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

    public static GameSessionDatas<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameSessionDatas<T>();
                }
            }
            return instance;
        }
    }

    public GameSessionDatas() {
        Reset();
    }

    public GameSessionDatas(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameSessionData : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string data_layer_enemy { get; set; }
    public string data_layer_actors { get; set; }
    public string data_results { get; set; }
    public string data { get; set; }
    public string data_layer_projectile { get; set; }

    public GameSessionData() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string data_layer_enemy { get; set; }
    public string data_layer_actors { get; set; }
    public string data_results { get; set; }
    public string data { get; set; }
    public string data_layer_projectile { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (data_layer_enemy != null) {
	    dict = DataUtil.SetDictValue(dict, "data_layer_enemy", data_layer_enemy);
	}
	if (data_layer_actors != null) {
	    dict = DataUtil.SetDictValue(dict, "data_layer_actors", data_layer_actors);
	}
	if (data_results != null) {
	    dict = DataUtil.SetDictValue(dict, "data_results", data_results);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (data_layer_projectile != null) {
	    dict = DataUtil.SetDictValue(dict, "data_layer_projectile", data_layer_projectile);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("data_layer_enemy")) {
	    if(dict["data_layer_enemy"] != null) {
	    	data_layer_enemy = DataType.Instance.FillString(dict["data_layer_enemy"]);
	    }		
	}
	if(dict.ContainsKey("data_layer_actors")) {
	    if(dict["data_layer_actors"] != null) {
	    	data_layer_actors = DataType.Instance.FillString(dict["data_layer_actors"]);
	    }		
	}
	if(dict.ContainsKey("data_results")) {
	    if(dict["data_results"] != null) {
	    	data_results = DataType.Instance.FillString(dict["data_results"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("data_layer_projectile")) {
	    if(dict["data_layer_projectile"] != null) {
	    	data_layer_projectile = DataType.Instance.FillString(dict["data_layer_projectile"]);
	    }		
	}
    }
}








