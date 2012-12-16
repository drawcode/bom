using System;

public class EventLocations<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile EventLocations<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "event_location-data";

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

    public static EventLocations<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new EventLocations<T>();
                }
            }
            return instance;
        }
    }

    public EventLocations() {
        Reset();
    }

    public EventLocations(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class EventLocation : BaseLocation {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string event_id { get; set; }

    public EventLocation() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string event_id { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (event_id != null) {
	    dict = DataUtil.SetDictValue(dict, "event_id", event_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("event_id")) {
	    if(dict["event_id"] != null) {
	    	event_id = DataType.Instance.FillString(dict["event_id"]);
	    }		
	}
    }
}








