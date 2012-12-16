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
    public  hash { get; set; }
    public  content_type { get; set; }
    public  extension { get; set; }
    public  source { get; set; }
    public  filename { get; set; }
    public  platform { get; set; }
    public  version { get; set; }
    public  increment { get; set; }
    public  path { get; set; }
    public  game_id { get; set; }
    public  data { get; set; }

    public GameContent() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public  hash { get; set; }
    public  content_type { get; set; }
    public  extension { get; set; }
    public  source { get; set; }
    public  filename { get; set; }
    public  platform { get; set; }
    public  version { get; set; }
    public  increment { get; set; }
    public  path { get; set; }
    public  game_id { get; set; }
    public  data { get; set; }

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
	if (increment != null) {
	    dict = DataUtil.SetDictValue(dict, "increment", increment);
	}
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
	    	hash = DataType.Instance.Fill(dict["hash"]);
	    }		
	}
	if(dict.ContainsKey("content_type")) {
	    if(dict["content_type"] != null) {
	    	content_type = DataType.Instance.Fill(dict["content_type"]);
	    }		
	}
	if(dict.ContainsKey("extension")) {
	    if(dict["extension"] != null) {
	    	extension = DataType.Instance.Fill(dict["extension"]);
	    }		
	}
	if(dict.ContainsKey("source")) {
	    if(dict["source"] != null) {
	    	source = DataType.Instance.Fill(dict["source"]);
	    }		
	}
	if(dict.ContainsKey("filename")) {
	    if(dict["filename"] != null) {
	    	filename = DataType.Instance.Fill(dict["filename"]);
	    }		
	}
	if(dict.ContainsKey("platform")) {
	    if(dict["platform"] != null) {
	    	platform = DataType.Instance.Fill(dict["platform"]);
	    }		
	}
	if(dict.ContainsKey("version")) {
	    if(dict["version"] != null) {
	    	version = DataType.Instance.Fill(dict["version"]);
	    }		
	}
	if(dict.ContainsKey("increment")) {
	    if(dict["increment"] != null) {
	    	increment = DataType.Instance.Fill(dict["increment"]);
	    }		
	}
	if(dict.ContainsKey("path")) {
	    if(dict["path"] != null) {
	    	path = DataType.Instance.Fill(dict["path"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("data")) {
	    if(dict["data"] != null) {
	    	data = DataType.Instance.Fill(dict["data"]);
	    }		
	}
    }
}








