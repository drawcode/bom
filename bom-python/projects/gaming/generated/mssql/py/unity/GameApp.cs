using System;

public class GameApps<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameApps<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_app-data";

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

    public static GameApps<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameApps<T>();
                }
            }
            return instance;
        }
    }

    public GameApps() {
        Reset();
    }

    public GameApps(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameApp : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  game_id { get; set; }
    public  app_id { get; set; }

    public GameApp() {
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
	if (app_id != null) {
	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("app_id")) {
	    if(dict["app_id"] != null) {
	    	app_id = DataType.Instance.Fill(dict["app_id"]);
	    }		
	}
    }
}








