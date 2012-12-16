using System;

public class SiteApps<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile SiteApps<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "site_app-data";

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

    public static SiteApps<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new SiteApps<T>();
                }
            }
            return instance;
        }
    }

    public SiteApps() {
        Reset();
    }

    public SiteApps(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class SiteApp : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string site_id { get; set; }
    public string app_id { get; set; }

    public SiteApp() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string site_id { get; set; }
    public string app_id { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (site_id != null) {
	    dict = DataUtil.SetDictValue(dict, "site_id", site_id);
	}
	if (app_id != null) {
	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("site_id")) {
	    if(dict["site_id"] != null) {
	    	site_id = DataType.Instance.FillString(dict["site_id"]);
	    }		
	}
	if(dict.ContainsKey("app_id")) {
	    if(dict["app_id"] != null) {
	    	app_id = DataType.Instance.FillString(dict["app_id"]);
	    }		
	}
    }
}








