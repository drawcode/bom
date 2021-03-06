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
        
    public class BaseResponseApp {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseAppString : BaseResponseApp {
        public string data = "";
    }
    
    public class ResponseAppBool : BaseResponseApp {
        public bool data;
    }
    
    public class ResponseAppInt : BaseResponseApp {
        public int data;
    }
    
    public class ResponseAppObject : BaseResponseApp {
        public App data = new App();
    }
    
    public class ResponseAppResult : BaseResponseApp {
        public AppResult data = new AppResult();
    }
    
    public class ResponseAppList : BaseResponseApp {
        public List<App> data = new List<App>();
    }
    
    public class ResponseAppDict : BaseResponseApp {
        public Dictionary<string, App> data
            = new Dictionary<string, App>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseAppType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseAppTypeString : BaseResponseAppType {
        public string data = "";
    }
    
    public class ResponseAppTypeBool : BaseResponseAppType {
        public bool data;
    }
    
    public class ResponseAppTypeInt : BaseResponseAppType {
        public int data;
    }
    
    public class ResponseAppTypeObject : BaseResponseAppType {
        public AppType data = new AppType();
    }
    
    public class ResponseAppTypeResult : BaseResponseAppType {
        public AppTypeResult data = new AppTypeResult();
    }
    
    public class ResponseAppTypeList : BaseResponseAppType {
        public List<AppType> data = new List<AppType>();
    }
    
    public class ResponseAppTypeDict : BaseResponseAppType {
        public Dictionary<string, AppType> data
            = new Dictionary<string, AppType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseSite {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseSiteString : BaseResponseSite {
        public string data = "";
    }
    
    public class ResponseSiteBool : BaseResponseSite {
        public bool data;
    }
    
    public class ResponseSiteInt : BaseResponseSite {
        public int data;
    }
    
    public class ResponseSiteObject : BaseResponseSite {
        public Site data = new Site();
    }
    
    public class ResponseSiteResult : BaseResponseSite {
        public SiteResult data = new SiteResult();
    }
    
    public class ResponseSiteList : BaseResponseSite {
        public List<Site> data = new List<Site>();
    }
    
    public class ResponseSiteDict : BaseResponseSite {
        public Dictionary<string, Site> data
            = new Dictionary<string, Site>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseSiteType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseSiteTypeString : BaseResponseSiteType {
        public string data = "";
    }
    
    public class ResponseSiteTypeBool : BaseResponseSiteType {
        public bool data;
    }
    
    public class ResponseSiteTypeInt : BaseResponseSiteType {
        public int data;
    }
    
    public class ResponseSiteTypeObject : BaseResponseSiteType {
        public SiteType data = new SiteType();
    }
    
    public class ResponseSiteTypeResult : BaseResponseSiteType {
        public SiteTypeResult data = new SiteTypeResult();
    }
    
    public class ResponseSiteTypeList : BaseResponseSiteType {
        public List<SiteType> data = new List<SiteType>();
    }
    
    public class ResponseSiteTypeDict : BaseResponseSiteType {
        public Dictionary<string, SiteType> data
            = new Dictionary<string, SiteType>();
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
        
    public class BaseResponseOrgType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOrgTypeString : BaseResponseOrgType {
        public string data = "";
    }
    
    public class ResponseOrgTypeBool : BaseResponseOrgType {
        public bool data;
    }
    
    public class ResponseOrgTypeInt : BaseResponseOrgType {
        public int data;
    }
    
    public class ResponseOrgTypeObject : BaseResponseOrgType {
        public OrgType data = new OrgType();
    }
    
    public class ResponseOrgTypeResult : BaseResponseOrgType {
        public OrgTypeResult data = new OrgTypeResult();
    }
    
    public class ResponseOrgTypeList : BaseResponseOrgType {
        public List<OrgType> data = new List<OrgType>();
    }
    
    public class ResponseOrgTypeDict : BaseResponseOrgType {
        public Dictionary<string, OrgType> data
            = new Dictionary<string, OrgType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseContentItem {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseContentItemString : BaseResponseContentItem {
        public string data = "";
    }
    
    public class ResponseContentItemBool : BaseResponseContentItem {
        public bool data;
    }
    
    public class ResponseContentItemInt : BaseResponseContentItem {
        public int data;
    }
    
    public class ResponseContentItemObject : BaseResponseContentItem {
        public ContentItem data = new ContentItem();
    }
    
    public class ResponseContentItemResult : BaseResponseContentItem {
        public ContentItemResult data = new ContentItemResult();
    }
    
    public class ResponseContentItemList : BaseResponseContentItem {
        public List<ContentItem> data = new List<ContentItem>();
    }
    
    public class ResponseContentItemDict : BaseResponseContentItem {
        public Dictionary<string, ContentItem> data
            = new Dictionary<string, ContentItem>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseContentItemType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseContentItemTypeString : BaseResponseContentItemType {
        public string data = "";
    }
    
    public class ResponseContentItemTypeBool : BaseResponseContentItemType {
        public bool data;
    }
    
    public class ResponseContentItemTypeInt : BaseResponseContentItemType {
        public int data;
    }
    
    public class ResponseContentItemTypeObject : BaseResponseContentItemType {
        public ContentItemType data = new ContentItemType();
    }
    
    public class ResponseContentItemTypeResult : BaseResponseContentItemType {
        public ContentItemTypeResult data = new ContentItemTypeResult();
    }
    
    public class ResponseContentItemTypeList : BaseResponseContentItemType {
        public List<ContentItemType> data = new List<ContentItemType>();
    }
    
    public class ResponseContentItemTypeDict : BaseResponseContentItemType {
        public Dictionary<string, ContentItemType> data
            = new Dictionary<string, ContentItemType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseContentPage {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseContentPageString : BaseResponseContentPage {
        public string data = "";
    }
    
    public class ResponseContentPageBool : BaseResponseContentPage {
        public bool data;
    }
    
    public class ResponseContentPageInt : BaseResponseContentPage {
        public int data;
    }
    
    public class ResponseContentPageObject : BaseResponseContentPage {
        public ContentPage data = new ContentPage();
    }
    
    public class ResponseContentPageResult : BaseResponseContentPage {
        public ContentPageResult data = new ContentPageResult();
    }
    
    public class ResponseContentPageList : BaseResponseContentPage {
        public List<ContentPage> data = new List<ContentPage>();
    }
    
    public class ResponseContentPageDict : BaseResponseContentPage {
        public Dictionary<string, ContentPage> data
            = new Dictionary<string, ContentPage>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseMessage {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseMessageString : BaseResponseMessage {
        public string data = "";
    }
    
    public class ResponseMessageBool : BaseResponseMessage {
        public bool data;
    }
    
    public class ResponseMessageInt : BaseResponseMessage {
        public int data;
    }
    
    public class ResponseMessageObject : BaseResponseMessage {
        public Message data = new Message();
    }
    
    public class ResponseMessageResult : BaseResponseMessage {
        public MessageResult data = new MessageResult();
    }
    
    public class ResponseMessageList : BaseResponseMessage {
        public List<Message> data = new List<Message>();
    }
    
    public class ResponseMessageDict : BaseResponseMessage {
        public Dictionary<string, Message> data
            = new Dictionary<string, Message>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOffer {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOfferString : BaseResponseOffer {
        public string data = "";
    }
    
    public class ResponseOfferBool : BaseResponseOffer {
        public bool data;
    }
    
    public class ResponseOfferInt : BaseResponseOffer {
        public int data;
    }
    
    public class ResponseOfferObject : BaseResponseOffer {
        public Offer data = new Offer();
    }
    
    public class ResponseOfferResult : BaseResponseOffer {
        public OfferResult data = new OfferResult();
    }
    
    public class ResponseOfferList : BaseResponseOffer {
        public List<Offer> data = new List<Offer>();
    }
    
    public class ResponseOfferDict : BaseResponseOffer {
        public Dictionary<string, Offer> data
            = new Dictionary<string, Offer>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOfferType {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOfferTypeString : BaseResponseOfferType {
        public string data = "";
    }
    
    public class ResponseOfferTypeBool : BaseResponseOfferType {
        public bool data;
    }
    
    public class ResponseOfferTypeInt : BaseResponseOfferType {
        public int data;
    }
    
    public class ResponseOfferTypeObject : BaseResponseOfferType {
        public OfferType data = new OfferType();
    }
    
    public class ResponseOfferTypeResult : BaseResponseOfferType {
        public OfferTypeResult data = new OfferTypeResult();
    }
    
    public class ResponseOfferTypeList : BaseResponseOfferType {
        public List<OfferType> data = new List<OfferType>();
    }
    
    public class ResponseOfferTypeDict : BaseResponseOfferType {
        public Dictionary<string, OfferType> data
            = new Dictionary<string, OfferType>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOfferLocation {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOfferLocationString : BaseResponseOfferLocation {
        public string data = "";
    }
    
    public class ResponseOfferLocationBool : BaseResponseOfferLocation {
        public bool data;
    }
    
    public class ResponseOfferLocationInt : BaseResponseOfferLocation {
        public int data;
    }
    
    public class ResponseOfferLocationObject : BaseResponseOfferLocation {
        public OfferLocation data = new OfferLocation();
    }
    
    public class ResponseOfferLocationResult : BaseResponseOfferLocation {
        public OfferLocationResult data = new OfferLocationResult();
    }
    
    public class ResponseOfferLocationList : BaseResponseOfferLocation {
        public List<OfferLocation> data = new List<OfferLocation>();
    }
    
    public class ResponseOfferLocationDict : BaseResponseOfferLocation {
        public Dictionary<string, OfferLocation> data
            = new Dictionary<string, OfferLocation>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOfferCategory {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOfferCategoryString : BaseResponseOfferCategory {
        public string data = "";
    }
    
    public class ResponseOfferCategoryBool : BaseResponseOfferCategory {
        public bool data;
    }
    
    public class ResponseOfferCategoryInt : BaseResponseOfferCategory {
        public int data;
    }
    
    public class ResponseOfferCategoryObject : BaseResponseOfferCategory {
        public OfferCategory data = new OfferCategory();
    }
    
    public class ResponseOfferCategoryResult : BaseResponseOfferCategory {
        public OfferCategoryResult data = new OfferCategoryResult();
    }
    
    public class ResponseOfferCategoryList : BaseResponseOfferCategory {
        public List<OfferCategory> data = new List<OfferCategory>();
    }
    
    public class ResponseOfferCategoryDict : BaseResponseOfferCategory {
        public Dictionary<string, OfferCategory> data
            = new Dictionary<string, OfferCategory>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOfferCategoryTree {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOfferCategoryTreeString : BaseResponseOfferCategoryTree {
        public string data = "";
    }
    
    public class ResponseOfferCategoryTreeBool : BaseResponseOfferCategoryTree {
        public bool data;
    }
    
    public class ResponseOfferCategoryTreeInt : BaseResponseOfferCategoryTree {
        public int data;
    }
    
    public class ResponseOfferCategoryTreeObject : BaseResponseOfferCategoryTree {
        public OfferCategoryTree data = new OfferCategoryTree();
    }
    
    public class ResponseOfferCategoryTreeResult : BaseResponseOfferCategoryTree {
        public OfferCategoryTreeResult data = new OfferCategoryTreeResult();
    }
    
    public class ResponseOfferCategoryTreeList : BaseResponseOfferCategoryTree {
        public List<OfferCategoryTree> data = new List<OfferCategoryTree>();
    }
    
    public class ResponseOfferCategoryTreeDict : BaseResponseOfferCategoryTree {
        public Dictionary<string, OfferCategoryTree> data
            = new Dictionary<string, OfferCategoryTree>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOfferCategoryAssoc {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOfferCategoryAssocString : BaseResponseOfferCategoryAssoc {
        public string data = "";
    }
    
    public class ResponseOfferCategoryAssocBool : BaseResponseOfferCategoryAssoc {
        public bool data;
    }
    
    public class ResponseOfferCategoryAssocInt : BaseResponseOfferCategoryAssoc {
        public int data;
    }
    
    public class ResponseOfferCategoryAssocObject : BaseResponseOfferCategoryAssoc {
        public OfferCategoryAssoc data = new OfferCategoryAssoc();
    }
    
    public class ResponseOfferCategoryAssocResult : BaseResponseOfferCategoryAssoc {
        public OfferCategoryAssocResult data = new OfferCategoryAssocResult();
    }
    
    public class ResponseOfferCategoryAssocList : BaseResponseOfferCategoryAssoc {
        public List<OfferCategoryAssoc> data = new List<OfferCategoryAssoc>();
    }
    
    public class ResponseOfferCategoryAssocDict : BaseResponseOfferCategoryAssoc {
        public Dictionary<string, OfferCategoryAssoc> data
            = new Dictionary<string, OfferCategoryAssoc>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseOfferGameLocation {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOfferGameLocationString : BaseResponseOfferGameLocation {
        public string data = "";
    }
    
    public class ResponseOfferGameLocationBool : BaseResponseOfferGameLocation {
        public bool data;
    }
    
    public class ResponseOfferGameLocationInt : BaseResponseOfferGameLocation {
        public int data;
    }
    
    public class ResponseOfferGameLocationObject : BaseResponseOfferGameLocation {
        public OfferGameLocation data = new OfferGameLocation();
    }
    
    public class ResponseOfferGameLocationResult : BaseResponseOfferGameLocation {
        public OfferGameLocationResult data = new OfferGameLocationResult();
    }
    
    public class ResponseOfferGameLocationList : BaseResponseOfferGameLocation {
        public List<OfferGameLocation> data = new List<OfferGameLocation>();
    }
    
    public class ResponseOfferGameLocationDict : BaseResponseOfferGameLocation {
        public Dictionary<string, OfferGameLocation> data
            = new Dictionary<string, OfferGameLocation>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseEventInfo {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseEventInfoString : BaseResponseEventInfo {
        public string data = "";
    }
    
    public class ResponseEventInfoBool : BaseResponseEventInfo {
        public bool data;
    }
    
    public class ResponseEventInfoInt : BaseResponseEventInfo {
        public int data;
    }
    
    public class ResponseEventInfoObject : BaseResponseEventInfo {
        public EventInfo data = new EventInfo();
    }
    
    public class ResponseEventInfoResult : BaseResponseEventInfo {
        public EventInfoResult data = new EventInfoResult();
    }
    
    public class ResponseEventInfoList : BaseResponseEventInfo {
        public List<EventInfo> data = new List<EventInfo>();
    }
    
    public class ResponseEventInfoDict : BaseResponseEventInfo {
        public Dictionary<string, EventInfo> data
            = new Dictionary<string, EventInfo>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseEventLocation {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseEventLocationString : BaseResponseEventLocation {
        public string data = "";
    }
    
    public class ResponseEventLocationBool : BaseResponseEventLocation {
        public bool data;
    }
    
    public class ResponseEventLocationInt : BaseResponseEventLocation {
        public int data;
    }
    
    public class ResponseEventLocationObject : BaseResponseEventLocation {
        public EventLocation data = new EventLocation();
    }
    
    public class ResponseEventLocationResult : BaseResponseEventLocation {
        public EventLocationResult data = new EventLocationResult();
    }
    
    public class ResponseEventLocationList : BaseResponseEventLocation {
        public List<EventLocation> data = new List<EventLocation>();
    }
    
    public class ResponseEventLocationDict : BaseResponseEventLocation {
        public Dictionary<string, EventLocation> data
            = new Dictionary<string, EventLocation>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseEventCategory {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseEventCategoryString : BaseResponseEventCategory {
        public string data = "";
    }
    
    public class ResponseEventCategoryBool : BaseResponseEventCategory {
        public bool data;
    }
    
    public class ResponseEventCategoryInt : BaseResponseEventCategory {
        public int data;
    }
    
    public class ResponseEventCategoryObject : BaseResponseEventCategory {
        public EventCategory data = new EventCategory();
    }
    
    public class ResponseEventCategoryResult : BaseResponseEventCategory {
        public EventCategoryResult data = new EventCategoryResult();
    }
    
    public class ResponseEventCategoryList : BaseResponseEventCategory {
        public List<EventCategory> data = new List<EventCategory>();
    }
    
    public class ResponseEventCategoryDict : BaseResponseEventCategory {
        public Dictionary<string, EventCategory> data
            = new Dictionary<string, EventCategory>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseEventCategoryTree {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseEventCategoryTreeString : BaseResponseEventCategoryTree {
        public string data = "";
    }
    
    public class ResponseEventCategoryTreeBool : BaseResponseEventCategoryTree {
        public bool data;
    }
    
    public class ResponseEventCategoryTreeInt : BaseResponseEventCategoryTree {
        public int data;
    }
    
    public class ResponseEventCategoryTreeObject : BaseResponseEventCategoryTree {
        public EventCategoryTree data = new EventCategoryTree();
    }
    
    public class ResponseEventCategoryTreeResult : BaseResponseEventCategoryTree {
        public EventCategoryTreeResult data = new EventCategoryTreeResult();
    }
    
    public class ResponseEventCategoryTreeList : BaseResponseEventCategoryTree {
        public List<EventCategoryTree> data = new List<EventCategoryTree>();
    }
    
    public class ResponseEventCategoryTreeDict : BaseResponseEventCategoryTree {
        public Dictionary<string, EventCategoryTree> data
            = new Dictionary<string, EventCategoryTree>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseEventCategoryAssoc {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseEventCategoryAssocString : BaseResponseEventCategoryAssoc {
        public string data = "";
    }
    
    public class ResponseEventCategoryAssocBool : BaseResponseEventCategoryAssoc {
        public bool data;
    }
    
    public class ResponseEventCategoryAssocInt : BaseResponseEventCategoryAssoc {
        public int data;
    }
    
    public class ResponseEventCategoryAssocObject : BaseResponseEventCategoryAssoc {
        public EventCategoryAssoc data = new EventCategoryAssoc();
    }
    
    public class ResponseEventCategoryAssocResult : BaseResponseEventCategoryAssoc {
        public EventCategoryAssocResult data = new EventCategoryAssocResult();
    }
    
    public class ResponseEventCategoryAssocList : BaseResponseEventCategoryAssoc {
        public List<EventCategoryAssoc> data = new List<EventCategoryAssoc>();
    }
    
    public class ResponseEventCategoryAssocDict : BaseResponseEventCategoryAssoc {
        public Dictionary<string, EventCategoryAssoc> data
            = new Dictionary<string, EventCategoryAssoc>();
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
        
    public class BaseResponseProfileOffer {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileOfferString : BaseResponseProfileOffer {
        public string data = "";
    }
    
    public class ResponseProfileOfferBool : BaseResponseProfileOffer {
        public bool data;
    }
    
    public class ResponseProfileOfferInt : BaseResponseProfileOffer {
        public int data;
    }
    
    public class ResponseProfileOfferObject : BaseResponseProfileOffer {
        public ProfileOffer data = new ProfileOffer();
    }
    
    public class ResponseProfileOfferResult : BaseResponseProfileOffer {
        public ProfileOfferResult data = new ProfileOfferResult();
    }
    
    public class ResponseProfileOfferList : BaseResponseProfileOffer {
        public List<ProfileOffer> data = new List<ProfileOffer>();
    }
    
    public class ResponseProfileOfferDict : BaseResponseProfileOffer {
        public Dictionary<string, ProfileOffer> data
            = new Dictionary<string, ProfileOffer>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileApp {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileAppString : BaseResponseProfileApp {
        public string data = "";
    }
    
    public class ResponseProfileAppBool : BaseResponseProfileApp {
        public bool data;
    }
    
    public class ResponseProfileAppInt : BaseResponseProfileApp {
        public int data;
    }
    
    public class ResponseProfileAppObject : BaseResponseProfileApp {
        public ProfileApp data = new ProfileApp();
    }
    
    public class ResponseProfileAppResult : BaseResponseProfileApp {
        public ProfileAppResult data = new ProfileAppResult();
    }
    
    public class ResponseProfileAppList : BaseResponseProfileApp {
        public List<ProfileApp> data = new List<ProfileApp>();
    }
    
    public class ResponseProfileAppDict : BaseResponseProfileApp {
        public Dictionary<string, ProfileApp> data
            = new Dictionary<string, ProfileApp>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseProfileOrg {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseProfileOrgString : BaseResponseProfileOrg {
        public string data = "";
    }
    
    public class ResponseProfileOrgBool : BaseResponseProfileOrg {
        public bool data;
    }
    
    public class ResponseProfileOrgInt : BaseResponseProfileOrg {
        public int data;
    }
    
    public class ResponseProfileOrgObject : BaseResponseProfileOrg {
        public ProfileOrg data = new ProfileOrg();
    }
    
    public class ResponseProfileOrgResult : BaseResponseProfileOrg {
        public ProfileOrgResult data = new ProfileOrgResult();
    }
    
    public class ResponseProfileOrgList : BaseResponseProfileOrg {
        public List<ProfileOrg> data = new List<ProfileOrg>();
    }
    
    public class ResponseProfileOrgDict : BaseResponseProfileOrg {
        public Dictionary<string, ProfileOrg> data
            = new Dictionary<string, ProfileOrg>();
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
        
    public class BaseResponseOrgSite {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseOrgSiteString : BaseResponseOrgSite {
        public string data = "";
    }
    
    public class ResponseOrgSiteBool : BaseResponseOrgSite {
        public bool data;
    }
    
    public class ResponseOrgSiteInt : BaseResponseOrgSite {
        public int data;
    }
    
    public class ResponseOrgSiteObject : BaseResponseOrgSite {
        public OrgSite data = new OrgSite();
    }
    
    public class ResponseOrgSiteResult : BaseResponseOrgSite {
        public OrgSiteResult data = new OrgSiteResult();
    }
    
    public class ResponseOrgSiteList : BaseResponseOrgSite {
        public List<OrgSite> data = new List<OrgSite>();
    }
    
    public class ResponseOrgSiteDict : BaseResponseOrgSite {
        public Dictionary<string, OrgSite> data
            = new Dictionary<string, OrgSite>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseSiteApp {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseSiteAppString : BaseResponseSiteApp {
        public string data = "";
    }
    
    public class ResponseSiteAppBool : BaseResponseSiteApp {
        public bool data;
    }
    
    public class ResponseSiteAppInt : BaseResponseSiteApp {
        public int data;
    }
    
    public class ResponseSiteAppObject : BaseResponseSiteApp {
        public SiteApp data = new SiteApp();
    }
    
    public class ResponseSiteAppResult : BaseResponseSiteApp {
        public SiteAppResult data = new SiteAppResult();
    }
    
    public class ResponseSiteAppList : BaseResponseSiteApp {
        public List<SiteApp> data = new List<SiteApp>();
    }
    
    public class ResponseSiteAppDict : BaseResponseSiteApp {
        public Dictionary<string, SiteApp> data
            = new Dictionary<string, SiteApp>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponsePhoto {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponsePhotoString : BaseResponsePhoto {
        public string data = "";
    }
    
    public class ResponsePhotoBool : BaseResponsePhoto {
        public bool data;
    }
    
    public class ResponsePhotoInt : BaseResponsePhoto {
        public int data;
    }
    
    public class ResponsePhotoObject : BaseResponsePhoto {
        public Photo data = new Photo();
    }
    
    public class ResponsePhotoResult : BaseResponsePhoto {
        public PhotoResult data = new PhotoResult();
    }
    
    public class ResponsePhotoList : BaseResponsePhoto {
        public List<Photo> data = new List<Photo>();
    }
    
    public class ResponsePhotoDict : BaseResponsePhoto {
        public Dictionary<string, Photo> data
            = new Dictionary<string, Photo>();
    }
    
//------------------------------------------------------------------------------
        
    public class BaseResponseVideo {
        public string message = "Success";
        public int error = 0;
        public Dictionary<string, object> info
            = new Dictionary<string, object>();
        public string action = "";
    }        

    public class ResponseVideoString : BaseResponseVideo {
        public string data = "";
    }
    
    public class ResponseVideoBool : BaseResponseVideo {
        public bool data;
    }
    
    public class ResponseVideoInt : BaseResponseVideo {
        public int data;
    }
    
    public class ResponseVideoObject : BaseResponseVideo {
        public Video data = new Video();
    }
    
    public class ResponseVideoResult : BaseResponseVideo {
        public VideoResult data = new VideoResult();
    }
    
    public class ResponseVideoList : BaseResponseVideo {
        public List<Video> data = new List<Video>();
    }
    
    public class ResponseVideoDict : BaseResponseVideo {
        public Dictionary<string, Video> data
            = new Dictionary<string, Video>();
    }
    
}
"""





