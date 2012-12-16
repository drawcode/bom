using System;

public class EventCategoryAssocs<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile EventCategoryAssocs<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "event_category_assoc-data";

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

    public static EventCategoryAssocs<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new EventCategoryAssocs<T>();
                }
            }
            return instance;
        }
    }

    public EventCategoryAssocs() {
        Reset();
    }

    public EventCategoryAssocs(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class EventCategoryAssoc : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string event_id { get; set; }
    public string category_id { get; set; }

    public EventCategoryAssoc() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string event_id { get; set; }
    public string category_id { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (event_id != null) {
	    dict = DataUtil.SetDictValue(dict, "event_id", event_id);
	}
	if (category_id != null) {
	    dict = DataUtil.SetDictValue(dict, "category_id", category_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("event_id")) {
	    if(dict["event_id"] != null) {
	    	event_id = DataType.Instance.FillString(dict["event_id"]);
	    }		
	}
	if(dict.ContainsKey("category_id")) {
	    if(dict["category_id"] != null) {
	    	category_id = DataType.Instance.FillString(dict["category_id"]);
	    }		
	}
    }
}








