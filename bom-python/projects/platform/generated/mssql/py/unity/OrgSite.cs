using System;

public class OrgSites<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile OrgSites<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "org_site-data";

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

    public static OrgSites<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new OrgSites<T>();
                }
            }
            return instance;
        }
    }

    public OrgSites() {
        Reset();
    }

    public OrgSites(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class OrgSite : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  site_id { get; set; }
    public  org_id { get; set; }

    public OrgSite() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public  site_id { get; set; }
    public  org_id { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (site_id != null) {
	    dict = DataUtil.SetDictValue(dict, "site_id", site_id);
	}
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("site_id")) {
	    if(dict["site_id"] != null) {
	    	site_id = DataType.Instance.Fill(dict["site_id"]);
	    }		
	}
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.Fill(dict["org_id"]);
	    }		
	}
    }
}








