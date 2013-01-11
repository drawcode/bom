<?php // namespace Gaming;
/*



import ent
from ent import *

class BaseResponse :

    def __init__(self):
        self.message = 'Success'
        self.code = 0
        self.info = {}
        self.error = {}
        self.action = ''
        self.data = None

"""
       
    public class BaseResponse {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseString : BaseResponse{
        public string data = "";
    }
    
    public class ResponseBool : BaseResponse {
        public bool data;
    }
    
    public class ResponseInt : BaseResponse {
        public int data;
    }
    
    public class ResponseObject : BaseResponse {
        public object data = new object();
    }
    
    public class ResponseList : BaseResponse {
        public List<object> data = new List<object>();
    }
    
    public class ResponseDict : BaseResponse {
        public Dictionary<string, object> data
            = new Dictionary<string, object>();
    }
       
//------------------------------------------------------------------------------
        
    public class BaseResponseGame {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameString : BaseResponseGame {
        public string data = "";
    }
    
    public class ResponseGameBool : BaseResponseGame {
        public bool data;
    }
    
    public class ResponseGameInt : BaseResponseGame {
        public int data;
    }
    
    public class ResponseGameObject : BaseResponseGame {
        public Game data = new Game();
    }
    
    public class ResponseGameResult : BaseResponseGame {
        public GameResult data = new GameResult();
    }
    
    public class ResponseGameList : BaseResponseGame {
        public List<Game> data = new List<Game>();
    }
    
    public class ResponseGameDict : BaseResponseGame {
        public Dictionary<string, Game> data
            = new Dictionary<string, Game>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameAttribute {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameAttributeString : BaseResponseGameAttribute {
        public string data = "";
    }
    
    public class ResponseGameAttributeBool : BaseResponseGameAttribute {
        public bool data;
    }
    
    public class ResponseGameAttributeInt : BaseResponseGameAttribute {
        public int data;
    }
    
    public class ResponseGameAttributeObject : BaseResponseGameAttribute {
        public GameAttribute data = new GameAttribute();
    }
    
    public class ResponseGameAttributeResult : BaseResponseGameAttribute {
        public GameAttributeResult data = new GameAttributeResult();
    }
    
    public class ResponseGameAttributeList : BaseResponseGameAttribute {
        public List<GameAttribute> data = new List<GameAttribute>();
    }
    
    public class ResponseGameAttributeDict : BaseResponseGameAttribute {
        public Dictionary<string, GameAttribute> data
            = new Dictionary<string, GameAttribute>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameAttributeText {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameAttributeTextString : BaseResponseGameAttributeText {
        public string data = "";
    }
    
    public class ResponseGameAttributeTextBool : BaseResponseGameAttributeText {
        public bool data;
    }
    
    public class ResponseGameAttributeTextInt : BaseResponseGameAttributeText {
        public int data;
    }
    
    public class ResponseGameAttributeTextObject : BaseResponseGameAttributeText {
        public GameAttributeText data = new GameAttributeText();
    }
    
    public class ResponseGameAttributeTextResult : BaseResponseGameAttributeText {
        public GameAttributeTextResult data = new GameAttributeTextResult();
    }
    
    public class ResponseGameAttributeTextList : BaseResponseGameAttributeText {
        public List<GameAttributeText> data = new List<GameAttributeText>();
    }
    
    public class ResponseGameAttributeTextDict : BaseResponseGameAttributeText {
        public Dictionary<string, GameAttributeText> data
            = new Dictionary<string, GameAttributeText>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameAttributeData {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameAttributeDataString : BaseResponseGameAttributeData {
        public string data = "";
    }
    
    public class ResponseGameAttributeDataBool : BaseResponseGameAttributeData {
        public bool data;
    }
    
    public class ResponseGameAttributeDataInt : BaseResponseGameAttributeData {
        public int data;
    }
    
    public class ResponseGameAttributeDataObject : BaseResponseGameAttributeData {
        public GameAttributeData data = new GameAttributeData();
    }
    
    public class ResponseGameAttributeDataResult : BaseResponseGameAttributeData {
        public GameAttributeDataResult data = new GameAttributeDataResult();
    }
    
    public class ResponseGameAttributeDataList : BaseResponseGameAttributeData {
        public List<GameAttributeData> data = new List<GameAttributeData>();
    }
    
    public class ResponseGameAttributeDataDict : BaseResponseGameAttributeData {
        public Dictionary<string, GameAttributeData> data
            = new Dictionary<string, GameAttributeData>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameCategory {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameCategoryString : BaseResponseGameCategory {
        public string data = "";
    }
    
    public class ResponseGameCategoryBool : BaseResponseGameCategory {
        public bool data;
    }
    
    public class ResponseGameCategoryInt : BaseResponseGameCategory {
        public int data;
    }
    
    public class ResponseGameCategoryObject : BaseResponseGameCategory {
        public GameCategory data = new GameCategory();
    }
    
    public class ResponseGameCategoryResult : BaseResponseGameCategory {
        public GameCategoryResult data = new GameCategoryResult();
    }
    
    public class ResponseGameCategoryList : BaseResponseGameCategory {
        public List<GameCategory> data = new List<GameCategory>();
    }
    
    public class ResponseGameCategoryDict : BaseResponseGameCategory {
        public Dictionary<string, GameCategory> data
            = new Dictionary<string, GameCategory>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameCategoryTree {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameCategoryTreeString : BaseResponseGameCategoryTree {
        public string data = "";
    }
    
    public class ResponseGameCategoryTreeBool : BaseResponseGameCategoryTree {
        public bool data;
    }
    
    public class ResponseGameCategoryTreeInt : BaseResponseGameCategoryTree {
        public int data;
    }
    
    public class ResponseGameCategoryTreeObject : BaseResponseGameCategoryTree {
        public GameCategoryTree data = new GameCategoryTree();
    }
    
    public class ResponseGameCategoryTreeResult : BaseResponseGameCategoryTree {
        public GameCategoryTreeResult data = new GameCategoryTreeResult();
    }
    
    public class ResponseGameCategoryTreeList : BaseResponseGameCategoryTree {
        public List<GameCategoryTree> data = new List<GameCategoryTree>();
    }
    
    public class ResponseGameCategoryTreeDict : BaseResponseGameCategoryTree {
        public Dictionary<string, GameCategoryTree> data
            = new Dictionary<string, GameCategoryTree>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameCategoryAssoc {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameCategoryAssocString : BaseResponseGameCategoryAssoc {
        public string data = "";
    }
    
    public class ResponseGameCategoryAssocBool : BaseResponseGameCategoryAssoc {
        public bool data;
    }
    
    public class ResponseGameCategoryAssocInt : BaseResponseGameCategoryAssoc {
        public int data;
    }
    
    public class ResponseGameCategoryAssocObject : BaseResponseGameCategoryAssoc {
        public GameCategoryAssoc data = new GameCategoryAssoc();
    }
    
    public class ResponseGameCategoryAssocResult : BaseResponseGameCategoryAssoc {
        public GameCategoryAssocResult data = new GameCategoryAssocResult();
    }
    
    public class ResponseGameCategoryAssocList : BaseResponseGameCategoryAssoc {
        public List<GameCategoryAssoc> data = new List<GameCategoryAssoc>();
    }
    
    public class ResponseGameCategoryAssocDict : BaseResponseGameCategoryAssoc {
        public Dictionary<string, GameCategoryAssoc> data
            = new Dictionary<string, GameCategoryAssoc>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameTypeString : BaseResponseGameType {
        public string data = "";
    }
    
    public class ResponseGameTypeBool : BaseResponseGameType {
        public bool data;
    }
    
    public class ResponseGameTypeInt : BaseResponseGameType {
        public int data;
    }
    
    public class ResponseGameTypeObject : BaseResponseGameType {
        public GameType data = new GameType();
    }
    
    public class ResponseGameTypeResult : BaseResponseGameType {
        public GameTypeResult data = new GameTypeResult();
    }
    
    public class ResponseGameTypeList : BaseResponseGameType {
        public List<GameType> data = new List<GameType>();
    }
    
    public class ResponseGameTypeDict : BaseResponseGameType {
        public Dictionary<string, GameType> data
            = new Dictionary<string, GameType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileGame {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileGameString : BaseResponseProfileGame {
        public string data = "";
    }
    
    public class ResponseProfileGameBool : BaseResponseProfileGame {
        public bool data;
    }
    
    public class ResponseProfileGameInt : BaseResponseProfileGame {
        public int data;
    }
    
    public class ResponseProfileGameObject : BaseResponseProfileGame {
        public ProfileGame data = new ProfileGame();
    }
    
    public class ResponseProfileGameResult : BaseResponseProfileGame {
        public ProfileGameResult data = new ProfileGameResult();
    }
    
    public class ResponseProfileGameList : BaseResponseProfileGame {
        public List<ProfileGame> data = new List<ProfileGame>();
    }
    
    public class ResponseProfileGameDict : BaseResponseProfileGame {
        public Dictionary<string, ProfileGame> data
            = new Dictionary<string, ProfileGame>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProfileAttribute {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProfileAttributeString : BaseResponseGameProfileAttribute {
        public string data = "";
    }
    
    public class ResponseGameProfileAttributeBool : BaseResponseGameProfileAttribute {
        public bool data;
    }
    
    public class ResponseGameProfileAttributeInt : BaseResponseGameProfileAttribute {
        public int data;
    }
    
    public class ResponseGameProfileAttributeObject : BaseResponseGameProfileAttribute {
        public GameProfileAttribute data = new GameProfileAttribute();
    }
    
    public class ResponseGameProfileAttributeResult : BaseResponseGameProfileAttribute {
        public GameProfileAttributeResult data = new GameProfileAttributeResult();
    }
    
    public class ResponseGameProfileAttributeList : BaseResponseGameProfileAttribute {
        public List<GameProfileAttribute> data = new List<GameProfileAttribute>();
    }
    
    public class ResponseGameProfileAttributeDict : BaseResponseGameProfileAttribute {
        public Dictionary<string, GameProfileAttribute> data
            = new Dictionary<string, GameProfileAttribute>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProfileAttributeText {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProfileAttributeTextString : BaseResponseGameProfileAttributeText {
        public string data = "";
    }
    
    public class ResponseGameProfileAttributeTextBool : BaseResponseGameProfileAttributeText {
        public bool data;
    }
    
    public class ResponseGameProfileAttributeTextInt : BaseResponseGameProfileAttributeText {
        public int data;
    }
    
    public class ResponseGameProfileAttributeTextObject : BaseResponseGameProfileAttributeText {
        public GameProfileAttributeText data = new GameProfileAttributeText();
    }
    
    public class ResponseGameProfileAttributeTextResult : BaseResponseGameProfileAttributeText {
        public GameProfileAttributeTextResult data = new GameProfileAttributeTextResult();
    }
    
    public class ResponseGameProfileAttributeTextList : BaseResponseGameProfileAttributeText {
        public List<GameProfileAttributeText> data = new List<GameProfileAttributeText>();
    }
    
    public class ResponseGameProfileAttributeTextDict : BaseResponseGameProfileAttributeText {
        public Dictionary<string, GameProfileAttributeText> data
            = new Dictionary<string, GameProfileAttributeText>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProfileAttributeData {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProfileAttributeDataString : BaseResponseGameProfileAttributeData {
        public string data = "";
    }
    
    public class ResponseGameProfileAttributeDataBool : BaseResponseGameProfileAttributeData {
        public bool data;
    }
    
    public class ResponseGameProfileAttributeDataInt : BaseResponseGameProfileAttributeData {
        public int data;
    }
    
    public class ResponseGameProfileAttributeDataObject : BaseResponseGameProfileAttributeData {
        public GameProfileAttributeData data = new GameProfileAttributeData();
    }
    
    public class ResponseGameProfileAttributeDataResult : BaseResponseGameProfileAttributeData {
        public GameProfileAttributeDataResult data = new GameProfileAttributeDataResult();
    }
    
    public class ResponseGameProfileAttributeDataList : BaseResponseGameProfileAttributeData {
        public List<GameProfileAttributeData> data = new List<GameProfileAttributeData>();
    }
    
    public class ResponseGameProfileAttributeDataDict : BaseResponseGameProfileAttributeData {
        public Dictionary<string, GameProfileAttributeData> data
            = new Dictionary<string, GameProfileAttributeData>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameNetwork {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameNetworkString : BaseResponseGameNetwork {
        public string data = "";
    }
    
    public class ResponseGameNetworkBool : BaseResponseGameNetwork {
        public bool data;
    }
    
    public class ResponseGameNetworkInt : BaseResponseGameNetwork {
        public int data;
    }
    
    public class ResponseGameNetworkObject : BaseResponseGameNetwork {
        public GameNetwork data = new GameNetwork();
    }
    
    public class ResponseGameNetworkResult : BaseResponseGameNetwork {
        public GameNetworkResult data = new GameNetworkResult();
    }
    
    public class ResponseGameNetworkList : BaseResponseGameNetwork {
        public List<GameNetwork> data = new List<GameNetwork>();
    }
    
    public class ResponseGameNetworkDict : BaseResponseGameNetwork {
        public Dictionary<string, GameNetwork> data
            = new Dictionary<string, GameNetwork>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameNetworkAuth {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameNetworkAuthString : BaseResponseGameNetworkAuth {
        public string data = "";
    }
    
    public class ResponseGameNetworkAuthBool : BaseResponseGameNetworkAuth {
        public bool data;
    }
    
    public class ResponseGameNetworkAuthInt : BaseResponseGameNetworkAuth {
        public int data;
    }
    
    public class ResponseGameNetworkAuthObject : BaseResponseGameNetworkAuth {
        public GameNetworkAuth data = new GameNetworkAuth();
    }
    
    public class ResponseGameNetworkAuthResult : BaseResponseGameNetworkAuth {
        public GameNetworkAuthResult data = new GameNetworkAuthResult();
    }
    
    public class ResponseGameNetworkAuthList : BaseResponseGameNetworkAuth {
        public List<GameNetworkAuth> data = new List<GameNetworkAuth>();
    }
    
    public class ResponseGameNetworkAuthDict : BaseResponseGameNetworkAuth {
        public Dictionary<string, GameNetworkAuth> data
            = new Dictionary<string, GameNetworkAuth>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileGameNetwork {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileGameNetworkString : BaseResponseProfileGameNetwork {
        public string data = "";
    }
    
    public class ResponseProfileGameNetworkBool : BaseResponseProfileGameNetwork {
        public bool data;
    }
    
    public class ResponseProfileGameNetworkInt : BaseResponseProfileGameNetwork {
        public int data;
    }
    
    public class ResponseProfileGameNetworkObject : BaseResponseProfileGameNetwork {
        public ProfileGameNetwork data = new ProfileGameNetwork();
    }
    
    public class ResponseProfileGameNetworkResult : BaseResponseProfileGameNetwork {
        public ProfileGameNetworkResult data = new ProfileGameNetworkResult();
    }
    
    public class ResponseProfileGameNetworkList : BaseResponseProfileGameNetwork {
        public List<ProfileGameNetwork> data = new List<ProfileGameNetwork>();
    }
    
    public class ResponseProfileGameNetworkDict : BaseResponseProfileGameNetwork {
        public Dictionary<string, ProfileGameNetwork> data
            = new Dictionary<string, ProfileGameNetwork>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileGameDataAttribute {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileGameDataAttributeString : BaseResponseProfileGameDataAttribute {
        public string data = "";
    }
    
    public class ResponseProfileGameDataAttributeBool : BaseResponseProfileGameDataAttribute {
        public bool data;
    }
    
    public class ResponseProfileGameDataAttributeInt : BaseResponseProfileGameDataAttribute {
        public int data;
    }
    
    public class ResponseProfileGameDataAttributeObject : BaseResponseProfileGameDataAttribute {
        public ProfileGameDataAttribute data = new ProfileGameDataAttribute();
    }
    
    public class ResponseProfileGameDataAttributeResult : BaseResponseProfileGameDataAttribute {
        public ProfileGameDataAttributeResult data = new ProfileGameDataAttributeResult();
    }
    
    public class ResponseProfileGameDataAttributeList : BaseResponseProfileGameDataAttribute {
        public List<ProfileGameDataAttribute> data = new List<ProfileGameDataAttribute>();
    }
    
    public class ResponseProfileGameDataAttributeDict : BaseResponseProfileGameDataAttribute {
        public Dictionary<string, ProfileGameDataAttribute> data
            = new Dictionary<string, ProfileGameDataAttribute>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameSession {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameSessionString : BaseResponseGameSession {
        public string data = "";
    }
    
    public class ResponseGameSessionBool : BaseResponseGameSession {
        public bool data;
    }
    
    public class ResponseGameSessionInt : BaseResponseGameSession {
        public int data;
    }
    
    public class ResponseGameSessionObject : BaseResponseGameSession {
        public GameSession data = new GameSession();
    }
    
    public class ResponseGameSessionResult : BaseResponseGameSession {
        public GameSessionResult data = new GameSessionResult();
    }
    
    public class ResponseGameSessionList : BaseResponseGameSession {
        public List<GameSession> data = new List<GameSession>();
    }
    
    public class ResponseGameSessionDict : BaseResponseGameSession {
        public Dictionary<string, GameSession> data
            = new Dictionary<string, GameSession>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameSessionData {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameSessionDataString : BaseResponseGameSessionData {
        public string data = "";
    }
    
    public class ResponseGameSessionDataBool : BaseResponseGameSessionData {
        public bool data;
    }
    
    public class ResponseGameSessionDataInt : BaseResponseGameSessionData {
        public int data;
    }
    
    public class ResponseGameSessionDataObject : BaseResponseGameSessionData {
        public GameSessionData data = new GameSessionData();
    }
    
    public class ResponseGameSessionDataResult : BaseResponseGameSessionData {
        public GameSessionDataResult data = new GameSessionDataResult();
    }
    
    public class ResponseGameSessionDataList : BaseResponseGameSessionData {
        public List<GameSessionData> data = new List<GameSessionData>();
    }
    
    public class ResponseGameSessionDataDict : BaseResponseGameSessionData {
        public Dictionary<string, GameSessionData> data
            = new Dictionary<string, GameSessionData>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameContent {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameContentString : BaseResponseGameContent {
        public string data = "";
    }
    
    public class ResponseGameContentBool : BaseResponseGameContent {
        public bool data;
    }
    
    public class ResponseGameContentInt : BaseResponseGameContent {
        public int data;
    }
    
    public class ResponseGameContentObject : BaseResponseGameContent {
        public GameContent data = new GameContent();
    }
    
    public class ResponseGameContentResult : BaseResponseGameContent {
        public GameContentResult data = new GameContentResult();
    }
    
    public class ResponseGameContentList : BaseResponseGameContent {
        public List<GameContent> data = new List<GameContent>();
    }
    
    public class ResponseGameContentDict : BaseResponseGameContent {
        public Dictionary<string, GameContent> data
            = new Dictionary<string, GameContent>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProfileContent {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProfileContentString : BaseResponseGameProfileContent {
        public string data = "";
    }
    
    public class ResponseGameProfileContentBool : BaseResponseGameProfileContent {
        public bool data;
    }
    
    public class ResponseGameProfileContentInt : BaseResponseGameProfileContent {
        public int data;
    }
    
    public class ResponseGameProfileContentObject : BaseResponseGameProfileContent {
        public GameProfileContent data = new GameProfileContent();
    }
    
    public class ResponseGameProfileContentResult : BaseResponseGameProfileContent {
        public GameProfileContentResult data = new GameProfileContentResult();
    }
    
    public class ResponseGameProfileContentList : BaseResponseGameProfileContent {
        public List<GameProfileContent> data = new List<GameProfileContent>();
    }
    
    public class ResponseGameProfileContentDict : BaseResponseGameProfileContent {
        public Dictionary<string, GameProfileContent> data
            = new Dictionary<string, GameProfileContent>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameApp {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameAppString : BaseResponseGameApp {
        public string data = "";
    }
    
    public class ResponseGameAppBool : BaseResponseGameApp {
        public bool data;
    }
    
    public class ResponseGameAppInt : BaseResponseGameApp {
        public int data;
    }
    
    public class ResponseGameAppObject : BaseResponseGameApp {
        public GameApp data = new GameApp();
    }
    
    public class ResponseGameAppResult : BaseResponseGameApp {
        public GameAppResult data = new GameAppResult();
    }
    
    public class ResponseGameAppList : BaseResponseGameApp {
        public List<GameApp> data = new List<GameApp>();
    }
    
    public class ResponseGameAppDict : BaseResponseGameApp {
        public Dictionary<string, GameApp> data
            = new Dictionary<string, GameApp>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileGameLocation {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileGameLocationString : BaseResponseProfileGameLocation {
        public string data = "";
    }
    
    public class ResponseProfileGameLocationBool : BaseResponseProfileGameLocation {
        public bool data;
    }
    
    public class ResponseProfileGameLocationInt : BaseResponseProfileGameLocation {
        public int data;
    }
    
    public class ResponseProfileGameLocationObject : BaseResponseProfileGameLocation {
        public ProfileGameLocation data = new ProfileGameLocation();
    }
    
    public class ResponseProfileGameLocationResult : BaseResponseProfileGameLocation {
        public ProfileGameLocationResult data = new ProfileGameLocationResult();
    }
    
    public class ResponseProfileGameLocationList : BaseResponseProfileGameLocation {
        public List<ProfileGameLocation> data = new List<ProfileGameLocation>();
    }
    
    public class ResponseProfileGameLocationDict : BaseResponseProfileGameLocation {
        public Dictionary<string, ProfileGameLocation> data
            = new Dictionary<string, ProfileGameLocation>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGamePhoto {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGamePhotoString : BaseResponseGamePhoto {
        public string data = "";
    }
    
    public class ResponseGamePhotoBool : BaseResponseGamePhoto {
        public bool data;
    }
    
    public class ResponseGamePhotoInt : BaseResponseGamePhoto {
        public int data;
    }
    
    public class ResponseGamePhotoObject : BaseResponseGamePhoto {
        public GamePhoto data = new GamePhoto();
    }
    
    public class ResponseGamePhotoResult : BaseResponseGamePhoto {
        public GamePhotoResult data = new GamePhotoResult();
    }
    
    public class ResponseGamePhotoList : BaseResponseGamePhoto {
        public List<GamePhoto> data = new List<GamePhoto>();
    }
    
    public class ResponseGamePhotoDict : BaseResponseGamePhoto {
        public Dictionary<string, GamePhoto> data
            = new Dictionary<string, GamePhoto>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameVideo {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameVideoString : BaseResponseGameVideo {
        public string data = "";
    }
    
    public class ResponseGameVideoBool : BaseResponseGameVideo {
        public bool data;
    }
    
    public class ResponseGameVideoInt : BaseResponseGameVideo {
        public int data;
    }
    
    public class ResponseGameVideoObject : BaseResponseGameVideo {
        public GameVideo data = new GameVideo();
    }
    
    public class ResponseGameVideoResult : BaseResponseGameVideo {
        public GameVideoResult data = new GameVideoResult();
    }
    
    public class ResponseGameVideoList : BaseResponseGameVideo {
        public List<GameVideo> data = new List<GameVideo>();
    }
    
    public class ResponseGameVideoDict : BaseResponseGameVideo {
        public Dictionary<string, GameVideo> data
            = new Dictionary<string, GameVideo>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameRpgItemWeapon {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameRpgItemWeaponString : BaseResponseGameRpgItemWeapon {
        public string data = "";
    }
    
    public class ResponseGameRpgItemWeaponBool : BaseResponseGameRpgItemWeapon {
        public bool data;
    }
    
    public class ResponseGameRpgItemWeaponInt : BaseResponseGameRpgItemWeapon {
        public int data;
    }
    
    public class ResponseGameRpgItemWeaponObject : BaseResponseGameRpgItemWeapon {
        public GameRpgItemWeapon data = new GameRpgItemWeapon();
    }
    
    public class ResponseGameRpgItemWeaponResult : BaseResponseGameRpgItemWeapon {
        public GameRpgItemWeaponResult data = new GameRpgItemWeaponResult();
    }
    
    public class ResponseGameRpgItemWeaponList : BaseResponseGameRpgItemWeapon {
        public List<GameRpgItemWeapon> data = new List<GameRpgItemWeapon>();
    }
    
    public class ResponseGameRpgItemWeaponDict : BaseResponseGameRpgItemWeapon {
        public Dictionary<string, GameRpgItemWeapon> data
            = new Dictionary<string, GameRpgItemWeapon>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameRpgItemSkill {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameRpgItemSkillString : BaseResponseGameRpgItemSkill {
        public string data = "";
    }
    
    public class ResponseGameRpgItemSkillBool : BaseResponseGameRpgItemSkill {
        public bool data;
    }
    
    public class ResponseGameRpgItemSkillInt : BaseResponseGameRpgItemSkill {
        public int data;
    }
    
    public class ResponseGameRpgItemSkillObject : BaseResponseGameRpgItemSkill {
        public GameRpgItemSkill data = new GameRpgItemSkill();
    }
    
    public class ResponseGameRpgItemSkillResult : BaseResponseGameRpgItemSkill {
        public GameRpgItemSkillResult data = new GameRpgItemSkillResult();
    }
    
    public class ResponseGameRpgItemSkillList : BaseResponseGameRpgItemSkill {
        public List<GameRpgItemSkill> data = new List<GameRpgItemSkill>();
    }
    
    public class ResponseGameRpgItemSkillDict : BaseResponseGameRpgItemSkill {
        public Dictionary<string, GameRpgItemSkill> data
            = new Dictionary<string, GameRpgItemSkill>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProduct {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProductString : BaseResponseGameProduct {
        public string data = "";
    }
    
    public class ResponseGameProductBool : BaseResponseGameProduct {
        public bool data;
    }
    
    public class ResponseGameProductInt : BaseResponseGameProduct {
        public int data;
    }
    
    public class ResponseGameProductObject : BaseResponseGameProduct {
        public GameProduct data = new GameProduct();
    }
    
    public class ResponseGameProductResult : BaseResponseGameProduct {
        public GameProductResult data = new GameProductResult();
    }
    
    public class ResponseGameProductList : BaseResponseGameProduct {
        public List<GameProduct> data = new List<GameProduct>();
    }
    
    public class ResponseGameProductDict : BaseResponseGameProduct {
        public Dictionary<string, GameProduct> data
            = new Dictionary<string, GameProduct>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameLeaderboard {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameLeaderboardString : BaseResponseGameLeaderboard {
        public string data = "";
    }
    
    public class ResponseGameLeaderboardBool : BaseResponseGameLeaderboard {
        public bool data;
    }
    
    public class ResponseGameLeaderboardInt : BaseResponseGameLeaderboard {
        public int data;
    }
    
    public class ResponseGameLeaderboardObject : BaseResponseGameLeaderboard {
        public GameLeaderboard data = new GameLeaderboard();
    }
    
    public class ResponseGameLeaderboardResult : BaseResponseGameLeaderboard {
        public GameLeaderboardResult data = new GameLeaderboardResult();
    }
    
    public class ResponseGameLeaderboardList : BaseResponseGameLeaderboard {
        public List<GameLeaderboard> data = new List<GameLeaderboard>();
    }
    
    public class ResponseGameLeaderboardDict : BaseResponseGameLeaderboard {
        public Dictionary<string, GameLeaderboard> data
            = new Dictionary<string, GameLeaderboard>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameLeaderboardItem {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameLeaderboardItemString : BaseResponseGameLeaderboardItem {
        public string data = "";
    }
    
    public class ResponseGameLeaderboardItemBool : BaseResponseGameLeaderboardItem {
        public bool data;
    }
    
    public class ResponseGameLeaderboardItemInt : BaseResponseGameLeaderboardItem {
        public int data;
    }
    
    public class ResponseGameLeaderboardItemObject : BaseResponseGameLeaderboardItem {
        public GameLeaderboardItem data = new GameLeaderboardItem();
    }
    
    public class ResponseGameLeaderboardItemResult : BaseResponseGameLeaderboardItem {
        public GameLeaderboardItemResult data = new GameLeaderboardItemResult();
    }
    
    public class ResponseGameLeaderboardItemList : BaseResponseGameLeaderboardItem {
        public List<GameLeaderboardItem> data = new List<GameLeaderboardItem>();
    }
    
    public class ResponseGameLeaderboardItemDict : BaseResponseGameLeaderboardItem {
        public Dictionary<string, GameLeaderboardItem> data
            = new Dictionary<string, GameLeaderboardItem>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameLeaderboardRollup {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameLeaderboardRollupString : BaseResponseGameLeaderboardRollup {
        public string data = "";
    }
    
    public class ResponseGameLeaderboardRollupBool : BaseResponseGameLeaderboardRollup {
        public bool data;
    }
    
    public class ResponseGameLeaderboardRollupInt : BaseResponseGameLeaderboardRollup {
        public int data;
    }
    
    public class ResponseGameLeaderboardRollupObject : BaseResponseGameLeaderboardRollup {
        public GameLeaderboardRollup data = new GameLeaderboardRollup();
    }
    
    public class ResponseGameLeaderboardRollupResult : BaseResponseGameLeaderboardRollup {
        public GameLeaderboardRollupResult data = new GameLeaderboardRollupResult();
    }
    
    public class ResponseGameLeaderboardRollupList : BaseResponseGameLeaderboardRollup {
        public List<GameLeaderboardRollup> data = new List<GameLeaderboardRollup>();
    }
    
    public class ResponseGameLeaderboardRollupDict : BaseResponseGameLeaderboardRollup {
        public Dictionary<string, GameLeaderboardRollup> data
            = new Dictionary<string, GameLeaderboardRollup>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameLiveQueue {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameLiveQueueString : BaseResponseGameLiveQueue {
        public string data = "";
    }
    
    public class ResponseGameLiveQueueBool : BaseResponseGameLiveQueue {
        public bool data;
    }
    
    public class ResponseGameLiveQueueInt : BaseResponseGameLiveQueue {
        public int data;
    }
    
    public class ResponseGameLiveQueueObject : BaseResponseGameLiveQueue {
        public GameLiveQueue data = new GameLiveQueue();
    }
    
    public class ResponseGameLiveQueueResult : BaseResponseGameLiveQueue {
        public GameLiveQueueResult data = new GameLiveQueueResult();
    }
    
    public class ResponseGameLiveQueueList : BaseResponseGameLiveQueue {
        public List<GameLiveQueue> data = new List<GameLiveQueue>();
    }
    
    public class ResponseGameLiveQueueDict : BaseResponseGameLiveQueue {
        public Dictionary<string, GameLiveQueue> data
            = new Dictionary<string, GameLiveQueue>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameLiveRecentQueue {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameLiveRecentQueueString : BaseResponseGameLiveRecentQueue {
        public string data = "";
    }
    
    public class ResponseGameLiveRecentQueueBool : BaseResponseGameLiveRecentQueue {
        public bool data;
    }
    
    public class ResponseGameLiveRecentQueueInt : BaseResponseGameLiveRecentQueue {
        public int data;
    }
    
    public class ResponseGameLiveRecentQueueObject : BaseResponseGameLiveRecentQueue {
        public GameLiveRecentQueue data = new GameLiveRecentQueue();
    }
    
    public class ResponseGameLiveRecentQueueResult : BaseResponseGameLiveRecentQueue {
        public GameLiveRecentQueueResult data = new GameLiveRecentQueueResult();
    }
    
    public class ResponseGameLiveRecentQueueList : BaseResponseGameLiveRecentQueue {
        public List<GameLiveRecentQueue> data = new List<GameLiveRecentQueue>();
    }
    
    public class ResponseGameLiveRecentQueueDict : BaseResponseGameLiveRecentQueue {
        public Dictionary<string, GameLiveRecentQueue> data
            = new Dictionary<string, GameLiveRecentQueue>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProfileStatistic {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProfileStatisticString : BaseResponseGameProfileStatistic {
        public string data = "";
    }
    
    public class ResponseGameProfileStatisticBool : BaseResponseGameProfileStatistic {
        public bool data;
    }
    
    public class ResponseGameProfileStatisticInt : BaseResponseGameProfileStatistic {
        public int data;
    }
    
    public class ResponseGameProfileStatisticObject : BaseResponseGameProfileStatistic {
        public GameProfileStatistic data = new GameProfileStatistic();
    }
    
    public class ResponseGameProfileStatisticResult : BaseResponseGameProfileStatistic {
        public GameProfileStatisticResult data = new GameProfileStatisticResult();
    }
    
    public class ResponseGameProfileStatisticList : BaseResponseGameProfileStatistic {
        public List<GameProfileStatistic> data = new List<GameProfileStatistic>();
    }
    
    public class ResponseGameProfileStatisticDict : BaseResponseGameProfileStatistic {
        public Dictionary<string, GameProfileStatistic> data
            = new Dictionary<string, GameProfileStatistic>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameStatisticMeta {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameStatisticMetaString : BaseResponseGameStatisticMeta {
        public string data = "";
    }
    
    public class ResponseGameStatisticMetaBool : BaseResponseGameStatisticMeta {
        public bool data;
    }
    
    public class ResponseGameStatisticMetaInt : BaseResponseGameStatisticMeta {
        public int data;
    }
    
    public class ResponseGameStatisticMetaObject : BaseResponseGameStatisticMeta {
        public GameStatisticMeta data = new GameStatisticMeta();
    }
    
    public class ResponseGameStatisticMetaResult : BaseResponseGameStatisticMeta {
        public GameStatisticMetaResult data = new GameStatisticMetaResult();
    }
    
    public class ResponseGameStatisticMetaList : BaseResponseGameStatisticMeta {
        public List<GameStatisticMeta> data = new List<GameStatisticMeta>();
    }
    
    public class ResponseGameStatisticMetaDict : BaseResponseGameStatisticMeta {
        public Dictionary<string, GameStatisticMeta> data
            = new Dictionary<string, GameStatisticMeta>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProfileStatisticItem {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProfileStatisticItemString : BaseResponseGameProfileStatisticItem {
        public string data = "";
    }
    
    public class ResponseGameProfileStatisticItemBool : BaseResponseGameProfileStatisticItem {
        public bool data;
    }
    
    public class ResponseGameProfileStatisticItemInt : BaseResponseGameProfileStatisticItem {
        public int data;
    }
    
    public class ResponseGameProfileStatisticItemObject : BaseResponseGameProfileStatisticItem {
        public GameProfileStatisticItem data = new GameProfileStatisticItem();
    }
    
    public class ResponseGameProfileStatisticItemResult : BaseResponseGameProfileStatisticItem {
        public GameProfileStatisticItemResult data = new GameProfileStatisticItemResult();
    }
    
    public class ResponseGameProfileStatisticItemList : BaseResponseGameProfileStatisticItem {
        public List<GameProfileStatisticItem> data = new List<GameProfileStatisticItem>();
    }
    
    public class ResponseGameProfileStatisticItemDict : BaseResponseGameProfileStatisticItem {
        public Dictionary<string, GameProfileStatisticItem> data
            = new Dictionary<string, GameProfileStatisticItem>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameKeyMeta {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameKeyMetaString : BaseResponseGameKeyMeta {
        public string data = "";
    }
    
    public class ResponseGameKeyMetaBool : BaseResponseGameKeyMeta {
        public bool data;
    }
    
    public class ResponseGameKeyMetaInt : BaseResponseGameKeyMeta {
        public int data;
    }
    
    public class ResponseGameKeyMetaObject : BaseResponseGameKeyMeta {
        public GameKeyMeta data = new GameKeyMeta();
    }
    
    public class ResponseGameKeyMetaResult : BaseResponseGameKeyMeta {
        public GameKeyMetaResult data = new GameKeyMetaResult();
    }
    
    public class ResponseGameKeyMetaList : BaseResponseGameKeyMeta {
        public List<GameKeyMeta> data = new List<GameKeyMeta>();
    }
    
    public class ResponseGameKeyMetaDict : BaseResponseGameKeyMeta {
        public Dictionary<string, GameKeyMeta> data
            = new Dictionary<string, GameKeyMeta>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameLevel {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameLevelString : BaseResponseGameLevel {
        public string data = "";
    }
    
    public class ResponseGameLevelBool : BaseResponseGameLevel {
        public bool data;
    }
    
    public class ResponseGameLevelInt : BaseResponseGameLevel {
        public int data;
    }
    
    public class ResponseGameLevelObject : BaseResponseGameLevel {
        public GameLevel data = new GameLevel();
    }
    
    public class ResponseGameLevelResult : BaseResponseGameLevel {
        public GameLevelResult data = new GameLevelResult();
    }
    
    public class ResponseGameLevelList : BaseResponseGameLevel {
        public List<GameLevel> data = new List<GameLevel>();
    }
    
    public class ResponseGameLevelDict : BaseResponseGameLevel {
        public Dictionary<string, GameLevel> data
            = new Dictionary<string, GameLevel>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameProfileAchievement {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameProfileAchievementString : BaseResponseGameProfileAchievement {
        public string data = "";
    }
    
    public class ResponseGameProfileAchievementBool : BaseResponseGameProfileAchievement {
        public bool data;
    }
    
    public class ResponseGameProfileAchievementInt : BaseResponseGameProfileAchievement {
        public int data;
    }
    
    public class ResponseGameProfileAchievementObject : BaseResponseGameProfileAchievement {
        public GameProfileAchievement data = new GameProfileAchievement();
    }
    
    public class ResponseGameProfileAchievementResult : BaseResponseGameProfileAchievement {
        public GameProfileAchievementResult data = new GameProfileAchievementResult();
    }
    
    public class ResponseGameProfileAchievementList : BaseResponseGameProfileAchievement {
        public List<GameProfileAchievement> data = new List<GameProfileAchievement>();
    }
    
    public class ResponseGameProfileAchievementDict : BaseResponseGameProfileAchievement {
        public Dictionary<string, GameProfileAchievement> data
            = new Dictionary<string, GameProfileAchievement>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseGameAchievementMeta {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseGameAchievementMetaString : BaseResponseGameAchievementMeta {
        public string data = "";
    }
    
    public class ResponseGameAchievementMetaBool : BaseResponseGameAchievementMeta {
        public bool data;
    }
    
    public class ResponseGameAchievementMetaInt : BaseResponseGameAchievementMeta {
        public int data;
    }
    
    public class ResponseGameAchievementMetaObject : BaseResponseGameAchievementMeta {
        public GameAchievementMeta data = new GameAchievementMeta();
    }
    
    public class ResponseGameAchievementMetaResult : BaseResponseGameAchievementMeta {
        public GameAchievementMetaResult data = new GameAchievementMetaResult();
    }
    
    public class ResponseGameAchievementMetaList : BaseResponseGameAchievementMeta {
        public List<GameAchievementMeta> data = new List<GameAchievementMeta>();
    }
    
    public class ResponseGameAchievementMetaDict : BaseResponseGameAchievementMeta {
        public Dictionary<string, GameAchievementMeta> data
            = new Dictionary<string, GameAchievementMeta>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileReward {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileRewardString : BaseResponseProfileReward {
        public string data = "";
    }
    
    public class ResponseProfileRewardBool : BaseResponseProfileReward {
        public bool data;
    }
    
    public class ResponseProfileRewardInt : BaseResponseProfileReward {
        public int data;
    }
    
    public class ResponseProfileRewardObject : BaseResponseProfileReward {
        public ProfileReward data = new ProfileReward();
    }
    
    public class ResponseProfileRewardResult : BaseResponseProfileReward {
        public ProfileRewardResult data = new ProfileRewardResult();
    }
    
    public class ResponseProfileRewardList : BaseResponseProfileReward {
        public List<ProfileReward> data = new List<ProfileReward>();
    }
    
    public class ResponseProfileRewardDict : BaseResponseProfileReward {
        public Dictionary<string, ProfileReward> data
            = new Dictionary<string, ProfileReward>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseCoupon {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseCouponString : BaseResponseCoupon {
        public string data = "";
    }
    
    public class ResponseCouponBool : BaseResponseCoupon {
        public bool data;
    }
    
    public class ResponseCouponInt : BaseResponseCoupon {
        public int data;
    }
    
    public class ResponseCouponObject : BaseResponseCoupon {
        public Coupon data = new Coupon();
    }
    
    public class ResponseCouponResult : BaseResponseCoupon {
        public CouponResult data = new CouponResult();
    }
    
    public class ResponseCouponList : BaseResponseCoupon {
        public List<Coupon> data = new List<Coupon>();
    }
    
    public class ResponseCouponDict : BaseResponseCoupon {
        public Dictionary<string, Coupon> data
            = new Dictionary<string, Coupon>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileCoupon {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileCouponString : BaseResponseProfileCoupon {
        public string data = "";
    }
    
    public class ResponseProfileCouponBool : BaseResponseProfileCoupon {
        public bool data;
    }
    
    public class ResponseProfileCouponInt : BaseResponseProfileCoupon {
        public int data;
    }
    
    public class ResponseProfileCouponObject : BaseResponseProfileCoupon {
        public ProfileCoupon data = new ProfileCoupon();
    }
    
    public class ResponseProfileCouponResult : BaseResponseProfileCoupon {
        public ProfileCouponResult data = new ProfileCouponResult();
    }
    
    public class ResponseProfileCouponList : BaseResponseProfileCoupon {
        public List<ProfileCoupon> data = new List<ProfileCoupon>();
    }
    
    public class ResponseProfileCouponDict : BaseResponseProfileCoupon {
        public Dictionary<string, ProfileCoupon> data
            = new Dictionary<string, ProfileCoupon>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOrg {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOrgString : BaseResponseOrg {
        public string data = "";
    }
    
    public class ResponseOrgBool : BaseResponseOrg {
        public bool data;
    }
    
    public class ResponseOrgInt : BaseResponseOrg {
        public int data;
    }
    
    public class ResponseOrgObject : BaseResponseOrg {
        public Org data = new Org();
    }
    
    public class ResponseOrgResult : BaseResponseOrg {
        public OrgResult data = new OrgResult();
    }
    
    public class ResponseOrgList : BaseResponseOrg {
        public List<Org> data = new List<Org>();
    }
    
    public class ResponseOrgDict : BaseResponseOrg {
        public Dictionary<string, Org> data
            = new Dictionary<string, Org>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseChannel {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseChannelString : BaseResponseChannel {
        public string data = "";
    }
    
    public class ResponseChannelBool : BaseResponseChannel {
        public bool data;
    }
    
    public class ResponseChannelInt : BaseResponseChannel {
        public int data;
    }
    
    public class ResponseChannelObject : BaseResponseChannel {
        public Channel data = new Channel();
    }
    
    public class ResponseChannelResult : BaseResponseChannel {
        public ChannelResult data = new ChannelResult();
    }
    
    public class ResponseChannelList : BaseResponseChannel {
        public List<Channel> data = new List<Channel>();
    }
    
    public class ResponseChannelDict : BaseResponseChannel {
        public Dictionary<string, Channel> data
            = new Dictionary<string, Channel>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseChannelType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseChannelTypeString : BaseResponseChannelType {
        public string data = "";
    }
    
    public class ResponseChannelTypeBool : BaseResponseChannelType {
        public bool data;
    }
    
    public class ResponseChannelTypeInt : BaseResponseChannelType {
        public int data;
    }
    
    public class ResponseChannelTypeObject : BaseResponseChannelType {
        public ChannelType data = new ChannelType();
    }
    
    public class ResponseChannelTypeResult : BaseResponseChannelType {
        public ChannelTypeResult data = new ChannelTypeResult();
    }
    
    public class ResponseChannelTypeList : BaseResponseChannelType {
        public List<ChannelType> data = new List<ChannelType>();
    }
    
    public class ResponseChannelTypeDict : BaseResponseChannelType {
        public Dictionary<string, ChannelType> data
            = new Dictionary<string, ChannelType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseReward {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseRewardString : BaseResponseReward {
        public string data = "";
    }
    
    public class ResponseRewardBool : BaseResponseReward {
        public bool data;
    }
    
    public class ResponseRewardInt : BaseResponseReward {
        public int data;
    }
    
    public class ResponseRewardObject : BaseResponseReward {
        public Reward data = new Reward();
    }
    
    public class ResponseRewardResult : BaseResponseReward {
        public RewardResult data = new RewardResult();
    }
    
    public class ResponseRewardList : BaseResponseReward {
        public List<Reward> data = new List<Reward>();
    }
    
    public class ResponseRewardDict : BaseResponseReward {
        public Dictionary<string, Reward> data
            = new Dictionary<string, Reward>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseRewardType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseRewardTypeString : BaseResponseRewardType {
        public string data = "";
    }
    
    public class ResponseRewardTypeBool : BaseResponseRewardType {
        public bool data;
    }
    
    public class ResponseRewardTypeInt : BaseResponseRewardType {
        public int data;
    }
    
    public class ResponseRewardTypeObject : BaseResponseRewardType {
        public RewardType data = new RewardType();
    }
    
    public class ResponseRewardTypeResult : BaseResponseRewardType {
        public RewardTypeResult data = new RewardTypeResult();
    }
    
    public class ResponseRewardTypeList : BaseResponseRewardType {
        public List<RewardType> data = new List<RewardType>();
    }
    
    public class ResponseRewardTypeDict : BaseResponseRewardType {
        public Dictionary<string, RewardType> data
            = new Dictionary<string, RewardType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseRewardCondition {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseRewardConditionString : BaseResponseRewardCondition {
        public string data = "";
    }
    
    public class ResponseRewardConditionBool : BaseResponseRewardCondition {
        public bool data;
    }
    
    public class ResponseRewardConditionInt : BaseResponseRewardCondition {
        public int data;
    }
    
    public class ResponseRewardConditionObject : BaseResponseRewardCondition {
        public RewardCondition data = new RewardCondition();
    }
    
    public class ResponseRewardConditionResult : BaseResponseRewardCondition {
        public RewardConditionResult data = new RewardConditionResult();
    }
    
    public class ResponseRewardConditionList : BaseResponseRewardCondition {
        public List<RewardCondition> data = new List<RewardCondition>();
    }
    
    public class ResponseRewardConditionDict : BaseResponseRewardCondition {
        public Dictionary<string, RewardCondition> data
            = new Dictionary<string, RewardCondition>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseRewardConditionType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseRewardConditionTypeString : BaseResponseRewardConditionType {
        public string data = "";
    }
    
    public class ResponseRewardConditionTypeBool : BaseResponseRewardConditionType {
        public bool data;
    }
    
    public class ResponseRewardConditionTypeInt : BaseResponseRewardConditionType {
        public int data;
    }
    
    public class ResponseRewardConditionTypeObject : BaseResponseRewardConditionType {
        public RewardConditionType data = new RewardConditionType();
    }
    
    public class ResponseRewardConditionTypeResult : BaseResponseRewardConditionType {
        public RewardConditionTypeResult data = new RewardConditionTypeResult();
    }
    
    public class ResponseRewardConditionTypeList : BaseResponseRewardConditionType {
        public List<RewardConditionType> data = new List<RewardConditionType>();
    }
    
    public class ResponseRewardConditionTypeDict : BaseResponseRewardConditionType {
        public Dictionary<string, RewardConditionType> data
            = new Dictionary<string, RewardConditionType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseQuestion {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseQuestionString : BaseResponseQuestion {
        public string data = "";
    }
    
    public class ResponseQuestionBool : BaseResponseQuestion {
        public bool data;
    }
    
    public class ResponseQuestionInt : BaseResponseQuestion {
        public int data;
    }
    
    public class ResponseQuestionObject : BaseResponseQuestion {
        public Question data = new Question();
    }
    
    public class ResponseQuestionResult : BaseResponseQuestion {
        public QuestionResult data = new QuestionResult();
    }
    
    public class ResponseQuestionList : BaseResponseQuestion {
        public List<Question> data = new List<Question>();
    }
    
    public class ResponseQuestionDict : BaseResponseQuestion {
        public Dictionary<string, Question> data
            = new Dictionary<string, Question>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileQuestion {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileQuestionString : BaseResponseProfileQuestion {
        public string data = "";
    }
    
    public class ResponseProfileQuestionBool : BaseResponseProfileQuestion {
        public bool data;
    }
    
    public class ResponseProfileQuestionInt : BaseResponseProfileQuestion {
        public int data;
    }
    
    public class ResponseProfileQuestionObject : BaseResponseProfileQuestion {
        public ProfileQuestion data = new ProfileQuestion();
    }
    
    public class ResponseProfileQuestionResult : BaseResponseProfileQuestion {
        public ProfileQuestionResult data = new ProfileQuestionResult();
    }
    
    public class ResponseProfileQuestionList : BaseResponseProfileQuestion {
        public List<ProfileQuestion> data = new List<ProfileQuestion>();
    }
    
    public class ResponseProfileQuestionDict : BaseResponseProfileQuestion {
        public Dictionary<string, ProfileQuestion> data
            = new Dictionary<string, ProfileQuestion>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileChannel {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileChannelString : BaseResponseProfileChannel {
        public string data = "";
    }
    
    public class ResponseProfileChannelBool : BaseResponseProfileChannel {
        public bool data;
    }
    
    public class ResponseProfileChannelInt : BaseResponseProfileChannel {
        public int data;
    }
    
    public class ResponseProfileChannelObject : BaseResponseProfileChannel {
        public ProfileChannel data = new ProfileChannel();
    }
    
    public class ResponseProfileChannelResult : BaseResponseProfileChannel {
        public ProfileChannelResult data = new ProfileChannelResult();
    }
    
    public class ResponseProfileChannelList : BaseResponseProfileChannel {
        public List<ProfileChannel> data = new List<ProfileChannel>();
    }
    
    public class ResponseProfileChannelDict : BaseResponseProfileChannel {
        public Dictionary<string, ProfileChannel> data
            = new Dictionary<string, ProfileChannel>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileRewardPoints {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileRewardPointsString : BaseResponseProfileRewardPoints {
        public string data = "";
    }
    
    public class ResponseProfileRewardPointsBool : BaseResponseProfileRewardPoints {
        public bool data;
    }
    
    public class ResponseProfileRewardPointsInt : BaseResponseProfileRewardPoints {
        public int data;
    }
    
    public class ResponseProfileRewardPointsObject : BaseResponseProfileRewardPoints {
        public ProfileRewardPoints data = new ProfileRewardPoints();
    }
    
    public class ResponseProfileRewardPointsResult : BaseResponseProfileRewardPoints {
        public ProfileRewardPointsResult data = new ProfileRewardPointsResult();
    }
    
    public class ResponseProfileRewardPointsList : BaseResponseProfileRewardPoints {
        public List<ProfileRewardPoints> data = new List<ProfileRewardPoints>();
    }
    
    public class ResponseProfileRewardPointsDict : BaseResponseProfileRewardPoints {
        public Dictionary<string, ProfileRewardPoints> data
            = new Dictionary<string, ProfileRewardPoints>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseRewardCompetition {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseRewardCompetitionString : BaseResponseRewardCompetition {
        public string data = "";
    }
    
    public class ResponseRewardCompetitionBool : BaseResponseRewardCompetition {
        public bool data;
    }
    
    public class ResponseRewardCompetitionInt : BaseResponseRewardCompetition {
        public int data;
    }
    
    public class ResponseRewardCompetitionObject : BaseResponseRewardCompetition {
        public RewardCompetition data = new RewardCompetition();
    }
    
    public class ResponseRewardCompetitionResult : BaseResponseRewardCompetition {
        public RewardCompetitionResult data = new RewardCompetitionResult();
    }
    
    public class ResponseRewardCompetitionList : BaseResponseRewardCompetition {
        public List<RewardCompetition> data = new List<RewardCompetition>();
    }
    
    public class ResponseRewardCompetitionDict : BaseResponseRewardCompetition {
        public Dictionary<string, RewardCompetition> data
            = new Dictionary<string, RewardCompetition>();
    }
    
}
"""

*/
?>



