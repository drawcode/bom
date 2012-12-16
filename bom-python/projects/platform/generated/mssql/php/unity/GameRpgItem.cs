using System;

public class GameRpgItems<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameRpgItems<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_rpg_item-data";

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

    public static GameRpgItems<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameRpgItems<T>();
                }
            }
            return instance;
        }
    }

    public GameRpgItems() {
        Reset();
    }

    public GameRpgItems(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameRpgItem : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string third_party_oembed { get; set; }
    public string url { get; set; }
    public string third_party_data { get; set; }
    public float game_price { get; set; }
    public float game_defense { get; set; }
    public float game_type { get; set; }
    public float game_skill { get; set; }
    public float game_health { get; set; }
    public string third_party_url { get; set; }
    public string third_party_id { get; set; }
    public string content_type { get; set; }
    public string game_id { get; set; }
    public float game_energy { get; set; }
    public string game_data { get; set; }
    public float game_attack { get; set; }

    public GameRpgItem() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    
    public string third_party_oembed { get; set; }
    public string url { get; set; }
    public string third_party_data { get; set; }
    public float game_price { get; set; }
    public float game_defense { get; set; }
    public float game_type { get; set; }
    public float game_skill { get; set; }
    public float game_health { get; set; }
    public string third_party_url { get; set; }
    public string third_party_id { get; set; }
    public string content_type { get; set; }
    public string game_id { get; set; }
    public float game_energy { get; set; }
    public string game_data { get; set; }
    public float game_attack { get; set; }

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
	dict = DataUtil.SetDictValue(dict, "game_price", game_price);
	dict = DataUtil.SetDictValue(dict, "game_defense", game_defense);
	dict = DataUtil.SetDictValue(dict, "game_type", game_type);
	dict = DataUtil.SetDictValue(dict, "game_skill", game_skill);
	dict = DataUtil.SetDictValue(dict, "game_health", game_health);
	if (third_party_url != null) {
	    dict = DataUtil.SetDictValue(dict, "third_party_url", third_party_url);
	}
	if (third_party_id != null) {
	    dict = DataUtil.SetDictValue(dict, "third_party_id", third_party_id);
	}
	if (content_type != null) {
	    dict = DataUtil.SetDictValue(dict, "content_type", content_type);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	dict = DataUtil.SetDictValue(dict, "game_energy", game_energy);
	if (game_data != null) {
	    dict = DataUtil.SetDictValue(dict, "game_data", game_data);
	}
	dict = DataUtil.SetDictValue(dict, "game_attack", game_attack);
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
	if(dict.ContainsKey("game_price")) {
	    if(dict["game_price"] != null) {
	    	game_price = DataType.Instance.FillFloat(dict["game_price"]);
	    }		
	}
	if(dict.ContainsKey("game_defense")) {
	    if(dict["game_defense"] != null) {
	    	game_defense = DataType.Instance.FillFloat(dict["game_defense"]);
	    }		
	}
	if(dict.ContainsKey("game_type")) {
	    if(dict["game_type"] != null) {
	    	game_type = DataType.Instance.FillFloat(dict["game_type"]);
	    }		
	}
	if(dict.ContainsKey("game_skill")) {
	    if(dict["game_skill"] != null) {
	    	game_skill = DataType.Instance.FillFloat(dict["game_skill"]);
	    }		
	}
	if(dict.ContainsKey("game_health")) {
	    if(dict["game_health"] != null) {
	    	game_health = DataType.Instance.FillFloat(dict["game_health"]);
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
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("game_energy")) {
	    if(dict["game_energy"] != null) {
	    	game_energy = DataType.Instance.FillFloat(dict["game_energy"]);
	    }		
	}
	if(dict.ContainsKey("game_data")) {
	    if(dict["game_data"] != null) {
	    	game_data = DataType.Instance.FillString(dict["game_data"]);
	    }		
	}
	if(dict.ContainsKey("game_attack")) {
	    if(dict["game_attack"] != null) {
	    	game_attack = DataType.Instance.FillFloat(dict["game_attack"]);
	    }		
	}
    }
}








