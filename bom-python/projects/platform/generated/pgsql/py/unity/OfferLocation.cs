using System;

public class OfferLocations<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile OfferLocations<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "offer_location-data";

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

    public static OfferLocations<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new OfferLocations<T>();
                }
            }
            return instance;
        }
    }

    public OfferLocations() {
        Reset();
    }

    public OfferLocations(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class OfferLocation : BaseLocation {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  offer_id { get; set; }

    public OfferLocation() {
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
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("offer_id")) {
	    if(dict["offer_id"] != null) {
	    	offer_id = DataType.Instance.Fill(dict["offer_id"]);
	    }		
	}
    }
}








