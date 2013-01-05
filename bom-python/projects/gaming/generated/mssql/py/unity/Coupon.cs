using System;

public class Coupons<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Coupons<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "coupon-data";

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

    public static Coupons<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Coupons<T>();
                }
            }
            return instance;
        }
    }

    public Coupons() {
        Reset();
    }

    public Coupons(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Coupon : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  url { get; set; }
    public  data { get; set; }
    public  org_id { get; set; }
    public  usage_count { get; set; }

    public Coupon() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (url != null) {
	    dict = DataUtil.SetDictValue(dict, "url", url);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	if (usage_count != null) {
	    dict = DataUtil.SetDictValue(dict, "usage_count", usage_count);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("url")) {
	    if(dict["url"] != null) {
	    	url = DataType.Instance.Fill(dict["url"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.Fill(dict["org_id"]);
	    }		
	}
	if(dict.ContainsKey("usage_count")) {
	    if(dict["usage_count"] != null) {
	    	usage_count = DataType.Instance.Fill(dict["usage_count"]);
	    }		
	}
    }
}








