using System;

public class BaseEntitys<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile BaseEntitys<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "base_entity-data";

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

    public static BaseEntitys<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new BaseEntitys<T>();
                }
            }
            return instance;
        }
    }

    public BaseEntitys() {
        Reset();
    }

    public BaseEntitys(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class BaseEntity  {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string status { get; set; }
    public DateTime date_created { get; set; }
    public bool active { get; set; }
    public string uuid { get; set; }
    public DateTime date_modified { get; set; }

    public BaseEntity() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string status { get; set; }
    public DateTime date_created { get; set; }
    public bool active { get; set; }
    public string uuid { get; set; }
    public DateTime date_modified { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (status != null) {
	    dict = DataUtil.SetDictValue(dict, "status", status);
	}
	dict = DataUtil.SetDictValue(dict, "date_created", date_created);
	dict = DataUtil.SetDictValue(dict, "active", active);
	if (uuid != null) {
	    dict = DataUtil.SetDictValue(dict, "uuid", uuid);
	}
	dict = DataUtil.SetDictValue(dict, "date_modified", date_modified);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("status")) {
	    if(dict["status"] != null) {
	    	status = DataType.Instance.FillString(dict["status"]);
	    }		
	}
	if(dict.ContainsKey("date_created")) {
	    if(dict["date_created"] != null) {
	    	date_created = DataType.Instance.FillDateTime(dict["date_created"]);
	    }		
	}
	if(dict.ContainsKey("active")) {
	    if(dict["active"] != null) {
	    	active = DataType.Instance.FillBool(dict["active"]);
	    }		
	}
	if(dict.ContainsKey("uuid")) {
	    if(dict["uuid"] != null) {
	    	uuid = DataType.Instance.FillString(dict["uuid"]);
	    }		
	}
	if(dict.ContainsKey("date_modified")) {
	    if(dict["date_modified"] != null) {
	    	date_modified = DataType.Instance.FillDateTime(dict["date_modified"]);
	    }		
	}
    }
}








