using System;

public class ProfileOffers<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileOffers<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_offer-data";

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

    public static ProfileOffers<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileOffers<T>();
                }
            }
            return instance;
        }
    }

    public ProfileOffers() {
        Reset();
    }

    public ProfileOffers(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileOffer : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  redeem_code { get; set; }
    public  url { get; set; }
    public  offer_id { get; set; }
    public  profile_id { get; set; }
    public  redeemed { get; set; }

    public ProfileOffer() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (redeem_code != null) {
	    dict = DataUtil.SetDictValue(dict, "redeem_code", redeem_code);
	}
	if (url != null) {
	    dict = DataUtil.SetDictValue(dict, "url", url);
	}
	if (offer_id != null) {
	    dict = DataUtil.SetDictValue(dict, "offer_id", offer_id);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (redeemed != null) {
	    dict = DataUtil.SetDictValue(dict, "redeemed", redeemed);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("redeem_code")) {
	    if(dict["redeem_code"] != null) {
	    	redeem_code = DataType.Instance.Fill(dict["redeem_code"]);
	    }		
	}
	if(dict.ContainsKey("url")) {
	    if(dict["url"] != null) {
	    	url = DataType.Instance.Fill(dict["url"]);
	    }		
	}
	if(dict.ContainsKey("offer_id")) {
	    if(dict["offer_id"] != null) {
	    	offer_id = DataType.Instance.Fill(dict["offer_id"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("redeemed")) {
	    if(dict["redeemed"] != null) {
	    	redeemed = DataType.Instance.Fill(dict["redeemed"]);
	    }		
	}
    }
}








