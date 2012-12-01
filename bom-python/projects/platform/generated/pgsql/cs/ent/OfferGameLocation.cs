using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class OfferGameLocationResult : BaseObjectResult {
    
        public List<OfferGameLocation> data = new List<OfferGameLocation>();

        public OfferGameLocationResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<OfferGameLocation> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (OfferGameLocation obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<OfferGameLocation> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    OfferGameLocation objectValue = (OfferGameLocation)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class OfferGameLocation : BaseEntity {
    
        public OfferGameLocation() {
	
        }
    
        public string game_location_id { get; set; }
        public string offer_id { get; set; }
        public string type_id { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (game_location_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_location_id", game_location_id);
	    	}
	    	if (offer_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "offer_id", offer_id);
	    	}
	    	if (type_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type_id", type_id);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("game_location_id")) {
	    	    if(dict["game_location_id"] != null) {
	    	    	game_location_id = DataType.Instance.FillString(dict["game_location_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("offer_id")) {
	    	    if(dict["offer_id"] != null) {
	    	    	offer_id = DataType.Instance.FillString(dict["offer_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type_id")) {
	    	    if(dict["type_id"] != null) {
	    	    	type_id = DataType.Instance.FillString(dict["type_id"]);
	    	    }		
	    	}
        }
    }
}





