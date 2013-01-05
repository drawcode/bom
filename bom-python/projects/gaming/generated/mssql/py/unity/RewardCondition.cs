using System;

public class RewardConditions<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile RewardConditions<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "reward_condition-data";

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

    public static RewardConditions<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new RewardConditions<T>();
                }
            }
            return instance;
        }
    }

    public RewardConditions() {
        Reset();
    }

    public RewardConditions(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class RewardCondition : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  end_date { get; set; }
    public  data { get; set; }
    public  org_id { get; set; }
    public  channel_id { get; set; }
    public  amount { get; set; }
    public  reward_id { get; set; }
    public  global_reward { get; set; }
    public  type { get; set; }
    public  start_date { get; set; }
    public  condition { get; set; }

    public RewardCondition() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	dict = DataUtil.SetDictValue(dict, "end_date", end_date);
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	if (channel_id != null) {
	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	}
	if (amount != null) {
	    dict = DataUtil.SetDictValue(dict, "amount", amount);
	}
	if (reward_id != null) {
	    dict = DataUtil.SetDictValue(dict, "reward_id", reward_id);
	}
	dict = DataUtil.SetDictValue(dict, "global_reward", global_reward);
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
	dict = DataUtil.SetDictValue(dict, "start_date", start_date);
	if (condition != null) {
	    dict = DataUtil.SetDictValue(dict, "condition", condition);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("end_date")) {
	    if(dict["end_date"] != null) {
	    	end_date = DataType.Instance.Fill(dict["end_date"]);
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
	if(dict.ContainsKey("channel_id")) {
	    if(dict["channel_id"] != null) {
	    	channel_id = DataType.Instance.Fill(dict["channel_id"]);
	    }		
	}
	if(dict.ContainsKey("amount")) {
	    if(dict["amount"] != null) {
	    	amount = DataType.Instance.Fill(dict["amount"]);
	    }		
	}
	if(dict.ContainsKey("reward_id")) {
	    if(dict["reward_id"] != null) {
	    	reward_id = DataType.Instance.Fill(dict["reward_id"]);
	    }		
	}
	if(dict.ContainsKey("global_reward")) {
	    if(dict["global_reward"] != null) {
	    	global_reward = DataType.Instance.Fill(dict["global_reward"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.Fill(dict["type"]);
	    }		
	}
	if(dict.ContainsKey("start_date")) {
	    if(dict["start_date"] != null) {
	    	start_date = DataType.Instance.Fill(dict["start_date"]);
	    }		
	}
	if(dict.ContainsKey("condition")) {
	    if(dict["condition"] != null) {
	    	condition = DataType.Instance.Fill(dict["condition"]);
	    }		
	}
    }
}








