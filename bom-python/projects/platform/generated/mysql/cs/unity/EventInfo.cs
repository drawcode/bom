using System;

public class EventInfos<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile EventInfos<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "event_info-data";

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

    public static EventInfos<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new EventInfos<T>();
                }
            }
            return instance;
        }
    }

    public EventInfos() {
        Reset();
    }

    public EventInfos(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class EventInfo : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string url { get; set; }
    public string data { get; set; }
    public string org_id { get; set; }
    public int usage_count { get; set; }

    public EventInfo() {
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
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	dict = DataUtil.SetDictValue(dict, "usage_count", usage_count);
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
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.FillString(dict["org_id"]);
	    }		
	}
	if(dict.ContainsKey("usage_count")) {
	    if(dict["usage_count"] != null) {
	    	usage_count = DataType.Instance.FillInt(dict["usage_count"]);
	    }		
	}
    }
}








