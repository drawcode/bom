using System;

public class OfferTypes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile OfferTypes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "offer_type-data";

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

    public static OfferTypes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new OfferTypes<T>();
                }
            }
            return instance;
        }
    }

    public OfferTypes() {
        Reset();
    }

    public OfferTypes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class OfferType : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.

    public OfferType() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
    }
}








