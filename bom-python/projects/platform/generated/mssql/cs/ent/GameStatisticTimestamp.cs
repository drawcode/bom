using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class GameStatisticTimestampResult : BaseObjectResult {
    
        public List<GameStatisticTimestamp> data = new List<GameStatisticTimestamp>();

        public GameStatisticTimestampResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameStatisticTimestamp> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameStatisticTimestamp obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameStatisticTimestamp> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameStatisticTimestamp objectValue = (GameStatisticTimestamp)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameStatisticTimestamp : BaseEntity {
    
        public GameStatisticTimestamp() {
	
        }
    
        public string game_id { get; set; }
        public string profile_id { get; set; }
        public string key { get; set; }
        public DateTime timestamp { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (key != null) {
	    	    dict = DataUtil.SetDictValue(dict, "key", key);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "timestamp", timestamp);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
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
	    	    	timestamp = DataType.Instance.FillDateTime(dict["timestamp"]);
	    	    }		
	    	}
        }
    }
}





