using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class GameLiveQueueResult : BaseObjectResult {
    
        public List<GameLiveQueue> data = new List<GameLiveQueue>();

        public GameLiveQueueResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameLiveQueue> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameLiveQueue obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameLiveQueue> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameLiveQueue objectValue = (GameLiveQueue)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameLiveQueue : BaseEntity {
    
        public GameLiveQueue() {
	
        }
    
        public string game_id { get; set; }
        public string profile_id { get; set; }
        public string data_stat { get; set; }
        public string data_ad { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (data_stat != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data_stat", data_stat);
	    	}
	    	if (data_ad != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data_ad", data_ad);
	    	}
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
	    	if(dict.ContainsKey("data_stat")) {
	    	    if(dict["data_stat"] != null) {
	    	    	data_stat = DataType.Instance.FillString(dict["data_stat"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data_ad")) {
	    	    if(dict["data_ad"] != null) {
	    	    	data_ad = DataType.Instance.FillString(dict["data_ad"]);
	    	    }		
	    	}
        }
    }
}





