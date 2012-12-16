using System;

public class ContentPages<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile ContentPages<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "content_page-data";

    public static T Current {
        get {
            if (current == null) {
                lock (syncRoot) {
                    if (current == null)
                        current = new T();
                }
            }
            return current;
        }
        set {
            current = value;
        }
    }

    public static ContentPages<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new ContentPages<T>();
                }
            }
            return instance;
        }
    }

    public ContentPages() {
        Reset();
    }

    public ContentPages(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class ContentPage : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string path { get; set; }
    public Date date_end { get; set; }
    public Date date_start { get; set; }
    public string site_id { get; set; }
    public string template { get; set; }

    public ContentPage() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (path != null) {
	    dict = DataUtil.SetDictValue(dict, "path", path);
	}
	dict = DataUtil.SetDictValue(dict, "date_end", date_end);
	dict = DataUtil.SetDictValue(dict, "date_start", date_start);
	if (site_id != null) {
	    dict = DataUtil.SetDictValue(dict, "site_id", site_id);
	}
	if (template != null) {
	    dict = DataUtil.SetDictValue(dict, "template", template);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("path")) {
	    if(dict["path"] != null) {
	    	path = DataType.Instance.FillString(dict["path"]);
	    }		
	}
	if(dict.ContainsKey("date_end")) {
	    if(dict["date_end"] != null) {
	    	date_end = DataType.Instance.FillDate(dict["date_end"]);
	    }		
	}
	if(dict.ContainsKey("date_start")) {
	    if(dict["date_start"] != null) {
	    	date_start = DataType.Instance.FillDate(dict["date_start"]);
	    }		
	}
	if(dict.ContainsKey("site_id")) {
	    if(dict["site_id"] != null) {
	    	site_id = DataType.Instance.FillString(dict["site_id"]);
	    }		
	}
	if(dict.ContainsKey("template")) {
	    if(dict["template"] != null) {
	    	template = DataType.Instance.FillString(dict["template"]);
	    }		
	}
    }
}








