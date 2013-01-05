using System;

public class ChannelTypes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ChannelTypes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "channel_type-data";

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

    public static ChannelTypes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ChannelTypes<T>();
                }
            }
            return instance;
        }
    }

    public ChannelTypes() {
        Reset();
    }

    public ChannelTypes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ChannelType : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string data { get; set; }
    public string type { get; set; }

    public ChannelType() {
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
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.FillString(dict["type"]);
	    }		
	}
    }
}








