using System;

public class Channels<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Channels<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "channel-data";

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

    public static Channels<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Channels<T>();
                }
            }
            return instance;
        }
    }

    public Channels() {
        Reset();
    }

    public Channels(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Channel : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string data { get; set; }
    public string org_id { get; set; }
    public string type_id { get; set; }

    public Channel() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	if (type_id != null) {
	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.FillString(dict["org_id"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    }		
	}
    }
}








