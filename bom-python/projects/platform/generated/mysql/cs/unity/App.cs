using System;

public class Apps<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Apps<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "app-data";

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

    public static Apps<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Apps<T>();
                }
            }
            return instance;
        }
    }

    public Apps() {
        Reset();
    }

    public Apps(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class App : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string platform { get; set; }
    public string type_id { get; set; }

    public App() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string platform { get; set; }
    public string type_id { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (platform != null) {
	    dict = DataUtil.SetDictValue(dict, "platform", platform);
	}
	if (type_id != null) {
	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("platform")) {
	    if(dict["platform"] != null) {
	    	platform = DataType.Instance.FillString(dict["platform"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    }		
	}
    }
}








