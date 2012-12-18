using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class GameProfileAchievementResult : BaseObjectResult {
    
        public List<GameProfileAchievement> data = new List<GameProfileAchievement>();

        public GameProfileAchievementResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameProfileAchievement> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameProfileAchievement obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameProfileAchievement> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameProfileAchievement objectValue = (GameProfileAchievement)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameProfileAchievement : BaseEntity {
    
        public GameProfileAchievement() {
	
        }
    
        public string username { get; set; }
        public string level { get; set; }
        public string type { get; set; }
        public bool completed { get; set; }
        public string profile_id { get; set; }
        public string key { get; set; }
        public float timestamp { get; set; }
        public string game_id { get; set; }
        public float achievement_value { get; set; }
        public string data { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (username != null) {
	    	    dict = DataUtil.SetDictValue(dict, "username", username);
	    	}
	    	if (level != null) {
	    	    dict = DataUtil.SetDictValue(dict, "level", level);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "completed", completed);
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (key != null) {
	    	    dict = DataUtil.SetDictValue(dict, "key", key);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "achievement_value", achievement_value);
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
	    	if(dict.ContainsKey("level")) {
	    	    if(dict["level"] != null) {
	    	    	level = DataType.Instance.FillString(dict["level"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("completed")) {
	    	    if(dict["completed"] != null) {
	    	    	completed = DataType.Instance.FillBool(dict["completed"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("key")) {
	    	    if(dict["key"] != null) {
	    	    	key = DataType.Instance.FillString(dict["key"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("timestamp")) {
	    	    if(dict["timestamp"] != null) {
	    	    	timestamp = DataType.Instance.FillFloat(dict["timestamp"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("achievement_value")) {
	    	    if(dict["achievement_value"] != null) {
	    	    	achievement_value = DataType.Instance.FillFloat(dict["achievement_value"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
        }
    }
}





