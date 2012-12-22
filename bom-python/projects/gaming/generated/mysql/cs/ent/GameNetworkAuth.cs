using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class GameNetworkAuthResult : BaseObjectResult {
    
        public List<GameNetworkAuth> data = new List<GameNetworkAuth>();

        public GameNetworkAuthResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameNetworkAuth> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameNetworkAuth obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameNetworkAuth> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameNetworkAuth objectValue = (GameNetworkAuth)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameNetworkAuth : BaseMeta {
    
        public GameNetworkAuth() {
	
        }
    
        public string url { get; set; }
        public string data { get; set; }
        public string app_id { get; set; }
        public string game_network_id { get; set; }
        public string secret { get; set; }
        public string game_id { get; set; }
        public string type { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "url", url);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (app_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	    	}
	    	if (game_network_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_network_id", game_network_id);
	    	}
	    	if (secret != null) {
	    	    dict = DataUtil.SetDictValue(dict, "secret", secret);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("url")) {
	    	    if(dict["url"] != null) {
	    	    	url = DataType.Instance.FillString(dict["url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("app_id")) {
	    	    if(dict["app_id"] != null) {
	    	    	app_id = DataType.Instance.FillString(dict["app_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_network_id")) {
	    	    if(dict["game_network_id"] != null) {
	    	    	game_network_id = DataType.Instance.FillString(dict["game_network_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("secret")) {
	    	    if(dict["secret"] != null) {
	    	    	secret = DataType.Instance.FillString(dict["secret"]);
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
        }
    }
}





