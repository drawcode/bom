using System;

public class ProfileCoupons<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileCoupons<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_coupon-data";

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

    public static ProfileCoupons<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileCoupons<T>();
                }
            }
            return instance;
        }
    }

    public ProfileCoupons() {
        Reset();
    }

    public ProfileCoupons(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileCoupon : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string url { get; set; }
    public string profile_id { get; set; }
    public string data { get; set; }

    public ProfileCoupon() {
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
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("url")) {
	    if(dict["url"] != null) {
	    	url = DataType.Instance.FillString(dict["url"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
    }
}








