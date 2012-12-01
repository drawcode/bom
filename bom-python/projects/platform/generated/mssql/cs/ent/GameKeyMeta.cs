using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class GameKeyMetaResult : BaseObjectResult {
    
        public List<GameKeyMeta> data = new List<GameKeyMeta>();

        public GameKeyMetaResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameKeyMeta> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameKeyMeta obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameKeyMeta> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameKeyMeta objectValue = (GameKeyMeta)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameKeyMeta : BaseMeta {
    
        public GameKeyMeta() {
	
        }
    
        public int sort { get; set; }
        public int store_count { get; set; }
        public string level { get; set; }
        public string data { get; set; }
        public string key_level { get; set; }
        public string key_stat { get; set; }
        public string key { get; set; }
        public string game_id { get; set; }
        public string type { get; set; }
        public string order { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "sort", sort);
	    	dict = DataUtil.SetDictValue(dict, "store_count", store_count);
	    	if (level != null) {
	    	    dict = DataUtil.SetDictValue(dict, "level", level);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (key_level != null) {
	    	    dict = DataUtil.SetDictValue(dict, "key_level", key_level);
	    	}
	    	if (key_stat != null) {
	    	    dict = DataUtil.SetDictValue(dict, "key_stat", key_stat);
	    	}
	    	if (key != null) {
	    	    dict = DataUtil.SetDictValue(dict, "key", key);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
	    	if (order != null) {
	    	    dict = DataUtil.SetDictValue(dict, "order", order);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("sort")) {
	    	    if(dict["sort"] != null) {
	    	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("store_count")) {
	    	    if(dict["store_count"] != null) {
	    	    	store_count = DataType.Instance.FillInt(dict["store_count"]);
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
	    	if(dict.ContainsKey("key_level")) {
	    	    if(dict["key_level"] != null) {
	    	    	key_level = DataType.Instance.FillString(dict["key_level"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("key_stat")) {
	    	    if(dict["key_stat"] != null) {
	    	    	key_stat = DataType.Instance.FillString(dict["key_stat"]);
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
	    	if(dict.ContainsKey("order")) {
	    	    if(dict["order"] != null) {
	    	    	order = DataType.Instance.FillString(dict["order"]);
	    	    }		
	    	}
        }
    }
}





