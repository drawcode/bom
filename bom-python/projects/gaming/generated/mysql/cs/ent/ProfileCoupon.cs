using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace gaming.ent {

        public class ProfileCouponResult : BaseObjectResult {
    
        public List<ProfileCoupon> data = new List<ProfileCoupon>();

        public ProfileCouponResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileCoupon> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileCoupon obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileCoupon> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileCoupon objectValue = (ProfileCoupon)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileCoupon : BaseMeta {
    
        public ProfileCoupon() {
	
        }
    
        public string url { get; set; }
        public string profile_id { get; set; }
        public string data { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "url", url);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("url")) {
	    	    if(dict["url"] != null) {
	    	    	url = DataType.Instance.FillString(dict["url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("data")) {
	    	    if(dict["data"] != null) {
	    	    	data = DataType.Instance.FillString(dict["data"]);
	    	    }		
	    	}
        }
    }
}





