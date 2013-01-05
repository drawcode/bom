using System;

public class ProfileRewardPointss<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileRewardPointss<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_reward_points-data";

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

    public static ProfileRewardPointss<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileRewardPointss<T>();
                }
            }
            return instance;
        }
    }

    public ProfileRewardPointss() {
        Reset();
    }

    public ProfileRewardPointss(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileRewardPoints : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string channel_id { get; set; }
    public string profile_id { get; set; }
    public string org_id { get; set; }
    public string data { get; set; }
    public int points { get; set; }

    public ProfileRewardPoints() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (channel_id != null) {
	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	dict = DataUtil.SetDictValue(dict, "points", points);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("channel_id")) {
	    if(dict["channel_id"] != null) {
	    	channel_id = DataType.Instance.FillString(dict["channel_id"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("org_id")) {
	    if(dict["org_id"] != null) {
	    	org_id = DataType.Instance.FillString(dict["org_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("points")) {
	    if(dict["points"] != null) {
	    	points = DataType.Instance.FillInt(dict["points"]);
	    }		
	}
    }
}








