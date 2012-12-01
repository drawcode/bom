using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class OfferCategoryTreeResult : BaseObjectResult {
    
        public List<OfferCategoryTree> data = new List<OfferCategoryTree>();

        public OfferCategoryTreeResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<OfferCategoryTree> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (OfferCategoryTree obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<OfferCategoryTree> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    OfferCategoryTree objectValue = (OfferCategoryTree)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class OfferCategoryTree : BaseEntity {
    
        public OfferCategoryTree() {
	
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





