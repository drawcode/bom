using System;

public class ProfileRewards<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileRewards<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_reward-data";

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

    public static ProfileRewards<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileRewards<T>();
                }
            }
            return instance;
        }
    }

    public ProfileRewards() {
        Reset();
    }

    public ProfileRewards(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileReward : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  downloaded { get; set; }
    public  profile_id { get; set; }
    public  blurb { get; set; }
    public  channel_id { get; set; }
    public  reward_id { get; set; }
    public  usage_count { get; set; }
    public  data { get; set; }
    public  viewed { get; set; }

    public ProfileReward() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	dict = DataUtil.SetDictValue(dict, "downloaded", downloaded);
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (blurb != null) {
	    dict = DataUtil.SetDictValue(dict, "blurb", blurb);
	}
	if (channel_id != null) {
	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	}
	if (reward_id != null) {
	    dict = DataUtil.SetDictValue(dict, "reward_id", reward_id);
	}
	if (usage_count != null) {
	    dict = DataUtil.SetDictValue(dict, "usage_count", usage_count);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	dict = DataUtil.SetDictValue(dict, "viewed", viewed);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("downloaded")) {
	    if(dict["downloaded"] != null) {
	    	downloaded = DataType.Instance.Fill(dict["downloaded"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("blurb")) {
	    if(dict["blurb"] != null) {
	    	blurb = DataType.Instance.Fill(dict["blurb"]);
	    }		
	}
	if(dict.ContainsKey("channel_id")) {
	    if(dict["channel_id"] != null) {
	    	channel_id = DataType.Instance.Fill(dict["channel_id"]);
	    }		
	}
	if(dict.ContainsKey("reward_id")) {
	    if(dict["reward_id"] != null) {
	    	reward_id = DataType.Instance.Fill(dict["reward_id"]);
	    }		
	}
	if(dict.ContainsKey("usage_count")) {
	    if(dict["usage_count"] != null) {
	    	usage_count = DataType.Instance.Fill(dict["usage_count"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("viewed")) {
	    if(dict["viewed"] != null) {
	    	viewed = DataType.Instance.Fill(dict["viewed"]);
	    }		
	}
    }
}








