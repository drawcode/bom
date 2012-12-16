using System;

public class Sites<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Sites<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "site-data";

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

    public static Sites<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Sites<T>();
                }
            }
            return instance;
        }
    }

    public Sites() {
        Reset();
    }

    public Sites(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Site : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string domain { get; set; }
    public string type_id { get; set; }

    public Site() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (domain != null) {
	    dict = DataUtil.SetDictValue(dict, "domain", domain);
	}
	if (type_id != null) {
	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("domain")) {
	    if(dict["domain"] != null) {
	    	domain = DataType.Instance.FillString(dict["domain"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    }		
	}
    }
}








