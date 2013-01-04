<?php // namespace Platform;
/*

import ent
from ent import *

class BasePlatformService(object):

    def __init__(self):
        self.path = ''
        self.path_parsed = ''
        self.path_info = ''
        self.qstring = ''
        self.action = ''
        self.action_params = ''
        self.url = ''
        
"""

namespace platform {

    public class BasePlatformService : IBaseHandler  {	
    
	private static readonly log4net.ILog log = log4net.LogManager.GetLogger("main");
                
        public string path = "";
        public string path_parsed = "";
        public string path_info = "";
        public string qstring = "";

        public string action = "";
        public string action_params = "";

        public string url = "";
        public string ext = ".ashx";

        public HttpContext _context;
        public ServiceUtil util = new ServiceUtil();
        
        public string _format = "json";
    
        public PlatformAPI api = new PlatformAPI();
        
        public BasePlatformService(){
        
        }
        
        public void ParseServiceParams() {
            _format = util.GetParamValue(_context, "format");
            if(String.IsNoneOrEmpty(_format)){
               _format = util.FORMAT_JSON; 
            }
            
        }
        
        public virtual void Render(HttpContext context) {

            _context = context;
            
            log.Debug("------------------------------------------------------------------------->");
            log.Debug(String.Format("Start Render URL: {0}", HttpContext.Current.Request.Url.ToString()));

            path = context.Request.Url.ToString();
            path_parsed = path.Replace("api/v1/", "");
            path_info = context.Request.PathInfo;
            if(path_parsed.IndexOf("?") > -1)
                    qstring = path_parsed.Split('?')[1];
			
            ParseServiceParams();
                    
            BaseProcessRequest();
            
            // If you need to render a page in the service...
            //StringWriter writer = new StringWriter();
            //HttpContext.Current.Server.Execute("~/main.aspx", writer);
            //string html = writer.ToString();
            //writer.Close();
            //writer.Dispose();
            // Emit the rendered HTML
            //context.Response.Write(html);
        }
        
        public virtual bool IsContext(string action) {
            if(path.IndexOf(action) > -1) {
                return true;
            }
            return false;
        }

        public virtual void BaseProcessRequest() {        
            if(IsContext("app/count")){
                CountApp();
            }
            else if(IsContext("app/count/uuid")){
                CountAppUuid();
            }
            else if(IsContext("app/count/code")){
                CountAppCode();
            }
            else if(IsContext("app/count/type-id")){
                CountAppTypeId();
            }
            else if(IsContext("app/count/code/type-id")){
                CountAppCodeTypeId();
            }
            else if(IsContext("app/count/platform/type-id")){
                CountAppPlatformTypeId();
            }
            else if(IsContext("app/count/platform")){
                CountAppPlatform();
            }
            else if(IsContext("app/browse/filter")){
                BrowseAppListFilter();
            }
            else if(IsContext("app/set/uuid")){
                SetAppUuid();
            }
            else if(IsContext("app/set/code")){
                SetAppCode();
            }
            else if(IsContext("app/del/uuid")){
                DelAppUuid();
            }
            else if(IsContext("app/del/code")){
                DelAppCode();
            }
            else if(IsContext("app/get")){
                GetAppList();
            }
            else if(IsContext("app/get/uuid")){
                GetAppListUuid();
            }
            else if(IsContext("app/get/code")){
                GetAppListCode();
            }
            else if(IsContext("app/get/type-id")){
                GetAppListTypeId();
            }
            else if(IsContext("app/get/code/type-id")){
                GetAppListCodeTypeId();
            }
            else if(IsContext("app/get/platform/type-id")){
                GetAppListPlatformTypeId();
            }
            else if(IsContext("app/get/platform")){
                GetAppListPlatform();
            }
            if(IsContext("app-type/count")){
                CountAppType();
            }
            else if(IsContext("app-type/count/uuid")){
                CountAppTypeUuid();
            }
            else if(IsContext("app-type/count/code")){
                CountAppTypeCode();
            }
            else if(IsContext("app-type/browse/filter")){
                BrowseAppTypeListFilter();
            }
            else if(IsContext("app-type/set/uuid")){
                SetAppTypeUuid();
            }
            else if(IsContext("app-type/set/code")){
                SetAppTypeCode();
            }
            else if(IsContext("app-type/del/uuid")){
                DelAppTypeUuid();
            }
            else if(IsContext("app-type/del/code")){
                DelAppTypeCode();
            }
            else if(IsContext("app-type/get")){
                GetAppTypeList();
            }
            else if(IsContext("app-type/get/uuid")){
                GetAppTypeListUuid();
            }
            else if(IsContext("app-type/get/code")){
                GetAppTypeListCode();
            }
            if(IsContext("site/count")){
                CountSite();
            }
            else if(IsContext("site/count/uuid")){
                CountSiteUuid();
            }
            else if(IsContext("site/count/code")){
                CountSiteCode();
            }
            else if(IsContext("site/count/type-id")){
                CountSiteTypeId();
            }
            else if(IsContext("site/count/code/type-id")){
                CountSiteCodeTypeId();
            }
            else if(IsContext("site/count/domain/type-id")){
                CountSiteDomainTypeId();
            }
            else if(IsContext("site/count/domain")){
                CountSiteDomain();
            }
            else if(IsContext("site/browse/filter")){
                BrowseSiteListFilter();
            }
            else if(IsContext("site/set/uuid")){
                SetSiteUuid();
            }
            else if(IsContext("site/set/code")){
                SetSiteCode();
            }
            else if(IsContext("site/del/uuid")){
                DelSiteUuid();
            }
            else if(IsContext("site/del/code")){
                DelSiteCode();
            }
            else if(IsContext("site/get")){
                GetSiteList();
            }
            else if(IsContext("site/get/uuid")){
                GetSiteListUuid();
            }
            else if(IsContext("site/get/code")){
                GetSiteListCode();
            }
            else if(IsContext("site/get/type-id")){
                GetSiteListTypeId();
            }
            else if(IsContext("site/get/code/type-id")){
                GetSiteListCodeTypeId();
            }
            else if(IsContext("site/get/domain/type-id")){
                GetSiteListDomainTypeId();
            }
            else if(IsContext("site/get/domain")){
                GetSiteListDomain();
            }
            if(IsContext("site-type/count")){
                CountSiteType();
            }
            else if(IsContext("site-type/count/uuid")){
                CountSiteTypeUuid();
            }
            else if(IsContext("site-type/count/code")){
                CountSiteTypeCode();
            }
            else if(IsContext("site-type/browse/filter")){
                BrowseSiteTypeListFilter();
            }
            else if(IsContext("site-type/set/uuid")){
                SetSiteTypeUuid();
            }
            else if(IsContext("site-type/set/code")){
                SetSiteTypeCode();
            }
            else if(IsContext("site-type/del/uuid")){
                DelSiteTypeUuid();
            }
            else if(IsContext("site-type/del/code")){
                DelSiteTypeCode();
            }
            else if(IsContext("site-type/get")){
                GetSiteTypeList();
            }
            else if(IsContext("site-type/get/uuid")){
                GetSiteTypeListUuid();
            }
            else if(IsContext("site-type/get/code")){
                GetSiteTypeListCode();
            }
            if(IsContext("org/count")){
                CountOrg();
            }
            else if(IsContext("org/count/uuid")){
                CountOrgUuid();
            }
            else if(IsContext("org/count/code")){
                CountOrgCode();
            }
            else if(IsContext("org/count/name")){
                CountOrgName();
            }
            else if(IsContext("org/browse/filter")){
                BrowseOrgListFilter();
            }
            else if(IsContext("org/set/uuid")){
                SetOrgUuid();
            }
            else if(IsContext("org/del/uuid")){
                DelOrgUuid();
            }
            else if(IsContext("org/get")){
                GetOrgList();
            }
            else if(IsContext("org/get/uuid")){
                GetOrgListUuid();
            }
            else if(IsContext("org/get/code")){
                GetOrgListCode();
            }
            else if(IsContext("org/get/name")){
                GetOrgListName();
            }
            if(IsContext("org-type/count")){
                CountOrgType();
            }
            else if(IsContext("org-type/count/uuid")){
                CountOrgTypeUuid();
            }
            else if(IsContext("org-type/count/code")){
                CountOrgTypeCode();
            }
            else if(IsContext("org-type/browse/filter")){
                BrowseOrgTypeListFilter();
            }
            else if(IsContext("org-type/set/uuid")){
                SetOrgTypeUuid();
            }
            else if(IsContext("org-type/set/code")){
                SetOrgTypeCode();
            }
            else if(IsContext("org-type/del/uuid")){
                DelOrgTypeUuid();
            }
            else if(IsContext("org-type/del/code")){
                DelOrgTypeCode();
            }
            else if(IsContext("org-type/get")){
                GetOrgTypeList();
            }
            else if(IsContext("org-type/get/uuid")){
                GetOrgTypeListUuid();
            }
            else if(IsContext("org-type/get/code")){
                GetOrgTypeListCode();
            }
            if(IsContext("content-item/count")){
                CountContentItem();
            }
            else if(IsContext("content-item/count/uuid")){
                CountContentItemUuid();
            }
            else if(IsContext("content-item/count/code")){
                CountContentItemCode();
            }
            else if(IsContext("content-item/count/name")){
                CountContentItemName();
            }
            else if(IsContext("content-item/count/path")){
                CountContentItemPath();
            }
            else if(IsContext("content-item/browse/filter")){
                BrowseContentItemListFilter();
            }
            else if(IsContext("content-item/set/uuid")){
                SetContentItemUuid();
            }
            else if(IsContext("content-item/del/uuid")){
                DelContentItemUuid();
            }
            else if(IsContext("content-item/del/path")){
                DelContentItemPath();
            }
            else if(IsContext("content-item/get")){
                GetContentItemList();
            }
            else if(IsContext("content-item/get/uuid")){
                GetContentItemListUuid();
            }
            else if(IsContext("content-item/get/code")){
                GetContentItemListCode();
            }
            else if(IsContext("content-item/get/name")){
                GetContentItemListName();
            }
            else if(IsContext("content-item/get/path")){
                GetContentItemListPath();
            }
            if(IsContext("content-item-type/count")){
                CountContentItemType();
            }
            else if(IsContext("content-item-type/count/uuid")){
                CountContentItemTypeUuid();
            }
            else if(IsContext("content-item-type/count/code")){
                CountContentItemTypeCode();
            }
            else if(IsContext("content-item-type/browse/filter")){
                BrowseContentItemTypeListFilter();
            }
            else if(IsContext("content-item-type/set/uuid")){
                SetContentItemTypeUuid();
            }
            else if(IsContext("content-item-type/set/code")){
                SetContentItemTypeCode();
            }
            else if(IsContext("content-item-type/del/uuid")){
                DelContentItemTypeUuid();
            }
            else if(IsContext("content-item-type/del/code")){
                DelContentItemTypeCode();
            }
            else if(IsContext("content-item-type/get")){
                GetContentItemTypeList();
            }
            else if(IsContext("content-item-type/get/uuid")){
                GetContentItemTypeListUuid();
            }
            else if(IsContext("content-item-type/get/code")){
                GetContentItemTypeListCode();
            }
            if(IsContext("content-page/count")){
                CountContentPage();
            }
            else if(IsContext("content-page/count/uuid")){
                CountContentPageUuid();
            }
            else if(IsContext("content-page/count/code")){
                CountContentPageCode();
            }
            else if(IsContext("content-page/count/name")){
                CountContentPageName();
            }
            else if(IsContext("content-page/count/path")){
                CountContentPagePath();
            }
            else if(IsContext("content-page/browse/filter")){
                BrowseContentPageListFilter();
            }
            else if(IsContext("content-page/set/uuid")){
                SetContentPageUuid();
            }
            else if(IsContext("content-page/del/uuid")){
                DelContentPageUuid();
            }
            else if(IsContext("content-page/del/path/site-id")){
                DelContentPagePathSiteId();
            }
            else if(IsContext("content-page/del/path")){
                DelContentPagePath();
            }
            else if(IsContext("content-page/get")){
                GetContentPageList();
            }
            else if(IsContext("content-page/get/uuid")){
                GetContentPageListUuid();
            }
            else if(IsContext("content-page/get/code")){
                GetContentPageListCode();
            }
            else if(IsContext("content-page/get/name")){
                GetContentPageListName();
            }
            else if(IsContext("content-page/get/path")){
                GetContentPageListPath();
            }
            else if(IsContext("content-page/get/site-id")){
                GetContentPageListSiteId();
            }
            else if(IsContext("content-page/get/site-id/path")){
                GetContentPageListSiteIdPath();
            }
            if(IsContext("message/count")){
                CountMessage();
            }
            else if(IsContext("message/count/uuid")){
                CountMessageUuid();
            }
            else if(IsContext("message/browse/filter")){
                BrowseMessageListFilter();
            }
            else if(IsContext("message/set/uuid")){
                SetMessageUuid();
            }
            else if(IsContext("message/del/uuid")){
                DelMessageUuid();
            }
            else if(IsContext("message/get")){
                GetMessageList();
            }
            else if(IsContext("message/get/uuid")){
                GetMessageListUuid();
            }
            if(IsContext("offer/count")){
                CountOffer();
            }
            else if(IsContext("offer/count/uuid")){
                CountOfferUuid();
            }
            else if(IsContext("offer/count/code")){
                CountOfferCode();
            }
            else if(IsContext("offer/count/name")){
                CountOfferName();
            }
            else if(IsContext("offer/count/org-id")){
                CountOfferOrgId();
            }
            else if(IsContext("offer/browse/filter")){
                BrowseOfferListFilter();
            }
            else if(IsContext("offer/set/uuid")){
                SetOfferUuid();
            }
            else if(IsContext("offer/del/uuid")){
                DelOfferUuid();
            }
            else if(IsContext("offer/del/org-id")){
                DelOfferOrgId();
            }
            else if(IsContext("offer/get")){
                GetOfferList();
            }
            else if(IsContext("offer/get/uuid")){
                GetOfferListUuid();
            }
            else if(IsContext("offer/get/code")){
                GetOfferListCode();
            }
            else if(IsContext("offer/get/name")){
                GetOfferListName();
            }
            else if(IsContext("offer/get/org-id")){
                GetOfferListOrgId();
            }
            if(IsContext("offer-type/count")){
                CountOfferType();
            }
            else if(IsContext("offer-type/count/uuid")){
                CountOfferTypeUuid();
            }
            else if(IsContext("offer-type/count/code")){
                CountOfferTypeCode();
            }
            else if(IsContext("offer-type/count/name")){
                CountOfferTypeName();
            }
            else if(IsContext("offer-type/browse/filter")){
                BrowseOfferTypeListFilter();
            }
            else if(IsContext("offer-type/set/uuid")){
                SetOfferTypeUuid();
            }
            else if(IsContext("offer-type/del/uuid")){
                DelOfferTypeUuid();
            }
            else if(IsContext("offer-type/get")){
                GetOfferTypeList();
            }
            else if(IsContext("offer-type/get/uuid")){
                GetOfferTypeListUuid();
            }
            else if(IsContext("offer-type/get/code")){
                GetOfferTypeListCode();
            }
            else if(IsContext("offer-type/get/name")){
                GetOfferTypeListName();
            }
            if(IsContext("offer-location/count")){
                CountOfferLocation();
            }
            else if(IsContext("offer-location/count/uuid")){
                CountOfferLocationUuid();
            }
            else if(IsContext("offer-location/count/offer-id")){
                CountOfferLocationOfferId();
            }
            else if(IsContext("offer-location/count/city")){
                CountOfferLocationCity();
            }
            else if(IsContext("offer-location/count/country-code")){
                CountOfferLocationCountryCode();
            }
            else if(IsContext("offer-location/count/postal-code")){
                CountOfferLocationPostalCode();
            }
            else if(IsContext("offer-location/browse/filter")){
                BrowseOfferLocationListFilter();
            }
            else if(IsContext("offer-location/set/uuid")){
                SetOfferLocationUuid();
            }
            else if(IsContext("offer-location/del/uuid")){
                DelOfferLocationUuid();
            }
            else if(IsContext("offer-location/get")){
                GetOfferLocationList();
            }
            else if(IsContext("offer-location/get/uuid")){
                GetOfferLocationListUuid();
            }
            else if(IsContext("offer-location/get/offer-id")){
                GetOfferLocationListOfferId();
            }
            else if(IsContext("offer-location/get/city")){
                GetOfferLocationListCity();
            }
            else if(IsContext("offer-location/get/country-code")){
                GetOfferLocationListCountryCode();
            }
            else if(IsContext("offer-location/get/postal-code")){
                GetOfferLocationListPostalCode();
            }
            if(IsContext("offer-category/count")){
                CountOfferCategory();
            }
            else if(IsContext("offer-category/count/uuid")){
                CountOfferCategoryUuid();
            }
            else if(IsContext("offer-category/count/code")){
                CountOfferCategoryCode();
            }
            else if(IsContext("offer-category/count/name")){
                CountOfferCategoryName();
            }
            else if(IsContext("offer-category/count/org-id")){
                CountOfferCategoryOrgId();
            }
            else if(IsContext("offer-category/count/type-id")){
                CountOfferCategoryTypeId();
            }
            else if(IsContext("offer-category/count/org-id/type-id")){
                CountOfferCategoryOrgIdTypeId();
            }
            else if(IsContext("offer-category/browse/filter")){
                BrowseOfferCategoryListFilter();
            }
            else if(IsContext("offer-category/set/uuid")){
                SetOfferCategoryUuid();
            }
            else if(IsContext("offer-category/del/uuid")){
                DelOfferCategoryUuid();
            }
            else if(IsContext("offer-category/del/code/org-id")){
                DelOfferCategoryCodeOrgId();
            }
            else if(IsContext("offer-category/del/code/org-id/type-id")){
                DelOfferCategoryCodeOrgIdTypeId();
            }
            else if(IsContext("offer-category/get")){
                GetOfferCategoryList();
            }
            else if(IsContext("offer-category/get/uuid")){
                GetOfferCategoryListUuid();
            }
            else if(IsContext("offer-category/get/code")){
                GetOfferCategoryListCode();
            }
            else if(IsContext("offer-category/get/name")){
                GetOfferCategoryListName();
            }
            else if(IsContext("offer-category/get/org-id")){
                GetOfferCategoryListOrgId();
            }
            else if(IsContext("offer-category/get/type-id")){
                GetOfferCategoryListTypeId();
            }
            else if(IsContext("offer-category/get/org-id/type-id")){
                GetOfferCategoryListOrgIdTypeId();
            }
            if(IsContext("offer-category-tree/count")){
                CountOfferCategoryTree();
            }
            else if(IsContext("offer-category-tree/count/uuid")){
                CountOfferCategoryTreeUuid();
            }
            else if(IsContext("offer-category-tree/count/parent-id")){
                CountOfferCategoryTreeParentId();
            }
            else if(IsContext("offer-category-tree/count/category-id")){
                CountOfferCategoryTreeCategoryId();
            }
            else if(IsContext("offer-category-tree/count/parent-id/category-id")){
                CountOfferCategoryTreeParentIdCategoryId();
            }
            else if(IsContext("offer-category-tree/browse/filter")){
                BrowseOfferCategoryTreeListFilter();
            }
            else if(IsContext("offer-category-tree/set/uuid")){
                SetOfferCategoryTreeUuid();
            }
            else if(IsContext("offer-category-tree/del/uuid")){
                DelOfferCategoryTreeUuid();
            }
            else if(IsContext("offer-category-tree/del/parent-id")){
                DelOfferCategoryTreeParentId();
            }
            else if(IsContext("offer-category-tree/del/category-id")){
                DelOfferCategoryTreeCategoryId();
            }
            else if(IsContext("offer-category-tree/del/parent-id/category-id")){
                DelOfferCategoryTreeParentIdCategoryId();
            }
            else if(IsContext("offer-category-tree/get")){
                GetOfferCategoryTreeList();
            }
            else if(IsContext("offer-category-tree/get/uuid")){
                GetOfferCategoryTreeListUuid();
            }
            else if(IsContext("offer-category-tree/get/parent-id")){
                GetOfferCategoryTreeListParentId();
            }
            else if(IsContext("offer-category-tree/get/category-id")){
                GetOfferCategoryTreeListCategoryId();
            }
            else if(IsContext("offer-category-tree/get/parent-id/category-id")){
                GetOfferCategoryTreeListParentIdCategoryId();
            }
            if(IsContext("offer-category-assoc/count")){
                CountOfferCategoryAssoc();
            }
            else if(IsContext("offer-category-assoc/count/uuid")){
                CountOfferCategoryAssocUuid();
            }
            else if(IsContext("offer-category-assoc/count/offer-id")){
                CountOfferCategoryAssocOfferId();
            }
            else if(IsContext("offer-category-assoc/count/category-id")){
                CountOfferCategoryAssocCategoryId();
            }
            else if(IsContext("offer-category-assoc/count/offer-id/category-id")){
                CountOfferCategoryAssocOfferIdCategoryId();
            }
            else if(IsContext("offer-category-assoc/browse/filter")){
                BrowseOfferCategoryAssocListFilter();
            }
            else if(IsContext("offer-category-assoc/set/uuid")){
                SetOfferCategoryAssocUuid();
            }
            else if(IsContext("offer-category-assoc/del/uuid")){
                DelOfferCategoryAssocUuid();
            }
            else if(IsContext("offer-category-assoc/get")){
                GetOfferCategoryAssocList();
            }
            else if(IsContext("offer-category-assoc/get/uuid")){
                GetOfferCategoryAssocListUuid();
            }
            else if(IsContext("offer-category-assoc/get/offer-id")){
                GetOfferCategoryAssocListOfferId();
            }
            else if(IsContext("offer-category-assoc/get/category-id")){
                GetOfferCategoryAssocListCategoryId();
            }
            else if(IsContext("offer-category-assoc/get/offer-id/category-id")){
                GetOfferCategoryAssocListOfferIdCategoryId();
            }
            if(IsContext("offer-game-location/count")){
                CountOfferGameLocation();
            }
            else if(IsContext("offer-game-location/count/uuid")){
                CountOfferGameLocationUuid();
            }
            else if(IsContext("offer-game-location/count/game-location-id")){
                CountOfferGameLocationGameLocationId();
            }
            else if(IsContext("offer-game-location/count/offer-id")){
                CountOfferGameLocationOfferId();
            }
            else if(IsContext("offer-game-location/count/offer-id/game-location-id")){
                CountOfferGameLocationOfferIdGameLocationId();
            }
            else if(IsContext("offer-game-location/browse/filter")){
                BrowseOfferGameLocationListFilter();
            }
            else if(IsContext("offer-game-location/set/uuid")){
                SetOfferGameLocationUuid();
            }
            else if(IsContext("offer-game-location/del/uuid")){
                DelOfferGameLocationUuid();
            }
            else if(IsContext("offer-game-location/get")){
                GetOfferGameLocationList();
            }
            else if(IsContext("offer-game-location/get/uuid")){
                GetOfferGameLocationListUuid();
            }
            else if(IsContext("offer-game-location/get/game-location-id")){
                GetOfferGameLocationListGameLocationId();
            }
            else if(IsContext("offer-game-location/get/offer-id")){
                GetOfferGameLocationListOfferId();
            }
            else if(IsContext("offer-game-location/get/offer-id/game-location-id")){
                GetOfferGameLocationListOfferIdGameLocationId();
            }
            if(IsContext("event-info/count")){
                CountEventInfo();
            }
            else if(IsContext("event-info/count/uuid")){
                CountEventInfoUuid();
            }
            else if(IsContext("event-info/count/code")){
                CountEventInfoCode();
            }
            else if(IsContext("event-info/count/name")){
                CountEventInfoName();
            }
            else if(IsContext("event-info/count/org-id")){
                CountEventInfoOrgId();
            }
            else if(IsContext("event-info/browse/filter")){
                BrowseEventInfoListFilter();
            }
            else if(IsContext("event-info/set/uuid")){
                SetEventInfoUuid();
            }
            else if(IsContext("event-info/del/uuid")){
                DelEventInfoUuid();
            }
            else if(IsContext("event-info/del/org-id")){
                DelEventInfoOrgId();
            }
            else if(IsContext("event-info/get")){
                GetEventInfoList();
            }
            else if(IsContext("event-info/get/uuid")){
                GetEventInfoListUuid();
            }
            else if(IsContext("event-info/get/code")){
                GetEventInfoListCode();
            }
            else if(IsContext("event-info/get/name")){
                GetEventInfoListName();
            }
            else if(IsContext("event-info/get/org-id")){
                GetEventInfoListOrgId();
            }
            if(IsContext("event-location/count")){
                CountEventLocation();
            }
            else if(IsContext("event-location/count/uuid")){
                CountEventLocationUuid();
            }
            else if(IsContext("event-location/count/event-id")){
                CountEventLocationEventId();
            }
            else if(IsContext("event-location/count/city")){
                CountEventLocationCity();
            }
            else if(IsContext("event-location/count/country-code")){
                CountEventLocationCountryCode();
            }
            else if(IsContext("event-location/count/postal-code")){
                CountEventLocationPostalCode();
            }
            else if(IsContext("event-location/browse/filter")){
                BrowseEventLocationListFilter();
            }
            else if(IsContext("event-location/set/uuid")){
                SetEventLocationUuid();
            }
            else if(IsContext("event-location/del/uuid")){
                DelEventLocationUuid();
            }
            else if(IsContext("event-location/get")){
                GetEventLocationList();
            }
            else if(IsContext("event-location/get/uuid")){
                GetEventLocationListUuid();
            }
            else if(IsContext("event-location/get/event-id")){
                GetEventLocationListEventId();
            }
            else if(IsContext("event-location/get/city")){
                GetEventLocationListCity();
            }
            else if(IsContext("event-location/get/country-code")){
                GetEventLocationListCountryCode();
            }
            else if(IsContext("event-location/get/postal-code")){
                GetEventLocationListPostalCode();
            }
            if(IsContext("event-category/count")){
                CountEventCategory();
            }
            else if(IsContext("event-category/count/uuid")){
                CountEventCategoryUuid();
            }
            else if(IsContext("event-category/count/code")){
                CountEventCategoryCode();
            }
            else if(IsContext("event-category/count/name")){
                CountEventCategoryName();
            }
            else if(IsContext("event-category/count/org-id")){
                CountEventCategoryOrgId();
            }
            else if(IsContext("event-category/count/type-id")){
                CountEventCategoryTypeId();
            }
            else if(IsContext("event-category/count/org-id/type-id")){
                CountEventCategoryOrgIdTypeId();
            }
            else if(IsContext("event-category/browse/filter")){
                BrowseEventCategoryListFilter();
            }
            else if(IsContext("event-category/set/uuid")){
                SetEventCategoryUuid();
            }
            else if(IsContext("event-category/del/uuid")){
                DelEventCategoryUuid();
            }
            else if(IsContext("event-category/del/code/org-id")){
                DelEventCategoryCodeOrgId();
            }
            else if(IsContext("event-category/del/code/org-id/type-id")){
                DelEventCategoryCodeOrgIdTypeId();
            }
            else if(IsContext("event-category/get")){
                GetEventCategoryList();
            }
            else if(IsContext("event-category/get/uuid")){
                GetEventCategoryListUuid();
            }
            else if(IsContext("event-category/get/code")){
                GetEventCategoryListCode();
            }
            else if(IsContext("event-category/get/name")){
                GetEventCategoryListName();
            }
            else if(IsContext("event-category/get/org-id")){
                GetEventCategoryListOrgId();
            }
            else if(IsContext("event-category/get/type-id")){
                GetEventCategoryListTypeId();
            }
            else if(IsContext("event-category/get/org-id/type-id")){
                GetEventCategoryListOrgIdTypeId();
            }
            if(IsContext("event-category-tree/count")){
                CountEventCategoryTree();
            }
            else if(IsContext("event-category-tree/count/uuid")){
                CountEventCategoryTreeUuid();
            }
            else if(IsContext("event-category-tree/count/parent-id")){
                CountEventCategoryTreeParentId();
            }
            else if(IsContext("event-category-tree/count/category-id")){
                CountEventCategoryTreeCategoryId();
            }
            else if(IsContext("event-category-tree/count/parent-id/category-id")){
                CountEventCategoryTreeParentIdCategoryId();
            }
            else if(IsContext("event-category-tree/browse/filter")){
                BrowseEventCategoryTreeListFilter();
            }
            else if(IsContext("event-category-tree/set/uuid")){
                SetEventCategoryTreeUuid();
            }
            else if(IsContext("event-category-tree/del/uuid")){
                DelEventCategoryTreeUuid();
            }
            else if(IsContext("event-category-tree/del/parent-id")){
                DelEventCategoryTreeParentId();
            }
            else if(IsContext("event-category-tree/del/category-id")){
                DelEventCategoryTreeCategoryId();
            }
            else if(IsContext("event-category-tree/del/parent-id/category-id")){
                DelEventCategoryTreeParentIdCategoryId();
            }
            else if(IsContext("event-category-tree/get")){
                GetEventCategoryTreeList();
            }
            else if(IsContext("event-category-tree/get/uuid")){
                GetEventCategoryTreeListUuid();
            }
            else if(IsContext("event-category-tree/get/parent-id")){
                GetEventCategoryTreeListParentId();
            }
            else if(IsContext("event-category-tree/get/category-id")){
                GetEventCategoryTreeListCategoryId();
            }
            else if(IsContext("event-category-tree/get/parent-id/category-id")){
                GetEventCategoryTreeListParentIdCategoryId();
            }
            if(IsContext("event-category-assoc/count")){
                CountEventCategoryAssoc();
            }
            else if(IsContext("event-category-assoc/count/uuid")){
                CountEventCategoryAssocUuid();
            }
            else if(IsContext("event-category-assoc/count/event-id")){
                CountEventCategoryAssocEventId();
            }
            else if(IsContext("event-category-assoc/count/category-id")){
                CountEventCategoryAssocCategoryId();
            }
            else if(IsContext("event-category-assoc/count/event-id/category-id")){
                CountEventCategoryAssocEventIdCategoryId();
            }
            else if(IsContext("event-category-assoc/browse/filter")){
                BrowseEventCategoryAssocListFilter();
            }
            else if(IsContext("event-category-assoc/set/uuid")){
                SetEventCategoryAssocUuid();
            }
            else if(IsContext("event-category-assoc/del/uuid")){
                DelEventCategoryAssocUuid();
            }
            else if(IsContext("event-category-assoc/get")){
                GetEventCategoryAssocList();
            }
            else if(IsContext("event-category-assoc/get/uuid")){
                GetEventCategoryAssocListUuid();
            }
            else if(IsContext("event-category-assoc/get/event-id")){
                GetEventCategoryAssocListEventId();
            }
            else if(IsContext("event-category-assoc/get/category-id")){
                GetEventCategoryAssocListCategoryId();
            }
            else if(IsContext("event-category-assoc/get/event-id/category-id")){
                GetEventCategoryAssocListEventIdCategoryId();
            }
            if(IsContext("channel/count")){
                CountChannel();
            }
            else if(IsContext("channel/count/uuid")){
                CountChannelUuid();
            }
            else if(IsContext("channel/count/code")){
                CountChannelCode();
            }
            else if(IsContext("channel/count/name")){
                CountChannelName();
            }
            else if(IsContext("channel/count/org-id")){
                CountChannelOrgId();
            }
            else if(IsContext("channel/count/type-id")){
                CountChannelTypeId();
            }
            else if(IsContext("channel/count/org-id/type-id")){
                CountChannelOrgIdTypeId();
            }
            else if(IsContext("channel/browse/filter")){
                BrowseChannelListFilter();
            }
            else if(IsContext("channel/set/uuid")){
                SetChannelUuid();
            }
            else if(IsContext("channel/del/uuid")){
                DelChannelUuid();
            }
            else if(IsContext("channel/del/code/org-id")){
                DelChannelCodeOrgId();
            }
            else if(IsContext("channel/del/code/org-id/type-id")){
                DelChannelCodeOrgIdTypeId();
            }
            else if(IsContext("channel/get")){
                GetChannelList();
            }
            else if(IsContext("channel/get/uuid")){
                GetChannelListUuid();
            }
            else if(IsContext("channel/get/code")){
                GetChannelListCode();
            }
            else if(IsContext("channel/get/name")){
                GetChannelListName();
            }
            else if(IsContext("channel/get/org-id")){
                GetChannelListOrgId();
            }
            else if(IsContext("channel/get/type-id")){
                GetChannelListTypeId();
            }
            else if(IsContext("channel/get/org-id/type-id")){
                GetChannelListOrgIdTypeId();
            }
            if(IsContext("channel-type/count")){
                CountChannelType();
            }
            else if(IsContext("channel-type/count/uuid")){
                CountChannelTypeUuid();
            }
            else if(IsContext("channel-type/count/code")){
                CountChannelTypeCode();
            }
            else if(IsContext("channel-type/count/name")){
                CountChannelTypeName();
            }
            else if(IsContext("channel-type/browse/filter")){
                BrowseChannelTypeListFilter();
            }
            else if(IsContext("channel-type/set/uuid")){
                SetChannelTypeUuid();
            }
            else if(IsContext("channel-type/del/uuid")){
                DelChannelTypeUuid();
            }
            else if(IsContext("channel-type/get")){
                GetChannelTypeList();
            }
            else if(IsContext("channel-type/get/uuid")){
                GetChannelTypeListUuid();
            }
            else if(IsContext("channel-type/get/code")){
                GetChannelTypeListCode();
            }
            else if(IsContext("channel-type/get/name")){
                GetChannelTypeListName();
            }
            if(IsContext("question/count")){
                CountQuestion();
            }
            else if(IsContext("question/count/uuid")){
                CountQuestionUuid();
            }
            else if(IsContext("question/count/code")){
                CountQuestionCode();
            }
            else if(IsContext("question/count/name")){
                CountQuestionName();
            }
            else if(IsContext("question/count/channel-id")){
                CountQuestionChannelId();
            }
            else if(IsContext("question/count/org-id")){
                CountQuestionOrgId();
            }
            else if(IsContext("question/count/channel-id/org-id")){
                CountQuestionChannelIdOrgId();
            }
            else if(IsContext("question/count/channel-id/code")){
                CountQuestionChannelIdCode();
            }
            else if(IsContext("question/browse/filter")){
                BrowseQuestionListFilter();
            }
            else if(IsContext("question/set/uuid")){
                SetQuestionUuid();
            }
            else if(IsContext("question/set/channel-id/code")){
                SetQuestionChannelIdCode();
            }
            else if(IsContext("question/del/uuid")){
                DelQuestionUuid();
            }
            else if(IsContext("question/del/channel-id/org-id")){
                DelQuestionChannelIdOrgId();
            }
            else if(IsContext("question/get")){
                GetQuestionList();
            }
            else if(IsContext("question/get/uuid")){
                GetQuestionListUuid();
            }
            else if(IsContext("question/get/code")){
                GetQuestionListCode();
            }
            else if(IsContext("question/get/name")){
                GetQuestionListName();
            }
            else if(IsContext("question/get/type")){
                GetQuestionListType();
            }
            else if(IsContext("question/get/channel-id")){
                GetQuestionListChannelId();
            }
            else if(IsContext("question/get/org-id")){
                GetQuestionListOrgId();
            }
            else if(IsContext("question/get/channel-id/org-id")){
                GetQuestionListChannelIdOrgId();
            }
            else if(IsContext("question/get/channel-id/code")){
                GetQuestionListChannelIdCode();
            }
            if(IsContext("profile-offer/count")){
                CountProfileOffer();
            }
            else if(IsContext("profile-offer/count/uuid")){
                CountProfileOfferUuid();
            }
            else if(IsContext("profile-offer/count/profile-id")){
                CountProfileOfferProfileId();
            }
            else if(IsContext("profile-offer/browse/filter")){
                BrowseProfileOfferListFilter();
            }
            else if(IsContext("profile-offer/set/uuid")){
                SetProfileOfferUuid();
            }
            else if(IsContext("profile-offer/del/uuid")){
                DelProfileOfferUuid();
            }
            else if(IsContext("profile-offer/del/profile-id")){
                DelProfileOfferProfileId();
            }
            else if(IsContext("profile-offer/get")){
                GetProfileOfferList();
            }
            else if(IsContext("profile-offer/get/uuid")){
                GetProfileOfferListUuid();
            }
            else if(IsContext("profile-offer/get/profile-id")){
                GetProfileOfferListProfileId();
            }
            if(IsContext("profile-app/count")){
                CountProfileApp();
            }
            else if(IsContext("profile-app/count/uuid")){
                CountProfileAppUuid();
            }
            else if(IsContext("profile-app/count/profile-id/app-id")){
                CountProfileAppProfileIdAppId();
            }
            else if(IsContext("profile-app/browse/filter")){
                BrowseProfileAppListFilter();
            }
            else if(IsContext("profile-app/set/uuid")){
                SetProfileAppUuid();
            }
            else if(IsContext("profile-app/set/profile-id/app-id")){
                SetProfileAppProfileIdAppId();
            }
            else if(IsContext("profile-app/del/uuid")){
                DelProfileAppUuid();
            }
            else if(IsContext("profile-app/del/profile-id/app-id")){
                DelProfileAppProfileIdAppId();
            }
            else if(IsContext("profile-app/get")){
                GetProfileAppList();
            }
            else if(IsContext("profile-app/get/uuid")){
                GetProfileAppListUuid();
            }
            else if(IsContext("profile-app/get/app-id")){
                GetProfileAppListAppId();
            }
            else if(IsContext("profile-app/get/profile-id")){
                GetProfileAppListProfileId();
            }
            else if(IsContext("profile-app/get/profile-id/app-id")){
                GetProfileAppListProfileIdAppId();
            }
            if(IsContext("profile-org/count")){
                CountProfileOrg();
            }
            else if(IsContext("profile-org/count/uuid")){
                CountProfileOrgUuid();
            }
            else if(IsContext("profile-org/count/org-id")){
                CountProfileOrgOrgId();
            }
            else if(IsContext("profile-org/count/profile-id")){
                CountProfileOrgProfileId();
            }
            else if(IsContext("profile-org/browse/filter")){
                BrowseProfileOrgListFilter();
            }
            else if(IsContext("profile-org/set/uuid")){
                SetProfileOrgUuid();
            }
            else if(IsContext("profile-org/del/uuid")){
                DelProfileOrgUuid();
            }
            else if(IsContext("profile-org/get")){
                GetProfileOrgList();
            }
            else if(IsContext("profile-org/get/uuid")){
                GetProfileOrgListUuid();
            }
            else if(IsContext("profile-org/get/org-id")){
                GetProfileOrgListOrgId();
            }
            else if(IsContext("profile-org/get/profile-id")){
                GetProfileOrgListProfileId();
            }
            if(IsContext("profile-question/count")){
                CountProfileQuestion();
            }
            else if(IsContext("profile-question/count/uuid")){
                CountProfileQuestionUuid();
            }
            else if(IsContext("profile-question/count/channel-id")){
                CountProfileQuestionChannelId();
            }
            else if(IsContext("profile-question/count/org-id")){
                CountProfileQuestionOrgId();
            }
            else if(IsContext("profile-question/count/profile-id")){
                CountProfileQuestionProfileId();
            }
            else if(IsContext("profile-question/count/question-id")){
                CountProfileQuestionQuestionId();
            }
            else if(IsContext("profile-question/count/channel-id/org-id")){
                CountProfileQuestionChannelIdOrgId();
            }
            else if(IsContext("profile-question/count/channel-id/profile-id")){
                CountProfileQuestionChannelIdProfileId();
            }
            else if(IsContext("profile-question/count/question-id/profile-id")){
                CountProfileQuestionQuestionIdProfileId();
            }
            else if(IsContext("profile-question/browse/filter")){
                BrowseProfileQuestionListFilter();
            }
            else if(IsContext("profile-question/set/uuid")){
                SetProfileQuestionUuid();
            }
            else if(IsContext("profile-question/set/channel-id/profile-id")){
                SetProfileQuestionChannelIdProfileId();
            }
            else if(IsContext("profile-question/set/question-id/profile-id")){
                SetProfileQuestionQuestionIdProfileId();
            }
            else if(IsContext("profile-question/set/channel-id/question-id/profile-id")){
                SetProfileQuestionChannelIdQuestionIdProfileId();
            }
            else if(IsContext("profile-question/del/uuid")){
                DelProfileQuestionUuid();
            }
            else if(IsContext("profile-question/del/channel-id/org-id")){
                DelProfileQuestionChannelIdOrgId();
            }
            else if(IsContext("profile-question/get")){
                GetProfileQuestionList();
            }
            else if(IsContext("profile-question/get/uuid")){
                GetProfileQuestionListUuid();
            }
            else if(IsContext("profile-question/get/channel-id")){
                GetProfileQuestionListChannelId();
            }
            else if(IsContext("profile-question/get/org-id")){
                GetProfileQuestionListOrgId();
            }
            else if(IsContext("profile-question/get/profile-id")){
                GetProfileQuestionListProfileId();
            }
            else if(IsContext("profile-question/get/question-id")){
                GetProfileQuestionListQuestionId();
            }
            else if(IsContext("profile-question/get/channel-id/org-id")){
                GetProfileQuestionListChannelIdOrgId();
            }
            else if(IsContext("profile-question/get/channel-id/profile-id")){
                GetProfileQuestionListChannelIdProfileId();
            }
            else if(IsContext("profile-question/get/question-id/profile-id")){
                GetProfileQuestionListQuestionIdProfileId();
            }
            if(IsContext("profile-channel/count")){
                CountProfileChannel();
            }
            else if(IsContext("profile-channel/count/uuid")){
                CountProfileChannelUuid();
            }
            else if(IsContext("profile-channel/count/channel-id")){
                CountProfileChannelChannelId();
            }
            else if(IsContext("profile-channel/count/profile-id")){
                CountProfileChannelProfileId();
            }
            else if(IsContext("profile-channel/count/channel-id/profile-id")){
                CountProfileChannelChannelIdProfileId();
            }
            else if(IsContext("profile-channel/browse/filter")){
                BrowseProfileChannelListFilter();
            }
            else if(IsContext("profile-channel/set/uuid")){
                SetProfileChannelUuid();
            }
            else if(IsContext("profile-channel/set/channel-id/profile-id")){
                SetProfileChannelChannelIdProfileId();
            }
            else if(IsContext("profile-channel/del/uuid")){
                DelProfileChannelUuid();
            }
            else if(IsContext("profile-channel/del/channel-id/profile-id")){
                DelProfileChannelChannelIdProfileId();
            }
            else if(IsContext("profile-channel/get")){
                GetProfileChannelList();
            }
            else if(IsContext("profile-channel/get/uuid")){
                GetProfileChannelListUuid();
            }
            else if(IsContext("profile-channel/get/channel-id")){
                GetProfileChannelListChannelId();
            }
            else if(IsContext("profile-channel/get/profile-id")){
                GetProfileChannelListProfileId();
            }
            else if(IsContext("profile-channel/get/channel-id/profile-id")){
                GetProfileChannelListChannelIdProfileId();
            }
            if(IsContext("org-site/count")){
                CountOrgSite();
            }
            else if(IsContext("org-site/count/uuid")){
                CountOrgSiteUuid();
            }
            else if(IsContext("org-site/count/org-id")){
                CountOrgSiteOrgId();
            }
            else if(IsContext("org-site/count/site-id")){
                CountOrgSiteSiteId();
            }
            else if(IsContext("org-site/count/org-id/site-id")){
                CountOrgSiteOrgIdSiteId();
            }
            else if(IsContext("org-site/browse/filter")){
                BrowseOrgSiteListFilter();
            }
            else if(IsContext("org-site/set/uuid")){
                SetOrgSiteUuid();
            }
            else if(IsContext("org-site/set/org-id/site-id")){
                SetOrgSiteOrgIdSiteId();
            }
            else if(IsContext("org-site/del/uuid")){
                DelOrgSiteUuid();
            }
            else if(IsContext("org-site/del/org-id/site-id")){
                DelOrgSiteOrgIdSiteId();
            }
            else if(IsContext("org-site/get")){
                GetOrgSiteList();
            }
            else if(IsContext("org-site/get/uuid")){
                GetOrgSiteListUuid();
            }
            else if(IsContext("org-site/get/org-id")){
                GetOrgSiteListOrgId();
            }
            else if(IsContext("org-site/get/site-id")){
                GetOrgSiteListSiteId();
            }
            else if(IsContext("org-site/get/org-id/site-id")){
                GetOrgSiteListOrgIdSiteId();
            }
            if(IsContext("site-app/count")){
                CountSiteApp();
            }
            else if(IsContext("site-app/count/uuid")){
                CountSiteAppUuid();
            }
            else if(IsContext("site-app/count/app-id")){
                CountSiteAppAppId();
            }
            else if(IsContext("site-app/count/site-id")){
                CountSiteAppSiteId();
            }
            else if(IsContext("site-app/count/app-id/site-id")){
                CountSiteAppAppIdSiteId();
            }
            else if(IsContext("site-app/browse/filter")){
                BrowseSiteAppListFilter();
            }
            else if(IsContext("site-app/set/uuid")){
                SetSiteAppUuid();
            }
            else if(IsContext("site-app/set/app-id/site-id")){
                SetSiteAppAppIdSiteId();
            }
            else if(IsContext("site-app/del/uuid")){
                DelSiteAppUuid();
            }
            else if(IsContext("site-app/del/app-id/site-id")){
                DelSiteAppAppIdSiteId();
            }
            else if(IsContext("site-app/get")){
                GetSiteAppList();
            }
            else if(IsContext("site-app/get/uuid")){
                GetSiteAppListUuid();
            }
            else if(IsContext("site-app/get/app-id")){
                GetSiteAppListAppId();
            }
            else if(IsContext("site-app/get/site-id")){
                GetSiteAppListSiteId();
            }
            else if(IsContext("site-app/get/app-id/site-id")){
                GetSiteAppListAppIdSiteId();
            }
            if(IsContext("photo/count")){
                CountPhoto();
            }
            else if(IsContext("photo/count/uuid")){
                CountPhotoUuid();
            }
            else if(IsContext("photo/count/external-id")){
                CountPhotoExternalId();
            }
            else if(IsContext("photo/count/url")){
                CountPhotoUrl();
            }
            else if(IsContext("photo/count/url/external-id")){
                CountPhotoUrlExternalId();
            }
            else if(IsContext("photo/count/uuid/external-id")){
                CountPhotoUuidExternalId();
            }
            else if(IsContext("photo/browse/filter")){
                BrowsePhotoListFilter();
            }
            else if(IsContext("photo/set/uuid")){
                SetPhotoUuid();
            }
            else if(IsContext("photo/set/external-id")){
                SetPhotoExternalId();
            }
            else if(IsContext("photo/set/url")){
                SetPhotoUrl();
            }
            else if(IsContext("photo/set/url/external-id")){
                SetPhotoUrlExternalId();
            }
            else if(IsContext("photo/set/uuid/external-id")){
                SetPhotoUuidExternalId();
            }
            else if(IsContext("photo/del/uuid")){
                DelPhotoUuid();
            }
            else if(IsContext("photo/del/external-id")){
                DelPhotoExternalId();
            }
            else if(IsContext("photo/del/url")){
                DelPhotoUrl();
            }
            else if(IsContext("photo/del/url/external-id")){
                DelPhotoUrlExternalId();
            }
            else if(IsContext("photo/del/uuid/external-id")){
                DelPhotoUuidExternalId();
            }
            else if(IsContext("photo/get")){
                GetPhotoList();
            }
            else if(IsContext("photo/get/uuid")){
                GetPhotoListUuid();
            }
            else if(IsContext("photo/get/external-id")){
                GetPhotoListExternalId();
            }
            else if(IsContext("photo/get/url")){
                GetPhotoListUrl();
            }
            else if(IsContext("photo/get/url/external-id")){
                GetPhotoListUrlExternalId();
            }
            else if(IsContext("photo/get/uuid/external-id")){
                GetPhotoListUuidExternalId();
            }
            if(IsContext("video/count")){
                CountVideo();
            }
            else if(IsContext("video/count/uuid")){
                CountVideoUuid();
            }
            else if(IsContext("video/count/external-id")){
                CountVideoExternalId();
            }
            else if(IsContext("video/count/url")){
                CountVideoUrl();
            }
            else if(IsContext("video/count/url/external-id")){
                CountVideoUrlExternalId();
            }
            else if(IsContext("video/count/uuid/external-id")){
                CountVideoUuidExternalId();
            }
            else if(IsContext("video/browse/filter")){
                BrowseVideoListFilter();
            }
            else if(IsContext("video/set/uuid")){
                SetVideoUuid();
            }
            else if(IsContext("video/set/external-id")){
                SetVideoExternalId();
            }
            else if(IsContext("video/set/url")){
                SetVideoUrl();
            }
            else if(IsContext("video/set/url/external-id")){
                SetVideoUrlExternalId();
            }
            else if(IsContext("video/set/uuid/external-id")){
                SetVideoUuidExternalId();
            }
            else if(IsContext("video/del/uuid")){
                DelVideoUuid();
            }
            else if(IsContext("video/del/external-id")){
                DelVideoExternalId();
            }
            else if(IsContext("video/del/url")){
                DelVideoUrl();
            }
            else if(IsContext("video/del/url/external-id")){
                DelVideoUrlExternalId();
            }
            else if(IsContext("video/del/uuid/external-id")){
                DelVideoUuidExternalId();
            }
            else if(IsContext("video/get")){
                GetVideoList();
            }
            else if(IsContext("video/get/uuid")){
                GetVideoListUuid();
            }
            else if(IsContext("video/get/external-id")){
                GetVideoListExternalId();
            }
            else if(IsContext("video/get/url")){
                GetVideoListUrl();
            }
            else if(IsContext("video/get/url/external-id")){
                GetVideoListUrlExternalId();
            }
            else if(IsContext("video/get/uuid/external-id")){
                GetVideoListUuidExternalId();
            }
        }    
        
//------------------------------------------------------------------------------                    
                    
        public virtual void CountApp() {
        

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppCodeTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/code/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppCodeTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppPlatformTypeId() {
        
             _platform = ()util.GetParamValue(_context, "@platform");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/platform/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppPlatformTypeId(
                _platform
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppPlatform() {
        
             _platform = ()util.GetParamValue(_context, "@platform");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/platform";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppPlatform(
                _platform
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseAppListFilter()  {
        
            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            AppResult result = api.BrowseAppListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppUuid()  {
        
            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            App obj = new App();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _platform = util.GetParamValue(_context, "@platform");
            if(!String.IsNoneOrEmpty(_platform))
                obj.platform = ()_platform;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppCode()  {
        
            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/set/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            App obj = new App();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _platform = util.GetParamValue(_context, "@platform");
            if(!String.IsNoneOrEmpty(_platform))
                obj.platform = ()_platform;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/del/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppList() {
        

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListCodeTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/code/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListCodeTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListPlatformTypeId() {
        
             _platform = ()util.GetParamValue(_context, "@platform");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/platform/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListPlatformTypeId(
                _platform
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListPlatform() {
        
             _platform = ()util.GetParamValue(_context, "@platform");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/platform";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListPlatform(
                _platform
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppType() {
        

            ResponseAppTypeInt wrapper = new ResponseAppTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppTypeInt wrapper = new ResponseAppTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppTypeInt wrapper = new ResponseAppTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseAppTypeListFilter()  {
        
            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            AppTypeResult result = api.BrowseAppTypeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppTypeUuid()  {
        
            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            AppType obj = new AppType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppTypeCode()  {
        
            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/set/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            AppType obj = new AppType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/del/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppTypeCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppTypeList() {
        

            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<AppType> objs = api.GetAppTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppTypeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<AppType> objs = api.GetAppTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppTypeListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<AppType> objs = api.GetAppTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSite() {
        

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSite(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteCodeTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/code/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteCodeTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteDomainTypeId() {
        
             _domain = ()util.GetParamValue(_context, "@domain");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/domain/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteDomainTypeId(
                _domain
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteDomain() {
        
             _domain = ()util.GetParamValue(_context, "@domain");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/domain";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteDomain(
                _domain
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseSiteListFilter()  {
        
            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            SiteResult result = api.BrowseSiteListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteUuid()  {
        
            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Site obj = new Site();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _domain = util.GetParamValue(_context, "@domain");
            if(!String.IsNoneOrEmpty(_domain))
                obj.domain = ()_domain;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteCode()  {
        
            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/set/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Site obj = new Site();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _domain = util.GetParamValue(_context, "@domain");
            if(!String.IsNoneOrEmpty(_domain))
                obj.domain = ()_domain;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/del/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteList() {
        

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListCodeTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/code/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListCodeTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListDomainTypeId() {
        
             _domain = ()util.GetParamValue(_context, "@domain");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/domain/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListDomainTypeId(
                _domain
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListDomain() {
        
             _domain = ()util.GetParamValue(_context, "@domain");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/domain";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListDomain(
                _domain
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteType() {
        

            ResponseSiteTypeInt wrapper = new ResponseSiteTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteTypeInt wrapper = new ResponseSiteTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteTypeInt wrapper = new ResponseSiteTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseSiteTypeListFilter()  {
        
            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            SiteTypeResult result = api.BrowseSiteTypeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteTypeUuid()  {
        
            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            SiteType obj = new SiteType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteTypeCode()  {
        
            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/set/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            SiteType obj = new SiteType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/del/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteTypeCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteTypeList() {
        

            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteType> objs = api.GetSiteTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteTypeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteType> objs = api.GetSiteTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteTypeListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteType> objs = api.GetSiteTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrg() {
        

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrg(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOrgListFilter()  {
        
            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OrgResult result = api.BrowseOrgListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgUuid()  {
        
            ResponseOrgBool wrapper = new ResponseOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Org obj = new Org();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOrgUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgBool wrapper = new ResponseOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgList() {
        

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Org> objs = api.GetOrgList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Org> objs = api.GetOrgListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Org> objs = api.GetOrgListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Org> objs = api.GetOrgListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgType() {
        

            ResponseOrgTypeInt wrapper = new ResponseOrgTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgTypeInt wrapper = new ResponseOrgTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgTypeInt wrapper = new ResponseOrgTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOrgTypeListFilter()  {
        
            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OrgTypeResult result = api.BrowseOrgTypeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgTypeUuid()  {
        
            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OrgType obj = new OrgType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOrgTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgTypeCode()  {
        
            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/set/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OrgType obj = new OrgType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOrgTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/del/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgTypeCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgTypeList() {
        

            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgType> objs = api.GetOrgTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgTypeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgType> objs = api.GetOrgTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgTypeListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgType> objs = api.GetOrgTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItem() {
        

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItem(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemPath(
                _path
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseContentItemListFilter()  {
        
            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ContentItemResult result = api.BrowseContentItemListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentItemUuid()  {
        
            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ContentItem obj = new ContentItem();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _date_end = util.GetParamValue(_context, "@date_end");
            if(!String.IsNoneOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "@date_start");
            if(!String.IsNoneOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _path = util.GetParamValue(_context, "@path");
            if(!String.IsNoneOrEmpty(_path))
                obj.path = ()_path;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentItemUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/del/path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemPath(
                        
                _path
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemList() {
        

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListPath(
                _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemType() {
        

            ResponseContentItemTypeInt wrapper = new ResponseContentItemTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemTypeInt wrapper = new ResponseContentItemTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemTypeInt wrapper = new ResponseContentItemTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseContentItemTypeListFilter()  {
        
            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ContentItemTypeResult result = api.BrowseContentItemTypeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentItemTypeUuid()  {
        
            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ContentItemType obj = new ContentItemType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentItemTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentItemTypeCode()  {
        
            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/set/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ContentItemType obj = new ContentItemType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentItemTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/del/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemTypeCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemTypeList() {
        

            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItemType> objs = api.GetContentItemTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemTypeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItemType> objs = api.GetContentItemTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemTypeListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItemType> objs = api.GetContentItemTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPage() {
        

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPage(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPageUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPageCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPageName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPagePath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPagePath(
                _path
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseContentPageListFilter()  {
        
            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ContentPageResult result = api.BrowseContentPageListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentPageUuid()  {
        
            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ContentPage obj = new ContentPage();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _date_end = util.GetParamValue(_context, "@date_end");
            if(!String.IsNoneOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "@date_start");
            if(!String.IsNoneOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "@site_id");
            if(!String.IsNoneOrEmpty(_site_id))
                obj.site_id = ()_site_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _template = util.GetParamValue(_context, "@template");
            if(!String.IsNoneOrEmpty(_template))
                obj.template = ()_template;
            
            string _path = util.GetParamValue(_context, "@path");
            if(!String.IsNoneOrEmpty(_path))
                obj.path = ()_path;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentPageUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPageUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentPageUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPagePathSiteId() {
        
             _path = ()util.GetParamValue(_context, "@path");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/del/path/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentPagePathSiteId(
                        
                _path
                , _site_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPagePath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/del/path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentPagePath(
                        
                _path
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageList() {
        

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListPath(
                _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListSiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListSiteIdPath() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/site-id/path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListSiteIdPath(
                _site_id
                , _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountMessage() {
        

            ResponseMessageInt wrapper = new ResponseMessageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountMessage(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountMessageUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseMessageInt wrapper = new ResponseMessageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountMessageUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseMessageListFilter()  {
        
            ResponseMessageList wrapper = new ResponseMessageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            MessageResult result = api.BrowseMessageListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetMessageUuid()  {
        
            ResponseMessageBool wrapper = new ResponseMessageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Message obj = new Message();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _profile_from_name = util.GetParamValue(_context, "@profile_from_name");
            if(!String.IsNoneOrEmpty(_profile_from_name))
                obj.profile_from_name = ()_profile_from_name;
            
            string _read = util.GetParamValue(_context, "@read");
            if(!String.IsNoneOrEmpty(_read))
                obj.read = Convert.ToBoolean(_read);
            
            string _profile_from_id = util.GetParamValue(_context, "@profile_from_id");
            if(!String.IsNoneOrEmpty(_profile_from_id))
                obj.profile_from_id = ()_profile_from_id;
            
            string _profile_to_token = util.GetParamValue(_context, "@profile_to_token");
            if(!String.IsNoneOrEmpty(_profile_to_token))
                obj.profile_to_token = ()_profile_to_token;
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _subject = util.GetParamValue(_context, "@subject");
            if(!String.IsNoneOrEmpty(_subject))
                obj.subject = ()_subject;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_to_id = util.GetParamValue(_context, "@profile_to_id");
            if(!String.IsNoneOrEmpty(_profile_to_id))
                obj.profile_to_id = ()_profile_to_id;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_to_name = util.GetParamValue(_context, "@profile_to_name");
            if(!String.IsNoneOrEmpty(_profile_to_name))
                obj.profile_to_name = ()_profile_to_name;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _sent = util.GetParamValue(_context, "@sent");
            if(!String.IsNoneOrEmpty(_sent))
                obj.sent = Convert.ToBoolean(_sent);
            
            
            // get data
            wrapper.data = api.SetMessageUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelMessageUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseMessageBool wrapper = new ResponseMessageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelMessageUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetMessageList() {
        

            ResponseMessageList wrapper = new ResponseMessageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Message> objs = api.GetMessageList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetMessageListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseMessageList wrapper = new ResponseMessageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Message> objs = api.GetMessageListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOffer() {
        

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOffer(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferListFilter()  {
        
            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferResult result = api.BrowseOfferListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferUuid()  {
        
            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Offer obj = new Offer();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _usage_count = util.GetParamValue(_context, "@usage_count");
            if(!String.IsNoneOrEmpty(_usage_count))
                obj.usage_count = Convert.ToInt32(_usage_count);
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOfferUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/del/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferOrgId(
                        
                _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferList() {
        

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferType() {
        

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferTypeName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferTypeListFilter()  {
        
            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferTypeResult result = api.BrowseOfferTypeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferTypeUuid()  {
        
            ResponseOfferTypeBool wrapper = new ResponseOfferTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OfferType obj = new OfferType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOfferTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferTypeBool wrapper = new ResponseOfferTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeList() {
        

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferType> objs = api.GetOfferTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferType> objs = api.GetOfferTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferType> objs = api.GetOfferTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferType> objs = api.GetOfferTypeListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocation() {
        

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationCity(
                _city
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationPostalCode(
                _postal_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferLocationListFilter()  {
        
            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferLocationResult result = api.BrowseOfferLocationListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferLocationUuid()  {
        
            ResponseOfferLocationBool wrapper = new ResponseOfferLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OfferLocation obj = new OfferLocation();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _fax = util.GetParamValue(_context, "@fax");
            if(!String.IsNoneOrEmpty(_fax))
                obj.fax = ()_fax;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            string _address1 = util.GetParamValue(_context, "@address1");
            if(!String.IsNoneOrEmpty(_address1))
                obj.address1 = ()_address1;
            
            string _twitter = util.GetParamValue(_context, "@twitter");
            if(!String.IsNoneOrEmpty(_twitter))
                obj.twitter = ()_twitter;
            
            string _phone = util.GetParamValue(_context, "@phone");
            if(!String.IsNoneOrEmpty(_phone))
                obj.phone = ()_phone;
            
            string _postal_code = util.GetParamValue(_context, "@postal_code");
            if(!String.IsNoneOrEmpty(_postal_code))
                obj.postal_code = ()_postal_code;
            
            string _offer_id = util.GetParamValue(_context, "@offer_id");
            if(!String.IsNoneOrEmpty(_offer_id))
                obj.offer_id = ()_offer_id;
            
            string _country_code = util.GetParamValue(_context, "@country_code");
            if(!String.IsNoneOrEmpty(_country_code))
                obj.country_code = ()_country_code;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _state_province = util.GetParamValue(_context, "@state_province");
            if(!String.IsNoneOrEmpty(_state_province))
                obj.state_province = ()_state_province;
            
            string _city = util.GetParamValue(_context, "@city");
            if(!String.IsNoneOrEmpty(_city))
                obj.city = ()_city;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _dob = util.GetParamValue(_context, "@dob");
            if(!String.IsNoneOrEmpty(_dob))
                obj.dob = Convert.ToDateTime(_dob);
            else 
                obj.dob = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "@date_start");
            if(!String.IsNoneOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _longitude = util.GetParamValue(_context, "@longitude");
            if(!String.IsNoneOrEmpty(_longitude))
                obj.longitude = ()_longitude;
            
            string _email = util.GetParamValue(_context, "@email");
            if(!String.IsNoneOrEmpty(_email))
                obj.email = ()_email;
            
            string _date_end = util.GetParamValue(_context, "@date_end");
            if(!String.IsNoneOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _latitude = util.GetParamValue(_context, "@latitude");
            if(!String.IsNoneOrEmpty(_latitude))
                obj.latitude = ()_latitude;
            
            string _facebook = util.GetParamValue(_context, "@facebook");
            if(!String.IsNoneOrEmpty(_facebook))
                obj.facebook = ()_facebook;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _address2 = util.GetParamValue(_context, "@address2");
            if(!String.IsNoneOrEmpty(_address2))
                obj.address2 = ()_address2;
            
            
            // get data
            wrapper.data = api.SetOfferLocationUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferLocationUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferLocationBool wrapper = new ResponseOfferLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferLocationUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationList() {
        

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListCity(
                _city
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListPostalCode(
                _postal_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategory() {
        

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategory(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryOrgIdTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryOrgIdTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferCategoryListFilter()  {
        
            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferCategoryResult result = api.BrowseOfferCategoryListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferCategoryUuid()  {
        
            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OfferCategory obj = new OfferCategory();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOfferCategoryUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryCodeOrgId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/del/code/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryCodeOrgId(
                        
                _code
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryCodeOrgIdTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/del/code/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryCodeOrgIdTypeId(
                        
                _code
                , _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryList() {
        

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListOrgIdTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListOrgIdTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTree() {
        

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTree(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeParentIdCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/parent-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeParentIdCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferCategoryTreeListFilter()  {
        
            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferCategoryTreeResult result = api.BrowseOfferCategoryTreeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferCategoryTreeUuid()  {
        
            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OfferCategoryTree obj = new OfferCategoryTree();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _parent_id = util.GetParamValue(_context, "@parent_id");
            if(!String.IsNoneOrEmpty(_parent_id))
                obj.parent_id = ()_parent_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _category_id = util.GetParamValue(_context, "@category_id");
            if(!String.IsNoneOrEmpty(_category_id))
                obj.category_id = ()_category_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetOfferCategoryTreeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeParentIdCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/parent-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeParentIdCategoryId(
                        
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeList() {
        

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListParentIdCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/parent-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListParentIdCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssoc() {
        

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssoc(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocOfferIdCategoryId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/offer-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocOfferIdCategoryId(
                _offer_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferCategoryAssocListFilter()  {
        
            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferCategoryAssocResult result = api.BrowseOfferCategoryAssocListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferCategoryAssocUuid()  {
        
            ResponseOfferCategoryAssocBool wrapper = new ResponseOfferCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OfferCategoryAssoc obj = new OfferCategoryAssoc();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _offer_id = util.GetParamValue(_context, "@offer_id");
            if(!String.IsNoneOrEmpty(_offer_id))
                obj.offer_id = ()_offer_id;
            
            string _category_id = util.GetParamValue(_context, "@category_id");
            if(!String.IsNoneOrEmpty(_category_id))
                obj.category_id = ()_category_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetOfferCategoryAssocUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryAssocUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryAssocBool wrapper = new ResponseOfferCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryAssocUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocList() {
        

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListOfferIdCategoryId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/offer-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListOfferIdCategoryId(
                _offer_id
                , _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocation() {
        

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationGameLocationId() {
        
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationOfferIdGameLocationId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/offer-id/game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationOfferIdGameLocationId(
                _offer_id
                , _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferGameLocationListFilter()  {
        
            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferGameLocationResult result = api.BrowseOfferGameLocationListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferGameLocationUuid()  {
        
            ResponseOfferGameLocationBool wrapper = new ResponseOfferGameLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OfferGameLocation obj = new OfferGameLocation();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _game_location_id = util.GetParamValue(_context, "@game_location_id");
            if(!String.IsNoneOrEmpty(_game_location_id))
                obj.game_location_id = ()_game_location_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _offer_id = util.GetParamValue(_context, "@offer_id");
            if(!String.IsNoneOrEmpty(_offer_id))
                obj.offer_id = ()_offer_id;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetOfferGameLocationUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferGameLocationUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferGameLocationBool wrapper = new ResponseOfferGameLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferGameLocationUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationList() {
        

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListGameLocationId() {
        
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListOfferIdGameLocationId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/offer-id/game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListOfferIdGameLocationId(
                _offer_id
                , _game_location_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfo() {
        

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfo(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventInfoListFilter()  {
        
            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventInfoResult result = api.BrowseEventInfoListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventInfoUuid()  {
        
            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            EventInfo obj = new EventInfo();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _usage_count = util.GetParamValue(_context, "@usage_count");
            if(!String.IsNoneOrEmpty(_usage_count))
                obj.usage_count = Convert.ToInt32(_usage_count);
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetEventInfoUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventInfoUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventInfoUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventInfoOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/del/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventInfoOrgId(
                        
                _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoList() {
        

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocation() {
        

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationEventId(
                _event_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationCity(
                _city
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationPostalCode(
                _postal_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventLocationListFilter()  {
        
            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventLocationResult result = api.BrowseEventLocationListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventLocationUuid()  {
        
            ResponseEventLocationBool wrapper = new ResponseEventLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            EventLocation obj = new EventLocation();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _fax = util.GetParamValue(_context, "@fax");
            if(!String.IsNoneOrEmpty(_fax))
                obj.fax = ()_fax;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            string _address1 = util.GetParamValue(_context, "@address1");
            if(!String.IsNoneOrEmpty(_address1))
                obj.address1 = ()_address1;
            
            string _twitter = util.GetParamValue(_context, "@twitter");
            if(!String.IsNoneOrEmpty(_twitter))
                obj.twitter = ()_twitter;
            
            string _phone = util.GetParamValue(_context, "@phone");
            if(!String.IsNoneOrEmpty(_phone))
                obj.phone = ()_phone;
            
            string _postal_code = util.GetParamValue(_context, "@postal_code");
            if(!String.IsNoneOrEmpty(_postal_code))
                obj.postal_code = ()_postal_code;
            
            string _country_code = util.GetParamValue(_context, "@country_code");
            if(!String.IsNoneOrEmpty(_country_code))
                obj.country_code = ()_country_code;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _state_province = util.GetParamValue(_context, "@state_province");
            if(!String.IsNoneOrEmpty(_state_province))
                obj.state_province = ()_state_province;
            
            string _city = util.GetParamValue(_context, "@city");
            if(!String.IsNoneOrEmpty(_city))
                obj.city = ()_city;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _dob = util.GetParamValue(_context, "@dob");
            if(!String.IsNoneOrEmpty(_dob))
                obj.dob = Convert.ToDateTime(_dob);
            else 
                obj.dob = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "@date_start");
            if(!String.IsNoneOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _longitude = util.GetParamValue(_context, "@longitude");
            if(!String.IsNoneOrEmpty(_longitude))
                obj.longitude = ()_longitude;
            
            string _email = util.GetParamValue(_context, "@email");
            if(!String.IsNoneOrEmpty(_email))
                obj.email = ()_email;
            
            string _event_id = util.GetParamValue(_context, "@event_id");
            if(!String.IsNoneOrEmpty(_event_id))
                obj.event_id = ()_event_id;
            
            string _date_end = util.GetParamValue(_context, "@date_end");
            if(!String.IsNoneOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _latitude = util.GetParamValue(_context, "@latitude");
            if(!String.IsNoneOrEmpty(_latitude))
                obj.latitude = ()_latitude;
            
            string _facebook = util.GetParamValue(_context, "@facebook");
            if(!String.IsNoneOrEmpty(_facebook))
                obj.facebook = ()_facebook;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _address2 = util.GetParamValue(_context, "@address2");
            if(!String.IsNoneOrEmpty(_address2))
                obj.address2 = ()_address2;
            
            
            // get data
            wrapper.data = api.SetEventLocationUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventLocationUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventLocationBool wrapper = new ResponseEventLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventLocationUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationList() {
        

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListEventId(
                _event_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListCity(
                _city
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListPostalCode(
                _postal_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategory() {
        

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategory(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryOrgIdTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryOrgIdTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventCategoryListFilter()  {
        
            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventCategoryResult result = api.BrowseEventCategoryListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventCategoryUuid()  {
        
            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            EventCategory obj = new EventCategory();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetEventCategoryUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryCodeOrgId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/del/code/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryCodeOrgId(
                        
                _code
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryCodeOrgIdTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/del/code/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryCodeOrgIdTypeId(
                        
                _code
                , _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryList() {
        

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListOrgIdTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListOrgIdTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTree() {
        

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTree(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeParentIdCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/parent-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeParentIdCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventCategoryTreeListFilter()  {
        
            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventCategoryTreeResult result = api.BrowseEventCategoryTreeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventCategoryTreeUuid()  {
        
            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            EventCategoryTree obj = new EventCategoryTree();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _parent_id = util.GetParamValue(_context, "@parent_id");
            if(!String.IsNoneOrEmpty(_parent_id))
                obj.parent_id = ()_parent_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _category_id = util.GetParamValue(_context, "@category_id");
            if(!String.IsNoneOrEmpty(_category_id))
                obj.category_id = ()_category_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetEventCategoryTreeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeParentIdCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/parent-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeParentIdCategoryId(
                        
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeList() {
        

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListParentIdCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/parent-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListParentIdCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssoc() {
        

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssoc(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocEventId(
                _event_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocEventIdCategoryId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/event-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocEventIdCategoryId(
                _event_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventCategoryAssocListFilter()  {
        
            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventCategoryAssocResult result = api.BrowseEventCategoryAssocListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventCategoryAssocUuid()  {
        
            ResponseEventCategoryAssocBool wrapper = new ResponseEventCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            EventCategoryAssoc obj = new EventCategoryAssoc();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _event_id = util.GetParamValue(_context, "@event_id");
            if(!String.IsNoneOrEmpty(_event_id))
                obj.event_id = ()_event_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _category_id = util.GetParamValue(_context, "@category_id");
            if(!String.IsNoneOrEmpty(_category_id))
                obj.category_id = ()_category_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetEventCategoryAssocUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryAssocUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryAssocBool wrapper = new ResponseEventCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryAssocUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocList() {
        

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListEventId(
                _event_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListEventIdCategoryId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/event-id/category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListEventIdCategoryId(
                _event_id
                , _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannel() {
        

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannel(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelOrgIdTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelOrgIdTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseChannelListFilter()  {
        
            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ChannelResult result = api.BrowseChannelListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetChannelUuid()  {
        
            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Channel obj = new Channel();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetChannelUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelCodeOrgId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/del/code/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelCodeOrgId(
                        
                _code
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelCodeOrgIdTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/del/code/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelCodeOrgIdTypeId(
                        
                _code
                , _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelList() {
        

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListOrgIdTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/org-id/type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListOrgIdTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelType() {
        

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelTypeName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseChannelTypeListFilter()  {
        
            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ChannelTypeResult result = api.BrowseChannelTypeListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetChannelTypeUuid()  {
        
            ResponseChannelTypeBool wrapper = new ResponseChannelTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ChannelType obj = new ChannelType();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetChannelTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelTypeUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelTypeBool wrapper = new ResponseChannelTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeList() {
        

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ChannelType> objs = api.GetChannelTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ChannelType> objs = api.GetChannelTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ChannelType> objs = api.GetChannelTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ChannelType> objs = api.GetChannelTypeListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestion() {
        

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestion(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionChannelIdOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/channel-id/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionChannelIdOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionChannelIdCode() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/channel-id/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionChannelIdCode(
                _channel_id
                , _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseQuestionListFilter()  {
        
            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            QuestionResult result = api.BrowseQuestionListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetQuestionUuid()  {
        
            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Question obj = new Question();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _choices = util.GetParamValue(_context, "@choices");
            if(!String.IsNoneOrEmpty(_choices))
                obj.choices = ()_choices;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetQuestionUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetQuestionChannelIdCode()  {
        
            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/set/channel-id/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Question obj = new Question();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _choices = util.GetParamValue(_context, "@choices");
            if(!String.IsNoneOrEmpty(_choices))
                obj.choices = ()_choices;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetQuestionChannelIdCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelQuestionUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelQuestionUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelQuestionChannelIdOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/del/channel-id/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelQuestionChannelIdOrgId(
                        
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionList() {
        

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListType() {
        
             _type = ()util.GetParamValue(_context, "@type");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/type";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListType(
                _type
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListChannelIdOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/channel-id/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListChannelIdOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListChannelIdCode() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/channel-id/code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListChannelIdCode(
                _channel_id
                , _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOffer() {
        

            ResponseProfileOfferInt wrapper = new ResponseProfileOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOffer(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOfferUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOfferInt wrapper = new ResponseProfileOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOfferUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOfferProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOfferInt wrapper = new ResponseProfileOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/count/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOfferProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileOfferListFilter()  {
        
            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileOfferResult result = api.BrowseProfileOfferListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileOfferUuid()  {
        
            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileOffer obj = new ProfileOffer();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _redeem_code = util.GetParamValue(_context, "@redeem_code");
            if(!String.IsNoneOrEmpty(_redeem_code))
                obj.redeem_code = ()_redeem_code;
            
            string _offer_id = util.GetParamValue(_context, "@offer_id");
            if(!String.IsNoneOrEmpty(_offer_id))
                obj.offer_id = ()_offer_id;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _redeemed = util.GetParamValue(_context, "@redeemed");
            if(!String.IsNoneOrEmpty(_redeemed))
                obj.redeemed = ()_redeemed;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetProfileOfferUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOfferUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileOfferUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOfferProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/del/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileOfferProfileId(
                        
                _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOfferList() {
        

            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOffer> objs = api.GetProfileOfferList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOfferListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOffer> objs = api.GetProfileOfferListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOfferListProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/get/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOffer> objs = api.GetProfileOfferListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileApp() {
        

            ResponseProfileAppInt wrapper = new ResponseProfileAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAppUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileAppInt wrapper = new ResponseProfileAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileAppUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAppProfileIdAppId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppInt wrapper = new ResponseProfileAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/count/profile-id/app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileAppProfileIdAppId(
                _profile_id
                , _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAppListFilter()  {
        
            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileAppResult result = api.BrowseProfileAppListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAppUuid()  {
        
            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileApp obj = new ProfileApp();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetProfileAppUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAppProfileIdAppId()  {
        
            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/set/profile-id/app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileApp obj = new ProfileApp();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetProfileAppProfileIdAppId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAppUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileAppUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAppProfileIdAppId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/del/profile-id/app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileAppProfileIdAppId(
                        
                _profile_id
                , _app_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppList() {
        

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListProfileIdAppId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/profile-id/app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListProfileIdAppId(
                _profile_id
                , _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrg() {
        

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOrg(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOrgUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOrgOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/count/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOrgProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileOrgListFilter()  {
        
            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileOrgResult result = api.BrowseProfileOrgListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileOrgUuid()  {
        
            ResponseProfileOrgBool wrapper = new ResponseProfileOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileOrg obj = new ProfileOrg();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            
            // get data
            wrapper.data = api.SetProfileOrgUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOrgUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOrgBool wrapper = new ResponseProfileOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileOrgUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgList() {
        

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOrg> objs = api.GetProfileOrgList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOrg> objs = api.GetProfileOrgListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOrg> objs = api.GetProfileOrgListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/get/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOrg> objs = api.GetProfileOrgListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestion() {
        

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestion(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionQuestionId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/question-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionQuestionId(
                _question_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionChannelIdOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/channel-id/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionChannelIdOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionChannelIdProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/channel-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionChannelIdProfileId(
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionQuestionIdProfileId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/question-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionQuestionIdProfileId(
                _question_id
                , _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileQuestionListFilter()  {
        
            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileQuestionResult result = api.BrowseProfileQuestionListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionUuid()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionChannelIdProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/channel-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionChannelIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionQuestionIdProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/question-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionQuestionIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionChannelIdQuestionIdProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/channel-id/question-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionChannelIdQuestionIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileQuestionUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileQuestionUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileQuestionChannelIdOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/del/channel-id/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileQuestionChannelIdOrgId(
                        
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionList() {
        

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListQuestionId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/question-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListQuestionId(
                _question_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListChannelIdOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/channel-id/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListChannelIdOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListChannelIdProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/channel-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListChannelIdProfileId(
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListQuestionIdProfileId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/question-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListQuestionIdProfileId(
                _question_id
                , _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannel() {
        

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannel(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelChannelIdProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/channel-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelChannelIdProfileId(
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileChannelListFilter()  {
        
            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileChannelResult result = api.BrowseProfileChannelListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileChannelUuid()  {
        
            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileChannel obj = new ProfileChannel();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetProfileChannelUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileChannelChannelIdProfileId()  {
        
            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/set/channel-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileChannel obj = new ProfileChannel();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _channel_id = util.GetParamValue(_context, "@channel_id");
            if(!String.IsNoneOrEmpty(_channel_id))
                obj.channel_id = ()_channel_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            
            // get data
            wrapper.data = api.SetProfileChannelChannelIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileChannelUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileChannelUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileChannelChannelIdProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/del/channel-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileChannelChannelIdProfileId(
                        
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelList() {
        

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListChannelIdProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/channel-id/profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListChannelIdProfileId(
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSite() {
        

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSite(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteSiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteOrgIdSiteId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/org-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteOrgIdSiteId(
                _org_id
                , _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOrgSiteListFilter()  {
        
            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OrgSiteResult result = api.BrowseOrgSiteListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgSiteUuid()  {
        
            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OrgSite obj = new OrgSite();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "@site_id");
            if(!String.IsNoneOrEmpty(_site_id))
                obj.site_id = ()_site_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            
            // get data
            wrapper.data = api.SetOrgSiteUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgSiteOrgIdSiteId()  {
        
            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/set/org-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OrgSite obj = new OrgSite();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "@site_id");
            if(!String.IsNoneOrEmpty(_site_id))
                obj.site_id = ()_site_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            
            // get data
            wrapper.data = api.SetOrgSiteOrgIdSiteId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgSiteUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgSiteUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgSiteOrgIdSiteId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/del/org-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgSiteOrgIdSiteId(
                        
                _org_id
                , _site_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteList() {
        

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListSiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListOrgIdSiteId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/org-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListOrgIdSiteId(
                _org_id
                , _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteApp() {
        

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppAppId(
                _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppSiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppAppIdSiteId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/app-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppAppIdSiteId(
                _app_id
                , _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseSiteAppListFilter()  {
        
            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            SiteAppResult result = api.BrowseSiteAppListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteAppUuid()  {
        
            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            SiteApp obj = new SiteApp();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "@site_id");
            if(!String.IsNoneOrEmpty(_site_id))
                obj.site_id = ()_site_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetSiteAppUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteAppAppIdSiteId()  {
        
            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/set/app-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            SiteApp obj = new SiteApp();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "@site_id");
            if(!String.IsNoneOrEmpty(_site_id))
                obj.site_id = ()_site_id;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetSiteAppAppIdSiteId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteAppUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteAppUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteAppAppIdSiteId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/del/app-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteAppAppIdSiteId(
                        
                _app_id
                , _site_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppList() {
        

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListSiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListAppIdSiteId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/app-id/site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListAppIdSiteId(
                _app_id
                , _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhoto() {
        

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhoto(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoUrlExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoUrlExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoUuidExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoUuidExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowsePhotoListFilter()  {
        
            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            PhotoResult result = api.BrowsePhotoListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoUuid()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoUrl()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoUrlExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUrlExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoUuidExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUuidExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoUrlExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoUrlExternalId(
                        
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoUuidExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoUuidExternalId(
                        
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoList() {
        

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListUrlExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListUrlExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListUuidExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListUuidExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideo() {
        

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideo(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoUrlExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoUrlExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoUuidExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoUuidExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseVideoListFilter()  {
        
            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/browse/filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            VideoResult result = api.BrowseVideoListFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoUuid()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoUrl()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoUrlExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoUrlExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoUuidExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "@third_party_oembed");
            if(!String.IsNoneOrEmpty(_third_party_oembed))
                obj.third_party_oembed = ()_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _display_name = util.GetParamValue(_context, "@display_name");
            if(!String.IsNoneOrEmpty(_display_name))
                obj.display_name = ()_display_name;
            
            string _name = util.GetParamValue(_context, "@name");
            if(!String.IsNoneOrEmpty(_name))
                obj.name = ()_name;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _third_party_data = util.GetParamValue(_context, "@third_party_data");
            if(!String.IsNoneOrEmpty(_third_party_data))
                obj.third_party_data = ()_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "@third_party_url");
            if(!String.IsNoneOrEmpty(_third_party_url))
                obj.third_party_url = ()_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "@third_party_id");
            if(!String.IsNoneOrEmpty(_third_party_id))
                obj.third_party_id = ()_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "@content_type");
            if(!String.IsNoneOrEmpty(_content_type))
                obj.content_type = ()_content_type;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "@type");
            if(!String.IsNoneOrEmpty(_type))
                obj.type = ()_type;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoUuidExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoUrlExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoUrlExternalId(
                        
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoUuidExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoUuidExternalId(
                        
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoList() {
        

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListUrlExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/url/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListUrlExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListUuidExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/uuid/external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListUuidExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
    }
}

"""
*/
?>




