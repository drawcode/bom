using System;

public class GameSessions<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameSessions<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_session-data";

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

    public static GameSessions<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameSessions<T>();
                }
            }
            return instance;
        }
    }

    public GameSessions() {
        Reset();
    }

    public GameSessions(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameSession : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  network_uuid { get; set; }
    public  profile_id { get; set; }
    public  game_area { get; set; }
    public  profile_network { get; set; }
    public  profile_device { get; set; }
    public  game_level { get; set; }
    public  network_external_port { get; set; }
    public  game_players_connected { get; set; }
    public  game_state { get; set; }
    public  hash { get; set; }
    public  network_external_ip { get; set; }
    public  profile_username { get; set; }
    public  game_id { get; set; }
    public  game_code { get; set; }
    public  game_player_z { get; set; }
    public  game_player_x { get; set; }
    public  game_player_y { get; set; }
    public  network_port { get; set; }
    public  game_players_allowed { get; set; }
    public  game_type { get; set; }
    public  network_ip { get; set; }
    public  network_use_nat { get; set; }

    public GameSession() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (network_uuid != null) {
	    dict = DataUtil.SetDictValue(dict, "network_uuid", network_uuid);
	}
	if (profile_id != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	}
	if (game_area != null) {
	    dict = DataUtil.SetDictValue(dict, "game_area", game_area);
	}
	if (profile_network != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_network", profile_network);
	}
	if (profile_device != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_device", profile_device);
	}
	if (game_level != null) {
	    dict = DataUtil.SetDictValue(dict, "game_level", game_level);
	}
	if (network_external_port != null) {
	    dict = DataUtil.SetDictValue(dict, "network_external_port", network_external_port);
	}
	if (game_players_connected != null) {
	    dict = DataUtil.SetDictValue(dict, "game_players_connected", game_players_connected);
	}
	if (game_state != null) {
	    dict = DataUtil.SetDictValue(dict, "game_state", game_state);
	}
	if (hash != null) {
	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	}
	if (network_external_ip != null) {
	    dict = DataUtil.SetDictValue(dict, "network_external_ip", network_external_ip);
	}
	if (profile_username != null) {
	    dict = DataUtil.SetDictValue(dict, "profile_username", profile_username);
	}
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (game_code != null) {
	    dict = DataUtil.SetDictValue(dict, "game_code", game_code);
	}
	if (game_player_z != null) {
	    dict = DataUtil.SetDictValue(dict, "game_player_z", game_player_z);
	}
	if (game_player_x != null) {
	    dict = DataUtil.SetDictValue(dict, "game_player_x", game_player_x);
	}
	if (game_player_y != null) {
	    dict = DataUtil.SetDictValue(dict, "game_player_y", game_player_y);
	}
	if (network_port != null) {
	    dict = DataUtil.SetDictValue(dict, "network_port", network_port);
	}
	if (game_players_allowed != null) {
	    dict = DataUtil.SetDictValue(dict, "game_players_allowed", game_players_allowed);
	}
	if (game_type != null) {
	    dict = DataUtil.SetDictValue(dict, "game_type", game_type);
	}
	if (network_ip != null) {
	    dict = DataUtil.SetDictValue(dict, "network_ip", network_ip);
	}
	dict = DataUtil.SetDictValue(dict, "network_use_nat", network_use_nat);
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("network_uuid")) {
	    if(dict["network_uuid"] != null) {
	    	network_uuid = DataType.Instance.Fill(dict["network_uuid"]);
	    }		
	}
	if(dict.ContainsKey("profile_id")) {
	    if(dict["profile_id"] != null) {
	    	profile_id = DataType.Instance.Fill(dict["profile_id"]);
	    }		
	}
	if(dict.ContainsKey("game_area")) {
	    if(dict["game_area"] != null) {
	    	game_area = DataType.Instance.Fill(dict["game_area"]);
	    }		
	}
	if(dict.ContainsKey("profile_network")) {
	    if(dict["profile_network"] != null) {
	    	profile_network = DataType.Instance.Fill(dict["profile_network"]);
	    }		
	}
	if(dict.ContainsKey("profile_device")) {
	    if(dict["profile_device"] != null) {
	    	profile_device = DataType.Instance.Fill(dict["profile_device"]);
	    }		
	}
	if(dict.ContainsKey("game_level")) {
	    if(dict["game_level"] != null) {
	    	game_level = DataType.Instance.Fill(dict["game_level"]);
	    }		
	}
	if(dict.ContainsKey("network_external_port")) {
	    if(dict["network_external_port"] != null) {
	    	network_external_port = DataType.Instance.Fill(dict["network_external_port"]);
	    }		
	}
	if(dict.ContainsKey("game_players_connected")) {
	    if(dict["game_players_connected"] != null) {
	    	game_players_connected = DataType.Instance.Fill(dict["game_players_connected"]);
	    }		
	}
	if(dict.ContainsKey("game_state")) {
	    if(dict["game_state"] != null) {
	    	game_state = DataType.Instance.Fill(dict["game_state"]);
	    }		
	}
	if(dict.ContainsKey("hash")) {
	    if(dict["hash"] != null) {
	    	hash = DataType.Instance.Fill(dict["hash"]);
	    }		
	}
	if(dict.ContainsKey("network_external_ip")) {
	    if(dict["network_external_ip"] != null) {
	    	network_external_ip = DataType.Instance.Fill(dict["network_external_ip"]);
	    }		
	}
	if(dict.ContainsKey("profile_username")) {
	    if(dict["profile_username"] != null) {
	    	profile_username = DataType.Instance.Fill(dict["profile_username"]);
	    }		
	}
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("game_code")) {
	    if(dict["game_code"] != null) {
	    	game_code = DataType.Instance.Fill(dict["game_code"]);
	    }		
	}
	if(dict.ContainsKey("game_player_z")) {
	    if(dict["game_player_z"] != null) {
	    	game_player_z = DataType.Instance.Fill(dict["game_player_z"]);
	    }		
	}
	if(dict.ContainsKey("game_player_x")) {
	    if(dict["game_player_x"] != null) {
	    	game_player_x = DataType.Instance.Fill(dict["game_player_x"]);
	    }		
	}
	if(dict.ContainsKey("game_player_y")) {
	    if(dict["game_player_y"] != null) {
	    	game_player_y = DataType.Instance.Fill(dict["game_player_y"]);
	    }		
	}
	if(dict.ContainsKey("network_port")) {
	    if(dict["network_port"] != null) {
	    	network_port = DataType.Instance.Fill(dict["network_port"]);
	    }		
	}
	if(dict.ContainsKey("game_players_allowed")) {
	    if(dict["game_players_allowed"] != null) {
	    	game_players_allowed = DataType.Instance.Fill(dict["game_players_allowed"]);
	    }		
	}
	if(dict.ContainsKey("game_type")) {
	    if(dict["game_type"] != null) {
	    	game_type = DataType.Instance.Fill(dict["game_type"]);
	    }		
	}
	if(dict.ContainsKey("network_ip")) {
	    if(dict["network_ip"] != null) {
	    	network_ip = DataType.Instance.Fill(dict["network_ip"]);
	    }		
	}
	if(dict.ContainsKey("network_use_nat")) {
	    if(dict["network_use_nat"] != null) {
	    	network_use_nat = DataType.Instance.Fill(dict["network_use_nat"]);
	    }		
	}
    }
}








