using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.ent;

namespace platform.ent {

        public class GameProfileContentResult : BaseObjectResult {
    
        public List<GameProfileContent> data = new List<GameProfileContent>();

        public GameProfileContentResult() {
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

        public List<Dictionary<string, object>> GetListDict(List<GameProfileContent> data) {
            
            List<Dictionary<string, object>> dictList = new List<Dictionary<string, object>>();
            
            foreach (GameProfileContent obj in data) {
                dictList.Add(obj.ToDictionary());
            }
            
            return dictList;
        }

        public List<GameProfileContent> GetList(List<Dictionary<string, object>> dictList) {
            
            data.Clear();
            
            foreach (Dictionary<string, object> dict in dictList) {
                foreach (KeyValuePair<string, object> obj in dict) {
                    GameProfileContent objectValue = (GameProfileContent)obj.Value;
                    objectValue.FillFromDictionary(dict);
                    data.Add(objectValue);
                }
            }
            
            return data;
        }
    }

    public class GameProfileContent : BaseMeta {
    
        public GameProfileContent() {
	
        }
    
        public string username { get; set; }
        public string hash { get; set; }
        public string content_type { get; set; }
        public string extension { get; set; }
        public string source { get; set; }
        public string profile_id { get; set; }
        public string filename { get; set; }
        public string platform { get; set; }
        public string version { get; set; }
        public int increment { get; set; }
        public string game_network { get; set; }
        public string game_id { get; set; }
        public string path { get; set; }
        public string data { get; set; }

        public override Dictionary<string, object> ToDictionary(){
            dict = base.ToDictionary();
	    	if (username != null) {
	    	    dict = DataUtil.SetDictValue(dict, "username", username);
	    	}
	    	if (hash != null) {
	    	    dict = DataUtil.SetDictValue(dict, "hash", hash);
	    	}
	    	if (content_type != null) {
	    	    dict = DataUtil.SetDictValue(dict, "content_type", content_type);
	    	}
	    	if (extension != null) {
	    	    dict = DataUtil.SetDictValue(dict, "extension", extension);
	    	}
	    	if (source != null) {
	    	    dict = DataUtil.SetDictValue(dict, "source", source);
	    	}
	    	if (profile_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "profile_id", profile_id);
	    	}
	    	if (filename != null) {
	    	    dict = DataUtil.SetDictValue(dict, "filename", filename);
	    	}
	    	if (platform != null) {
	    	    dict = DataUtil.SetDictValue(dict, "platform", platform);
	    	}
	    	if (version != null) {
	    	    dict = DataUtil.SetDictValue(dict, "version", version);
	    	}
	    	dict = DataUtil.SetDictValue(dict, "increment", increment);
	    	if (game_network != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_network", game_network);
	    	}
	    	if (game_id != null) {
	    	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	    	}
	    	if (path != null) {
	    	    dict = DataUtil.SetDictValue(dict, "path", path);
	    	}
	    	if (data != null) {
	    	    dict = DataUtil.SetDictValue(dict, "data", data);
	    	}
            return dict;
        }

        public override void FillFromDictionary(Dictionary<string, object> dict){
	    	if(dict.ContainsKey("username")) {
	    	    if(dict["username"] != null) {
	    	    	username = DataType.Instance.FillString(dict["username"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("hash")) {
	    	    if(dict["hash"] != null) {
	    	    	hash = DataType.Instance.FillString(dict["hash"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("content_type")) {
	    	    if(dict["content_type"] != null) {
	    	    	content_type = DataType.Instance.FillString(dict["content_type"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("extension")) {
	    	    if(dict["extension"] != null) {
	    	    	extension = DataType.Instance.FillString(dict["extension"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("source")) {
	    	    if(dict["source"] != null) {
	    	    	source = DataType.Instance.FillString(dict["source"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("profile_id")) {
	    	    if(dict["profile_id"] != null) {
	    	    	profile_id = DataType.Instance.FillString(dict["profile_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("filename")) {
	    	    if(dict["filename"] != null) {
	    	    	filename = DataType.Instance.FillString(dict["filename"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("platform")) {
	    	    if(dict["platform"] != null) {
	    	    	platform = DataType.Instance.FillString(dict["platform"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("version")) {
	    	    if(dict["version"] != null) {
	    	    	version = DataType.Instance.FillString(dict["version"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("increment")) {
	    	    if(dict["increment"] != null) {
	    	    	increment = DataType.Instance.FillInt(dict["increment"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_network")) {
	    	    if(dict["game_network"] != null) {
	    	    	game_network = DataType.Instance.FillString(dict["game_network"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("game_id")) {
	    	    if(dict["game_id"] != null) {
	    	    	game_id = DataType.Instance.FillString(dict["game_id"]);
	    	    }		
	    	}
	    	if(dict.ContainsKey("path")) {
	    	    if(dict["path"] != null) {
	    	    	path = DataType.Instance.FillString(dict["path"]);
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





