using System;

public class Games<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Games<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game-data";

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

    public static Games<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Games<T>();
                }
            }
            return instance;
        }
    }

    public Games() {
        Reset();
    }

    public Games(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Game : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  org_id { get; set; }
    public  app_id { get; set; }

    public Game() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public  org_id { get; set; }
    public  app_id { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	if (app_id != null) {
	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.Fill(dict["org_id"]);
	    }		
	}
	if(dict.ContainsKey("app_id")) {
	    if(dict["app_id"] != null) {
	    	app_id = DataType.Instance.Fill(dict["app_id"]);
	    }		
	}
    }
}








