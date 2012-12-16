using System;

public class GameCategoryAssocs<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameCategoryAssocs<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_category_assoc-data";

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

    public static GameCategoryAssocs<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameCategoryAssocs<T>();
                }
            }
            return instance;
        }
    }

    public GameCategoryAssocs() {
        Reset();
    }

    public GameCategoryAssocs(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameCategoryAssoc : BaseEntity {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  game_id { get; set; }
    public  category_id { get; set; }

    public GameCategoryAssoc() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (game_id != null) {
	    dict = DataUtil.SetDictValue(dict, "game_id", game_id);
	}
	if (category_id != null) {
	    dict = DataUtil.SetDictValue(dict, "category_id", category_id);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("game_id")) {
	    if(dict["game_id"] != null) {
	    	game_id = DataType.Instance.Fill(dict["game_id"]);
	    }		
	}
	if(dict.ContainsKey("category_id")) {
	    if(dict["category_id"] != null) {
	    	category_id = DataType.Instance.Fill(dict["category_id"]);
	    }		
	}
    }
}








