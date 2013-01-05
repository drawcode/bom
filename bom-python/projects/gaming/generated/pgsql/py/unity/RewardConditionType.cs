using System;

public class RewardConditionTypes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile RewardConditionTypes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "reward_condition_type-data";

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

    public static RewardConditionTypes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new RewardConditionTypes<T>();
                }
            }
            return instance;
        }
    }

    public RewardConditionTypes() {
        Reset();
    }

    public RewardConditionTypes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class RewardConditionType : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  data { get; set; }
    public  type { get; set; }

    public RewardConditionType() {
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
	if (type != null) {
	    dict = DataUtil.SetDictValue(dict, "type", type);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("type")) {
	    if(dict["type"] != null) {
	    	type = DataType.Instance.Fill(dict["type"]);
	    }		
	}
    }
}








