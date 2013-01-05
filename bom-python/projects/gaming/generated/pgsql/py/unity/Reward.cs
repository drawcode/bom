using System;

public class Rewards<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Rewards<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "reward-data";

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

    public static Rewards<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Rewards<T>();
                }
            }
            return instance;
        }
    }

    public Rewards() {
        Reset();
    }

    public Rewards(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Reward : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  type_url { get; set; }
    public  url { get; set; }
    public  type { get; set; }
    public  org_id { get; set; }
    public  data { get; set; }
    public  channel_id { get; set; }
    public  usage_count { get; set; }
    public  external_id { get; set; }

    public Reward() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (type_url != null) {
	    dict = DataUtil.SetDictValue(dict, "type_url", type_url);
	}
	if (url != null) {
	    dict = DataUtil.SetDictValue(dict, "url", url);
	}
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (channel_id != null) {
	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	}
	if (usage_count != null) {
	    dict = DataUtil.SetDictValue(dict, "usage_count", usage_count);
	}
	if (external_id != null) {
	    dict = DataUtil.SetDictValue(dict, "external_id", external_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("type_url")) {
	    if(dict["type_url"] != null) {
	    	type_url = DataType.Instance.Fill(dict["type_url"]);
	    }		
	}
	if(dict.ContainsKey("url")) {
	    if(dict["url"] != null) {
	    	url = DataType.Instance.Fill(dict["url"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.Fill(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.Fill(dict["org_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("channel_id")) {
	    if(dict["channel_id"] != null) {
	    	channel_id = DataType.Instance.Fill(dict["channel_id"]);
	    }		
	}
	if(dict.ContainsKey("usage_count")) {
	    if(dict["usage_count"] != null) {
	    	usage_count = DataType.Instance.Fill(dict["usage_count"]);
	    }		
	}
	if(dict.ContainsKey("external_id")) {
	    if(dict["external_id"] != null) {
	    	external_id = DataType.Instance.Fill(dict["external_id"]);
	    }		
	}
    }
}








