using System;

public class GameCategoryTrees<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameCategoryTrees<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_category_tree-data";

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

    public static GameCategoryTrees<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameCategoryTrees<T>();
                }
            }
            return instance;
        }
    }

    public GameCategoryTrees() {
        Reset();
    }

    public GameCategoryTrees(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameCategoryTree : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public string parent_id { get; set; }
    public string category_id { get; set; }

    public GameCategoryTree() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (parent_id != null) {
	    dict = DataUtil.SetDictValue(dict, "parent_id", parent_id);
	}
	if (category_id != null) {
	    dict = DataUtil.SetDictValue(dict, "category_id", category_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("parent_id")) {
	    if(dict["parent_id"] != null) {
	    	parent_id = DataType.Instance.FillString(dict["parent_id"]);
	    }		
	}
	if(dict.ContainsKey("category_id")) {
	    if(dict["category_id"] != null) {
	    	category_id = DataType.Instance.FillString(dict["category_id"]);
	    }		
	}
    }
}








