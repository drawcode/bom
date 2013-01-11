using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class GameAttributeResult : BaseObjectResult {
    
        public List<GameAttribute> data = new List<GameAttribute>();

        public GameAttributeResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameAttribute> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameAttribute obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameAttribute> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameAttribute objectValue = (GameAttribute)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameAttribute : BaseMeta {
    
        public GameAttribute() {
	
        }
    
        public int sort { get; set; }
        public string game_id { get; set; }
        public int group { get; set; }
        public int order { get; set; }
        public int type { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "sort", sort);
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "group", group);
	    	dict = DataUtil.SetDictValue(dict, "order", order);
	    	dict = DataUtil.SetDictValue(dict, "type", type);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("sort")) {
	    	    if(dict["sort"] != null) {
	    	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("group")) {
	    	    if(dict["group"] != null) {
	    	    	group = DataType.Instance.FillInt(dict["group"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("order")) {
	    	    if(dict["order"] != null) {
	    	    	order = DataType.Instance.FillInt(dict["order"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillInt(dict["type"]);
	    	    }		
	    	}
        }
    }
}





