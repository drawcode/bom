using System;

public class GameProfileContents<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameProfileContents<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_profile_content-data";

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

    public static GameProfileContents<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameProfileContents<T>();
                }
            }
            return instance;
        }
    }

    public GameProfileContents() {
        Reset();
    }

    public GameProfileContents(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameProfileContent : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string username { get; set; }
    public string hash { get; set; }
    public string content_type { get; set; }
    public string extension { get; set; }
    public string source { get; set; }
    public string profile_id { get; set; }
    public string filename { get; set; }
    public string platform { get; set; }
    public string version { get; set; }
    public int increment { get; set; }
    public string game_network { get; set; }
    public string game_id { get; set; }
    public string path { get; set; }
    public string data { get; set; }

    public GameProfileContent() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string username { get; set; }
    public string hash { get; set; }
    public string content_type { get; set; }
    public string extension { get; set; }
    public string source { get; set; }
    public string profile_id { get; set; }
    public string filename { get; set; }
    public string platform { get; set; }
    public string version { get; set; }
    public int increment { get; set; }
    public string game_network { get; set; }
    public string game_id { get; set; }
    public string path { get; set; }
    public string data { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (username != null) {
	    dict = DataUtil.SetDictValue(dict, "username", username);
	}
	if (hash != null) {
	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	}
	if (content_type != null) {
	    dict = DataUtil.SetDictValue(dict, "content_type", content_type);
	}
	if (extension != null) {
	    dict = DataUtil.SetDictValue(dict, "extension", extension);
	}
	if (source != null) {
	    dict = DataUtil.SetDictValue(dict, "source", source);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (filename != null) {
	    dict = DataUtil.SetDictValue(dict, "filename", filename);
	}
	if (platform != null) {
	    dict = DataUtil.SetDictValue(dict, "platform", platform);
	}
	if (version != null) {
	    dict = DataUtil.SetDictValue(dict, "version", version);
	}
	dict = DataUtil.SetDictValue(dict, "increment", increment);
	if (game_network != null) {
	    dict = DataUtil.SetDictValue(dict, "game_network", game_network);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (path != null) {
	    dict = DataUtil.SetDictValue(dict, "path", path);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("username")) {
	    if(dict["username"] != null) {
	    	username = DataType.Instance.FillString(dict["username"]);
	    }		
	}
	if(dict.ContainsKey("hash")) {
	    if(dict["hash"] != null) {
	    	hash = DataType.Instance.FillString(dict["hash"]);
	    }		
	}
	if(dict.ContainsKey("content_type")) {
	    if(dict["content_type"] != null) {
	    	content_type = DataType.Instance.FillString(dict["content_type"]);
	    }		
	}
	if(dict.ContainsKey("extension")) {
	    if(dict["extension"] != null) {
	    	extension = DataType.Instance.FillString(dict["extension"]);
	    }		
	}
	if(dict.ContainsKey("source")) {
	    if(dict["source"] != null) {
	    	source = DataType.Instance.FillString(dict["source"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("filename")) {
	    if(dict["filename"] != null) {
	    	filename = DataType.Instance.FillString(dict["filename"]);
	    }		
	}
	if(dict.ContainsKey("platform")) {
	    if(dict["platform"] != null) {
	    	platform = DataType.Instance.FillString(dict["platform"]);
	    }		
	}
	if(dict.ContainsKey("version")) {
	    if(dict["version"] != null) {
	    	version = DataType.Instance.FillString(dict["version"]);
	    }		
	}
	if(dict.ContainsKey("increment")) {
	    if(dict["increment"] != null) {
	    	increment = DataType.Instance.FillInt(dict["increment"]);
	    }		
	}
	if(dict.ContainsKey("game_network")) {
	    if(dict["game_network"] != null) {
	    	game_network = DataType.Instance.FillString(dict["game_network"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("path")) {
	    if(dict["path"] != null) {
	    	path = DataType.Instance.FillString(dict["path"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
    }
}








