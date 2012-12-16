using System;

public class PostalCodes<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile PostalCodes<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "postal_code-data";

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

    public static PostalCodes<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new PostalCodes<T>();
                }
            }
            return instance;
        }
    }

    public PostalCodes() {
        Reset();
    }

    public PostalCodes(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class PostalCode : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.

    public PostalCode() {
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








