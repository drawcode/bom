using System;

public class ContentItems<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ContentItems<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "content_item-data";

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

    public static ContentItems<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ContentItems<T>();
                }
            }
            return instance;
        }
    }

    public ContentItems() {
        Reset();
    }

    public ContentItems(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ContentItem : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string path { get; set; }
    public DateTime date_end { get; set; }
    public DateTime date_start { get; set; }
    public string data { get; set; }
    public string type_id { get; set; }

    public ContentItem() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (path != null) {
	    dict = DataUtil.SetDictValue(dict, "path", path);
	}
	dict = DataUtil.SetDictValue(dict, "date_end", date_end);
	dict = DataUtil.SetDictValue(dict, "date_start", date_start);
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (type_id != null) {
	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("path")) {
	    if(dict["path"] != null) {
	    	path = DataType.Instance.FillString(dict["path"]);
	    }		
	}
	if(dict.ContainsKey("date_end")) {
	    if(dict["date_end"] != null) {
	    	date_end = DataType.Instance.FillDateTime(dict["date_end"]);
	    }		
	}
	if(dict.ContainsKey("date_start")) {
	    if(dict["date_start"] != null) {
	    	date_start = DataType.Instance.FillDateTime(dict["date_start"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    }		
	}
    }
}








