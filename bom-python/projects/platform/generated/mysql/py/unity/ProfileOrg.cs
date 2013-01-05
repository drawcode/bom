using System;

public class ProfileOrgs<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileOrgs<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_org-data";

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

    public static ProfileOrgs<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileOrgs<T>();
                }
            }
            return instance;
        }
    }

    public ProfileOrgs() {
        Reset();
    }

    public ProfileOrgs(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileOrg : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  data { get; set; }
    public  profile_id { get; set; }
    public  org_id { get; set; }
    public  type_id { get; set; }

    public ProfileOrg() {
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
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
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
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
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








