using System;

public class Videos<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Videos<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "video-data";

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

    public static Videos<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Videos<T>();
                }
            }
            return instance;
        }
    }

    public Videos() {
        Reset();
    }

    public Videos(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Video : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string third_party_oembed { get; set; }
    public string url { get; set; }
    public string third_party_data { get; set; }
    public string data { get; set; }
    public string third_party_url { get; set; }
    public string third_party_id { get; set; }
    public string content_type { get; set; }
    public string external_id { get; set; }

    public Video() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (third_party_oembed != null) {
	    dict = DataUtil.SetDictValue(dict, "third_party_oembed", third_party_oembed);
	}
	if (url != null) {
	    dict = DataUtil.SetDictValue(dict, "url", url);
	}
	if (third_party_data != null) {
	    dict = DataUtil.SetDictValue(dict, "third_party_data", third_party_data);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
	if (third_party_url != null) {
	    dict = DataUtil.SetDictValue(dict, "third_party_url", third_party_url);
	}
	if (third_party_id != null) {
	    dict = DataUtil.SetDictValue(dict, "third_party_id", third_party_id);
	}
	if (content_type != null) {
	    dict = DataUtil.SetDictValue(dict, "content_type", content_type);
	}
	if (external_id != null) {
	    dict = DataUtil.SetDictValue(dict, "external_id", external_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("third_party_oembed")) {
	    if(dict["third_party_oembed"] != null) {
	    	third_party_oembed = DataType.Instance.FillString(dict["third_party_oembed"]);
	    }		
	}
	if(dict.ContainsKey("url")) {
	    if(dict["url"] != null) {
	    	url = DataType.Instance.FillString(dict["url"]);
	    }		
	}
	if(dict.ContainsKey("third_party_data")) {
	    if(dict["third_party_data"] != null) {
	    	third_party_data = DataType.Instance.FillString(dict["third_party_data"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
	if(dict.ContainsKey("third_party_url")) {
	    if(dict["third_party_url"] != null) {
	    	third_party_url = DataType.Instance.FillString(dict["third_party_url"]);
	    }		
	}
	if(dict.ContainsKey("third_party_id")) {
	    if(dict["third_party_id"] != null) {
	    	third_party_id = DataType.Instance.FillString(dict["third_party_id"]);
	    }		
	}
	if(dict.ContainsKey("content_type")) {
	    if(dict["content_type"] != null) {
	    	content_type = DataType.Instance.FillString(dict["content_type"]);
	    }		
	}
	if(dict.ContainsKey("external_id")) {
	    if(dict["external_id"] != null) {
	    	external_id = DataType.Instance.FillString(dict["external_id"]);
	    }		
	}
    }
}








