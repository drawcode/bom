using System;

public class EventCategorys<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile EventCategorys<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "event_category-data";

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

    public static EventCategorys<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new EventCategorys<T>();
                }
            }
            return instance;
        }
    }

    public EventCategorys() {
        Reset();
    }

    public EventCategorys(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class EventCategory : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  data { get; set; }
    public  org_id { get; set; }
    public  type_id { get; set; }

    public EventCategory() {
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
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.Fill(dict["org_id"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.Fill(dict["type_id"]);
	    }		
	}
    }
}








