using System;

public class ProfileApps<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileApps<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_app-data";

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

    public static ProfileApps<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileApps<T>();
                }
            }
            return instance;
        }
    }

    public ProfileApps() {
        Reset();
    }

    public ProfileApps(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileApp : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  profile_id { get; set; }
    public  data { get; set; }
    public  app_id { get; set; }

    public ProfileApp() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (app_id != null) {
	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("app_id")) {
	    if(dict["app_id"] != null) {
	    	app_id = DataType.Instance.Fill(dict["app_id"]);
	    }		
	}
    }
}








