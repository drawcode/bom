using System;

public class BaseMetas<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile BaseMetas<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "base_meta-data";

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

    public static BaseMetas<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new BaseMetas<T>();
                }
            }
            return instance;
        }
    }

    public BaseMetas() {
        Reset();
    }

    public BaseMetas(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class BaseMeta : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string code { get; set; }
    public string display_name { get; set; }
    public string name { get; set; }
    public string description { get; set; }

    public BaseMeta() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (code != null) {
	    dict = DataUtil.SetDictValue(dict, "code", code);
	}
	if (display_name != null) {
	    dict = DataUtil.SetDictValue(dict, "display_name", display_name);
	}
	if (name != null) {
	    dict = DataUtil.SetDictValue(dict, "name", name);
	}
	if (description != null) {
	    dict = DataUtil.SetDictValue(dict, "description", description);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("code")) {
	    if(dict["code"] != null) {
	    	code = DataType.Instance.FillString(dict["code"]);
	    }		
	}
	if(dict.ContainsKey("display_name")) {
	    if(dict["display_name"] != null) {
	    	display_name = DataType.Instance.FillString(dict["display_name"]);
	    }		
	}
	if(dict.ContainsKey("name")) {
	    if(dict["name"] != null) {
	    	name = DataType.Instance.FillString(dict["name"]);
	    }		
	}
	if(dict.ContainsKey("description")) {
	    if(dict["description"] != null) {
	    	description = DataType.Instance.FillString(dict["description"]);
	    }		
	}
    }
}








