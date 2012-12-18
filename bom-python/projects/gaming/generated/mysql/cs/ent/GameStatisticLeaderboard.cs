using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class GameStatisticLeaderboardResult : BaseObjectResult {
    
        public List<GameStatisticLeaderboard> data = new List<GameStatisticLeaderboard>();

        public GameStatisticLeaderboardResult() {
            Reset();
        }

        public override void Reset() {
            base.Reset();
        }
        
        public override Dictionary<string, object> ToDictionary() {
            Dictionary<string, object> dict = base.ToDictionary();

            if (data != null) {
                dict.Add("data", GetListDict(data));
            }

            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict) {

            base.FillFromDictionary(dict);

            if (dict.ContainsKey("data")) {
                if (dict["data"] != null) {
                    data = GetList((List<Dictionary<string, object>>)dict["data"]);
                }
            }
        }

        public List<Dictionary<string, object>> GetListDict(List<GameStatisticLeaderboard> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameStatisticLeaderboard obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameStatisticLeaderboard> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameStatisticLeaderboard objectValue = (GameStatisticLeaderboard)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameStatisticLeaderboard : BaseEntity {
    
        public GameStatisticLeaderboard() {
	
        }
    
        public string username { get; set; }
        public int rank_change { get; set; }
        public float timestamp { get; set; }
        public string level { get; set; }
        public string stat_value_formatted { get; set; }
        public string profile_id { get; set; }
        public int rank_total_count { get; set; }
        public int rank { get; set; }
        public string key { get; set; }
        public string type { get; set; }
        public string game_id { get; set; }
        public string data { get; set; }
        public float stat_value { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (username != null) {
	    	    dict = DataUtil.SetDictValue(dict, "username", username);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "rank_change", rank_change);
	    	dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
	    	if (level != null) {
	    	    dict = DataUtil.SetDictValue(dict, "level", level);
	    	}
	    	if (stat_value_formatted != null) {
	    	    dict = DataUtil.SetDictValue(dict, "stat_value_formatted", stat_value_formatted);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "rank_total_count", rank_total_count);
	    	dict = DataUtil.SetDictValue(dict, "rank", rank);
	    	if (key != null) {
	    	    dict = DataUtil.SetDictValue(dict, "key", key);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "stat_value", stat_value);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("username")) {
	    	    if(dict["username"] != null) {
	    	    	username = DataType.Instance.FillString(dict["username"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("rank_change")) {
	    	    if(dict["rank_change"] != null) {
	    	    	rank_change = DataType.Instance.FillInt(dict["rank_change"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("timestamp")) {
	    	    if(dict["timestamp"] != null) {
	    	    	timestamp = DataType.Instance.FillFloat(dict["timestamp"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("level")) {
	    	    if(dict["level"] != null) {
	    	    	level = DataType.Instance.FillString(dict["level"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("stat_value_formatted")) {
	    	    if(dict["stat_value_formatted"] != null) {
	    	    	stat_value_formatted = DataType.Instance.FillString(dict["stat_value_formatted"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("rank_total_count")) {
	    	    if(dict["rank_total_count"] != null) {
	    	    	rank_total_count = DataType.Instance.FillInt(dict["rank_total_count"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("rank")) {
	    	    if(dict["rank"] != null) {
	    	    	rank = DataType.Instance.FillInt(dict["rank"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("key")) {
	    	    if(dict["key"] != null) {
	    	    	key = DataType.Instance.FillString(dict["key"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
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
	    	if(dict.ContainsKey("stat_value")) {
	    	    if(dict["stat_value"] != null) {
	    	    	stat_value = DataType.Instance.FillFloat(dict["stat_value"]);
	    	    }		
	    	}
        }
    }
}





