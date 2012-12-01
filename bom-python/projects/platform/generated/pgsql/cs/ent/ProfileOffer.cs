using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class ProfileOfferResult : BaseObjectResult {
    
        public List<ProfileOffer> data = new List<ProfileOffer>();

        public ProfileOfferResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<ProfileOffer> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (ProfileOffer obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<ProfileOffer> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    ProfileOffer objectValue = (ProfileOffer)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class ProfileOffer : BaseEntity {
    
        public ProfileOffer() {
	
        }
    
        public string redeem_code { get; set; }
        public string url { get; set; }
        public string offer_id { get; set; }
        public string profile_id { get; set; }
        public string redeemed { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (redeem_code != null) {
	    	    dict = DataUtil.SetDictValue(dict, "redeem_code", redeem_code);
	    	}
	    	if (url != null) {
	    	    dict = DataUtil.SetDictValue(dict, "url", url);
	    	}
	    	if (offer_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "offer_id", offer_id);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (redeemed != null) {
	    	    dict = DataUtil.SetDictValue(dict, "redeemed", redeemed);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("redeem_code")) {
	    	    if(dict["redeem_code"] != null) {
	    	    	redeem_code = DataType.Instance.FillString(dict["redeem_code"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("url")) {
	    	    if(dict["url"] != null) {
	    	    	url = DataType.Instance.FillString(dict["url"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("offer_id")) {
	    	    if(dict["offer_id"] != null) {
	    	    	offer_id = DataType.Instance.FillString(dict["offer_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("redeemed")) {
	    	    if(dict["redeemed"] != null) {
	    	    	redeemed = DataType.Instance.FillString(dict["redeemed"]);
	    	    }		
	    	}
        }
    }
}





