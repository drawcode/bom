using System;

public class SiteTypes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile SiteTypes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "site_type-data";

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

    public static SiteTypes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new SiteTypes<T>();
                }
            }
            return instance;
        }
    }

    public SiteTypes() {
        Reset();
    }

    public SiteTypes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class SiteType : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.

    public SiteType() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    // Attributes that are added or changed after launch should be like this to prevent
    // conversions.
    

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
    }
}








