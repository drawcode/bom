using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class GameSessionDataResult : BaseObjectResult {
    
        public List<GameSessionData> data = new List<GameSessionData>();

        public GameSessionDataResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameSessionData> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameSessionData obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameSessionData> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameSessionData objectValue = (GameSessionData)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameSessionData : BaseMeta {
    
        public GameSessionData() {
	
        }
    
        public string data_layer_enemy { get; set; }
        public string data_layer_actors { get; set; }
        public string data_results { get; set; }
        public string data { get; set; }
        public string data_layer_projectile { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (data_layer_enemy != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data_layer_enemy", data_layer_enemy);
	    	}
	    	if (data_layer_actors != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data_layer_actors", data_layer_actors);
	    	}
	    	if (data_results != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data_results", data_results);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
	    	if (data_layer_projectile != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data_layer_projectile", data_layer_projectile);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("data_layer_enemy")) {
	    	    if(dict["data_layer_enemy"] != null) {
	    	    	data_layer_enemy = DataType.Instance.FillString(dict["data_layer_enemy"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data_layer_actors")) {
	    	    if(dict["data_layer_actors"] != null) {
	    	    	data_layer_actors = DataType.Instance.FillString(dict["data_layer_actors"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data_results")) {
	    	    if(dict["data_results"] != null) {
	    	    	data_results = DataType.Instance.FillString(dict["data_results"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data_layer_projectile")) {
	    	    if(dict["data_layer_projectile"] != null) {
	    	    	data_layer_projectile = DataType.Instance.FillString(dict["data_layer_projectile"]);
	    	    }		
	    	}
        }
    }
}





