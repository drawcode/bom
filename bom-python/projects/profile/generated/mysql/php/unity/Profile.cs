using System;

public class Profiles<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Profiles<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile-data";

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

    public static Profiles<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Profiles<T>();
                }
            }
            return instance;
        }
    }

    public Profiles() {
        Reset();
    }

    public Profiles(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Profile : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string username { get; set; }
    public string hash { get; set; }

    public Profile() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (username != null) {
	    dict = DataUtil.SetDictValue(dict, "username", username);
	}
	if (hash != null) {
	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("username")) {
	    if(dict["username"] != null) {
	    	username = DataType.Instance.FillString(dict["username"]);
	    }		
	}
	if(dict.ContainsKey("hash")) {
	    if(dict["hash"] != null) {
	    	hash = DataType.Instance.FillString(dict["hash"]);
	    }		
	}
    }
}








