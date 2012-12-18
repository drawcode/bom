using System;

public class ProfileGameNetworks<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ProfileGameNetworks<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "profile_game_network-data";

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

    public static ProfileGameNetworks<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ProfileGameNetworks<T>();
                }
            }
            return instance;
        }
    }

    public ProfileGameNetworks() {
        Reset();
    }

    public ProfileGameNetworks(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ProfileGameNetwork : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  hash { get; set; }
    public  profile_id { get; set; }
    public  token { get; set; }
    public  game_network_id { get; set; }
    public  secret { get; set; }
    public  network_username { get; set; }
    public  game_id { get; set; }

    public ProfileGameNetwork() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (hash != null) {
	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (token != null) {
	    dict = DataUtil.SetDictValue(dict, "token", token);
	}
	if (game_network_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_network_id", game_network_id);
	}
	if (secret != null) {
	    dict = DataUtil.SetDictValue(dict, "secret", secret);
	}
	if (network_username != null) {
	    dict = DataUtil.SetDictValue(dict, "network_username", network_username);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("hash")) {
	    if(dict["hash"] != null) {
	    	hash = DataType.Instance.Fill(dict["hash"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("token")) {
	    if(dict["token"] != null) {
	    	token = DataType.Instance.Fill(dict["token"]);
	    }		
	}
	if(dict.ContainsKey("game_network_id")) {
	    if(dict["game_network_id"] != null) {
	    	game_network_id = DataType.Instance.Fill(dict["game_network_id"]);
	    }		
	}
	if(dict.ContainsKey("secret")) {
	    if(dict["secret"] != null) {
	    	secret = DataType.Instance.Fill(dict["secret"]);
	    }		
	}
	if(dict.ContainsKey("network_username")) {
	    if(dict["network_username"] != null) {
	    	network_username = DataType.Instance.Fill(dict["network_username"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
    }
}








