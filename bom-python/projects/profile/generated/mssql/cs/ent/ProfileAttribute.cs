using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace profile.ent {

        public class ProfileAttributeResult : BaseObjectResult {
    
        public List<ProfileAttribute> data = new List<ProfileAttribute>();

        public ProfileAttributeResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileAttribute> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileAttribute obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileAttribute> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileAttribute objectValue = (ProfileAttribute)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileAttribute : BaseMeta {
    
        public ProfileAttribute() {
	
        }
    
        public int sort { get; set; }
        public int type { get; set; }
        public int group { get; set; }
        public int order { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "sort", sort);
	    	dict = DataUtil.SetDictValue(dict, "type", type);
	    	dict = DataUtil.SetDictValue(dict, "group", group);
	    	dict = DataUtil.SetDictValue(dict, "order", order);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("sort")) {
	    	    if(dict["sort"] != null) {
	    	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillInt(dict["type"]);
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
        }
    }
}





