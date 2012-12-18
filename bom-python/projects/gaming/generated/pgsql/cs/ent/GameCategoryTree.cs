using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class GameCategoryTreeResult : BaseObjectResult {
    
        public List<GameCategoryTree> data = new List<GameCategoryTree>();

        public GameCategoryTreeResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameCategoryTree> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameCategoryTree obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameCategoryTree> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameCategoryTree objectValue = (GameCategoryTree)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameCategoryTree : BaseEntity {
    
        public GameCategoryTree() {
	
        }
    
        public string parent_id { get; set; }
        public string category_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (parent_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "parent_id", parent_id);
	    	}
	    	if (category_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "category_id", category_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("parent_id")) {
	    	    if(dict["parent_id"] != null) {
	    	    	parent_id = DataType.Instance.FillString(dict["parent_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("category_id")) {
	    	    if(dict["category_id"] != null) {
	    	    	category_id = DataType.Instance.FillString(dict["category_id"]);
	    	    }		
	    	}
        }
    }
}





