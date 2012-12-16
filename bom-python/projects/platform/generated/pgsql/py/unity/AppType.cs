using System;

public class AppTypes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile AppTypes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "app_type-data";

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

    public static AppTypes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new AppTypes<T>();
                }
            }
            return instance;
        }
    }

    public AppTypes() {
        Reset();
    }

    public AppTypes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class AppType : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.

    public AppType() {
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








