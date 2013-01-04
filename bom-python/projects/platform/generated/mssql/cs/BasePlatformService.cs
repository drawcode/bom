using System;
using System.Collections.Generic;
using System.Linq;
using System.IO;
using System.Text;
using System.Text.RegularExpressions;
using System.Web;
using System.Web.Compilation;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;

using ah.core;
using ah.core.data;
using ah.core.handlers;
using ah.core.util;

using platform;
using platform.ent;

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
            if(String.IsNullOrEmpty(_format)){
               _format = util.FORMAT_JSON; 
            }
            
        }
        
        public bool IsSet {
            get {
                return (_context.Request.RequestType == "POST"
                    || _context.Request.RequestType == "PUT");
            }
        }

        public bool IsGet {
            get {
                return (_context.Request.RequestType == "GET");
            }
        }

        public bool IsDelete {
            get {
                return (_context.Request.RequestType == "DELETE");
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
        
        public virtual bool IsContext(string actionRegex) {
            if (Regex.Match(path, actionRegex).Success) {
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
            wrapper.code = 0;
            wrapper.action = "app/count";

            int i = api.CountApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/count/uuid";

            int i = api.CountAppUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/count/code";

            int i = api.CountAppCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/count/type-id";

            int i = api.CountAppTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppCodeTypeId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/count/code/type-id";

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
        
            string _platform = (string)util.GetParamValue(_context, "platform");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/count/platform/type-id";

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
        
            string _platform = (string)util.GetParamValue(_context, "platform");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/count/platform";

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
            wrapper.code = 0;
            wrapper.action = "app/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "app/set/uuid";
                        
            App obj = new App();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetAppUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppCode()  {
        
            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/set/code";
                        
            App obj = new App();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetAppCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/del/uuid";

            bool completed = api.DelAppUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/del/code";

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
            wrapper.code = 0;
            wrapper.action = "app/get";

            List<App> objs = api.GetAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/get/uuid";

            List<App> objs = api.GetAppListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/get/code";

            List<App> objs = api.GetAppListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/get/type-id";

            List<App> objs = api.GetAppListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListCodeTypeId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/get/code/type-id";

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
        
            string _platform = (string)util.GetParamValue(_context, "platform");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/get/platform/type-id";

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
        
            string _platform = (string)util.GetParamValue(_context, "platform");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app/get/platform";

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
            wrapper.code = 0;
            wrapper.action = "app-type/count";

            int i = api.CountAppType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseAppTypeInt wrapper = new ResponseAppTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app-type/count/uuid";

            int i = api.CountAppTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseAppTypeInt wrapper = new ResponseAppTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app-type/count/code";

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
            wrapper.code = 0;
            wrapper.action = "app-type/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "app-type/set/uuid";
                        
            AppType obj = new AppType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetAppTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppTypeCode()  {
        
            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app-type/set/code";
                        
            AppType obj = new AppType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetAppTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app-type/del/uuid";

            bool completed = api.DelAppTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app-type/del/code";

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
            wrapper.code = 0;
            wrapper.action = "app-type/get";

            List<AppType> objs = api.GetAppTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppTypeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app-type/get/uuid";

            List<AppType> objs = api.GetAppTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppTypeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "app-type/get/code";

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
            wrapper.code = 0;
            wrapper.action = "site/count";

            int i = api.CountSite(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/count/uuid";

            int i = api.CountSiteUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/count/code";

            int i = api.CountSiteCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/count/type-id";

            int i = api.CountSiteTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteCodeTypeId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/count/code/type-id";

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
        
            string _domain = (string)util.GetParamValue(_context, "domain");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/count/domain/type-id";

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
        
            string _domain = (string)util.GetParamValue(_context, "domain");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/count/domain";

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
            wrapper.code = 0;
            wrapper.action = "site/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "site/set/uuid";
                        
            Site obj = new Site();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _domain = util.GetParamValue(_context, "domain");
            if(!String.IsNullOrEmpty(_domain))
                obj.domain = (string)_domain;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetSiteUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteCode()  {
        
            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/set/code";
                        
            Site obj = new Site();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _domain = util.GetParamValue(_context, "domain");
            if(!String.IsNullOrEmpty(_domain))
                obj.domain = (string)_domain;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetSiteCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/del/uuid";

            bool completed = api.DelSiteUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/del/code";

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
            wrapper.code = 0;
            wrapper.action = "site/get";

            List<Site> objs = api.GetSiteList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/get/uuid";

            List<Site> objs = api.GetSiteListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/get/code";

            List<Site> objs = api.GetSiteListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/get/type-id";

            List<Site> objs = api.GetSiteListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListCodeTypeId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/get/code/type-id";

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
        
            string _domain = (string)util.GetParamValue(_context, "domain");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/get/domain/type-id";

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
        
            string _domain = (string)util.GetParamValue(_context, "domain");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site/get/domain";

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
            wrapper.code = 0;
            wrapper.action = "site-type/count";

            int i = api.CountSiteType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteTypeInt wrapper = new ResponseSiteTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-type/count/uuid";

            int i = api.CountSiteTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseSiteTypeInt wrapper = new ResponseSiteTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-type/count/code";

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
            wrapper.code = 0;
            wrapper.action = "site-type/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "site-type/set/uuid";
                        
            SiteType obj = new SiteType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetSiteTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteTypeCode()  {
        
            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-type/set/code";
                        
            SiteType obj = new SiteType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetSiteTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-type/del/uuid";

            bool completed = api.DelSiteTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-type/del/code";

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
            wrapper.code = 0;
            wrapper.action = "site-type/get";

            List<SiteType> objs = api.GetSiteTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteTypeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-type/get/uuid";

            List<SiteType> objs = api.GetSiteTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteTypeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-type/get/code";

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
            wrapper.code = 0;
            wrapper.action = "org/count";

            int i = api.CountOrg(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org/count/uuid";

            int i = api.CountOrgUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org/count/code";

            int i = api.CountOrgCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org/count/name";

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
            wrapper.code = 0;
            wrapper.action = "org/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "org/set/uuid";
                        
            Org obj = new Org();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetOrgUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgBool wrapper = new ResponseOrgBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "org/get";

            List<Org> objs = api.GetOrgList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org/get/uuid";

            List<Org> objs = api.GetOrgListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org/get/code";

            List<Org> objs = api.GetOrgListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org/get/name";

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
            wrapper.code = 0;
            wrapper.action = "org-type/count";

            int i = api.CountOrgType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgTypeInt wrapper = new ResponseOrgTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-type/count/uuid";

            int i = api.CountOrgTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOrgTypeInt wrapper = new ResponseOrgTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-type/count/code";

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
            wrapper.code = 0;
            wrapper.action = "org-type/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "org-type/set/uuid";
                        
            OrgType obj = new OrgType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetOrgTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgTypeCode()  {
        
            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-type/set/code";
                        
            OrgType obj = new OrgType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetOrgTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-type/del/uuid";

            bool completed = api.DelOrgTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-type/del/code";

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
            wrapper.code = 0;
            wrapper.action = "org-type/get";

            List<OrgType> objs = api.GetOrgTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgTypeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-type/get/uuid";

            List<OrgType> objs = api.GetOrgTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgTypeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-type/get/code";

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
            wrapper.code = 0;
            wrapper.action = "content-item/count";

            int i = api.CountContentItem(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/count/uuid";

            int i = api.CountContentItemUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/count/code";

            int i = api.CountContentItemCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/count/name";

            int i = api.CountContentItemName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemPath() {
        
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/count/path";

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
            wrapper.code = 0;
            wrapper.action = "content-item/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "content-item/set/uuid";
                        
            ContentItem obj = new ContentItem();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _date_end = util.GetParamValue(_context, "date_end");
            if(!String.IsNullOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "date_start");
            if(!String.IsNullOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetContentItemUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/del/uuid";

            bool completed = api.DelContentItemUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemPath() {
        
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/del/path";

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
            wrapper.code = 0;
            wrapper.action = "content-item/get";

            List<ContentItem> objs = api.GetContentItemList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/get/uuid";

            List<ContentItem> objs = api.GetContentItemListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/get/code";

            List<ContentItem> objs = api.GetContentItemListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/get/name";

            List<ContentItem> objs = api.GetContentItemListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListPath() {
        
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item/get/path";

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
            wrapper.code = 0;
            wrapper.action = "content-item-type/count";

            int i = api.CountContentItemType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentItemTypeInt wrapper = new ResponseContentItemTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item-type/count/uuid";

            int i = api.CountContentItemTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseContentItemTypeInt wrapper = new ResponseContentItemTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item-type/count/code";

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
            wrapper.code = 0;
            wrapper.action = "content-item-type/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "content-item-type/set/uuid";
                        
            ContentItemType obj = new ContentItemType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetContentItemTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentItemTypeCode()  {
        
            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item-type/set/code";
                        
            ContentItemType obj = new ContentItemType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetContentItemTypeCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item-type/del/uuid";

            bool completed = api.DelContentItemTypeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item-type/del/code";

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
            wrapper.code = 0;
            wrapper.action = "content-item-type/get";

            List<ContentItemType> objs = api.GetContentItemTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemTypeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item-type/get/uuid";

            List<ContentItemType> objs = api.GetContentItemTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemTypeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-item-type/get/code";

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
            wrapper.code = 0;
            wrapper.action = "content-page/count";

            int i = api.CountContentPage(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/count/uuid";

            int i = api.CountContentPageUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/count/code";

            int i = api.CountContentPageCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/count/name";

            int i = api.CountContentPageName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPagePath() {
        
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/count/path";

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
            wrapper.code = 0;
            wrapper.action = "content-page/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "content-page/set/uuid";
                        
            ContentPage obj = new ContentPage();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _date_end = util.GetParamValue(_context, "date_end");
            if(!String.IsNullOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "date_start");
            if(!String.IsNullOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "site_id");
            if(!String.IsNullOrEmpty(_site_id))
                obj.site_id = (string)_site_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _template = util.GetParamValue(_context, "template");
            if(!String.IsNullOrEmpty(_template))
                obj.template = (string)_template;
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetContentPageUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPageUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/del/uuid";

            bool completed = api.DelContentPageUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPagePathSiteId() {
        
            string _path = (string)util.GetParamValue(_context, "path");
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/del/path/site-id";

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
        
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/del/path";

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
            wrapper.code = 0;
            wrapper.action = "content-page/get";

            List<ContentPage> objs = api.GetContentPageList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/get/uuid";

            List<ContentPage> objs = api.GetContentPageListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/get/code";

            List<ContentPage> objs = api.GetContentPageListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/get/name";

            List<ContentPage> objs = api.GetContentPageListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListPath() {
        
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/get/path";

            List<ContentPage> objs = api.GetContentPageListPath(
                _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListSiteId() {
        
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/get/site-id";

            List<ContentPage> objs = api.GetContentPageListSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListSiteIdPath() {
        
            string _site_id = (string)util.GetParamValue(_context, "site_id");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "content-page/get/site-id/path";

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
            wrapper.code = 0;
            wrapper.action = "message/count";

            int i = api.CountMessage(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountMessageUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseMessageInt wrapper = new ResponseMessageInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "message/count/uuid";

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
            wrapper.code = 0;
            wrapper.action = "message/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "message/set/uuid";
                        
            Message obj = new Message();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _profile_from_name = util.GetParamValue(_context, "profile_from_name");
            if(!String.IsNullOrEmpty(_profile_from_name))
                obj.profile_from_name = (string)_profile_from_name;
            
            string _read = util.GetParamValue(_context, "read");
            if(!String.IsNullOrEmpty(_read))
                obj.read = Convert.ToBoolean(_read);
            
            string _profile_from_id = util.GetParamValue(_context, "profile_from_id");
            if(!String.IsNullOrEmpty(_profile_from_id))
                obj.profile_from_id = (string)_profile_from_id;
            
            string _profile_to_token = util.GetParamValue(_context, "profile_to_token");
            if(!String.IsNullOrEmpty(_profile_to_token))
                obj.profile_to_token = (string)_profile_to_token;
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _subject = util.GetParamValue(_context, "subject");
            if(!String.IsNullOrEmpty(_subject))
                obj.subject = (string)_subject;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_to_id = util.GetParamValue(_context, "profile_to_id");
            if(!String.IsNullOrEmpty(_profile_to_id))
                obj.profile_to_id = (string)_profile_to_id;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_to_name = util.GetParamValue(_context, "profile_to_name");
            if(!String.IsNullOrEmpty(_profile_to_name))
                obj.profile_to_name = (string)_profile_to_name;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _sent = util.GetParamValue(_context, "sent");
            if(!String.IsNullOrEmpty(_sent))
                obj.sent = Convert.ToBoolean(_sent);
            
            
            // get data
            wrapper.data = api.SetMessageUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelMessageUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseMessageBool wrapper = new ResponseMessageBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "message/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "message/get";

            List<Message> objs = api.GetMessageList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetMessageListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseMessageList wrapper = new ResponseMessageList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "message/get/uuid";

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
            wrapper.code = 0;
            wrapper.action = "offer/count";

            int i = api.CountOffer(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/count/uuid";

            int i = api.CountOfferUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/count/code";

            int i = api.CountOfferCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/count/name";

            int i = api.CountOfferName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/count/org-id";

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
            wrapper.code = 0;
            wrapper.action = "offer/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "offer/set/uuid";
                        
            Offer obj = new Offer();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _usage_count = util.GetParamValue(_context, "usage_count");
            if(!String.IsNullOrEmpty(_usage_count))
                obj.usage_count = Convert.ToInt32(_usage_count);
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetOfferUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/del/uuid";

            bool completed = api.DelOfferUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/del/org-id";

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
            wrapper.code = 0;
            wrapper.action = "offer/get";

            List<Offer> objs = api.GetOfferList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/get/uuid";

            List<Offer> objs = api.GetOfferListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/get/code";

            List<Offer> objs = api.GetOfferListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/get/name";

            List<Offer> objs = api.GetOfferListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer/get/org-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-type/count";

            int i = api.CountOfferType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-type/count/uuid";

            int i = api.CountOfferTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-type/count/code";

            int i = api.CountOfferTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-type/count/name";

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
            wrapper.code = 0;
            wrapper.action = "offer-type/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "offer-type/set/uuid";
                        
            OfferType obj = new OfferType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetOfferTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferTypeBool wrapper = new ResponseOfferTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-type/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "offer-type/get";

            List<OfferType> objs = api.GetOfferTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-type/get/uuid";

            List<OfferType> objs = api.GetOfferTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-type/get/code";

            List<OfferType> objs = api.GetOfferTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-type/get/name";

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
            wrapper.code = 0;
            wrapper.action = "offer-location/count";

            int i = api.CountOfferLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/count/uuid";

            int i = api.CountOfferLocationUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationOfferId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/count/offer-id";

            int i = api.CountOfferLocationOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationCity() {
        
            string _city = (string)util.GetParamValue(_context, "city");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/count/city";

            int i = api.CountOfferLocationCity(
                _city
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationCountryCode() {
        
            string _country_code = (string)util.GetParamValue(_context, "country_code");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/count/country-code";

            int i = api.CountOfferLocationCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationPostalCode() {
        
            string _postal_code = (string)util.GetParamValue(_context, "postal_code");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/count/postal-code";

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
            wrapper.code = 0;
            wrapper.action = "offer-location/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "offer-location/set/uuid";
                        
            OfferLocation obj = new OfferLocation();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _fax = util.GetParamValue(_context, "fax");
            if(!String.IsNullOrEmpty(_fax))
                obj.fax = (string)_fax;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _address1 = util.GetParamValue(_context, "address1");
            if(!String.IsNullOrEmpty(_address1))
                obj.address1 = (string)_address1;
            
            string _twitter = util.GetParamValue(_context, "twitter");
            if(!String.IsNullOrEmpty(_twitter))
                obj.twitter = (string)_twitter;
            
            string _phone = util.GetParamValue(_context, "phone");
            if(!String.IsNullOrEmpty(_phone))
                obj.phone = (string)_phone;
            
            string _postal_code = util.GetParamValue(_context, "postal_code");
            if(!String.IsNullOrEmpty(_postal_code))
                obj.postal_code = (string)_postal_code;
            
            string _offer_id = util.GetParamValue(_context, "offer_id");
            if(!String.IsNullOrEmpty(_offer_id))
                obj.offer_id = (string)_offer_id;
            
            string _country_code = util.GetParamValue(_context, "country_code");
            if(!String.IsNullOrEmpty(_country_code))
                obj.country_code = (string)_country_code;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _state_province = util.GetParamValue(_context, "state_province");
            if(!String.IsNullOrEmpty(_state_province))
                obj.state_province = (string)_state_province;
            
            string _city = util.GetParamValue(_context, "city");
            if(!String.IsNullOrEmpty(_city))
                obj.city = (string)_city;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _dob = util.GetParamValue(_context, "dob");
            if(!String.IsNullOrEmpty(_dob))
                obj.dob = Convert.ToDateTime(_dob);
            else 
                obj.dob = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "date_start");
            if(!String.IsNullOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _longitude = util.GetParamValue(_context, "longitude");
            if(!String.IsNullOrEmpty(_longitude))
                obj.longitude = Convert.ToDouble(_longitude);
            
            string _email = util.GetParamValue(_context, "email");
            if(!String.IsNullOrEmpty(_email))
                obj.email = (string)_email;
            
            string _date_end = util.GetParamValue(_context, "date_end");
            if(!String.IsNullOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _latitude = util.GetParamValue(_context, "latitude");
            if(!String.IsNullOrEmpty(_latitude))
                obj.latitude = Convert.ToDouble(_latitude);
            
            string _facebook = util.GetParamValue(_context, "facebook");
            if(!String.IsNullOrEmpty(_facebook))
                obj.facebook = (string)_facebook;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _address2 = util.GetParamValue(_context, "address2");
            if(!String.IsNullOrEmpty(_address2))
                obj.address2 = (string)_address2;
            
            
            // get data
            wrapper.data = api.SetOfferLocationUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferLocationUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferLocationBool wrapper = new ResponseOfferLocationBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "offer-location/get";

            List<OfferLocation> objs = api.GetOfferLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/get/uuid";

            List<OfferLocation> objs = api.GetOfferLocationListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListOfferId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/get/offer-id";

            List<OfferLocation> objs = api.GetOfferLocationListOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListCity() {
        
            string _city = (string)util.GetParamValue(_context, "city");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/get/city";

            List<OfferLocation> objs = api.GetOfferLocationListCity(
                _city
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListCountryCode() {
        
            string _country_code = (string)util.GetParamValue(_context, "country_code");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/get/country-code";

            List<OfferLocation> objs = api.GetOfferLocationListCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListPostalCode() {
        
            string _postal_code = (string)util.GetParamValue(_context, "postal_code");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-location/get/postal-code";

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
            wrapper.code = 0;
            wrapper.action = "offer-category/count";

            int i = api.CountOfferCategory(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/count/uuid";

            int i = api.CountOfferCategoryUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/count/code";

            int i = api.CountOfferCategoryCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/count/name";

            int i = api.CountOfferCategoryName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/count/org-id";

            int i = api.CountOfferCategoryOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/count/type-id";

            int i = api.CountOfferCategoryTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryOrgIdTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/count/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-category/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "offer-category/set/uuid";
                        
            OfferCategory obj = new OfferCategory();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetOfferCategoryUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/del/uuid";

            bool completed = api.DelOfferCategoryUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryCodeOrgId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/del/code/org-id";

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
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/del/code/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-category/get";

            List<OfferCategory> objs = api.GetOfferCategoryList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/get/uuid";

            List<OfferCategory> objs = api.GetOfferCategoryListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/get/code";

            List<OfferCategory> objs = api.GetOfferCategoryListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/get/name";

            List<OfferCategory> objs = api.GetOfferCategoryListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/get/org-id";

            List<OfferCategory> objs = api.GetOfferCategoryListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/get/type-id";

            List<OfferCategory> objs = api.GetOfferCategoryListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListOrgIdTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category/get/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/count";

            int i = api.CountOfferCategoryTree(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/count/uuid";

            int i = api.CountOfferCategoryTreeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/count/parent-id";

            int i = api.CountOfferCategoryTreeParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/count/category-id";

            int i = api.CountOfferCategoryTreeCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeParentIdCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/count/parent-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/set/uuid";
                        
            OfferCategoryTree obj = new OfferCategoryTree();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _parent_id = util.GetParamValue(_context, "parent_id");
            if(!String.IsNullOrEmpty(_parent_id))
                obj.parent_id = (string)_parent_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _category_id = util.GetParamValue(_context, "category_id");
            if(!String.IsNullOrEmpty(_category_id))
                obj.category_id = (string)_category_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetOfferCategoryTreeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/del/uuid";

            bool completed = api.DelOfferCategoryTreeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/del/parent-id";

            bool completed = api.DelOfferCategoryTreeParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/del/category-id";

            bool completed = api.DelOfferCategoryTreeCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeParentIdCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/del/parent-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/get";

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/get/uuid";

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/get/parent-id";

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/get/category-id";

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListParentIdCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-tree/get/parent-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/count";

            int i = api.CountOfferCategoryAssoc(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/count/uuid";

            int i = api.CountOfferCategoryAssocUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocOfferId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/count/offer-id";

            int i = api.CountOfferCategoryAssocOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/count/category-id";

            int i = api.CountOfferCategoryAssocCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocOfferIdCategoryId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/count/offer-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/set/uuid";
                        
            OfferCategoryAssoc obj = new OfferCategoryAssoc();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _offer_id = util.GetParamValue(_context, "offer_id");
            if(!String.IsNullOrEmpty(_offer_id))
                obj.offer_id = (string)_offer_id;
            
            string _category_id = util.GetParamValue(_context, "category_id");
            if(!String.IsNullOrEmpty(_category_id))
                obj.category_id = (string)_category_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetOfferCategoryAssocUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryAssocUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryAssocBool wrapper = new ResponseOfferCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/get";

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/get/uuid";

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListOfferId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/get/offer-id";

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/get/category-id";

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListOfferIdCategoryId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-category-assoc/get/offer-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-game-location/count";

            int i = api.CountOfferGameLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/count/uuid";

            int i = api.CountOfferGameLocationUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationGameLocationId() {
        
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/count/game-location-id";

            int i = api.CountOfferGameLocationGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationOfferId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/count/offer-id";

            int i = api.CountOfferGameLocationOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationOfferIdGameLocationId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/count/offer-id/game-location-id";

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
            wrapper.code = 0;
            wrapper.action = "offer-game-location/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "offer-game-location/set/uuid";
                        
            OfferGameLocation obj = new OfferGameLocation();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _game_location_id = util.GetParamValue(_context, "game_location_id");
            if(!String.IsNullOrEmpty(_game_location_id))
                obj.game_location_id = (string)_game_location_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _offer_id = util.GetParamValue(_context, "offer_id");
            if(!String.IsNullOrEmpty(_offer_id))
                obj.offer_id = (string)_offer_id;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetOfferGameLocationUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferGameLocationUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferGameLocationBool wrapper = new ResponseOfferGameLocationBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "offer-game-location/get";

            List<OfferGameLocation> objs = api.GetOfferGameLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/get/uuid";

            List<OfferGameLocation> objs = api.GetOfferGameLocationListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListGameLocationId() {
        
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/get/game-location-id";

            List<OfferGameLocation> objs = api.GetOfferGameLocationListGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListOfferId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/get/offer-id";

            List<OfferGameLocation> objs = api.GetOfferGameLocationListOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListOfferIdGameLocationId() {
        
            string _offer_id = (string)util.GetParamValue(_context, "offer_id");
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "offer-game-location/get/offer-id/game-location-id";

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
            wrapper.code = 0;
            wrapper.action = "event-info/count";

            int i = api.CountEventInfo(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/count/uuid";

            int i = api.CountEventInfoUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/count/code";

            int i = api.CountEventInfoCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/count/name";

            int i = api.CountEventInfoName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/count/org-id";

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
            wrapper.code = 0;
            wrapper.action = "event-info/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "event-info/set/uuid";
                        
            EventInfo obj = new EventInfo();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _usage_count = util.GetParamValue(_context, "usage_count");
            if(!String.IsNullOrEmpty(_usage_count))
                obj.usage_count = Convert.ToInt32(_usage_count);
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetEventInfoUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventInfoUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/del/uuid";

            bool completed = api.DelEventInfoUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventInfoOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/del/org-id";

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
            wrapper.code = 0;
            wrapper.action = "event-info/get";

            List<EventInfo> objs = api.GetEventInfoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/get/uuid";

            List<EventInfo> objs = api.GetEventInfoListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/get/code";

            List<EventInfo> objs = api.GetEventInfoListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/get/name";

            List<EventInfo> objs = api.GetEventInfoListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-info/get/org-id";

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
            wrapper.code = 0;
            wrapper.action = "event-location/count";

            int i = api.CountEventLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/count/uuid";

            int i = api.CountEventLocationUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationEventId() {
        
            string _event_id = (string)util.GetParamValue(_context, "event_id");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/count/event-id";

            int i = api.CountEventLocationEventId(
                _event_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationCity() {
        
            string _city = (string)util.GetParamValue(_context, "city");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/count/city";

            int i = api.CountEventLocationCity(
                _city
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationCountryCode() {
        
            string _country_code = (string)util.GetParamValue(_context, "country_code");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/count/country-code";

            int i = api.CountEventLocationCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationPostalCode() {
        
            string _postal_code = (string)util.GetParamValue(_context, "postal_code");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/count/postal-code";

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
            wrapper.code = 0;
            wrapper.action = "event-location/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "event-location/set/uuid";
                        
            EventLocation obj = new EventLocation();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _fax = util.GetParamValue(_context, "fax");
            if(!String.IsNullOrEmpty(_fax))
                obj.fax = (string)_fax;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _address1 = util.GetParamValue(_context, "address1");
            if(!String.IsNullOrEmpty(_address1))
                obj.address1 = (string)_address1;
            
            string _twitter = util.GetParamValue(_context, "twitter");
            if(!String.IsNullOrEmpty(_twitter))
                obj.twitter = (string)_twitter;
            
            string _phone = util.GetParamValue(_context, "phone");
            if(!String.IsNullOrEmpty(_phone))
                obj.phone = (string)_phone;
            
            string _postal_code = util.GetParamValue(_context, "postal_code");
            if(!String.IsNullOrEmpty(_postal_code))
                obj.postal_code = (string)_postal_code;
            
            string _country_code = util.GetParamValue(_context, "country_code");
            if(!String.IsNullOrEmpty(_country_code))
                obj.country_code = (string)_country_code;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _state_province = util.GetParamValue(_context, "state_province");
            if(!String.IsNullOrEmpty(_state_province))
                obj.state_province = (string)_state_province;
            
            string _city = util.GetParamValue(_context, "city");
            if(!String.IsNullOrEmpty(_city))
                obj.city = (string)_city;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _dob = util.GetParamValue(_context, "dob");
            if(!String.IsNullOrEmpty(_dob))
                obj.dob = Convert.ToDateTime(_dob);
            else 
                obj.dob = DateTime.Now;
            
            string _date_start = util.GetParamValue(_context, "date_start");
            if(!String.IsNullOrEmpty(_date_start))
                obj.date_start = Convert.ToDateTime(_date_start);
            else 
                obj.date_start = DateTime.Now;
            
            string _longitude = util.GetParamValue(_context, "longitude");
            if(!String.IsNullOrEmpty(_longitude))
                obj.longitude = Convert.ToDouble(_longitude);
            
            string _email = util.GetParamValue(_context, "email");
            if(!String.IsNullOrEmpty(_email))
                obj.email = (string)_email;
            
            string _event_id = util.GetParamValue(_context, "event_id");
            if(!String.IsNullOrEmpty(_event_id))
                obj.event_id = (string)_event_id;
            
            string _date_end = util.GetParamValue(_context, "date_end");
            if(!String.IsNullOrEmpty(_date_end))
                obj.date_end = Convert.ToDateTime(_date_end);
            else 
                obj.date_end = DateTime.Now;
            
            string _latitude = util.GetParamValue(_context, "latitude");
            if(!String.IsNullOrEmpty(_latitude))
                obj.latitude = Convert.ToDouble(_latitude);
            
            string _facebook = util.GetParamValue(_context, "facebook");
            if(!String.IsNullOrEmpty(_facebook))
                obj.facebook = (string)_facebook;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _address2 = util.GetParamValue(_context, "address2");
            if(!String.IsNullOrEmpty(_address2))
                obj.address2 = (string)_address2;
            
            
            // get data
            wrapper.data = api.SetEventLocationUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventLocationUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventLocationBool wrapper = new ResponseEventLocationBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "event-location/get";

            List<EventLocation> objs = api.GetEventLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/get/uuid";

            List<EventLocation> objs = api.GetEventLocationListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListEventId() {
        
            string _event_id = (string)util.GetParamValue(_context, "event_id");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/get/event-id";

            List<EventLocation> objs = api.GetEventLocationListEventId(
                _event_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListCity() {
        
            string _city = (string)util.GetParamValue(_context, "city");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/get/city";

            List<EventLocation> objs = api.GetEventLocationListCity(
                _city
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListCountryCode() {
        
            string _country_code = (string)util.GetParamValue(_context, "country_code");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/get/country-code";

            List<EventLocation> objs = api.GetEventLocationListCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListPostalCode() {
        
            string _postal_code = (string)util.GetParamValue(_context, "postal_code");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-location/get/postal-code";

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
            wrapper.code = 0;
            wrapper.action = "event-category/count";

            int i = api.CountEventCategory(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/count/uuid";

            int i = api.CountEventCategoryUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/count/code";

            int i = api.CountEventCategoryCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/count/name";

            int i = api.CountEventCategoryName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/count/org-id";

            int i = api.CountEventCategoryOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/count/type-id";

            int i = api.CountEventCategoryTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryOrgIdTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/count/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "event-category/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "event-category/set/uuid";
                        
            EventCategory obj = new EventCategory();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetEventCategoryUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/del/uuid";

            bool completed = api.DelEventCategoryUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryCodeOrgId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/del/code/org-id";

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
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/del/code/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "event-category/get";

            List<EventCategory> objs = api.GetEventCategoryList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/get/uuid";

            List<EventCategory> objs = api.GetEventCategoryListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/get/code";

            List<EventCategory> objs = api.GetEventCategoryListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/get/name";

            List<EventCategory> objs = api.GetEventCategoryListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/get/org-id";

            List<EventCategory> objs = api.GetEventCategoryListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/get/type-id";

            List<EventCategory> objs = api.GetEventCategoryListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListOrgIdTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category/get/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "event-category-tree/count";

            int i = api.CountEventCategoryTree(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/count/uuid";

            int i = api.CountEventCategoryTreeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/count/parent-id";

            int i = api.CountEventCategoryTreeParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/count/category-id";

            int i = api.CountEventCategoryTreeCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeParentIdCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/count/parent-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "event-category-tree/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "event-category-tree/set/uuid";
                        
            EventCategoryTree obj = new EventCategoryTree();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _parent_id = util.GetParamValue(_context, "parent_id");
            if(!String.IsNullOrEmpty(_parent_id))
                obj.parent_id = (string)_parent_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _category_id = util.GetParamValue(_context, "category_id");
            if(!String.IsNullOrEmpty(_category_id))
                obj.category_id = (string)_category_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetEventCategoryTreeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/del/uuid";

            bool completed = api.DelEventCategoryTreeUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/del/parent-id";

            bool completed = api.DelEventCategoryTreeParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/del/category-id";

            bool completed = api.DelEventCategoryTreeCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeParentIdCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/del/parent-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "event-category-tree/get";

            List<EventCategoryTree> objs = api.GetEventCategoryTreeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/get/uuid";

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/get/parent-id";

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/get/category-id";

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListParentIdCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-tree/get/parent-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/count";

            int i = api.CountEventCategoryAssoc(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/count/uuid";

            int i = api.CountEventCategoryAssocUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocEventId() {
        
            string _event_id = (string)util.GetParamValue(_context, "event_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/count/event-id";

            int i = api.CountEventCategoryAssocEventId(
                _event_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/count/category-id";

            int i = api.CountEventCategoryAssocCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocEventIdCategoryId() {
        
            string _event_id = (string)util.GetParamValue(_context, "event_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/count/event-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/set/uuid";
                        
            EventCategoryAssoc obj = new EventCategoryAssoc();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _event_id = util.GetParamValue(_context, "event_id");
            if(!String.IsNullOrEmpty(_event_id))
                obj.event_id = (string)_event_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _category_id = util.GetParamValue(_context, "category_id");
            if(!String.IsNullOrEmpty(_category_id))
                obj.category_id = (string)_category_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetEventCategoryAssocUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryAssocUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryAssocBool wrapper = new ResponseEventCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/get";

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/get/uuid";

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListEventId() {
        
            string _event_id = (string)util.GetParamValue(_context, "event_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/get/event-id";

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListEventId(
                _event_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/get/category-id";

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListEventIdCategoryId() {
        
            string _event_id = (string)util.GetParamValue(_context, "event_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "event-category-assoc/get/event-id/category-id";

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
            wrapper.code = 0;
            wrapper.action = "channel/count";

            int i = api.CountChannel(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/count/uuid";

            int i = api.CountChannelUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/count/code";

            int i = api.CountChannelCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/count/name";

            int i = api.CountChannelName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/count/org-id";

            int i = api.CountChannelOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/count/type-id";

            int i = api.CountChannelTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelOrgIdTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/count/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "channel/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "channel/set/uuid";
                        
            Channel obj = new Channel();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetChannelUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/del/uuid";

            bool completed = api.DelChannelUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelCodeOrgId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/del/code/org-id";

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
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/del/code/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "channel/get";

            List<Channel> objs = api.GetChannelList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/get/uuid";

            List<Channel> objs = api.GetChannelListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/get/code";

            List<Channel> objs = api.GetChannelListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/get/name";

            List<Channel> objs = api.GetChannelListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/get/org-id";

            List<Channel> objs = api.GetChannelListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/get/type-id";

            List<Channel> objs = api.GetChannelListTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListOrgIdTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel/get/org-id/type-id";

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
            wrapper.code = 0;
            wrapper.action = "channel-type/count";

            int i = api.CountChannelType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel-type/count/uuid";

            int i = api.CountChannelTypeUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel-type/count/code";

            int i = api.CountChannelTypeCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel-type/count/name";

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
            wrapper.code = 0;
            wrapper.action = "channel-type/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "channel-type/set/uuid";
                        
            ChannelType obj = new ChannelType();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetChannelTypeUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelTypeUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseChannelTypeBool wrapper = new ResponseChannelTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel-type/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "channel-type/get";

            List<ChannelType> objs = api.GetChannelTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel-type/get/uuid";

            List<ChannelType> objs = api.GetChannelTypeListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel-type/get/code";

            List<ChannelType> objs = api.GetChannelTypeListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "channel-type/get/name";

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
            wrapper.code = 0;
            wrapper.action = "question/count";

            int i = api.CountQuestion(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/count/uuid";

            int i = api.CountQuestionUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/count/code";

            int i = api.CountQuestionCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/count/name";

            int i = api.CountQuestionName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionChannelId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/count/channel-id";

            int i = api.CountQuestionChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/count/org-id";

            int i = api.CountQuestionOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionChannelIdOrgId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/count/channel-id/org-id";

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
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/count/channel-id/code";

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
            wrapper.code = 0;
            wrapper.action = "question/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "question/set/uuid";
                        
            Question obj = new Question();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _choices = util.GetParamValue(_context, "choices");
            if(!String.IsNullOrEmpty(_choices))
                obj.choices = (string)_choices;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetQuestionUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetQuestionChannelIdCode()  {
        
            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/set/channel-id/code";
                        
            Question obj = new Question();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _choices = util.GetParamValue(_context, "choices");
            if(!String.IsNullOrEmpty(_choices))
                obj.choices = (string)_choices;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetQuestionChannelIdCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelQuestionUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/del/uuid";

            bool completed = api.DelQuestionUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelQuestionChannelIdOrgId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/del/channel-id/org-id";

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
            wrapper.code = 0;
            wrapper.action = "question/get";

            List<Question> objs = api.GetQuestionList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/uuid";

            List<Question> objs = api.GetQuestionListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/code";

            List<Question> objs = api.GetQuestionListCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/name";

            List<Question> objs = api.GetQuestionListName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListType() {
        
            string _type = (string)util.GetParamValue(_context, "type");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/type";

            List<Question> objs = api.GetQuestionListType(
                _type
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListChannelId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/channel-id";

            List<Question> objs = api.GetQuestionListChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/org-id";

            List<Question> objs = api.GetQuestionListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListChannelIdOrgId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/channel-id/org-id";

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
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "question/get/channel-id/code";

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
            wrapper.code = 0;
            wrapper.action = "profile-offer/count";

            int i = api.CountProfileOffer(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOfferUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileOfferInt wrapper = new ResponseProfileOfferInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-offer/count/uuid";

            int i = api.CountProfileOfferUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOfferProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileOfferInt wrapper = new ResponseProfileOfferInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-offer/count/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-offer/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-offer/set/uuid";
                        
            ProfileOffer obj = new ProfileOffer();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _redeem_code = util.GetParamValue(_context, "redeem_code");
            if(!String.IsNullOrEmpty(_redeem_code))
                obj.redeem_code = (string)_redeem_code;
            
            string _offer_id = util.GetParamValue(_context, "offer_id");
            if(!String.IsNullOrEmpty(_offer_id))
                obj.offer_id = (string)_offer_id;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _redeemed = util.GetParamValue(_context, "redeemed");
            if(!String.IsNullOrEmpty(_redeemed))
                obj.redeemed = (string)_redeemed;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetProfileOfferUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOfferUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-offer/del/uuid";

            bool completed = api.DelProfileOfferUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOfferProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-offer/del/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-offer/get";

            List<ProfileOffer> objs = api.GetProfileOfferList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOfferListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-offer/get/uuid";

            List<ProfileOffer> objs = api.GetProfileOfferListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOfferListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-offer/get/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-app/count";

            int i = api.CountProfileApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAppUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAppInt wrapper = new ResponseProfileAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/count/uuid";

            int i = api.CountProfileAppUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAppProfileIdAppId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseProfileAppInt wrapper = new ResponseProfileAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/count/profile-id/app-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-app/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-app/set/uuid";
                        
            ProfileApp obj = new ProfileApp();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
            
            // get data
            wrapper.data = api.SetProfileAppUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAppProfileIdAppId()  {
        
            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/set/profile-id/app-id";
                        
            ProfileApp obj = new ProfileApp();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
            
            // get data
            wrapper.data = api.SetProfileAppProfileIdAppId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAppUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/del/uuid";

            bool completed = api.DelProfileAppUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAppProfileIdAppId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/del/profile-id/app-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-app/get";

            List<ProfileApp> objs = api.GetProfileAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/get/uuid";

            List<ProfileApp> objs = api.GetProfileAppListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/get/app-id";

            List<ProfileApp> objs = api.GetProfileAppListAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/get/profile-id";

            List<ProfileApp> objs = api.GetProfileAppListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListProfileIdAppId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-app/get/profile-id/app-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-org/count";

            int i = api.CountProfileOrg(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-org/count/uuid";

            int i = api.CountProfileOrgUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-org/count/org-id";

            int i = api.CountProfileOrgOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-org/count/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-org/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-org/set/uuid";
                        
            ProfileOrg obj = new ProfileOrg();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            
            // get data
            wrapper.data = api.SetProfileOrgUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOrgUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileOrgBool wrapper = new ResponseProfileOrgBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-org/del/uuid";

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
            wrapper.code = 0;
            wrapper.action = "profile-org/get";

            List<ProfileOrg> objs = api.GetProfileOrgList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-org/get/uuid";

            List<ProfileOrg> objs = api.GetProfileOrgListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-org/get/org-id";

            List<ProfileOrg> objs = api.GetProfileOrgListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-org/get/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-question/count";

            int i = api.CountProfileQuestion(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/uuid";

            int i = api.CountProfileQuestionUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionChannelId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/channel-id";

            int i = api.CountProfileQuestionChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/org-id";

            int i = api.CountProfileQuestionOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/profile-id";

            int i = api.CountProfileQuestionProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionQuestionId() {
        
            string _question_id = (string)util.GetParamValue(_context, "question_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/question-id";

            int i = api.CountProfileQuestionQuestionId(
                _question_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionChannelIdOrgId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/channel-id/org-id";

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
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/channel-id/profile-id";

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
        
            string _question_id = (string)util.GetParamValue(_context, "question_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/count/question-id/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-question/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-question/set/uuid";
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _answer = util.GetParamValue(_context, "answer");
            if(!String.IsNullOrEmpty(_answer))
                obj.answer = (string)_answer;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _question_id = util.GetParamValue(_context, "question_id");
            if(!String.IsNullOrEmpty(_question_id))
                obj.question_id = (string)_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionChannelIdProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/set/channel-id/profile-id";
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _answer = util.GetParamValue(_context, "answer");
            if(!String.IsNullOrEmpty(_answer))
                obj.answer = (string)_answer;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _question_id = util.GetParamValue(_context, "question_id");
            if(!String.IsNullOrEmpty(_question_id))
                obj.question_id = (string)_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionChannelIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionQuestionIdProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/set/question-id/profile-id";
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _answer = util.GetParamValue(_context, "answer");
            if(!String.IsNullOrEmpty(_answer))
                obj.answer = (string)_answer;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _question_id = util.GetParamValue(_context, "question_id");
            if(!String.IsNullOrEmpty(_question_id))
                obj.question_id = (string)_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionQuestionIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionChannelIdQuestionIdProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/set/channel-id/question-id/profile-id";
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _answer = util.GetParamValue(_context, "answer");
            if(!String.IsNullOrEmpty(_answer))
                obj.answer = (string)_answer;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _question_id = util.GetParamValue(_context, "question_id");
            if(!String.IsNullOrEmpty(_question_id))
                obj.question_id = (string)_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionChannelIdQuestionIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileQuestionUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/del/uuid";

            bool completed = api.DelProfileQuestionUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileQuestionChannelIdOrgId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/del/channel-id/org-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-question/get";

            List<ProfileQuestion> objs = api.GetProfileQuestionList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/uuid";

            List<ProfileQuestion> objs = api.GetProfileQuestionListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListChannelId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/channel-id";

            List<ProfileQuestion> objs = api.GetProfileQuestionListChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/org-id";

            List<ProfileQuestion> objs = api.GetProfileQuestionListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/profile-id";

            List<ProfileQuestion> objs = api.GetProfileQuestionListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListQuestionId() {
        
            string _question_id = (string)util.GetParamValue(_context, "question_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/question-id";

            List<ProfileQuestion> objs = api.GetProfileQuestionListQuestionId(
                _question_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListChannelIdOrgId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/channel-id/org-id";

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
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/channel-id/profile-id";

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
        
            string _question_id = (string)util.GetParamValue(_context, "question_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-question/get/question-id/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-channel/count";

            int i = api.CountProfileChannel(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/count/uuid";

            int i = api.CountProfileChannelUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelChannelId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/count/channel-id";

            int i = api.CountProfileChannelChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/count/profile-id";

            int i = api.CountProfileChannelProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelChannelIdProfileId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/count/channel-id/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-channel/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-channel/set/uuid";
                        
            ProfileChannel obj = new ProfileChannel();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetProfileChannelUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileChannelChannelIdProfileId()  {
        
            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/set/channel-id/profile-id";
                        
            ProfileChannel obj = new ProfileChannel();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _channel_id = util.GetParamValue(_context, "channel_id");
            if(!String.IsNullOrEmpty(_channel_id))
                obj.channel_id = (string)_channel_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetProfileChannelChannelIdProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileChannelUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/del/uuid";

            bool completed = api.DelProfileChannelUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileChannelChannelIdProfileId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/del/channel-id/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-channel/get";

            List<ProfileChannel> objs = api.GetProfileChannelList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/get/uuid";

            List<ProfileChannel> objs = api.GetProfileChannelListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListChannelId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/get/channel-id";

            List<ProfileChannel> objs = api.GetProfileChannelListChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/get/profile-id";

            List<ProfileChannel> objs = api.GetProfileChannelListProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListChannelIdProfileId() {
        
            string _channel_id = (string)util.GetParamValue(_context, "channel_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-channel/get/channel-id/profile-id";

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
            wrapper.code = 0;
            wrapper.action = "org-site/count";

            int i = api.CountOrgSite(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/count/uuid";

            int i = api.CountOrgSiteUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/count/org-id";

            int i = api.CountOrgSiteOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteSiteId() {
        
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/count/site-id";

            int i = api.CountOrgSiteSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteOrgIdSiteId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/count/org-id/site-id";

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
            wrapper.code = 0;
            wrapper.action = "org-site/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "org-site/set/uuid";
                        
            OrgSite obj = new OrgSite();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "site_id");
            if(!String.IsNullOrEmpty(_site_id))
                obj.site_id = (string)_site_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            
            // get data
            wrapper.data = api.SetOrgSiteUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgSiteOrgIdSiteId()  {
        
            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/set/org-id/site-id";
                        
            OrgSite obj = new OrgSite();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "site_id");
            if(!String.IsNullOrEmpty(_site_id))
                obj.site_id = (string)_site_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _org_id = util.GetParamValue(_context, "org_id");
            if(!String.IsNullOrEmpty(_org_id))
                obj.org_id = (string)_org_id;
            
            
            // get data
            wrapper.data = api.SetOrgSiteOrgIdSiteId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgSiteUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/del/uuid";

            bool completed = api.DelOrgSiteUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgSiteOrgIdSiteId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/del/org-id/site-id";

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
            wrapper.code = 0;
            wrapper.action = "org-site/get";

            List<OrgSite> objs = api.GetOrgSiteList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/get/uuid";

            List<OrgSite> objs = api.GetOrgSiteListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/get/org-id";

            List<OrgSite> objs = api.GetOrgSiteListOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListSiteId() {
        
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/get/site-id";

            List<OrgSite> objs = api.GetOrgSiteListSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListOrgIdSiteId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "org-site/get/org-id/site-id";

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
            wrapper.code = 0;
            wrapper.action = "site-app/count";

            int i = api.CountSiteApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/count/uuid";

            int i = api.CountSiteAppUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/count/app-id";

            int i = api.CountSiteAppAppId(
                _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppSiteId() {
        
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/count/site-id";

            int i = api.CountSiteAppSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppAppIdSiteId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/count/app-id/site-id";

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
            wrapper.code = 0;
            wrapper.action = "site-app/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "site-app/set/uuid";
                        
            SiteApp obj = new SiteApp();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "site_id");
            if(!String.IsNullOrEmpty(_site_id))
                obj.site_id = (string)_site_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
            
            // get data
            wrapper.data = api.SetSiteAppUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteAppAppIdSiteId()  {
        
            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/set/app-id/site-id";
                        
            SiteApp obj = new SiteApp();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _site_id = util.GetParamValue(_context, "site_id");
            if(!String.IsNullOrEmpty(_site_id))
                obj.site_id = (string)_site_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
            
            // get data
            wrapper.data = api.SetSiteAppAppIdSiteId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteAppUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/del/uuid";

            bool completed = api.DelSiteAppUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteAppAppIdSiteId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/del/app-id/site-id";

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
            wrapper.code = 0;
            wrapper.action = "site-app/get";

            List<SiteApp> objs = api.GetSiteAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/get/uuid";

            List<SiteApp> objs = api.GetSiteAppListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/get/app-id";

            List<SiteApp> objs = api.GetSiteAppListAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListSiteId() {
        
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/get/site-id";

            List<SiteApp> objs = api.GetSiteAppListSiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListAppIdSiteId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");
            string _site_id = (string)util.GetParamValue(_context, "site_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "site-app/get/app-id/site-id";

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
            wrapper.code = 0;
            wrapper.action = "photo/count";

            int i = api.CountPhoto(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/count/uuid";

            int i = api.CountPhotoUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/count/external-id";

            int i = api.CountPhotoExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/count/url";

            int i = api.CountPhotoUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoUrlExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/count/url/external-id";

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
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/count/uuid/external-id";

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
            wrapper.code = 0;
            wrapper.action = "photo/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "photo/set/uuid";
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/set/external-id";
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetPhotoExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoUrl()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/set/url";
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoUrlExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/set/url/external-id";
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUrlExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoUuidExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/set/uuid/external-id";
                        
            Photo obj = new Photo();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetPhotoUuidExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/del/uuid";

            bool completed = api.DelPhotoUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/del/external-id";

            bool completed = api.DelPhotoExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/del/url";

            bool completed = api.DelPhotoUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoUrlExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/del/url/external-id";

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
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/del/uuid/external-id";

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
            wrapper.code = 0;
            wrapper.action = "photo/get";

            List<Photo> objs = api.GetPhotoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/get/uuid";

            List<Photo> objs = api.GetPhotoListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/get/external-id";

            List<Photo> objs = api.GetPhotoListExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/get/url";

            List<Photo> objs = api.GetPhotoListUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListUrlExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/get/url/external-id";

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
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "photo/get/uuid/external-id";

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
            wrapper.code = 0;
            wrapper.action = "video/count";

            int i = api.CountVideo(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/count/uuid";

            int i = api.CountVideoUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/count/external-id";

            int i = api.CountVideoExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/count/url";

            int i = api.CountVideoUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoUrlExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/count/url/external-id";

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
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/count/uuid/external-id";

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
            wrapper.code = 0;
            wrapper.action = "video/browse/filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "video/set/uuid";
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetVideoUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/set/external-id";
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetVideoExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoUrl()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/set/url";
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetVideoUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoUrlExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/set/url/external-id";
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetVideoUrlExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoUuidExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/set/uuid/external-id";
                        
            Video obj = new Video();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "url");
            if(!String.IsNullOrEmpty(_url))
                obj.url = (string)_url;
            
            string _third_party_data = util.GetParamValue(_context, "third_party_data");
            if(!String.IsNullOrEmpty(_third_party_data))
                obj.third_party_data = (string)_third_party_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _external_id = util.GetParamValue(_context, "external_id");
            if(!String.IsNullOrEmpty(_external_id))
                obj.external_id = (string)_external_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetVideoUuidExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/del/uuid";

            bool completed = api.DelVideoUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/del/external-id";

            bool completed = api.DelVideoExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/del/url";

            bool completed = api.DelVideoUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoUrlExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/del/url/external-id";

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
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/del/uuid/external-id";

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
            wrapper.code = 0;
            wrapper.action = "video/get";

            List<Video> objs = api.GetVideoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/get/uuid";

            List<Video> objs = api.GetVideoListUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/get/external-id";

            List<Video> objs = api.GetVideoListExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/get/url";

            List<Video> objs = api.GetVideoListUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListUrlExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/get/url/external-id";

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
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "video/get/uuid/external-id";

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






