using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace profile.ent {

        public class ProfileAttributeTextResult : BaseObjectResult {
    
        public List<ProfileAttributeText> data = new List<ProfileAttributeText>();

        public ProfileAttributeTextResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileAttributeText> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileAttributeText obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileAttributeText> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileAttributeText objectValue = (ProfileAttributeText)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileAttributeText : BaseEntity {
    
        public ProfileAttributeText() {
	
        }
    
        public int sort { get; set; }
        public int group { get; set; }
        public string profile_id { get; set; }
        public string attribute_id { get; set; }
        public string attribute_value { get; set; }
        public int type { get; set; }
        public int order { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	dict = DataUtil.SetDictValue(dict, "sort", sort);
	    	dict = DataUtil.SetDictValue(dict, "group", group);
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (attribute_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "attribute_id", attribute_id);
	    	}
	    	if (attribute_value != null) {
	    	    dict = DataUtil.SetDictValue(dict, "attribute_value", attribute_value);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "type", type);
	    	dict = DataUtil.SetDictValue(dict, "order", order);
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("sort")) {
	    	    if(dict["sort"] != null) {
	    	    	sort = DataType.Instance.FillInt(dict["sort"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("group")) {
	    	    if(dict["group"] != null) {
	    	    	group = DataType.Instance.FillInt(dict["group"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("attribute_id")) {
	    	    if(dict["attribute_id"] != null) {
	    	    	attribute_id = DataType.Instance.FillString(dict["attribute_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("attribute_value")) {
	    	    if(dict["attribute_value"] != null) {
	    	    	attribute_value = DataType.Instance.FillString(dict["attribute_value"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillInt(dict["type"]);
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





