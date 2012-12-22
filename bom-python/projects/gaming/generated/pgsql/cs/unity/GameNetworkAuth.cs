using System;

public class GameNetworkAuths<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameNetworkAuths<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_network_auth-data";

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

    public static GameNetworkAuths<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameNetworkAuths<T>();
                }
            }
            return instance;
        }
    }

    public GameNetworkAuths() {
        Reset();
    }

    public GameNetworkAuths(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameNetworkAuth : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string url { get; set; }
    public string data { get; set; }
    public string app_id { get; set; }
    public string game_network_id { get; set; }
    public string secret { get; set; }
    public string game_id { get; set; }
    public string type { get; set; }

    public GameNetworkAuth() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (url != null) {
	    dict = DataUtil.SetDictValue(dict, "url", url);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (app_id != null) {
	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	}
	if (game_network_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_network_id", game_network_id);
	}
	if (secret != null) {
	    dict = DataUtil.SetDictValue(dict, "secret", secret);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("url")) {
	    if(dict["url"] != null) {
	    	url = DataType.Instance.FillString(dict["url"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("app_id")) {
	    if(dict["app_id"] != null) {
	    	app_id = DataType.Instance.FillString(dict["app_id"]);
	    }		
	}
	if(dict.ContainsKey("game_network_id")) {
	    if(dict["game_network_id"] != null) {
	    	game_network_id = DataType.Instance.FillString(dict["game_network_id"]);
	    }		
	}
	if(dict.ContainsKey("secret")) {
	    if(dict["secret"] != null) {
	    	secret = DataType.Instance.FillString(dict["secret"]);
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
    }
}








