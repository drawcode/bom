using System;

public class BaseLocations<T> : DataObjects<T> where T : new() {

    private static T current;
    private static volatile BaseLocations<T> instance;
    private static object syncRoot = new Object();

    private string DATA_KEY = "base_location-data";

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

    public static BaseLocations<T> Instance {
        get {
            if (instance == null) {
                lock (syncRoot) {
                    if (instance == null)
                        instance = new BaseLocations<T>();
                }
            }
            return instance;
        }
    }

    public BaseLocations() {
        Reset();
    }

    public BaseLocations(bool loadData) {
        Reset();
        path = "data/" + DATA_KEY + ".json";
        pathKey = DATA_KEY;
        LoadData();
    }
}

public class BaseLocation : BaseMeta {
    // Attributes that are added or changed after launch should be like this to prevent
    // profile conversions.
    public  state_province { get; set; }
    public  city { get; set; }
    public  fax { get; set; }
    public  twitter { get; set; }
    public  dob { get; set; }
    public  address1 { get; set; }
    public  address2 { get; set; }
    public  date_start { get; set; }
    public  longitude { get; set; }
    public  phone { get; set; }
    public  date_end { get; set; }
    public  postal_code { get; set; }
    public  country_code { get; set; }
    public  latitude { get; set; }
    public  facebook { get; set; }
    public  email { get; set; }

    public BaseLocation() {
        Reset();
    }
    
    public override void Reset() {
        base.Reset();
    }

    public override Dictionary<string, object> ToDictionary(){
        dict = base.ToDictionary();
	if (state_province != null) {
	    dict = DataUtil.SetDictValue(dict, "state_province", state_province);
	}
	if (city != null) {
	    dict = DataUtil.SetDictValue(dict, "city", city);
	}
	if (fax != null) {
	    dict = DataUtil.SetDictValue(dict, "fax", fax);
	}
	if (twitter != null) {
	    dict = DataUtil.SetDictValue(dict, "twitter", twitter);
	}
	dict = DataUtil.SetDictValue(dict, "dob", dob);
	if (address1 != null) {
	    dict = DataUtil.SetDictValue(dict, "address1", address1);
	}
	if (address2 != null) {
	    dict = DataUtil.SetDictValue(dict, "address2", address2);
	}
	dict = DataUtil.SetDictValue(dict, "date_start", date_start);
	dict = DataUtil.SetDictValue(dict, "longitude", longitude);
	if (phone != null) {
	    dict = DataUtil.SetDictValue(dict, "phone", phone);
	}
	dict = DataUtil.SetDictValue(dict, "date_end", date_end);
	if (postal_code != null) {
	    dict = DataUtil.SetDictValue(dict, "postal_code", postal_code);
	}
	if (country_code != null) {
	    dict = DataUtil.SetDictValue(dict, "country_code", country_code);
	}
	dict = DataUtil.SetDictValue(dict, "latitude", latitude);
	if (facebook != null) {
	    dict = DataUtil.SetDictValue(dict, "facebook", facebook);
	}
	if (email != null) {
	    dict = DataUtil.SetDictValue(dict, "email", email);
	}
         return dict;
    }

    public override void FillFromDictionary(Dictionary<string, object> dict){
	if(dict.ContainsKey("state_province")) {
	    if(dict["state_province"] != null) {
	    	state_province = DataType.Instance.Fill(dict["state_province"]);
	    }		
	}
	if(dict.ContainsKey("city")) {
	    if(dict["city"] != null) {
	    	city = DataType.Instance.Fill(dict["city"]);
	    }		
	}
	if(dict.ContainsKey("fax")) {
	    if(dict["fax"] != null) {
	    	fax = DataType.Instance.Fill(dict["fax"]);
	    }		
	}
	if(dict.ContainsKey("twitter")) {
	    if(dict["twitter"] != null) {
	    	twitter = DataType.Instance.Fill(dict["twitter"]);
	    }		
	}
	if(dict.ContainsKey("dob")) {
	    if(dict["dob"] != null) {
	    	dob = DataType.Instance.Fill(dict["dob"]);
	    }		
	}
	if(dict.ContainsKey("address1")) {
	    if(dict["address1"] != null) {
	    	address1 = DataType.Instance.Fill(dict["address1"]);
	    }		
	}
	if(dict.ContainsKey("address2")) {
	    if(dict["address2"] != null) {
	    	address2 = DataType.Instance.Fill(dict["address2"]);
	    }		
	}
	if(dict.ContainsKey("date_start")) {
	    if(dict["date_start"] != null) {
	    	date_start = DataType.Instance.Fill(dict["date_start"]);
	    }		
	}
	if(dict.ContainsKey("longitude")) {
	    if(dict["longitude"] != null) {
	    	longitude = DataType.Instance.Fill(dict["longitude"]);
	    }		
	}
	if(dict.ContainsKey("phone")) {
	    if(dict["phone"] != null) {
	    	phone = DataType.Instance.Fill(dict["phone"]);
	    }		
	}
	if(dict.ContainsKey("date_end")) {
	    if(dict["date_end"] != null) {
	    	date_end = DataType.Instance.Fill(dict["date_end"]);
	    }		
	}
	if(dict.ContainsKey("postal_code")) {
	    if(dict["postal_code"] != null) {
	    	postal_code = DataType.Instance.Fill(dict["postal_code"]);
	    }		
	}
	if(dict.ContainsKey("country_code")) {
	    if(dict["country_code"] != null) {
	    	country_code = DataType.Instance.Fill(dict["country_code"]);
	    }		
	}
	if(dict.ContainsKey("latitude")) {
	    if(dict["latitude"] != null) {
	    	latitude = DataType.Instance.Fill(dict["latitude"]);
	    }		
	}
	if(dict.ContainsKey("facebook")) {
	    if(dict["facebook"] != null) {
	    	facebook = DataType.Instance.Fill(dict["facebook"]);
	    }		
	}
	if(dict.ContainsKey("email")) {
	    if(dict["email"] != null) {
	    	email = DataType.Instance.Fill(dict["email"]);
	    }		
	}
    }
}








