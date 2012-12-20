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
    public  username { get; set; }
    public  first_name { get; set; }
    public  last_name { get; set; }
    public  hash { get; set; }
    public  name { get; set; }
    public  email { get; set; }

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
	if (first_name != null) {
	    dict = DataUtil.SetDictValue(dict, "first_name", first_name);
	}
	if (last_name != null) {
	    dict = DataUtil.SetDictValue(dict, "last_name", last_name);
	}
	if (hash != null) {
	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	}
	if (name != null) {
	    dict = DataUtil.SetDictValue(dict, "name", name);
	}
	if (email != null) {
	    dict = DataUtil.SetDictValue(dict, "email", email);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("username")) {
	    if(dict["username"] != null) {
	    	username = DataType.Instance.Fill(dict["username"]);
	    }		
	}
	if(dict.ContainsKey("first_name")) {
	    if(dict["first_name"] != null) {
	    	first_name = DataType.Instance.Fill(dict["first_name"]);
	    }		
	}
	if(dict.ContainsKey("last_name")) {
	    if(dict["last_name"] != null) {
	    	last_name = DataType.Instance.Fill(dict["last_name"]);
	    }		
	}
	if(dict.ContainsKey("hash")) {
	    if(dict["hash"] != null) {
	    	hash = DataType.Instance.Fill(dict["hash"]);
	    }		
	}
	if(dict.ContainsKey("name")) {
	    if(dict["name"] != null) {
	    	name = DataType.Instance.Fill(dict["name"]);
	    }		
	}
	if(dict.ContainsKey("email")) {
	    if(dict["email"] != null) {
	    	email = DataType.Instance.Fill(dict["email"]);
	    }		
	}
    }
}








