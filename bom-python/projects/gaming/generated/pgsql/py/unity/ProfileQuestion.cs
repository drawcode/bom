using System;

public class ProfileQuestions<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileQuestions<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_question-data";

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

    public static ProfileQuestions<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileQuestions<T>();
                }
            }
            return instance;
        }
    }

    public ProfileQuestions() {
        Reset();
    }

    public ProfileQuestions(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileQuestion : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  profile_id { get; set; }
    public  org_id { get; set; }
    public  channel_id { get; set; }
    public  answer { get; set; }
    public  data { get; set; }
    public  question_id { get; set; }

    public ProfileQuestion() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (org_id != null) {
	    dict = DataUtil.SetDictValue(dict, "org_id", org_id);
	}
	if (channel_id != null) {
	    dict = DataUtil.SetDictValue(dict, "channel_id", channel_id);
	}
	if (answer != null) {
	    dict = DataUtil.SetDictValue(dict, "answer", answer);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (question_id != null) {
	    dict = DataUtil.SetDictValue(dict, "question_id", question_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
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
	if(dict.ContainsKey("channel_id")) {
	    if(dict["channel_id"] != null) {
	    	channel_id = DataType.Instance.Fill(dict["channel_id"]);
	    }		
	}
	if(dict.ContainsKey("answer")) {
	    if(dict["answer"] != null) {
	    	answer = DataType.Instance.Fill(dict["answer"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("question_id")) {
	    if(dict["question_id"] != null) {
	    	question_id = DataType.Instance.Fill(dict["question_id"]);
	    }		
	}
    }
}








