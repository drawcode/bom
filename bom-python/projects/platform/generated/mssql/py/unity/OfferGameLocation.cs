using System;

public class OfferGameLocations<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile OfferGameLocations<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "offer_game_location-data";

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

    public static OfferGameLocations<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new OfferGameLocations<T>();
                }
            }
            return instance;
        }
    }

    public OfferGameLocations() {
        Reset();
    }

    public OfferGameLocations(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class OfferGameLocation : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  game_location_id { get; set; }
    public  offer_id { get; set; }
    public  type_id { get; set; }

    public OfferGameLocation() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

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
	    	game_location_id = DataType.Instance.Fill(dict["game_location_id"]);
	    }		
	}
	if(dict.ContainsKey("offer_id")) {
	    if(dict["offer_id"] != null) {
	    	offer_id = DataType.Instance.Fill(dict["offer_id"]);
	    }		
	}
	if(dict.ContainsKey("type_id")) {
	    if(dict["type_id"] != null) {
	    	type_id = DataType.Instance.Fill(dict["type_id"]);
	    }		
	}
    }
}








