using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class GameAchievementMetaResult : BaseObjectResult {
    
        public List<GameAchievementMeta> data = new List<GameAchievementMeta>();

        public GameAchievementMetaResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameAchievementMeta> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameAchievementMeta obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameAchievementMeta> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameAchievementMeta objectValue = (GameAchievementMeta)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameAchievementMeta : BaseMeta {
    
        public GameAchievementMeta() {
	
        }
    
        public int sort { get; set; }
        public bool game_stat { get; set; }
        public string level { get; set; }
        public string data { get; set; }
        public int points { get; set; }
        public string key { get; set; }
        public string game_id { get; set; }
        public string type { get; set; }
        public bool leaderboard { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "sort", sort);
	    	dict = DataUtil.SetDictValue(dict, "game_stat", game_stat);
	    	if (level != null) {
	    	    dict = DataUtil.SetDictValue(dict, "level", level);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "points", points);
	    	if (key != null) {
	    	    dict = DataUtil.SetDictValue(dict, "key", key);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "leaderboard", leaderboard);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("sort")) {
	    	    if(dict["sort"] != null) {
	    	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_stat")) {
	    	    if(dict["game_stat"] != null) {
	    	    	game_stat = DataType.Instance.FillBool(dict["game_stat"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("level")) {
	    	    if(dict["level"] != null) {
	    	    	level = DataType.Instance.FillString(dict["level"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("points")) {
	    	    if(dict["points"] != null) {
	    	    	points = DataType.Instance.FillInt(dict["points"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("key")) {
	    	    if(dict["key"] != null) {
	    	    	key = DataType.Instance.FillString(dict["key"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("leaderboard")) {
	    	    if(dict["leaderboard"] != null) {
	    	    	leaderboard = DataType.Instance.FillBool(dict["leaderboard"]);
	    	    }		
	    	}
        }
    }
}





