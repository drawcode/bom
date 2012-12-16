using System;

public class OfferCategoryAssocs<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile OfferCategoryAssocs<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "offer_category_assoc-data";

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

    public static OfferCategoryAssocs<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new OfferCategoryAssocs<T>();
                }
            }
            return instance;
        }
    }

    public OfferCategoryAssocs() {
        Reset();
    }

    public OfferCategoryAssocs(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class OfferCategoryAssoc : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string offer_id { get; set; }
    public string category_id { get; set; }

    public OfferCategoryAssoc() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (offer_id != null) {
	    dict = DataUtil.SetDictValue(dict, "offer_id", offer_id);
	}
	if (category_id != null) {
	    dict = DataUtil.SetDictValue(dict, "category_id", category_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("offer_id")) {
	    if(dict["offer_id"] != null) {
	    	offer_id = DataType.Instance.FillString(dict["offer_id"]);
	    }		
	}
	if(dict.ContainsKey("category_id")) {
	    if(dict["category_id"] != null) {
	    	category_id = DataType.Instance.FillString(dict["category_id"]);
	    }		
	}
    }
}








