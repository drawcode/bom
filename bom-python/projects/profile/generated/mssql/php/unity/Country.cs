using System;

public class Countrys<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile Countrys<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "country-data";

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

    public static Countrys<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new Countrys<T>();
                }
            }
            return instance;
        }
    }

    public Countrys() {
        Reset();
    }

    public Countrys(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class Country : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.

    public Country() {
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








