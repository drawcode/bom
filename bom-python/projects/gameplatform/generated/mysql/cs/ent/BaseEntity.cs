using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class BaseEntityResult : BaseObjectResult {
    
        public List<BaseEntity> data = new List<BaseEntity>();

        public BaseEntityResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<BaseEntity> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (BaseEntity obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<BaseEntity> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    BaseEntity objectValue = (BaseEntity)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class BaseEntity  {
    
        public BaseEntity() {
	
        }
    
        public string status { get; set; }
        public string uuid { get; set; }
        public DateTime date_modified { get; set; }
        public bool active { get; set; }
        public DateTime date_created { get; set; }
        public string type { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (status != null) {
	    	    dict = DataUtil.SetDictValue(dict, "status", status);
	    	}
	    	if (uuid != null) {
	    	    dict = DataUtil.SetDictValue(dict, "uuid", uuid);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "date_modified", date_modified);
	    	dict = DataUtil.SetDictValue(dict, "active", active);
	    	dict = DataUtil.SetDictValue(dict, "date_created", date_created);
	    	if (type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "type", type);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("status")) {
	    	    if(dict["status"] != null) {
	    	    	status = DataType.Instance.FillString(dict["status"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("uuid")) {
	    	    if(dict["uuid"] != null) {
	    	    	uuid = DataType.Instance.FillString(dict["uuid"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("date_modified")) {
	    	    if(dict["date_modified"] != null) {
	    	    	date_modified = DataType.Instance.FillDateTime(dict["date_modified"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("active")) {
	    	    if(dict["active"] != null) {
	    	    	active = DataType.Instance.FillBool(dict["active"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("date_created")) {
	    	    if(dict["date_created"] != null) {
	    	    	date_created = DataType.Instance.FillDateTime(dict["date_created"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("type")) {
	    	    if(dict["type"] != null) {
	    	    	type = DataType.Instance.FillString(dict["type"]);
	    	    }		
	    	}
        }
    }
}





