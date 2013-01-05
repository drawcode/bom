using System;

public class RewardTypes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile RewardTypes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "reward_type-data";

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

    public static RewardTypes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new RewardTypes<T>();
                }
            }
            return instance;
        }
    }

    public RewardTypes() {
        Reset();
    }

    public RewardTypes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class RewardType : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string data { get; set; }
    public string type_url { get; set; }
    public string type { get; set; }

    public RewardType() {
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
	if (type_url != null) {
	    dict = DataUtil.SetDictValue(dict, "type_url", type_url);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("type_url")) {
	    if(dict["type_url"] != null) {
	    	type_url = DataType.Instance.FillString(dict["type_url"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.FillString(dict["type"]);
	    }		
	}
    }
}








