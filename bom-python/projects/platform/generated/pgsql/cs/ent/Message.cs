using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class MessageResult : BaseObjectResult {
    
        public List<Message> data = new List<Message>();

        public MessageResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<Message> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (Message obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<Message> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    Message objectValue = (Message)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class Message : BaseEntity {
    
        public Message() {
	
        }
    
        public string profile_from_name { get; set; }
        public bool read { get; set; }
        public string profile_from_id { get; set; }
        public string profile_to_token { get; set; }
        public string app_id { get; set; }
        public string profile_to_id { get; set; }
        public string profile_to_name { get; set; }
        public bool sent { get; set; }
        public string subject { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (profile_from_name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_from_name", profile_from_name);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "read", read);
	    	if (profile_from_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_from_id", profile_from_id);
	    	}
	    	if (profile_to_token != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_to_token", profile_to_token);
	    	}
	    	if (app_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "app_id", app_id);
	    	}
	    	if (profile_to_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_to_id", profile_to_id);
	    	}
	    	if (profile_to_name != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_to_name", profile_to_name);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "sent", sent);
	    	if (subject != null) {
	    	    dict = DataUtil.SetDictValue(dict, "subject", subject);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("profile_from_name")) {
	    	    if(dict["profile_from_name"] != null) {
	    	    	profile_from_name = DataType.Instance.FillString(dict["profile_from_name"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("read")) {
	    	    if(dict["read"] != null) {
	    	    	read = DataType.Instance.FillBool(dict["read"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_from_id")) {
	    	    if(dict["profile_from_id"] != null) {
	    	    	profile_from_id = DataType.Instance.FillString(dict["profile_from_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_to_token")) {
	    	    if(dict["profile_to_token"] != null) {
	    	    	profile_to_token = DataType.Instance.FillString(dict["profile_to_token"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("app_id")) {
	    	    if(dict["app_id"] != null) {
	    	    	app_id = DataType.Instance.FillString(dict["app_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_to_id")) {
	    	    if(dict["profile_to_id"] != null) {
	    	    	profile_to_id = DataType.Instance.FillString(dict["profile_to_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_to_name")) {
	    	    if(dict["profile_to_name"] != null) {
	    	    	profile_to_name = DataType.Instance.FillString(dict["profile_to_name"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("sent")) {
	    	    if(dict["sent"] != null) {
	    	    	sent = DataType.Instance.FillBool(dict["sent"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("subject")) {
	    	    if(dict["subject"] != null) {
	    	    	subject = DataType.Instance.FillString(dict["subject"]);
	    	    }		
	    	}
        }
    }
}





