using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class GameProductResult : BaseObjectResult {
    
        public List<GameProduct> data = new List<GameProduct>();

        public GameProductResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameProduct> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameProduct obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameProduct> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameProduct objectValue = (GameProduct)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameProduct : BaseMeta {
    
        public GameProduct() {
	
        }
    
        public string url { get; set; }
        public string game_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "url", url);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("url")) {
	    	    if(dict["url"] != null) {
	    	    	url = DataType.Instance.FillString(dict["url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    	    }		
	    	}
        }
    }
}





