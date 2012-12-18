using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class GameRpgItemResult : BaseObjectResult {
    
        public List<GameRpgItem> data = new List<GameRpgItem>();

        public GameRpgItemResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameRpgItem> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameRpgItem obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameRpgItem> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameRpgItem objectValue = (GameRpgItem)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameRpgItem : BaseMeta {
    
        public GameRpgItem() {
	
        }
    
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
}





