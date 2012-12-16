using System;

public class GameContents<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameContents<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_content-data";

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

    public static GameContents<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameContents<T>();
                }
            }
            return instance;
        }
    }

    public GameContents() {
        Reset();
    }

    public GameContents(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameContent : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string hash { get; set; }
    public string content_type { get; set; }
    public string extension { get; set; }
    public string source { get; set; }
    public string filename { get; set; }
    public string platform { get; set; }
    public string version { get; set; }
    public int increment { get; set; }
    public string path { get; set; }
    public string game_id { get; set; }
    public string data { get; set; }

    public GameContent() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string hash { get; set; }
    public string content_type { get; set; }
    public string extension { get; set; }
    public string source { get; set; }
    public string filename { get; set; }
    public string platform { get; set; }
    public string version { get; set; }
    public int increment { get; set; }
    public string path { get; set; }
    public string game_id { get; set; }
    public string data { get; set; }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
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
	if (path != null) {
	    dict = DataUtil.SetDictValue(dict, "path", path);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (data != null) {
	    dict = DataUtil.SetDictValue(dict, "data", data);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
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
	if(dict.ContainsKey("path")) {
	    if(dict["path"] != null) {
	    	path = DataType.Instance.FillString(dict["path"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.FillString(dict["data"]);
	    }		
	}
    }
}








