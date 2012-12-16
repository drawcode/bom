using System;

public class GameRpgItemWeapons<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile GameRpgItemWeapons<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "game_rpg_item_weapon-data";

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

    public static GameRpgItemWeapons<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new GameRpgItemWeapons<T>();
                }
            }
            return instance;
        }
    }

    public GameRpgItemWeapons() {
        Reset();
    }

    public GameRpgItemWeapons(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class GameRpgItemWeapon : GameRpgItem {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.

    public GameRpgItemWeapon() {
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








