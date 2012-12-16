import ent
from ent import *

class BasePlatformRequestHandler(object):

    def __init__(self):
        self.path = ''
        self.path_parsed = ''
        self.path_info = ''
        self.qstring = ''
        self.action = ''
        self.action_params = ''
        self.url = ''
        
"""

namespace gameversesplatform {

    public class BasePlatformRequestHandler : IBaseHandler  {	
    
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
        
        public BasePlatformRequestHandler(){
        
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
            else if(IsContext("app/count/by-uuid")){
                CountAppByUuid();
            }
            else if(IsContext("app/count/by-code")){
                CountAppByCode();
            }
            else if(IsContext("app/count/by-type-id")){
                CountAppByTypeId();
            }
            else if(IsContext("app/count/by-code/by-type-id")){
                CountAppByCodeByTypeId();
            }
            else if(IsContext("app/count/by-platform/by-type-id")){
                CountAppByPlatformByTypeId();
            }
            else if(IsContext("app/count/by-platform")){
                CountAppByPlatform();
            }
            else if(IsContext("app/browse/by-filter")){
                BrowseAppListByFilter();
            }
            else if(IsContext("app/set/by-uuid")){
                SetAppByUuid();
            }
            else if(IsContext("app/set/by-code")){
                SetAppByCode();
            }
            else if(IsContext("app/del/by-uuid")){
                DelAppByUuid();
            }
            else if(IsContext("app/del/by-code")){
                DelAppByCode();
            }
            else if(IsContext("app/get")){
                GetAppList();
            }
            else if(IsContext("app/get/by-uuid")){
                GetAppListByUuid();
            }
            else if(IsContext("app/get/by-code")){
                GetAppListByCode();
            }
            else if(IsContext("app/get/by-type-id")){
                GetAppListByTypeId();
            }
            else if(IsContext("app/get/by-code/by-type-id")){
                GetAppListByCodeByTypeId();
            }
            else if(IsContext("app/get/by-platform/by-type-id")){
                GetAppListByPlatformByTypeId();
            }
            else if(IsContext("app/get/by-platform")){
                GetAppListByPlatform();
            }
            if(IsContext("app-type/count")){
                CountAppType();
            }
            else if(IsContext("app-type/count/by-uuid")){
                CountAppTypeByUuid();
            }
            else if(IsContext("app-type/count/by-code")){
                CountAppTypeByCode();
            }
            else if(IsContext("app-type/browse/by-filter")){
                BrowseAppTypeListByFilter();
            }
            else if(IsContext("app-type/set/by-uuid")){
                SetAppTypeByUuid();
            }
            else if(IsContext("app-type/set/by-code")){
                SetAppTypeByCode();
            }
            else if(IsContext("app-type/del/by-uuid")){
                DelAppTypeByUuid();
            }
            else if(IsContext("app-type/del/by-code")){
                DelAppTypeByCode();
            }
            else if(IsContext("app-type/get")){
                GetAppTypeList();
            }
            else if(IsContext("app-type/get/by-uuid")){
                GetAppTypeListByUuid();
            }
            else if(IsContext("app-type/get/by-code")){
                GetAppTypeListByCode();
            }
            if(IsContext("site/count")){
                CountSite();
            }
            else if(IsContext("site/count/by-uuid")){
                CountSiteByUuid();
            }
            else if(IsContext("site/count/by-code")){
                CountSiteByCode();
            }
            else if(IsContext("site/count/by-type-id")){
                CountSiteByTypeId();
            }
            else if(IsContext("site/count/by-code/by-type-id")){
                CountSiteByCodeByTypeId();
            }
            else if(IsContext("site/count/by-domain/by-type-id")){
                CountSiteByDomainByTypeId();
            }
            else if(IsContext("site/count/by-domain")){
                CountSiteByDomain();
            }
            else if(IsContext("site/browse/by-filter")){
                BrowseSiteListByFilter();
            }
            else if(IsContext("site/set/by-uuid")){
                SetSiteByUuid();
            }
            else if(IsContext("site/set/by-code")){
                SetSiteByCode();
            }
            else if(IsContext("site/del/by-uuid")){
                DelSiteByUuid();
            }
            else if(IsContext("site/del/by-code")){
                DelSiteByCode();
            }
            else if(IsContext("site/get")){
                GetSiteList();
            }
            else if(IsContext("site/get/by-uuid")){
                GetSiteListByUuid();
            }
            else if(IsContext("site/get/by-code")){
                GetSiteListByCode();
            }
            else if(IsContext("site/get/by-type-id")){
                GetSiteListByTypeId();
            }
            else if(IsContext("site/get/by-code/by-type-id")){
                GetSiteListByCodeByTypeId();
            }
            else if(IsContext("site/get/by-domain/by-type-id")){
                GetSiteListByDomainByTypeId();
            }
            else if(IsContext("site/get/by-domain")){
                GetSiteListByDomain();
            }
            if(IsContext("site-type/count")){
                CountSiteType();
            }
            else if(IsContext("site-type/count/by-uuid")){
                CountSiteTypeByUuid();
            }
            else if(IsContext("site-type/count/by-code")){
                CountSiteTypeByCode();
            }
            else if(IsContext("site-type/browse/by-filter")){
                BrowseSiteTypeListByFilter();
            }
            else if(IsContext("site-type/set/by-uuid")){
                SetSiteTypeByUuid();
            }
            else if(IsContext("site-type/set/by-code")){
                SetSiteTypeByCode();
            }
            else if(IsContext("site-type/del/by-uuid")){
                DelSiteTypeByUuid();
            }
            else if(IsContext("site-type/del/by-code")){
                DelSiteTypeByCode();
            }
            else if(IsContext("site-type/get")){
                GetSiteTypeList();
            }
            else if(IsContext("site-type/get/by-uuid")){
                GetSiteTypeListByUuid();
            }
            else if(IsContext("site-type/get/by-code")){
                GetSiteTypeListByCode();
            }
            if(IsContext("org/count")){
                CountOrg();
            }
            else if(IsContext("org/count/by-uuid")){
                CountOrgByUuid();
            }
            else if(IsContext("org/count/by-code")){
                CountOrgByCode();
            }
            else if(IsContext("org/count/by-name")){
                CountOrgByName();
            }
            else if(IsContext("org/browse/by-filter")){
                BrowseOrgListByFilter();
            }
            else if(IsContext("org/set/by-uuid")){
                SetOrgByUuid();
            }
            else if(IsContext("org/del/by-uuid")){
                DelOrgByUuid();
            }
            else if(IsContext("org/get")){
                GetOrgList();
            }
            else if(IsContext("org/get/by-uuid")){
                GetOrgListByUuid();
            }
            else if(IsContext("org/get/by-code")){
                GetOrgListByCode();
            }
            else if(IsContext("org/get/by-name")){
                GetOrgListByName();
            }
            if(IsContext("org-type/count")){
                CountOrgType();
            }
            else if(IsContext("org-type/count/by-uuid")){
                CountOrgTypeByUuid();
            }
            else if(IsContext("org-type/count/by-code")){
                CountOrgTypeByCode();
            }
            else if(IsContext("org-type/browse/by-filter")){
                BrowseOrgTypeListByFilter();
            }
            else if(IsContext("org-type/set/by-uuid")){
                SetOrgTypeByUuid();
            }
            else if(IsContext("org-type/set/by-code")){
                SetOrgTypeByCode();
            }
            else if(IsContext("org-type/del/by-uuid")){
                DelOrgTypeByUuid();
            }
            else if(IsContext("org-type/del/by-code")){
                DelOrgTypeByCode();
            }
            else if(IsContext("org-type/get")){
                GetOrgTypeList();
            }
            else if(IsContext("org-type/get/by-uuid")){
                GetOrgTypeListByUuid();
            }
            else if(IsContext("org-type/get/by-code")){
                GetOrgTypeListByCode();
            }
            if(IsContext("content-item/count")){
                CountContentItem();
            }
            else if(IsContext("content-item/count/by-uuid")){
                CountContentItemByUuid();
            }
            else if(IsContext("content-item/count/by-code")){
                CountContentItemByCode();
            }
            else if(IsContext("content-item/count/by-name")){
                CountContentItemByName();
            }
            else if(IsContext("content-item/count/by-path")){
                CountContentItemByPath();
            }
            else if(IsContext("content-item/browse/by-filter")){
                BrowseContentItemListByFilter();
            }
            else if(IsContext("content-item/set/by-uuid")){
                SetContentItemByUuid();
            }
            else if(IsContext("content-item/del/by-uuid")){
                DelContentItemByUuid();
            }
            else if(IsContext("content-item/del/by-path")){
                DelContentItemByPath();
            }
            else if(IsContext("content-item/get")){
                GetContentItemList();
            }
            else if(IsContext("content-item/get/by-uuid")){
                GetContentItemListByUuid();
            }
            else if(IsContext("content-item/get/by-code")){
                GetContentItemListByCode();
            }
            else if(IsContext("content-item/get/by-name")){
                GetContentItemListByName();
            }
            else if(IsContext("content-item/get/by-path")){
                GetContentItemListByPath();
            }
            if(IsContext("content-item-type/count")){
                CountContentItemType();
            }
            else if(IsContext("content-item-type/count/by-uuid")){
                CountContentItemTypeByUuid();
            }
            else if(IsContext("content-item-type/count/by-code")){
                CountContentItemTypeByCode();
            }
            else if(IsContext("content-item-type/browse/by-filter")){
                BrowseContentItemTypeListByFilter();
            }
            else if(IsContext("content-item-type/set/by-uuid")){
                SetContentItemTypeByUuid();
            }
            else if(IsContext("content-item-type/set/by-code")){
                SetContentItemTypeByCode();
            }
            else if(IsContext("content-item-type/del/by-uuid")){
                DelContentItemTypeByUuid();
            }
            else if(IsContext("content-item-type/del/by-code")){
                DelContentItemTypeByCode();
            }
            else if(IsContext("content-item-type/get")){
                GetContentItemTypeList();
            }
            else if(IsContext("content-item-type/get/by-uuid")){
                GetContentItemTypeListByUuid();
            }
            else if(IsContext("content-item-type/get/by-code")){
                GetContentItemTypeListByCode();
            }
            if(IsContext("content-page/count")){
                CountContentPage();
            }
            else if(IsContext("content-page/count/by-uuid")){
                CountContentPageByUuid();
            }
            else if(IsContext("content-page/count/by-code")){
                CountContentPageByCode();
            }
            else if(IsContext("content-page/count/by-name")){
                CountContentPageByName();
            }
            else if(IsContext("content-page/count/by-path")){
                CountContentPageByPath();
            }
            else if(IsContext("content-page/browse/by-filter")){
                BrowseContentPageListByFilter();
            }
            else if(IsContext("content-page/set/by-uuid")){
                SetContentPageByUuid();
            }
            else if(IsContext("content-page/del/by-uuid")){
                DelContentPageByUuid();
            }
            else if(IsContext("content-page/del/by-path/by-site-id")){
                DelContentPageByPathBySiteId();
            }
            else if(IsContext("content-page/del/by-path")){
                DelContentPageByPath();
            }
            else if(IsContext("content-page/get")){
                GetContentPageList();
            }
            else if(IsContext("content-page/get/by-uuid")){
                GetContentPageListByUuid();
            }
            else if(IsContext("content-page/get/by-code")){
                GetContentPageListByCode();
            }
            else if(IsContext("content-page/get/by-name")){
                GetContentPageListByName();
            }
            else if(IsContext("content-page/get/by-path")){
                GetContentPageListByPath();
            }
            else if(IsContext("content-page/get/by-site-id")){
                GetContentPageListBySiteId();
            }
            else if(IsContext("content-page/get/by-site-id/by-path")){
                GetContentPageListBySiteIdByPath();
            }
            if(IsContext("message/count")){
                CountMessage();
            }
            else if(IsContext("message/count/by-uuid")){
                CountMessageByUuid();
            }
            else if(IsContext("message/browse/by-filter")){
                BrowseMessageListByFilter();
            }
            else if(IsContext("message/set/by-uuid")){
                SetMessageByUuid();
            }
            else if(IsContext("message/del/by-uuid")){
                DelMessageByUuid();
            }
            else if(IsContext("message/get")){
                GetMessageList();
            }
            else if(IsContext("message/get/by-uuid")){
                GetMessageListByUuid();
            }
            if(IsContext("game/count")){
                CountGame();
            }
            else if(IsContext("game/count/by-uuid")){
                CountGameByUuid();
            }
            else if(IsContext("game/count/by-code")){
                CountGameByCode();
            }
            else if(IsContext("game/count/by-name")){
                CountGameByName();
            }
            else if(IsContext("game/count/by-org-id")){
                CountGameByOrgId();
            }
            else if(IsContext("game/count/by-app-id")){
                CountGameByAppId();
            }
            else if(IsContext("game/count/by-org-id/by-app-id")){
                CountGameByOrgIdByAppId();
            }
            else if(IsContext("game/browse/by-filter")){
                BrowseGameListByFilter();
            }
            else if(IsContext("game/set/by-uuid")){
                SetGameByUuid();
            }
            else if(IsContext("game/set/by-code")){
                SetGameByCode();
            }
            else if(IsContext("game/set/by-name")){
                SetGameByName();
            }
            else if(IsContext("game/set/by-org-id")){
                SetGameByOrgId();
            }
            else if(IsContext("game/set/by-app-id")){
                SetGameByAppId();
            }
            else if(IsContext("game/set/by-org-id/by-app-id")){
                SetGameByOrgIdByAppId();
            }
            else if(IsContext("game/del/by-uuid")){
                DelGameByUuid();
            }
            else if(IsContext("game/del/by-code")){
                DelGameByCode();
            }
            else if(IsContext("game/del/by-name")){
                DelGameByName();
            }
            else if(IsContext("game/del/by-org-id")){
                DelGameByOrgId();
            }
            else if(IsContext("game/del/by-app-id")){
                DelGameByAppId();
            }
            else if(IsContext("game/del/by-org-id/by-app-id")){
                DelGameByOrgIdByAppId();
            }
            else if(IsContext("game/get")){
                GetGameList();
            }
            else if(IsContext("game/get/by-uuid")){
                GetGameListByUuid();
            }
            else if(IsContext("game/get/by-code")){
                GetGameListByCode();
            }
            else if(IsContext("game/get/by-name")){
                GetGameListByName();
            }
            else if(IsContext("game/get/by-org-id")){
                GetGameListByOrgId();
            }
            else if(IsContext("game/get/by-app-id")){
                GetGameListByAppId();
            }
            else if(IsContext("game/get/by-org-id/by-app-id")){
                GetGameListByOrgIdByAppId();
            }
            if(IsContext("game-category/count")){
                CountGameCategory();
            }
            else if(IsContext("game-category/count/by-uuid")){
                CountGameCategoryByUuid();
            }
            else if(IsContext("game-category/count/by-code")){
                CountGameCategoryByCode();
            }
            else if(IsContext("game-category/count/by-name")){
                CountGameCategoryByName();
            }
            else if(IsContext("game-category/count/by-org-id")){
                CountGameCategoryByOrgId();
            }
            else if(IsContext("game-category/count/by-type-id")){
                CountGameCategoryByTypeId();
            }
            else if(IsContext("game-category/count/by-org-id/by-type-id")){
                CountGameCategoryByOrgIdByTypeId();
            }
            else if(IsContext("game-category/browse/by-filter")){
                BrowseGameCategoryListByFilter();
            }
            else if(IsContext("game-category/set/by-uuid")){
                SetGameCategoryByUuid();
            }
            else if(IsContext("game-category/del/by-uuid")){
                DelGameCategoryByUuid();
            }
            else if(IsContext("game-category/del/by-code/by-org-id")){
                DelGameCategoryByCodeByOrgId();
            }
            else if(IsContext("game-category/del/by-code/by-org-id/by-type-id")){
                DelGameCategoryByCodeByOrgIdByTypeId();
            }
            else if(IsContext("game-category/get")){
                GetGameCategoryList();
            }
            else if(IsContext("game-category/get/by-uuid")){
                GetGameCategoryListByUuid();
            }
            else if(IsContext("game-category/get/by-code")){
                GetGameCategoryListByCode();
            }
            else if(IsContext("game-category/get/by-name")){
                GetGameCategoryListByName();
            }
            else if(IsContext("game-category/get/by-org-id")){
                GetGameCategoryListByOrgId();
            }
            else if(IsContext("game-category/get/by-type-id")){
                GetGameCategoryListByTypeId();
            }
            else if(IsContext("game-category/get/by-org-id/by-type-id")){
                GetGameCategoryListByOrgIdByTypeId();
            }
            if(IsContext("game-category-tree/count")){
                CountGameCategoryTree();
            }
            else if(IsContext("game-category-tree/count/by-uuid")){
                CountGameCategoryTreeByUuid();
            }
            else if(IsContext("game-category-tree/count/by-parent-id")){
                CountGameCategoryTreeByParentId();
            }
            else if(IsContext("game-category-tree/count/by-category-id")){
                CountGameCategoryTreeByCategoryId();
            }
            else if(IsContext("game-category-tree/count/by-parent-id/by-category-id")){
                CountGameCategoryTreeByParentIdByCategoryId();
            }
            else if(IsContext("game-category-tree/browse/by-filter")){
                BrowseGameCategoryTreeListByFilter();
            }
            else if(IsContext("game-category-tree/set/by-uuid")){
                SetGameCategoryTreeByUuid();
            }
            else if(IsContext("game-category-tree/del/by-uuid")){
                DelGameCategoryTreeByUuid();
            }
            else if(IsContext("game-category-tree/del/by-parent-id")){
                DelGameCategoryTreeByParentId();
            }
            else if(IsContext("game-category-tree/del/by-category-id")){
                DelGameCategoryTreeByCategoryId();
            }
            else if(IsContext("game-category-tree/del/by-parent-id/by-category-id")){
                DelGameCategoryTreeByParentIdByCategoryId();
            }
            else if(IsContext("game-category-tree/get")){
                GetGameCategoryTreeList();
            }
            else if(IsContext("game-category-tree/get/by-uuid")){
                GetGameCategoryTreeListByUuid();
            }
            else if(IsContext("game-category-tree/get/by-parent-id")){
                GetGameCategoryTreeListByParentId();
            }
            else if(IsContext("game-category-tree/get/by-category-id")){
                GetGameCategoryTreeListByCategoryId();
            }
            else if(IsContext("game-category-tree/get/by-parent-id/by-category-id")){
                GetGameCategoryTreeListByParentIdByCategoryId();
            }
            if(IsContext("game-category-assoc/count")){
                CountGameCategoryAssoc();
            }
            else if(IsContext("game-category-assoc/count/by-uuid")){
                CountGameCategoryAssocByUuid();
            }
            else if(IsContext("game-category-assoc/count/by-game-id")){
                CountGameCategoryAssocByGameId();
            }
            else if(IsContext("game-category-assoc/count/by-category-id")){
                CountGameCategoryAssocByCategoryId();
            }
            else if(IsContext("game-category-assoc/count/by-game-id/by-category-id")){
                CountGameCategoryAssocByGameIdByCategoryId();
            }
            else if(IsContext("game-category-assoc/browse/by-filter")){
                BrowseGameCategoryAssocListByFilter();
            }
            else if(IsContext("game-category-assoc/set/by-uuid")){
                SetGameCategoryAssocByUuid();
            }
            else if(IsContext("game-category-assoc/del/by-uuid")){
                DelGameCategoryAssocByUuid();
            }
            else if(IsContext("game-category-assoc/get")){
                GetGameCategoryAssocList();
            }
            else if(IsContext("game-category-assoc/get/by-uuid")){
                GetGameCategoryAssocListByUuid();
            }
            else if(IsContext("game-category-assoc/get/by-game-id")){
                GetGameCategoryAssocListByGameId();
            }
            else if(IsContext("game-category-assoc/get/by-category-id")){
                GetGameCategoryAssocListByCategoryId();
            }
            else if(IsContext("game-category-assoc/get/by-game-id/by-category-id")){
                GetGameCategoryAssocListByGameIdByCategoryId();
            }
            if(IsContext("game-type/count")){
                CountGameType();
            }
            else if(IsContext("game-type/count/by-uuid")){
                CountGameTypeByUuid();
            }
            else if(IsContext("game-type/count/by-code")){
                CountGameTypeByCode();
            }
            else if(IsContext("game-type/count/by-name")){
                CountGameTypeByName();
            }
            else if(IsContext("game-type/browse/by-filter")){
                BrowseGameTypeListByFilter();
            }
            else if(IsContext("game-type/set/by-uuid")){
                SetGameTypeByUuid();
            }
            else if(IsContext("game-type/del/by-uuid")){
                DelGameTypeByUuid();
            }
            else if(IsContext("game-type/get")){
                GetGameTypeList();
            }
            else if(IsContext("game-type/get/by-uuid")){
                GetGameTypeListByUuid();
            }
            else if(IsContext("game-type/get/by-code")){
                GetGameTypeListByCode();
            }
            else if(IsContext("game-type/get/by-name")){
                GetGameTypeListByName();
            }
            if(IsContext("profile-game/count")){
                CountProfileGame();
            }
            else if(IsContext("profile-game/count/by-uuid")){
                CountProfileGameByUuid();
            }
            else if(IsContext("profile-game/count/by-game-id")){
                CountProfileGameByGameId();
            }
            else if(IsContext("profile-game/count/by-profile-id")){
                CountProfileGameByProfileId();
            }
            else if(IsContext("profile-game/count/by-profile-id/by-game-id")){
                CountProfileGameByProfileIdByGameId();
            }
            else if(IsContext("profile-game/browse/by-filter")){
                BrowseProfileGameListByFilter();
            }
            else if(IsContext("profile-game/set/by-uuid")){
                SetProfileGameByUuid();
            }
            else if(IsContext("profile-game/del/by-uuid")){
                DelProfileGameByUuid();
            }
            else if(IsContext("profile-game/get")){
                GetProfileGameList();
            }
            else if(IsContext("profile-game/get/by-uuid")){
                GetProfileGameListByUuid();
            }
            else if(IsContext("profile-game/get/by-game-id")){
                GetProfileGameListByGameId();
            }
            else if(IsContext("profile-game/get/by-profile-id")){
                GetProfileGameListByProfileId();
            }
            else if(IsContext("profile-game/get/by-profile-id/by-game-id")){
                GetProfileGameListByProfileIdByGameId();
            }
            if(IsContext("profile-game-network/count")){
                CountProfileGameNetwork();
            }
            else if(IsContext("profile-game-network/count/by-uuid")){
                CountProfileGameNetworkByUuid();
            }
            else if(IsContext("profile-game-network/count/by-game-id")){
                CountProfileGameNetworkByGameId();
            }
            else if(IsContext("profile-game-network/count/by-profile-id")){
                CountProfileGameNetworkByProfileId();
            }
            else if(IsContext("profile-game-network/count/by-profile-id/by-game-id")){
                CountProfileGameNetworkByProfileIdByGameId();
            }
            else if(IsContext("profile-game-network/browse/by-filter")){
                BrowseProfileGameNetworkListByFilter();
            }
            else if(IsContext("profile-game-network/set/by-uuid")){
                SetProfileGameNetworkByUuid();
            }
            else if(IsContext("profile-game-network/del/by-uuid")){
                DelProfileGameNetworkByUuid();
            }
            else if(IsContext("profile-game-network/get")){
                GetProfileGameNetworkList();
            }
            else if(IsContext("profile-game-network/get/by-uuid")){
                GetProfileGameNetworkListByUuid();
            }
            else if(IsContext("profile-game-network/get/by-game-id")){
                GetProfileGameNetworkListByGameId();
            }
            else if(IsContext("profile-game-network/get/by-profile-id")){
                GetProfileGameNetworkListByProfileId();
            }
            else if(IsContext("profile-game-network/get/by-profile-id/by-game-id")){
                GetProfileGameNetworkListByProfileIdByGameId();
            }
            if(IsContext("game-session/count")){
                CountGameSession();
            }
            else if(IsContext("game-session/count/by-uuid")){
                CountGameSessionByUuid();
            }
            else if(IsContext("game-session/count/by-game-id")){
                CountGameSessionByGameId();
            }
            else if(IsContext("game-session/count/by-profile-id")){
                CountGameSessionByProfileId();
            }
            else if(IsContext("game-session/count/by-profile-id/by-game-id")){
                CountGameSessionByProfileIdByGameId();
            }
            else if(IsContext("game-session/browse/by-filter")){
                BrowseGameSessionListByFilter();
            }
            else if(IsContext("game-session/set/by-uuid")){
                SetGameSessionByUuid();
            }
            else if(IsContext("game-session/del/by-uuid")){
                DelGameSessionByUuid();
            }
            else if(IsContext("game-session/get")){
                GetGameSessionList();
            }
            else if(IsContext("game-session/get/by-uuid")){
                GetGameSessionListByUuid();
            }
            else if(IsContext("game-session/get/by-game-id")){
                GetGameSessionListByGameId();
            }
            else if(IsContext("game-session/get/by-profile-id")){
                GetGameSessionListByProfileId();
            }
            else if(IsContext("game-session/get/by-profile-id/by-game-id")){
                GetGameSessionListByProfileIdByGameId();
            }
            if(IsContext("game-session-data/count")){
                CountGameSessionData();
            }
            else if(IsContext("game-session-data/count/by-uuid")){
                CountGameSessionDataByUuid();
            }
            else if(IsContext("game-session-data/browse/by-filter")){
                BrowseGameSessionDataListByFilter();
            }
            else if(IsContext("game-session-data/set/by-uuid")){
                SetGameSessionDataByUuid();
            }
            else if(IsContext("game-session-data/del/by-uuid")){
                DelGameSessionDataByUuid();
            }
            else if(IsContext("game-session-data/get")){
                GetGameSessionDataList();
            }
            else if(IsContext("game-session-data/get/by-uuid")){
                GetGameSessionDataListByUuid();
            }
            if(IsContext("game-app/count")){
                CountGameApp();
            }
            else if(IsContext("game-app/count/by-uuid")){
                CountGameAppByUuid();
            }
            else if(IsContext("game-app/count/by-game-id")){
                CountGameAppByGameId();
            }
            else if(IsContext("game-app/count/by-app-id")){
                CountGameAppByAppId();
            }
            else if(IsContext("game-app/count/by-game-id/by-app-id")){
                CountGameAppByGameIdByAppId();
            }
            else if(IsContext("game-app/browse/by-filter")){
                BrowseGameAppListByFilter();
            }
            else if(IsContext("game-app/set/by-uuid")){
                SetGameAppByUuid();
            }
            else if(IsContext("game-app/del/by-uuid")){
                DelGameAppByUuid();
            }
            else if(IsContext("game-app/get")){
                GetGameAppList();
            }
            else if(IsContext("game-app/get/by-uuid")){
                GetGameAppListByUuid();
            }
            else if(IsContext("game-app/get/by-game-id")){
                GetGameAppListByGameId();
            }
            else if(IsContext("game-app/get/by-app-id")){
                GetGameAppListByAppId();
            }
            else if(IsContext("game-app/get/by-game-id/by-app-id")){
                GetGameAppListByGameIdByAppId();
            }
            if(IsContext("offer/count")){
                CountOffer();
            }
            else if(IsContext("offer/count/by-uuid")){
                CountOfferByUuid();
            }
            else if(IsContext("offer/count/by-code")){
                CountOfferByCode();
            }
            else if(IsContext("offer/count/by-name")){
                CountOfferByName();
            }
            else if(IsContext("offer/count/by-org-id")){
                CountOfferByOrgId();
            }
            else if(IsContext("offer/browse/by-filter")){
                BrowseOfferListByFilter();
            }
            else if(IsContext("offer/set/by-uuid")){
                SetOfferByUuid();
            }
            else if(IsContext("offer/del/by-uuid")){
                DelOfferByUuid();
            }
            else if(IsContext("offer/del/by-org-id")){
                DelOfferByOrgId();
            }
            else if(IsContext("offer/get")){
                GetOfferList();
            }
            else if(IsContext("offer/get/by-uuid")){
                GetOfferListByUuid();
            }
            else if(IsContext("offer/get/by-code")){
                GetOfferListByCode();
            }
            else if(IsContext("offer/get/by-name")){
                GetOfferListByName();
            }
            else if(IsContext("offer/get/by-org-id")){
                GetOfferListByOrgId();
            }
            if(IsContext("offer-type/count")){
                CountOfferType();
            }
            else if(IsContext("offer-type/count/by-uuid")){
                CountOfferTypeByUuid();
            }
            else if(IsContext("offer-type/count/by-code")){
                CountOfferTypeByCode();
            }
            else if(IsContext("offer-type/count/by-name")){
                CountOfferTypeByName();
            }
            else if(IsContext("offer-type/browse/by-filter")){
                BrowseOfferTypeListByFilter();
            }
            else if(IsContext("offer-type/set/by-uuid")){
                SetOfferTypeByUuid();
            }
            else if(IsContext("offer-type/del/by-uuid")){
                DelOfferTypeByUuid();
            }
            else if(IsContext("offer-type/get")){
                GetOfferTypeList();
            }
            else if(IsContext("offer-type/get/by-uuid")){
                GetOfferTypeListByUuid();
            }
            else if(IsContext("offer-type/get/by-code")){
                GetOfferTypeListByCode();
            }
            else if(IsContext("offer-type/get/by-name")){
                GetOfferTypeListByName();
            }
            if(IsContext("offer-location/count")){
                CountOfferLocation();
            }
            else if(IsContext("offer-location/count/by-uuid")){
                CountOfferLocationByUuid();
            }
            else if(IsContext("offer-location/count/by-offer-id")){
                CountOfferLocationByOfferId();
            }
            else if(IsContext("offer-location/count/by-city")){
                CountOfferLocationByCity();
            }
            else if(IsContext("offer-location/count/by-country-code")){
                CountOfferLocationByCountryCode();
            }
            else if(IsContext("offer-location/count/by-postal-code")){
                CountOfferLocationByPostalCode();
            }
            else if(IsContext("offer-location/browse/by-filter")){
                BrowseOfferLocationListByFilter();
            }
            else if(IsContext("offer-location/set/by-uuid")){
                SetOfferLocationByUuid();
            }
            else if(IsContext("offer-location/del/by-uuid")){
                DelOfferLocationByUuid();
            }
            else if(IsContext("offer-location/get")){
                GetOfferLocationList();
            }
            else if(IsContext("offer-location/get/by-uuid")){
                GetOfferLocationListByUuid();
            }
            else if(IsContext("offer-location/get/by-offer-id")){
                GetOfferLocationListByOfferId();
            }
            else if(IsContext("offer-location/get/by-city")){
                GetOfferLocationListByCity();
            }
            else if(IsContext("offer-location/get/by-country-code")){
                GetOfferLocationListByCountryCode();
            }
            else if(IsContext("offer-location/get/by-postal-code")){
                GetOfferLocationListByPostalCode();
            }
            if(IsContext("offer-category/count")){
                CountOfferCategory();
            }
            else if(IsContext("offer-category/count/by-uuid")){
                CountOfferCategoryByUuid();
            }
            else if(IsContext("offer-category/count/by-code")){
                CountOfferCategoryByCode();
            }
            else if(IsContext("offer-category/count/by-name")){
                CountOfferCategoryByName();
            }
            else if(IsContext("offer-category/count/by-org-id")){
                CountOfferCategoryByOrgId();
            }
            else if(IsContext("offer-category/count/by-type-id")){
                CountOfferCategoryByTypeId();
            }
            else if(IsContext("offer-category/count/by-org-id/by-type-id")){
                CountOfferCategoryByOrgIdByTypeId();
            }
            else if(IsContext("offer-category/browse/by-filter")){
                BrowseOfferCategoryListByFilter();
            }
            else if(IsContext("offer-category/set/by-uuid")){
                SetOfferCategoryByUuid();
            }
            else if(IsContext("offer-category/del/by-uuid")){
                DelOfferCategoryByUuid();
            }
            else if(IsContext("offer-category/del/by-code/by-org-id")){
                DelOfferCategoryByCodeByOrgId();
            }
            else if(IsContext("offer-category/del/by-code/by-org-id/by-type-id")){
                DelOfferCategoryByCodeByOrgIdByTypeId();
            }
            else if(IsContext("offer-category/get")){
                GetOfferCategoryList();
            }
            else if(IsContext("offer-category/get/by-uuid")){
                GetOfferCategoryListByUuid();
            }
            else if(IsContext("offer-category/get/by-code")){
                GetOfferCategoryListByCode();
            }
            else if(IsContext("offer-category/get/by-name")){
                GetOfferCategoryListByName();
            }
            else if(IsContext("offer-category/get/by-org-id")){
                GetOfferCategoryListByOrgId();
            }
            else if(IsContext("offer-category/get/by-type-id")){
                GetOfferCategoryListByTypeId();
            }
            else if(IsContext("offer-category/get/by-org-id/by-type-id")){
                GetOfferCategoryListByOrgIdByTypeId();
            }
            if(IsContext("offer-category-tree/count")){
                CountOfferCategoryTree();
            }
            else if(IsContext("offer-category-tree/count/by-uuid")){
                CountOfferCategoryTreeByUuid();
            }
            else if(IsContext("offer-category-tree/count/by-parent-id")){
                CountOfferCategoryTreeByParentId();
            }
            else if(IsContext("offer-category-tree/count/by-category-id")){
                CountOfferCategoryTreeByCategoryId();
            }
            else if(IsContext("offer-category-tree/count/by-parent-id/by-category-id")){
                CountOfferCategoryTreeByParentIdByCategoryId();
            }
            else if(IsContext("offer-category-tree/browse/by-filter")){
                BrowseOfferCategoryTreeListByFilter();
            }
            else if(IsContext("offer-category-tree/set/by-uuid")){
                SetOfferCategoryTreeByUuid();
            }
            else if(IsContext("offer-category-tree/del/by-uuid")){
                DelOfferCategoryTreeByUuid();
            }
            else if(IsContext("offer-category-tree/del/by-parent-id")){
                DelOfferCategoryTreeByParentId();
            }
            else if(IsContext("offer-category-tree/del/by-category-id")){
                DelOfferCategoryTreeByCategoryId();
            }
            else if(IsContext("offer-category-tree/del/by-parent-id/by-category-id")){
                DelOfferCategoryTreeByParentIdByCategoryId();
            }
            else if(IsContext("offer-category-tree/get")){
                GetOfferCategoryTreeList();
            }
            else if(IsContext("offer-category-tree/get/by-uuid")){
                GetOfferCategoryTreeListByUuid();
            }
            else if(IsContext("offer-category-tree/get/by-parent-id")){
                GetOfferCategoryTreeListByParentId();
            }
            else if(IsContext("offer-category-tree/get/by-category-id")){
                GetOfferCategoryTreeListByCategoryId();
            }
            else if(IsContext("offer-category-tree/get/by-parent-id/by-category-id")){
                GetOfferCategoryTreeListByParentIdByCategoryId();
            }
            if(IsContext("offer-category-assoc/count")){
                CountOfferCategoryAssoc();
            }
            else if(IsContext("offer-category-assoc/count/by-uuid")){
                CountOfferCategoryAssocByUuid();
            }
            else if(IsContext("offer-category-assoc/count/by-offer-id")){
                CountOfferCategoryAssocByOfferId();
            }
            else if(IsContext("offer-category-assoc/count/by-category-id")){
                CountOfferCategoryAssocByCategoryId();
            }
            else if(IsContext("offer-category-assoc/count/by-offer-id/by-category-id")){
                CountOfferCategoryAssocByOfferIdByCategoryId();
            }
            else if(IsContext("offer-category-assoc/browse/by-filter")){
                BrowseOfferCategoryAssocListByFilter();
            }
            else if(IsContext("offer-category-assoc/set/by-uuid")){
                SetOfferCategoryAssocByUuid();
            }
            else if(IsContext("offer-category-assoc/del/by-uuid")){
                DelOfferCategoryAssocByUuid();
            }
            else if(IsContext("offer-category-assoc/get")){
                GetOfferCategoryAssocList();
            }
            else if(IsContext("offer-category-assoc/get/by-uuid")){
                GetOfferCategoryAssocListByUuid();
            }
            else if(IsContext("offer-category-assoc/get/by-offer-id")){
                GetOfferCategoryAssocListByOfferId();
            }
            else if(IsContext("offer-category-assoc/get/by-category-id")){
                GetOfferCategoryAssocListByCategoryId();
            }
            else if(IsContext("offer-category-assoc/get/by-offer-id/by-category-id")){
                GetOfferCategoryAssocListByOfferIdByCategoryId();
            }
            if(IsContext("offer-game-location/count")){
                CountOfferGameLocation();
            }
            else if(IsContext("offer-game-location/count/by-uuid")){
                CountOfferGameLocationByUuid();
            }
            else if(IsContext("offer-game-location/count/by-game-location-id")){
                CountOfferGameLocationByGameLocationId();
            }
            else if(IsContext("offer-game-location/count/by-offer-id")){
                CountOfferGameLocationByOfferId();
            }
            else if(IsContext("offer-game-location/count/by-offer-id/by-game-location-id")){
                CountOfferGameLocationByOfferIdByGameLocationId();
            }
            else if(IsContext("offer-game-location/browse/by-filter")){
                BrowseOfferGameLocationListByFilter();
            }
            else if(IsContext("offer-game-location/set/by-uuid")){
                SetOfferGameLocationByUuid();
            }
            else if(IsContext("offer-game-location/del/by-uuid")){
                DelOfferGameLocationByUuid();
            }
            else if(IsContext("offer-game-location/get")){
                GetOfferGameLocationList();
            }
            else if(IsContext("offer-game-location/get/by-uuid")){
                GetOfferGameLocationListByUuid();
            }
            else if(IsContext("offer-game-location/get/by-game-location-id")){
                GetOfferGameLocationListByGameLocationId();
            }
            else if(IsContext("offer-game-location/get/by-offer-id")){
                GetOfferGameLocationListByOfferId();
            }
            else if(IsContext("offer-game-location/get/by-offer-id/by-game-location-id")){
                GetOfferGameLocationListByOfferIdByGameLocationId();
            }
            if(IsContext("event-info/count")){
                CountEventInfo();
            }
            else if(IsContext("event-info/count/by-uuid")){
                CountEventInfoByUuid();
            }
            else if(IsContext("event-info/count/by-code")){
                CountEventInfoByCode();
            }
            else if(IsContext("event-info/count/by-name")){
                CountEventInfoByName();
            }
            else if(IsContext("event-info/count/by-org-id")){
                CountEventInfoByOrgId();
            }
            else if(IsContext("event-info/browse/by-filter")){
                BrowseEventInfoListByFilter();
            }
            else if(IsContext("event-info/set/by-uuid")){
                SetEventInfoByUuid();
            }
            else if(IsContext("event-info/del/by-uuid")){
                DelEventInfoByUuid();
            }
            else if(IsContext("event-info/del/by-org-id")){
                DelEventInfoByOrgId();
            }
            else if(IsContext("event-info/get")){
                GetEventInfoList();
            }
            else if(IsContext("event-info/get/by-uuid")){
                GetEventInfoListByUuid();
            }
            else if(IsContext("event-info/get/by-code")){
                GetEventInfoListByCode();
            }
            else if(IsContext("event-info/get/by-name")){
                GetEventInfoListByName();
            }
            else if(IsContext("event-info/get/by-org-id")){
                GetEventInfoListByOrgId();
            }
            if(IsContext("event-location/count")){
                CountEventLocation();
            }
            else if(IsContext("event-location/count/by-uuid")){
                CountEventLocationByUuid();
            }
            else if(IsContext("event-location/count/by-event-id")){
                CountEventLocationByEventId();
            }
            else if(IsContext("event-location/count/by-city")){
                CountEventLocationByCity();
            }
            else if(IsContext("event-location/count/by-country-code")){
                CountEventLocationByCountryCode();
            }
            else if(IsContext("event-location/count/by-postal-code")){
                CountEventLocationByPostalCode();
            }
            else if(IsContext("event-location/browse/by-filter")){
                BrowseEventLocationListByFilter();
            }
            else if(IsContext("event-location/set/by-uuid")){
                SetEventLocationByUuid();
            }
            else if(IsContext("event-location/del/by-uuid")){
                DelEventLocationByUuid();
            }
            else if(IsContext("event-location/get")){
                GetEventLocationList();
            }
            else if(IsContext("event-location/get/by-uuid")){
                GetEventLocationListByUuid();
            }
            else if(IsContext("event-location/get/by-event-id")){
                GetEventLocationListByEventId();
            }
            else if(IsContext("event-location/get/by-city")){
                GetEventLocationListByCity();
            }
            else if(IsContext("event-location/get/by-country-code")){
                GetEventLocationListByCountryCode();
            }
            else if(IsContext("event-location/get/by-postal-code")){
                GetEventLocationListByPostalCode();
            }
            if(IsContext("event-category/count")){
                CountEventCategory();
            }
            else if(IsContext("event-category/count/by-uuid")){
                CountEventCategoryByUuid();
            }
            else if(IsContext("event-category/count/by-code")){
                CountEventCategoryByCode();
            }
            else if(IsContext("event-category/count/by-name")){
                CountEventCategoryByName();
            }
            else if(IsContext("event-category/count/by-org-id")){
                CountEventCategoryByOrgId();
            }
            else if(IsContext("event-category/count/by-type-id")){
                CountEventCategoryByTypeId();
            }
            else if(IsContext("event-category/count/by-org-id/by-type-id")){
                CountEventCategoryByOrgIdByTypeId();
            }
            else if(IsContext("event-category/browse/by-filter")){
                BrowseEventCategoryListByFilter();
            }
            else if(IsContext("event-category/set/by-uuid")){
                SetEventCategoryByUuid();
            }
            else if(IsContext("event-category/del/by-uuid")){
                DelEventCategoryByUuid();
            }
            else if(IsContext("event-category/del/by-code/by-org-id")){
                DelEventCategoryByCodeByOrgId();
            }
            else if(IsContext("event-category/del/by-code/by-org-id/by-type-id")){
                DelEventCategoryByCodeByOrgIdByTypeId();
            }
            else if(IsContext("event-category/get")){
                GetEventCategoryList();
            }
            else if(IsContext("event-category/get/by-uuid")){
                GetEventCategoryListByUuid();
            }
            else if(IsContext("event-category/get/by-code")){
                GetEventCategoryListByCode();
            }
            else if(IsContext("event-category/get/by-name")){
                GetEventCategoryListByName();
            }
            else if(IsContext("event-category/get/by-org-id")){
                GetEventCategoryListByOrgId();
            }
            else if(IsContext("event-category/get/by-type-id")){
                GetEventCategoryListByTypeId();
            }
            else if(IsContext("event-category/get/by-org-id/by-type-id")){
                GetEventCategoryListByOrgIdByTypeId();
            }
            if(IsContext("event-category-tree/count")){
                CountEventCategoryTree();
            }
            else if(IsContext("event-category-tree/count/by-uuid")){
                CountEventCategoryTreeByUuid();
            }
            else if(IsContext("event-category-tree/count/by-parent-id")){
                CountEventCategoryTreeByParentId();
            }
            else if(IsContext("event-category-tree/count/by-category-id")){
                CountEventCategoryTreeByCategoryId();
            }
            else if(IsContext("event-category-tree/count/by-parent-id/by-category-id")){
                CountEventCategoryTreeByParentIdByCategoryId();
            }
            else if(IsContext("event-category-tree/browse/by-filter")){
                BrowseEventCategoryTreeListByFilter();
            }
            else if(IsContext("event-category-tree/set/by-uuid")){
                SetEventCategoryTreeByUuid();
            }
            else if(IsContext("event-category-tree/del/by-uuid")){
                DelEventCategoryTreeByUuid();
            }
            else if(IsContext("event-category-tree/del/by-parent-id")){
                DelEventCategoryTreeByParentId();
            }
            else if(IsContext("event-category-tree/del/by-category-id")){
                DelEventCategoryTreeByCategoryId();
            }
            else if(IsContext("event-category-tree/del/by-parent-id/by-category-id")){
                DelEventCategoryTreeByParentIdByCategoryId();
            }
            else if(IsContext("event-category-tree/get")){
                GetEventCategoryTreeList();
            }
            else if(IsContext("event-category-tree/get/by-uuid")){
                GetEventCategoryTreeListByUuid();
            }
            else if(IsContext("event-category-tree/get/by-parent-id")){
                GetEventCategoryTreeListByParentId();
            }
            else if(IsContext("event-category-tree/get/by-category-id")){
                GetEventCategoryTreeListByCategoryId();
            }
            else if(IsContext("event-category-tree/get/by-parent-id/by-category-id")){
                GetEventCategoryTreeListByParentIdByCategoryId();
            }
            if(IsContext("event-category-assoc/count")){
                CountEventCategoryAssoc();
            }
            else if(IsContext("event-category-assoc/count/by-uuid")){
                CountEventCategoryAssocByUuid();
            }
            else if(IsContext("event-category-assoc/count/by-event-id")){
                CountEventCategoryAssocByEventId();
            }
            else if(IsContext("event-category-assoc/count/by-category-id")){
                CountEventCategoryAssocByCategoryId();
            }
            else if(IsContext("event-category-assoc/count/by-event-id/by-category-id")){
                CountEventCategoryAssocByEventIdByCategoryId();
            }
            else if(IsContext("event-category-assoc/browse/by-filter")){
                BrowseEventCategoryAssocListByFilter();
            }
            else if(IsContext("event-category-assoc/set/by-uuid")){
                SetEventCategoryAssocByUuid();
            }
            else if(IsContext("event-category-assoc/del/by-uuid")){
                DelEventCategoryAssocByUuid();
            }
            else if(IsContext("event-category-assoc/get")){
                GetEventCategoryAssocList();
            }
            else if(IsContext("event-category-assoc/get/by-uuid")){
                GetEventCategoryAssocListByUuid();
            }
            else if(IsContext("event-category-assoc/get/by-event-id")){
                GetEventCategoryAssocListByEventId();
            }
            else if(IsContext("event-category-assoc/get/by-category-id")){
                GetEventCategoryAssocListByCategoryId();
            }
            else if(IsContext("event-category-assoc/get/by-event-id/by-category-id")){
                GetEventCategoryAssocListByEventIdByCategoryId();
            }
            if(IsContext("channel/count")){
                CountChannel();
            }
            else if(IsContext("channel/count/by-uuid")){
                CountChannelByUuid();
            }
            else if(IsContext("channel/count/by-code")){
                CountChannelByCode();
            }
            else if(IsContext("channel/count/by-name")){
                CountChannelByName();
            }
            else if(IsContext("channel/count/by-org-id")){
                CountChannelByOrgId();
            }
            else if(IsContext("channel/count/by-type-id")){
                CountChannelByTypeId();
            }
            else if(IsContext("channel/count/by-org-id/by-type-id")){
                CountChannelByOrgIdByTypeId();
            }
            else if(IsContext("channel/browse/by-filter")){
                BrowseChannelListByFilter();
            }
            else if(IsContext("channel/set/by-uuid")){
                SetChannelByUuid();
            }
            else if(IsContext("channel/del/by-uuid")){
                DelChannelByUuid();
            }
            else if(IsContext("channel/del/by-code/by-org-id")){
                DelChannelByCodeByOrgId();
            }
            else if(IsContext("channel/del/by-code/by-org-id/by-type-id")){
                DelChannelByCodeByOrgIdByTypeId();
            }
            else if(IsContext("channel/get")){
                GetChannelList();
            }
            else if(IsContext("channel/get/by-uuid")){
                GetChannelListByUuid();
            }
            else if(IsContext("channel/get/by-code")){
                GetChannelListByCode();
            }
            else if(IsContext("channel/get/by-name")){
                GetChannelListByName();
            }
            else if(IsContext("channel/get/by-org-id")){
                GetChannelListByOrgId();
            }
            else if(IsContext("channel/get/by-type-id")){
                GetChannelListByTypeId();
            }
            else if(IsContext("channel/get/by-org-id/by-type-id")){
                GetChannelListByOrgIdByTypeId();
            }
            if(IsContext("channel-type/count")){
                CountChannelType();
            }
            else if(IsContext("channel-type/count/by-uuid")){
                CountChannelTypeByUuid();
            }
            else if(IsContext("channel-type/count/by-code")){
                CountChannelTypeByCode();
            }
            else if(IsContext("channel-type/count/by-name")){
                CountChannelTypeByName();
            }
            else if(IsContext("channel-type/browse/by-filter")){
                BrowseChannelTypeListByFilter();
            }
            else if(IsContext("channel-type/set/by-uuid")){
                SetChannelTypeByUuid();
            }
            else if(IsContext("channel-type/del/by-uuid")){
                DelChannelTypeByUuid();
            }
            else if(IsContext("channel-type/get")){
                GetChannelTypeList();
            }
            else if(IsContext("channel-type/get/by-uuid")){
                GetChannelTypeListByUuid();
            }
            else if(IsContext("channel-type/get/by-code")){
                GetChannelTypeListByCode();
            }
            else if(IsContext("channel-type/get/by-name")){
                GetChannelTypeListByName();
            }
            if(IsContext("question/count")){
                CountQuestion();
            }
            else if(IsContext("question/count/by-uuid")){
                CountQuestionByUuid();
            }
            else if(IsContext("question/count/by-code")){
                CountQuestionByCode();
            }
            else if(IsContext("question/count/by-name")){
                CountQuestionByName();
            }
            else if(IsContext("question/count/by-channel-id")){
                CountQuestionByChannelId();
            }
            else if(IsContext("question/count/by-org-id")){
                CountQuestionByOrgId();
            }
            else if(IsContext("question/count/by-channel-id/by-org-id")){
                CountQuestionByChannelIdByOrgId();
            }
            else if(IsContext("question/count/by-channel-id/by-code")){
                CountQuestionByChannelIdByCode();
            }
            else if(IsContext("question/browse/by-filter")){
                BrowseQuestionListByFilter();
            }
            else if(IsContext("question/set/by-uuid")){
                SetQuestionByUuid();
            }
            else if(IsContext("question/set/by-channel-id/by-code")){
                SetQuestionByChannelIdByCode();
            }
            else if(IsContext("question/del/by-uuid")){
                DelQuestionByUuid();
            }
            else if(IsContext("question/del/by-channel-id/by-org-id")){
                DelQuestionByChannelIdByOrgId();
            }
            else if(IsContext("question/get")){
                GetQuestionList();
            }
            else if(IsContext("question/get/by-uuid")){
                GetQuestionListByUuid();
            }
            else if(IsContext("question/get/by-code")){
                GetQuestionListByCode();
            }
            else if(IsContext("question/get/by-name")){
                GetQuestionListByName();
            }
            else if(IsContext("question/get/by-type")){
                GetQuestionListByType();
            }
            else if(IsContext("question/get/by-channel-id")){
                GetQuestionListByChannelId();
            }
            else if(IsContext("question/get/by-org-id")){
                GetQuestionListByOrgId();
            }
            else if(IsContext("question/get/by-channel-id/by-org-id")){
                GetQuestionListByChannelIdByOrgId();
            }
            else if(IsContext("question/get/by-channel-id/by-code")){
                GetQuestionListByChannelIdByCode();
            }
            if(IsContext("profile-offer/count")){
                CountProfileOffer();
            }
            else if(IsContext("profile-offer/count/by-uuid")){
                CountProfileOfferByUuid();
            }
            else if(IsContext("profile-offer/count/by-profile-id")){
                CountProfileOfferByProfileId();
            }
            else if(IsContext("profile-offer/browse/by-filter")){
                BrowseProfileOfferListByFilter();
            }
            else if(IsContext("profile-offer/set/by-uuid")){
                SetProfileOfferByUuid();
            }
            else if(IsContext("profile-offer/del/by-uuid")){
                DelProfileOfferByUuid();
            }
            else if(IsContext("profile-offer/del/by-profile-id")){
                DelProfileOfferByProfileId();
            }
            else if(IsContext("profile-offer/get")){
                GetProfileOfferList();
            }
            else if(IsContext("profile-offer/get/by-uuid")){
                GetProfileOfferListByUuid();
            }
            else if(IsContext("profile-offer/get/by-profile-id")){
                GetProfileOfferListByProfileId();
            }
            if(IsContext("profile-app/count")){
                CountProfileApp();
            }
            else if(IsContext("profile-app/count/by-uuid")){
                CountProfileAppByUuid();
            }
            else if(IsContext("profile-app/count/by-profile-id/by-app-id")){
                CountProfileAppByProfileIdByAppId();
            }
            else if(IsContext("profile-app/browse/by-filter")){
                BrowseProfileAppListByFilter();
            }
            else if(IsContext("profile-app/set/by-uuid")){
                SetProfileAppByUuid();
            }
            else if(IsContext("profile-app/set/by-profile-id/by-app-id")){
                SetProfileAppByProfileIdByAppId();
            }
            else if(IsContext("profile-app/del/by-uuid")){
                DelProfileAppByUuid();
            }
            else if(IsContext("profile-app/del/by-profile-id/by-app-id")){
                DelProfileAppByProfileIdByAppId();
            }
            else if(IsContext("profile-app/get")){
                GetProfileAppList();
            }
            else if(IsContext("profile-app/get/by-uuid")){
                GetProfileAppListByUuid();
            }
            else if(IsContext("profile-app/get/by-app-id")){
                GetProfileAppListByAppId();
            }
            else if(IsContext("profile-app/get/by-profile-id")){
                GetProfileAppListByProfileId();
            }
            else if(IsContext("profile-app/get/by-profile-id/by-app-id")){
                GetProfileAppListByProfileIdByAppId();
            }
            if(IsContext("profile-org/count")){
                CountProfileOrg();
            }
            else if(IsContext("profile-org/count/by-uuid")){
                CountProfileOrgByUuid();
            }
            else if(IsContext("profile-org/count/by-org-id")){
                CountProfileOrgByOrgId();
            }
            else if(IsContext("profile-org/count/by-profile-id")){
                CountProfileOrgByProfileId();
            }
            else if(IsContext("profile-org/browse/by-filter")){
                BrowseProfileOrgListByFilter();
            }
            else if(IsContext("profile-org/set/by-uuid")){
                SetProfileOrgByUuid();
            }
            else if(IsContext("profile-org/del/by-uuid")){
                DelProfileOrgByUuid();
            }
            else if(IsContext("profile-org/get")){
                GetProfileOrgList();
            }
            else if(IsContext("profile-org/get/by-uuid")){
                GetProfileOrgListByUuid();
            }
            else if(IsContext("profile-org/get/by-org-id")){
                GetProfileOrgListByOrgId();
            }
            else if(IsContext("profile-org/get/by-profile-id")){
                GetProfileOrgListByProfileId();
            }
            if(IsContext("profile-game-location/count")){
                CountProfileGameLocation();
            }
            else if(IsContext("profile-game-location/count/by-uuid")){
                CountProfileGameLocationByUuid();
            }
            else if(IsContext("profile-game-location/count/by-game-location-id")){
                CountProfileGameLocationByGameLocationId();
            }
            else if(IsContext("profile-game-location/count/by-profile-id")){
                CountProfileGameLocationByProfileId();
            }
            else if(IsContext("profile-game-location/count/by-profile-id/by-game-location-id")){
                CountProfileGameLocationByProfileIdByGameLocationId();
            }
            else if(IsContext("profile-game-location/browse/by-filter")){
                BrowseProfileGameLocationListByFilter();
            }
            else if(IsContext("profile-game-location/set/by-uuid")){
                SetProfileGameLocationByUuid();
            }
            else if(IsContext("profile-game-location/del/by-uuid")){
                DelProfileGameLocationByUuid();
            }
            else if(IsContext("profile-game-location/get")){
                GetProfileGameLocationList();
            }
            else if(IsContext("profile-game-location/get/by-uuid")){
                GetProfileGameLocationListByUuid();
            }
            else if(IsContext("profile-game-location/get/by-game-location-id")){
                GetProfileGameLocationListByGameLocationId();
            }
            else if(IsContext("profile-game-location/get/by-profile-id")){
                GetProfileGameLocationListByProfileId();
            }
            else if(IsContext("profile-game-location/get/by-profile-id/by-game-location-id")){
                GetProfileGameLocationListByProfileIdByGameLocationId();
            }
            if(IsContext("profile-question/count")){
                CountProfileQuestion();
            }
            else if(IsContext("profile-question/count/by-uuid")){
                CountProfileQuestionByUuid();
            }
            else if(IsContext("profile-question/count/by-channel-id")){
                CountProfileQuestionByChannelId();
            }
            else if(IsContext("profile-question/count/by-org-id")){
                CountProfileQuestionByOrgId();
            }
            else if(IsContext("profile-question/count/by-profile-id")){
                CountProfileQuestionByProfileId();
            }
            else if(IsContext("profile-question/count/by-question-id")){
                CountProfileQuestionByQuestionId();
            }
            else if(IsContext("profile-question/count/by-channel-id/by-org-id")){
                CountProfileQuestionByChannelIdByOrgId();
            }
            else if(IsContext("profile-question/count/by-channel-id/by-profile-id")){
                CountProfileQuestionByChannelIdByProfileId();
            }
            else if(IsContext("profile-question/count/by-question-id/by-profile-id")){
                CountProfileQuestionByQuestionIdByProfileId();
            }
            else if(IsContext("profile-question/browse/by-filter")){
                BrowseProfileQuestionListByFilter();
            }
            else if(IsContext("profile-question/set/by-uuid")){
                SetProfileQuestionByUuid();
            }
            else if(IsContext("profile-question/set/by-channel-id/by-profile-id")){
                SetProfileQuestionByChannelIdByProfileId();
            }
            else if(IsContext("profile-question/set/by-question-id/by-profile-id")){
                SetProfileQuestionByQuestionIdByProfileId();
            }
            else if(IsContext("profile-question/set/by-channel-id/by-question-id/by-profile-id")){
                SetProfileQuestionByChannelIdByQuestionIdByProfileId();
            }
            else if(IsContext("profile-question/del/by-uuid")){
                DelProfileQuestionByUuid();
            }
            else if(IsContext("profile-question/del/by-channel-id/by-org-id")){
                DelProfileQuestionByChannelIdByOrgId();
            }
            else if(IsContext("profile-question/get")){
                GetProfileQuestionList();
            }
            else if(IsContext("profile-question/get/by-uuid")){
                GetProfileQuestionListByUuid();
            }
            else if(IsContext("profile-question/get/by-channel-id")){
                GetProfileQuestionListByChannelId();
            }
            else if(IsContext("profile-question/get/by-org-id")){
                GetProfileQuestionListByOrgId();
            }
            else if(IsContext("profile-question/get/by-profile-id")){
                GetProfileQuestionListByProfileId();
            }
            else if(IsContext("profile-question/get/by-question-id")){
                GetProfileQuestionListByQuestionId();
            }
            else if(IsContext("profile-question/get/by-channel-id/by-org-id")){
                GetProfileQuestionListByChannelIdByOrgId();
            }
            else if(IsContext("profile-question/get/by-channel-id/by-profile-id")){
                GetProfileQuestionListByChannelIdByProfileId();
            }
            else if(IsContext("profile-question/get/by-question-id/by-profile-id")){
                GetProfileQuestionListByQuestionIdByProfileId();
            }
            if(IsContext("profile-channel/count")){
                CountProfileChannel();
            }
            else if(IsContext("profile-channel/count/by-uuid")){
                CountProfileChannelByUuid();
            }
            else if(IsContext("profile-channel/count/by-channel-id")){
                CountProfileChannelByChannelId();
            }
            else if(IsContext("profile-channel/count/by-profile-id")){
                CountProfileChannelByProfileId();
            }
            else if(IsContext("profile-channel/count/by-channel-id/by-profile-id")){
                CountProfileChannelByChannelIdByProfileId();
            }
            else if(IsContext("profile-channel/browse/by-filter")){
                BrowseProfileChannelListByFilter();
            }
            else if(IsContext("profile-channel/set/by-uuid")){
                SetProfileChannelByUuid();
            }
            else if(IsContext("profile-channel/set/by-channel-id/by-profile-id")){
                SetProfileChannelByChannelIdByProfileId();
            }
            else if(IsContext("profile-channel/del/by-uuid")){
                DelProfileChannelByUuid();
            }
            else if(IsContext("profile-channel/del/by-channel-id/by-profile-id")){
                DelProfileChannelByChannelIdByProfileId();
            }
            else if(IsContext("profile-channel/get")){
                GetProfileChannelList();
            }
            else if(IsContext("profile-channel/get/by-uuid")){
                GetProfileChannelListByUuid();
            }
            else if(IsContext("profile-channel/get/by-channel-id")){
                GetProfileChannelListByChannelId();
            }
            else if(IsContext("profile-channel/get/by-profile-id")){
                GetProfileChannelListByProfileId();
            }
            else if(IsContext("profile-channel/get/by-channel-id/by-profile-id")){
                GetProfileChannelListByChannelIdByProfileId();
            }
            if(IsContext("org-site/count")){
                CountOrgSite();
            }
            else if(IsContext("org-site/count/by-uuid")){
                CountOrgSiteByUuid();
            }
            else if(IsContext("org-site/count/by-org-id")){
                CountOrgSiteByOrgId();
            }
            else if(IsContext("org-site/count/by-site-id")){
                CountOrgSiteBySiteId();
            }
            else if(IsContext("org-site/count/by-org-id/by-site-id")){
                CountOrgSiteByOrgIdBySiteId();
            }
            else if(IsContext("org-site/browse/by-filter")){
                BrowseOrgSiteListByFilter();
            }
            else if(IsContext("org-site/set/by-uuid")){
                SetOrgSiteByUuid();
            }
            else if(IsContext("org-site/set/by-org-id/by-site-id")){
                SetOrgSiteByOrgIdBySiteId();
            }
            else if(IsContext("org-site/del/by-uuid")){
                DelOrgSiteByUuid();
            }
            else if(IsContext("org-site/del/by-org-id/by-site-id")){
                DelOrgSiteByOrgIdBySiteId();
            }
            else if(IsContext("org-site/get")){
                GetOrgSiteList();
            }
            else if(IsContext("org-site/get/by-uuid")){
                GetOrgSiteListByUuid();
            }
            else if(IsContext("org-site/get/by-org-id")){
                GetOrgSiteListByOrgId();
            }
            else if(IsContext("org-site/get/by-site-id")){
                GetOrgSiteListBySiteId();
            }
            else if(IsContext("org-site/get/by-org-id/by-site-id")){
                GetOrgSiteListByOrgIdBySiteId();
            }
            if(IsContext("site-app/count")){
                CountSiteApp();
            }
            else if(IsContext("site-app/count/by-uuid")){
                CountSiteAppByUuid();
            }
            else if(IsContext("site-app/count/by-app-id")){
                CountSiteAppByAppId();
            }
            else if(IsContext("site-app/count/by-site-id")){
                CountSiteAppBySiteId();
            }
            else if(IsContext("site-app/count/by-app-id/by-site-id")){
                CountSiteAppByAppIdBySiteId();
            }
            else if(IsContext("site-app/browse/by-filter")){
                BrowseSiteAppListByFilter();
            }
            else if(IsContext("site-app/set/by-uuid")){
                SetSiteAppByUuid();
            }
            else if(IsContext("site-app/set/by-app-id/by-site-id")){
                SetSiteAppByAppIdBySiteId();
            }
            else if(IsContext("site-app/del/by-uuid")){
                DelSiteAppByUuid();
            }
            else if(IsContext("site-app/del/by-app-id/by-site-id")){
                DelSiteAppByAppIdBySiteId();
            }
            else if(IsContext("site-app/get")){
                GetSiteAppList();
            }
            else if(IsContext("site-app/get/by-uuid")){
                GetSiteAppListByUuid();
            }
            else if(IsContext("site-app/get/by-app-id")){
                GetSiteAppListByAppId();
            }
            else if(IsContext("site-app/get/by-site-id")){
                GetSiteAppListBySiteId();
            }
            else if(IsContext("site-app/get/by-app-id/by-site-id")){
                GetSiteAppListByAppIdBySiteId();
            }
            if(IsContext("photo/count")){
                CountPhoto();
            }
            else if(IsContext("photo/count/by-uuid")){
                CountPhotoByUuid();
            }
            else if(IsContext("photo/count/by-external-id")){
                CountPhotoByExternalId();
            }
            else if(IsContext("photo/count/by-url")){
                CountPhotoByUrl();
            }
            else if(IsContext("photo/count/by-url/by-external-id")){
                CountPhotoByUrlByExternalId();
            }
            else if(IsContext("photo/count/by-uuid/by-external-id")){
                CountPhotoByUuidByExternalId();
            }
            else if(IsContext("photo/browse/by-filter")){
                BrowsePhotoListByFilter();
            }
            else if(IsContext("photo/set/by-uuid")){
                SetPhotoByUuid();
            }
            else if(IsContext("photo/set/by-external-id")){
                SetPhotoByExternalId();
            }
            else if(IsContext("photo/set/by-url")){
                SetPhotoByUrl();
            }
            else if(IsContext("photo/set/by-url/by-external-id")){
                SetPhotoByUrlByExternalId();
            }
            else if(IsContext("photo/set/by-uuid/by-external-id")){
                SetPhotoByUuidByExternalId();
            }
            else if(IsContext("photo/del/by-uuid")){
                DelPhotoByUuid();
            }
            else if(IsContext("photo/del/by-external-id")){
                DelPhotoByExternalId();
            }
            else if(IsContext("photo/del/by-url")){
                DelPhotoByUrl();
            }
            else if(IsContext("photo/del/by-url/by-external-id")){
                DelPhotoByUrlByExternalId();
            }
            else if(IsContext("photo/del/by-uuid/by-external-id")){
                DelPhotoByUuidByExternalId();
            }
            else if(IsContext("photo/get")){
                GetPhotoList();
            }
            else if(IsContext("photo/get/by-uuid")){
                GetPhotoListByUuid();
            }
            else if(IsContext("photo/get/by-external-id")){
                GetPhotoListByExternalId();
            }
            else if(IsContext("photo/get/by-url")){
                GetPhotoListByUrl();
            }
            else if(IsContext("photo/get/by-url/by-external-id")){
                GetPhotoListByUrlByExternalId();
            }
            else if(IsContext("photo/get/by-uuid/by-external-id")){
                GetPhotoListByUuidByExternalId();
            }
            if(IsContext("video/count")){
                CountVideo();
            }
            else if(IsContext("video/count/by-uuid")){
                CountVideoByUuid();
            }
            else if(IsContext("video/count/by-external-id")){
                CountVideoByExternalId();
            }
            else if(IsContext("video/count/by-url")){
                CountVideoByUrl();
            }
            else if(IsContext("video/count/by-url/by-external-id")){
                CountVideoByUrlByExternalId();
            }
            else if(IsContext("video/count/by-uuid/by-external-id")){
                CountVideoByUuidByExternalId();
            }
            else if(IsContext("video/browse/by-filter")){
                BrowseVideoListByFilter();
            }
            else if(IsContext("video/set/by-uuid")){
                SetVideoByUuid();
            }
            else if(IsContext("video/set/by-external-id")){
                SetVideoByExternalId();
            }
            else if(IsContext("video/set/by-url")){
                SetVideoByUrl();
            }
            else if(IsContext("video/set/by-url/by-external-id")){
                SetVideoByUrlByExternalId();
            }
            else if(IsContext("video/set/by-uuid/by-external-id")){
                SetVideoByUuidByExternalId();
            }
            else if(IsContext("video/del/by-uuid")){
                DelVideoByUuid();
            }
            else if(IsContext("video/del/by-external-id")){
                DelVideoByExternalId();
            }
            else if(IsContext("video/del/by-url")){
                DelVideoByUrl();
            }
            else if(IsContext("video/del/by-url/by-external-id")){
                DelVideoByUrlByExternalId();
            }
            else if(IsContext("video/del/by-uuid/by-external-id")){
                DelVideoByUuidByExternalId();
            }
            else if(IsContext("video/get")){
                GetVideoList();
            }
            else if(IsContext("video/get/by-uuid")){
                GetVideoListByUuid();
            }
            else if(IsContext("video/get/by-external-id")){
                GetVideoListByExternalId();
            }
            else if(IsContext("video/get/by-url")){
                GetVideoListByUrl();
            }
            else if(IsContext("video/get/by-url/by-external-id")){
                GetVideoListByUrlByExternalId();
            }
            else if(IsContext("video/get/by-uuid/by-external-id")){
                GetVideoListByUuidByExternalId();
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
                    
        public virtual void CountAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppByCodeByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/by-code/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppByCodeByTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppByPlatformByTypeId() {
        
             _platform = ()util.GetParamValue(_context, "@platform");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/by-platform/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppByPlatformByTypeId(
                _platform
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppByPlatform() {
        
             _platform = ()util.GetParamValue(_context, "@platform");

            ResponseAppInt wrapper = new ResponseAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/count/by-platform";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppByPlatform(
                _platform
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseAppListByFilter()  {
        
            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            AppResult result = api.BrowseAppListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppByUuid()  {
        
            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppByCode()  {
        
            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/set/by-code";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppBool wrapper = new ResponseAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/del/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppByCode(
                        
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
                    
        public virtual void GetAppListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListByCodeByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/by-code/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListByCodeByTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListByPlatformByTypeId() {
        
             _platform = ()util.GetParamValue(_context, "@platform");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/by-platform/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListByPlatformByTypeId(
                _platform
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppListByPlatform() {
        
             _platform = ()util.GetParamValue(_context, "@platform");

            ResponseAppList wrapper = new ResponseAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app/get/by-platform";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<App> objs = api.GetAppListByPlatform(
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
                    
        public virtual void CountAppTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppTypeInt wrapper = new ResponseAppTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountAppTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppTypeInt wrapper = new ResponseAppTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountAppTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseAppTypeListByFilter()  {
        
            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            AppTypeResult result = api.BrowseAppTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppTypeByUuid()  {
        
            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetAppTypeByCode()  {
        
            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/set/by-code";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetAppTypeByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppTypeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelAppTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppTypeBool wrapper = new ResponseAppTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/del/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelAppTypeByCode(
                        
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
                    
        public virtual void GetAppTypeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<AppType> objs = api.GetAppTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetAppTypeListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseAppTypeList wrapper = new ResponseAppTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "app-type/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<AppType> objs = api.GetAppTypeListByCode(
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
                    
        public virtual void CountSiteByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteByCodeByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/by-code/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteByCodeByTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteByDomainByTypeId() {
        
             _domain = ()util.GetParamValue(_context, "@domain");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/by-domain/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteByDomainByTypeId(
                _domain
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteByDomain() {
        
             _domain = ()util.GetParamValue(_context, "@domain");

            ResponseSiteInt wrapper = new ResponseSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/count/by-domain";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteByDomain(
                _domain
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseSiteListByFilter()  {
        
            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            SiteResult result = api.BrowseSiteListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteByUuid()  {
        
            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteByCode()  {
        
            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/set/by-code";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteBool wrapper = new ResponseSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/del/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteByCode(
                        
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
                    
        public virtual void GetSiteListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListByCodeByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/by-code/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListByCodeByTypeId(
                _code
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListByDomainByTypeId() {
        
             _domain = ()util.GetParamValue(_context, "@domain");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/by-domain/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListByDomainByTypeId(
                _domain
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteListByDomain() {
        
             _domain = ()util.GetParamValue(_context, "@domain");

            ResponseSiteList wrapper = new ResponseSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site/get/by-domain";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Site> objs = api.GetSiteListByDomain(
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
                    
        public virtual void CountSiteTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteTypeInt wrapper = new ResponseSiteTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteTypeInt wrapper = new ResponseSiteTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseSiteTypeListByFilter()  {
        
            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            SiteTypeResult result = api.BrowseSiteTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteTypeByUuid()  {
        
            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteTypeByCode()  {
        
            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/set/by-code";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetSiteTypeByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteTypeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteTypeBool wrapper = new ResponseSiteTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/del/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteTypeByCode(
                        
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
                    
        public virtual void GetSiteTypeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteType> objs = api.GetSiteTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteTypeListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseSiteTypeList wrapper = new ResponseSiteTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-type/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteType> objs = api.GetSiteTypeListByCode(
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
                    
        public virtual void CountOrgByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOrgInt wrapper = new ResponseOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOrgListByFilter()  {
        
            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OrgResult result = api.BrowseOrgListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgByUuid()  {
        
            ResponseOrgBool wrapper = new ResponseOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOrgByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgBool wrapper = new ResponseOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgByUuid(
                        
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
                    
        public virtual void GetOrgListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Org> objs = api.GetOrgListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Org> objs = api.GetOrgListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOrgList wrapper = new ResponseOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Org> objs = api.GetOrgListByName(
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
                    
        public virtual void CountOrgTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgTypeInt wrapper = new ResponseOrgTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgTypeInt wrapper = new ResponseOrgTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOrgTypeListByFilter()  {
        
            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OrgTypeResult result = api.BrowseOrgTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgTypeByUuid()  {
        
            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOrgTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgTypeByCode()  {
        
            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/set/by-code";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOrgTypeByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgTypeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgTypeBool wrapper = new ResponseOrgTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/del/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgTypeByCode(
                        
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
                    
        public virtual void GetOrgTypeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgType> objs = api.GetOrgTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgTypeListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOrgTypeList wrapper = new ResponseOrgTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-type/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgType> objs = api.GetOrgTypeListByCode(
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
                    
        public virtual void CountContentItemByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemByPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentItemInt wrapper = new ResponseContentItemInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/count/by-path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemByPath(
                _path
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseContentItemListByFilter()  {
        
            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ContentItemResult result = api.BrowseContentItemListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentItemByUuid()  {
        
            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/set/by-uuid";
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
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentItemByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemByPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentItemBool wrapper = new ResponseContentItemBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/del/by-path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemByPath(
                        
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
                    
        public virtual void GetContentItemListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemListByPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentItemList wrapper = new ResponseContentItemList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item/get/by-path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItem> objs = api.GetContentItemListByPath(
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
                    
        public virtual void CountContentItemTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemTypeInt wrapper = new ResponseContentItemTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentItemTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemTypeInt wrapper = new ResponseContentItemTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentItemTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseContentItemTypeListByFilter()  {
        
            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ContentItemTypeResult result = api.BrowseContentItemTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentItemTypeByUuid()  {
        
            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentItemTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentItemTypeByCode()  {
        
            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/set/by-code";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentItemTypeByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemTypeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentItemTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemTypeBool wrapper = new ResponseContentItemTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/del/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentItemTypeByCode(
                        
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
                    
        public virtual void GetContentItemTypeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItemType> objs = api.GetContentItemTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentItemTypeListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentItemTypeList wrapper = new ResponseContentItemTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-item-type/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentItemType> objs = api.GetContentItemTypeListByCode(
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
                    
        public virtual void CountContentPageByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPageByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPageByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPageByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountContentPageByPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageInt wrapper = new ResponseContentPageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/count/by-path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountContentPageByPath(
                _path
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseContentPageListByFilter()  {
        
            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ContentPageResult result = api.BrowseContentPageListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetContentPageByUuid()  {
        
            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetContentPageByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPageByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentPageByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPageByPathBySiteId() {
        
             _path = ()util.GetParamValue(_context, "@path");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/del/by-path/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentPageByPathBySiteId(
                        
                _path
                , _site_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelContentPageByPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageBool wrapper = new ResponseContentPageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/del/by-path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelContentPageByPath(
                        
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
                    
        public virtual void GetContentPageListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListByPath() {
        
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/by-path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListByPath(
                _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListBySiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListBySiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetContentPageListBySiteIdByPath() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");
             _path = ()util.GetParamValue(_context, "@path");

            ResponseContentPageList wrapper = new ResponseContentPageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "content-page/get/by-site-id/by-path";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ContentPage> objs = api.GetContentPageListBySiteIdByPath(
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
                    
        public virtual void CountMessageByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseMessageInt wrapper = new ResponseMessageInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountMessageByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseMessageListByFilter()  {
        
            ResponseMessageList wrapper = new ResponseMessageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            MessageResult result = api.BrowseMessageListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetMessageByUuid()  {
        
            ResponseMessageBool wrapper = new ResponseMessageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Message obj = new Message();
            
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
            
            string _profile_to_id = util.GetParamValue(_context, "@profile_to_id");
            if(!String.IsNoneOrEmpty(_profile_to_id))
                obj.profile_to_id = ()_profile_to_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _profile_to_name = util.GetParamValue(_context, "@profile_to_name");
            if(!String.IsNoneOrEmpty(_profile_to_name))
                obj.profile_to_name = ()_profile_to_name;
            
            string _subject = util.GetParamValue(_context, "@subject");
            if(!String.IsNoneOrEmpty(_subject))
                obj.subject = ()_subject;
            
            string _sent = util.GetParamValue(_context, "@sent");
            if(!String.IsNoneOrEmpty(_sent))
                obj.sent = Convert.ToBoolean(_sent);
            
            string _profile_from_name = util.GetParamValue(_context, "@profile_from_name");
            if(!String.IsNoneOrEmpty(_profile_from_name))
                obj.profile_from_name = ()_profile_from_name;
            
            
            // get data
            wrapper.data = api.SetMessageByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelMessageByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseMessageBool wrapper = new ResponseMessageBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelMessageByUuid(
                        
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
                    
        public virtual void GetMessageListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseMessageList wrapper = new ResponseMessageList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "message/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Message> objs = api.GetMessageListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGame() {
        

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGame(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/count/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByOrgIdByAppId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/count/by-org-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameByOrgIdByAppId(
                _org_id
                , _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameListByFilter()  {
        
            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameResult result = api.BrowseGameListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByUuid()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByCode()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/set/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByName()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/set/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameByName(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByOrgId()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/set/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameByOrgId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByAppId()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/set/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameByAppId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByOrgIdByAppId()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/set/by-org-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameByOrgIdByAppId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/del/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameByCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/del/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameByName(
                        
                _name
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/del/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameByOrgId(
                        
                _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/del/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameByAppId(
                        
                _app_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByOrgIdByAppId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/del/by-org-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameByOrgIdByAppId(
                        
                _org_id
                , _app_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameList() {
        

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Game> objs = api.GetGameList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Game> objs = api.GetGameListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Game> objs = api.GetGameListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Game> objs = api.GetGameListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Game> objs = api.GetGameListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/get/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Game> objs = api.GetGameListByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByOrgIdByAppId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game/get/by-org-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Game> objs = api.GetGameListByOrgIdByAppId(
                _org_id
                , _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategory() {
        

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategory(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/count/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/count/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryByOrgIdByTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameCategoryListByFilter()  {
        
            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameCategoryResult result = api.BrowseGameCategoryListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameCategoryByUuid()  {
        
            ResponseGameCategoryBool wrapper = new ResponseGameCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            GameCategory obj = new GameCategory();
            
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameCategoryByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryBool wrapper = new ResponseGameCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryByCodeByOrgId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseGameCategoryBool wrapper = new ResponseGameCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/del/by-code/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryByCodeByOrgId(
                        
                _code
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryByCodeByOrgIdByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseGameCategoryBool wrapper = new ResponseGameCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/del/by-code/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryByCodeByOrgIdByTypeId(
                        
                _code
                , _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryList() {
        

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategory> objs = api.GetGameCategoryList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategory> objs = api.GetGameCategoryListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategory> objs = api.GetGameCategoryListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategory> objs = api.GetGameCategoryListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategory> objs = api.GetGameCategoryListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/get/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategory> objs = api.GetGameCategoryListByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category/get/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategory> objs = api.GetGameCategoryListByOrgIdByTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTree() {
        

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryTree(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryTreeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/count/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryTreeByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/count/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryTreeByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/count/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryTreeByParentIdByCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameCategoryTreeListByFilter()  {
        
            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameCategoryTreeResult result = api.BrowseGameCategoryTreeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameCategoryTreeByUuid()  {
        
            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            GameCategoryTree obj = new GameCategoryTree();
            
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
            
            
            // get data
            wrapper.data = api.SetGameCategoryTreeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryTreeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/del/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryTreeByParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/del/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryTreeByCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/del/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryTreeByParentIdByCategoryId(
                        
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeList() {
        

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryTree> objs = api.GetGameCategoryTreeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryTree> objs = api.GetGameCategoryTreeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/get/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryTree> objs = api.GetGameCategoryTreeListByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/get/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryTree> objs = api.GetGameCategoryTreeListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-tree/get/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryTree> objs = api.GetGameCategoryTreeListByParentIdByCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssoc() {
        

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryAssoc(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryAssocByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/count/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryAssocByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/count/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryAssocByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByGameIdByCategoryId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/count/by-game-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameCategoryAssocByGameIdByCategoryId(
                _game_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameCategoryAssocListByFilter()  {
        
            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameCategoryAssocResult result = api.BrowseGameCategoryAssocListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameCategoryAssocByUuid()  {
        
            ResponseGameCategoryAssocBool wrapper = new ResponseGameCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            GameCategoryAssoc obj = new GameCategoryAssoc();
            
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
            
            string _game_id = util.GetParamValue(_context, "@game_id");
            if(!String.IsNoneOrEmpty(_game_id))
                obj.game_id = ()_game_id;
            
            string _category_id = util.GetParamValue(_context, "@category_id");
            if(!String.IsNoneOrEmpty(_category_id))
                obj.category_id = ()_category_id;
            
            
            // get data
            wrapper.data = api.SetGameCategoryAssocByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryAssocByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryAssocBool wrapper = new ResponseGameCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameCategoryAssocByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocList() {
        

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/get/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/get/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByGameIdByCategoryId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-category-assoc/get/by-game-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocListByGameIdByCategoryId(
                _game_id
                , _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameType() {
        

            ResponseGameTypeInt wrapper = new ResponseGameTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameTypeInt wrapper = new ResponseGameTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseGameTypeInt wrapper = new ResponseGameTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameTypeByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseGameTypeInt wrapper = new ResponseGameTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameTypeByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameTypeListByFilter()  {
        
            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameTypeResult result = api.BrowseGameTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameTypeByUuid()  {
        
            ResponseGameTypeBool wrapper = new ResponseGameTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            GameType obj = new GameType();
            
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
            wrapper.data = api.SetGameTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameTypeBool wrapper = new ResponseGameTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameTypeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameTypeList() {
        

            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameType> objs = api.GetGameTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameTypeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameType> objs = api.GetGameTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameTypeListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameType> objs = api.GetGameTypeListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameTypeListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-type/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameType> objs = api.GetGameTypeListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGame() {
        

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGame(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/count/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByProfileIdByGameId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/count/by-profile-id/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileGameListByFilter()  {
        
            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileGameResult result = api.BrowseProfileGameListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileGameByUuid()  {
        
            ResponseProfileGameBool wrapper = new ResponseProfileGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileGame obj = new ProfileGame();
            
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
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _game_profile = util.GetParamValue(_context, "@game_profile");
            if(!String.IsNoneOrEmpty(_game_profile))
                obj.game_profile = ()_game_profile;
            
            string _game_id = util.GetParamValue(_context, "@game_id");
            if(!String.IsNoneOrEmpty(_game_id))
                obj.game_id = ()_game_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            
            // get data
            wrapper.data = api.SetProfileGameByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameBool wrapper = new ResponseProfileGameBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileGameByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameList() {
        

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGame> objs = api.GetProfileGameList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGame> objs = api.GetProfileGameListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/get/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGame> objs = api.GetProfileGameListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGame> objs = api.GetProfileGameListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByProfileIdByGameId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game/get/by-profile-id/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGame> objs = api.GetProfileGameListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetwork() {
        

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameNetwork(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameNetworkByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/count/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameNetworkByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameNetworkByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByProfileIdByGameId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/count/by-profile-id/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameNetworkByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileGameNetworkListByFilter()  {
        
            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileGameNetworkResult result = api.BrowseProfileGameNetworkListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileGameNetworkByUuid()  {
        
            ResponseProfileGameNetworkBool wrapper = new ResponseProfileGameNetworkBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileGameNetwork obj = new ProfileGameNetwork();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _hash = util.GetParamValue(_context, "@hash");
            if(!String.IsNoneOrEmpty(_hash))
                obj.hash = ()_hash;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _game_id = util.GetParamValue(_context, "@game_id");
            if(!String.IsNoneOrEmpty(_game_id))
                obj.game_id = ()_game_id;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _secret = util.GetParamValue(_context, "@secret");
            if(!String.IsNoneOrEmpty(_secret))
                obj.secret = ()_secret;
            
            string _game_network_id = util.GetParamValue(_context, "@game_network_id");
            if(!String.IsNoneOrEmpty(_game_network_id))
                obj.game_network_id = ()_game_network_id;
            
            string _token = util.GetParamValue(_context, "@token");
            if(!String.IsNoneOrEmpty(_token))
                obj.token = ()_token;
            
            string _network_username = util.GetParamValue(_context, "@network_username");
            if(!String.IsNoneOrEmpty(_network_username))
                obj.network_username = ()_network_username;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            
            // get data
            wrapper.data = api.SetProfileGameNetworkByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameNetworkByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameNetworkBool wrapper = new ResponseProfileGameNetworkBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileGameNetworkByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkList() {
        

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/get/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByProfileIdByGameId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-network/get/by-profile-id/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSession() {
        

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameSession(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameSessionByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/count/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameSessionByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameSessionByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByProfileIdByGameId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/count/by-profile-id/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameSessionByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameSessionListByFilter()  {
        
            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameSessionResult result = api.BrowseGameSessionListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameSessionByUuid()  {
        
            ResponseGameSessionBool wrapper = new ResponseGameSessionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            GameSession obj = new GameSession();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _game_state = util.GetParamValue(_context, "@game_state");
            if(!String.IsNoneOrEmpty(_game_state))
                obj.game_state = ()_game_state;
            
            string _code = util.GetParamValue(_context, "@code");
            if(!String.IsNoneOrEmpty(_code))
                obj.code = ()_code;
            
            string _network_uuid = util.GetParamValue(_context, "@network_uuid");
            if(!String.IsNoneOrEmpty(_network_uuid))
                obj.network_uuid = ()_network_uuid;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            string _network_external_ip = util.GetParamValue(_context, "@network_external_ip");
            if(!String.IsNoneOrEmpty(_network_external_ip))
                obj.network_external_ip = ()_network_external_ip;
            
            string _game_level = util.GetParamValue(_context, "@game_level");
            if(!String.IsNoneOrEmpty(_game_level))
                obj.game_level = ()_game_level;
            
            string _network_external_port = util.GetParamValue(_context, "@network_external_port");
            if(!String.IsNoneOrEmpty(_network_external_port))
                obj.network_external_port = Convert.ToInt32(_network_external_port);
            
            string _game_id = util.GetParamValue(_context, "@game_id");
            if(!String.IsNoneOrEmpty(_game_id))
                obj.game_id = ()_game_id;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _profile_username = util.GetParamValue(_context, "@profile_username");
            if(!String.IsNoneOrEmpty(_profile_username))
                obj.profile_username = ()_profile_username;
            
            string _game_area = util.GetParamValue(_context, "@game_area");
            if(!String.IsNoneOrEmpty(_game_area))
                obj.game_area = ()_game_area;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_players_allowed = util.GetParamValue(_context, "@game_players_allowed");
            if(!String.IsNoneOrEmpty(_game_players_allowed))
                obj.game_players_allowed = Convert.ToInt32(_game_players_allowed);
            
            string _profile_network = util.GetParamValue(_context, "@profile_network");
            if(!String.IsNoneOrEmpty(_profile_network))
                obj.profile_network = ()_profile_network;
            
            string _game_player_z = util.GetParamValue(_context, "@game_player_z");
            if(!String.IsNoneOrEmpty(_game_player_z))
                obj.game_player_z = float.Parse(_game_player_z);
            
            string _game_player_x = util.GetParamValue(_context, "@game_player_x");
            if(!String.IsNoneOrEmpty(_game_player_x))
                obj.game_player_x = float.Parse(_game_player_x);
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _network_port = util.GetParamValue(_context, "@network_port");
            if(!String.IsNoneOrEmpty(_network_port))
                obj.network_port = Convert.ToInt32(_network_port);
            
            string _game_code = util.GetParamValue(_context, "@game_code");
            if(!String.IsNoneOrEmpty(_game_code))
                obj.game_code = ()_game_code;
            
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
            
            string _game_players_connected = util.GetParamValue(_context, "@game_players_connected");
            if(!String.IsNoneOrEmpty(_game_players_connected))
                obj.game_players_connected = Convert.ToInt32(_game_players_connected);
            
            string _game_type = util.GetParamValue(_context, "@game_type");
            if(!String.IsNoneOrEmpty(_game_type))
                obj.game_type = ()_game_type;
            
            string _profile_device = util.GetParamValue(_context, "@profile_device");
            if(!String.IsNoneOrEmpty(_profile_device))
                obj.profile_device = ()_profile_device;
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _network_ip = util.GetParamValue(_context, "@network_ip");
            if(!String.IsNoneOrEmpty(_network_ip))
                obj.network_ip = ()_network_ip;
            
            string _network_use_nat = util.GetParamValue(_context, "@network_use_nat");
            if(!String.IsNoneOrEmpty(_network_use_nat))
                obj.network_use_nat = Convert.ToBoolean(_network_use_nat);
            
            string _hash = util.GetParamValue(_context, "@hash");
            if(!String.IsNoneOrEmpty(_hash))
                obj.hash = ()_hash;
            
            
            // get data
            wrapper.data = api.SetGameSessionByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameSessionByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameSessionBool wrapper = new ResponseGameSessionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameSessionByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionList() {
        

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameSession> objs = api.GetGameSessionList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameSession> objs = api.GetGameSessionListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/get/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameSession> objs = api.GetGameSessionListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameSession> objs = api.GetGameSessionListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByProfileIdByGameId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session/get/by-profile-id/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameSession> objs = api.GetGameSessionListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionData() {
        

            ResponseGameSessionDataInt wrapper = new ResponseGameSessionDataInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session-data/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameSessionData(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionDataByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameSessionDataInt wrapper = new ResponseGameSessionDataInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session-data/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameSessionDataByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameSessionDataListByFilter()  {
        
            ResponseGameSessionDataList wrapper = new ResponseGameSessionDataList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session-data/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameSessionDataResult result = api.BrowseGameSessionDataListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameSessionDataByUuid()  {
        
            ResponseGameSessionDataBool wrapper = new ResponseGameSessionDataBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session-data/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            GameSessionData obj = new GameSessionData();
            
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
            
            string _data_results = util.GetParamValue(_context, "@data_results");
            if(!String.IsNoneOrEmpty(_data_results))
                obj.data_results = ()_data_results;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _data_layer_projectile = util.GetParamValue(_context, "@data_layer_projectile");
            if(!String.IsNoneOrEmpty(_data_layer_projectile))
                obj.data_layer_projectile = ()_data_layer_projectile;
            
            string _data_layer_actors = util.GetParamValue(_context, "@data_layer_actors");
            if(!String.IsNoneOrEmpty(_data_layer_actors))
                obj.data_layer_actors = ()_data_layer_actors;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _data_layer_enemy = util.GetParamValue(_context, "@data_layer_enemy");
            if(!String.IsNoneOrEmpty(_data_layer_enemy))
                obj.data_layer_enemy = ()_data_layer_enemy;
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetGameSessionDataByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameSessionDataByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameSessionDataBool wrapper = new ResponseGameSessionDataBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session-data/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameSessionDataByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionDataList() {
        

            ResponseGameSessionDataList wrapper = new ResponseGameSessionDataList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session-data/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameSessionData> objs = api.GetGameSessionDataList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionDataListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameSessionDataList wrapper = new ResponseGameSessionDataList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-session-data/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameSessionData> objs = api.GetGameSessionDataListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameApp() {
        

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameAppByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/count/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameAppByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/count/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameAppByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByGameIdByAppId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/count/by-game-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountGameAppByGameIdByAppId(
                _game_id
                , _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameAppListByFilter()  {
        
            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            GameAppResult result = api.BrowseGameAppListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameAppByUuid()  {
        
            ResponseGameAppBool wrapper = new ResponseGameAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            GameApp obj = new GameApp();
            
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
            
            string _game_id = util.GetParamValue(_context, "@game_id");
            if(!String.IsNoneOrEmpty(_game_id))
                obj.game_id = ()_game_id;
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetGameAppByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameAppBool wrapper = new ResponseGameAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelGameAppByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppList() {
        

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameApp> objs = api.GetGameAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameApp> objs = api.GetGameAppListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByGameId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/get/by-game-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameApp> objs = api.GetGameAppListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/get/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameApp> objs = api.GetGameAppListByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByGameIdByAppId() {
        
             _game_id = ()util.GetParamValue(_context, "@game_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "game-app/get/by-game-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<GameApp> objs = api.GetGameAppListByGameIdByAppId(
                _game_id
                , _app_id
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
                    
        public virtual void CountOfferByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferInt wrapper = new ResponseOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferListByFilter()  {
        
            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferResult result = api.BrowseOfferListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferByUuid()  {
        
            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOfferByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferBool wrapper = new ResponseOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/del/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferByOrgId(
                        
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
                    
        public virtual void GetOfferListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferList wrapper = new ResponseOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Offer> objs = api.GetOfferListByOrgId(
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
                    
        public virtual void CountOfferTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferTypeByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferTypeInt wrapper = new ResponseOfferTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferTypeByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferTypeListByFilter()  {
        
            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferTypeResult result = api.BrowseOfferTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferTypeByUuid()  {
        
            ResponseOfferTypeBool wrapper = new ResponseOfferTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOfferTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferTypeBool wrapper = new ResponseOfferTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferTypeByUuid(
                        
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
                    
        public virtual void GetOfferTypeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferType> objs = api.GetOfferTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferType> objs = api.GetOfferTypeListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferTypeListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferTypeList wrapper = new ResponseOfferTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-type/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferType> objs = api.GetOfferTypeListByName(
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
                    
        public virtual void CountOfferLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationByOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/by-offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationByOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationByCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/by-city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationByCity(
                _city
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationByCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/by-country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationByCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferLocationByPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseOfferLocationInt wrapper = new ResponseOfferLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/count/by-postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferLocationByPostalCode(
                _postal_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferLocationListByFilter()  {
        
            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferLocationResult result = api.BrowseOfferLocationListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferLocationByUuid()  {
        
            ResponseOfferLocationBool wrapper = new ResponseOfferLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/set/by-uuid";
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
            
            string _offer_id = util.GetParamValue(_context, "@offer_id");
            if(!String.IsNoneOrEmpty(_offer_id))
                obj.offer_id = ()_offer_id;
            
            string _address2 = util.GetParamValue(_context, "@address2");
            if(!String.IsNoneOrEmpty(_address2))
                obj.address2 = ()_address2;
            
            
            // get data
            wrapper.data = api.SetOfferLocationByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferLocationBool wrapper = new ResponseOfferLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferLocationByUuid(
                        
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
                    
        public virtual void GetOfferLocationListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListByOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/by-offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListByOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListByCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/by-city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListByCity(
                _city
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListByCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/by-country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListByCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferLocationListByPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseOfferLocationList wrapper = new ResponseOfferLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-location/get/by-postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferLocation> objs = api.GetOfferLocationListByPostalCode(
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
                    
        public virtual void CountOfferCategoryByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryInt wrapper = new ResponseOfferCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/count/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryByOrgIdByTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferCategoryListByFilter()  {
        
            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferCategoryResult result = api.BrowseOfferCategoryListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferCategoryByUuid()  {
        
            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetOfferCategoryByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryByCodeByOrgId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/del/by-code/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryByCodeByOrgId(
                        
                _code
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryByCodeByOrgIdByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryBool wrapper = new ResponseOfferCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/del/by-code/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryByCodeByOrgIdByTypeId(
                        
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
                    
        public virtual void GetOfferCategoryListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryListByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseOfferCategoryList wrapper = new ResponseOfferCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category/get/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategory> objs = api.GetOfferCategoryListByOrgIdByTypeId(
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
                    
        public virtual void CountOfferCategoryTreeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryTreeByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeInt wrapper = new ResponseOfferCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/count/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryTreeByParentIdByCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferCategoryTreeListByFilter()  {
        
            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferCategoryTreeResult result = api.BrowseOfferCategoryTreeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferCategoryTreeByUuid()  {
        
            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/set/by-uuid";
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
            
            
            // get data
            wrapper.data = api.SetOfferCategoryTreeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeByParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeByCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryTreeByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeBool wrapper = new ResponseOfferCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/del/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryTreeByParentIdByCategoryId(
                        
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
                    
        public virtual void GetOfferCategoryTreeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryTreeListByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryTreeList wrapper = new ResponseOfferCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-tree/get/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryTree> objs = api.GetOfferCategoryTreeListByParentIdByCategoryId(
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
                    
        public virtual void CountOfferCategoryAssocByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocByOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/by-offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocByOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferCategoryAssocByOfferIdByCategoryId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocInt wrapper = new ResponseOfferCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/count/by-offer-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferCategoryAssocByOfferIdByCategoryId(
                _offer_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferCategoryAssocListByFilter()  {
        
            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferCategoryAssocResult result = api.BrowseOfferCategoryAssocListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferCategoryAssocByUuid()  {
        
            ResponseOfferCategoryAssocBool wrapper = new ResponseOfferCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/set/by-uuid";
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
            
            
            // get data
            wrapper.data = api.SetOfferCategoryAssocByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferCategoryAssocByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryAssocBool wrapper = new ResponseOfferCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferCategoryAssocByUuid(
                        
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
                    
        public virtual void GetOfferCategoryAssocListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListByOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/by-offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListByOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferCategoryAssocListByOfferIdByCategoryId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseOfferCategoryAssocList wrapper = new ResponseOfferCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-category-assoc/get/by-offer-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferCategoryAssoc> objs = api.GetOfferCategoryAssocListByOfferIdByCategoryId(
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
                    
        public virtual void CountOfferGameLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationByGameLocationId() {
        
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationByGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationByOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/by-offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationByOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOfferGameLocationByOfferIdByGameLocationId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationInt wrapper = new ResponseOfferGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/count/by-offer-id/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOfferGameLocationByOfferIdByGameLocationId(
                _offer_id
                , _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOfferGameLocationListByFilter()  {
        
            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OfferGameLocationResult result = api.BrowseOfferGameLocationListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOfferGameLocationByUuid()  {
        
            ResponseOfferGameLocationBool wrapper = new ResponseOfferGameLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            OfferGameLocation obj = new OfferGameLocation();
            
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
            
            string _offer_id = util.GetParamValue(_context, "@offer_id");
            if(!String.IsNoneOrEmpty(_offer_id))
                obj.offer_id = ()_offer_id;
            
            string _type_id = util.GetParamValue(_context, "@type_id");
            if(!String.IsNoneOrEmpty(_type_id))
                obj.type_id = ()_type_id;
            
            string _game_location_id = util.GetParamValue(_context, "@game_location_id");
            if(!String.IsNoneOrEmpty(_game_location_id))
                obj.game_location_id = ()_game_location_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            
            // get data
            wrapper.data = api.SetOfferGameLocationByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOfferGameLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferGameLocationBool wrapper = new ResponseOfferGameLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOfferGameLocationByUuid(
                        
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
                    
        public virtual void GetOfferGameLocationListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListByGameLocationId() {
        
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListByGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListByOfferId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/by-offer-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListByOfferId(
                _offer_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOfferGameLocationListByOfferIdByGameLocationId() {
        
             _offer_id = ()util.GetParamValue(_context, "@offer_id");
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseOfferGameLocationList wrapper = new ResponseOfferGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "offer-game-location/get/by-offer-id/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OfferGameLocation> objs = api.GetOfferGameLocationListByOfferIdByGameLocationId(
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
                    
        public virtual void CountEventInfoByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventInfoByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventInfoInt wrapper = new ResponseEventInfoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventInfoByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventInfoListByFilter()  {
        
            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventInfoResult result = api.BrowseEventInfoListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventInfoByUuid()  {
        
            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetEventInfoByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventInfoByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventInfoByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventInfoByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventInfoBool wrapper = new ResponseEventInfoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/del/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventInfoByOrgId(
                        
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
                    
        public virtual void GetEventInfoListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventInfoListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventInfoList wrapper = new ResponseEventInfoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-info/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventInfo> objs = api.GetEventInfoListByOrgId(
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
                    
        public virtual void CountEventLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationByEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/by-event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationByEventId(
                _event_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationByCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/by-city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationByCity(
                _city
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationByCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/by-country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationByCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventLocationByPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseEventLocationInt wrapper = new ResponseEventLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/count/by-postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventLocationByPostalCode(
                _postal_code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventLocationListByFilter()  {
        
            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventLocationResult result = api.BrowseEventLocationListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventLocationByUuid()  {
        
            ResponseEventLocationBool wrapper = new ResponseEventLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/set/by-uuid";
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
            
            string _address2 = util.GetParamValue(_context, "@address2");
            if(!String.IsNoneOrEmpty(_address2))
                obj.address2 = ()_address2;
            
            
            // get data
            wrapper.data = api.SetEventLocationByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventLocationBool wrapper = new ResponseEventLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventLocationByUuid(
                        
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
                    
        public virtual void GetEventLocationListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListByEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/by-event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListByEventId(
                _event_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListByCity() {
        
             _city = ()util.GetParamValue(_context, "@city");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/by-city";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListByCity(
                _city
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListByCountryCode() {
        
             _country_code = ()util.GetParamValue(_context, "@country_code");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/by-country-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListByCountryCode(
                _country_code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventLocationListByPostalCode() {
        
             _postal_code = ()util.GetParamValue(_context, "@postal_code");

            ResponseEventLocationList wrapper = new ResponseEventLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-location/get/by-postal-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventLocation> objs = api.GetEventLocationListByPostalCode(
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
                    
        public virtual void CountEventCategoryByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryInt wrapper = new ResponseEventCategoryInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/count/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryByOrgIdByTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventCategoryListByFilter()  {
        
            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventCategoryResult result = api.BrowseEventCategoryListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventCategoryByUuid()  {
        
            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetEventCategoryByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryByCodeByOrgId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/del/by-code/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryByCodeByOrgId(
                        
                _code
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryByCodeByOrgIdByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryBool wrapper = new ResponseEventCategoryBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/del/by-code/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryByCodeByOrgIdByTypeId(
                        
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
                    
        public virtual void GetEventCategoryListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryListByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseEventCategoryList wrapper = new ResponseEventCategoryList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category/get/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategory> objs = api.GetEventCategoryListByOrgIdByTypeId(
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
                    
        public virtual void CountEventCategoryTreeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryTreeByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeInt wrapper = new ResponseEventCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/count/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryTreeByParentIdByCategoryId(
                _parent_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventCategoryTreeListByFilter()  {
        
            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventCategoryTreeResult result = api.BrowseEventCategoryTreeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventCategoryTreeByUuid()  {
        
            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/set/by-uuid";
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
            
            
            // get data
            wrapper.data = api.SetEventCategoryTreeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeByParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeByCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryTreeByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeBool wrapper = new ResponseEventCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/del/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryTreeByParentIdByCategoryId(
                        
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
                    
        public virtual void GetEventCategoryTreeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListByParentId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/by-parent-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryTreeListByParentIdByCategoryId() {
        
             _parent_id = ()util.GetParamValue(_context, "@parent_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryTreeList wrapper = new ResponseEventCategoryTreeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-tree/get/by-parent-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryTree> objs = api.GetEventCategoryTreeListByParentIdByCategoryId(
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
                    
        public virtual void CountEventCategoryAssocByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocByEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/by-event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocByEventId(
                _event_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountEventCategoryAssocByEventIdByCategoryId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocInt wrapper = new ResponseEventCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/count/by-event-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountEventCategoryAssocByEventIdByCategoryId(
                _event_id
                , _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseEventCategoryAssocListByFilter()  {
        
            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            EventCategoryAssocResult result = api.BrowseEventCategoryAssocListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetEventCategoryAssocByUuid()  {
        
            ResponseEventCategoryAssocBool wrapper = new ResponseEventCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/set/by-uuid";
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
            
            
            // get data
            wrapper.data = api.SetEventCategoryAssocByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelEventCategoryAssocByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryAssocBool wrapper = new ResponseEventCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelEventCategoryAssocByUuid(
                        
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
                    
        public virtual void GetEventCategoryAssocListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListByEventId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/by-event-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListByEventId(
                _event_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListByCategoryId() {
        
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetEventCategoryAssocListByEventIdByCategoryId() {
        
             _event_id = ()util.GetParamValue(_context, "@event_id");
             _category_id = ()util.GetParamValue(_context, "@category_id");

            ResponseEventCategoryAssocList wrapper = new ResponseEventCategoryAssocList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "event-category-assoc/get/by-event-id/by-category-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<EventCategoryAssoc> objs = api.GetEventCategoryAssocListByEventIdByCategoryId(
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
                    
        public virtual void CountChannelByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelInt wrapper = new ResponseChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/count/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelByOrgIdByTypeId(
                _org_id
                , _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseChannelListByFilter()  {
        
            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ChannelResult result = api.BrowseChannelListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetChannelByUuid()  {
        
            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/set/by-uuid";
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
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetChannelByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelByCodeByOrgId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/del/by-code/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelByCodeByOrgId(
                        
                _code
                , _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelByCodeByOrgIdByTypeId() {
        
             _code = ()util.GetParamValue(_context, "@code");
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelBool wrapper = new ResponseChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/del/by-code/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelByCodeByOrgIdByTypeId(
                        
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
                    
        public virtual void GetChannelListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListByTypeId() {
        
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelListByOrgIdByTypeId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _type_id = ()util.GetParamValue(_context, "@type_id");

            ResponseChannelList wrapper = new ResponseChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel/get/by-org-id/by-type-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Channel> objs = api.GetChannelListByOrgIdByTypeId(
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
                    
        public virtual void CountChannelTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountChannelTypeByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelTypeInt wrapper = new ResponseChannelTypeInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountChannelTypeByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseChannelTypeListByFilter()  {
        
            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ChannelTypeResult result = api.BrowseChannelTypeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetChannelTypeByUuid()  {
        
            ResponseChannelTypeBool wrapper = new ResponseChannelTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/set/by-uuid";
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
            wrapper.data = api.SetChannelTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelChannelTypeByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelTypeBool wrapper = new ResponseChannelTypeBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelChannelTypeByUuid(
                        
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
                    
        public virtual void GetChannelTypeListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ChannelType> objs = api.GetChannelTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ChannelType> objs = api.GetChannelTypeListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetChannelTypeListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseChannelTypeList wrapper = new ResponseChannelTypeList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "channel-type/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ChannelType> objs = api.GetChannelTypeListByName(
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
                    
        public virtual void CountQuestionByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionByChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/by-channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionByChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionByChannelIdByOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/by-channel-id/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionByChannelIdByOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountQuestionByChannelIdByCode() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionInt wrapper = new ResponseQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/count/by-channel-id/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountQuestionByChannelIdByCode(
                _channel_id
                , _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseQuestionListByFilter()  {
        
            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            QuestionResult result = api.BrowseQuestionListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetQuestionByUuid()  {
        
            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/set/by-uuid";
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
            wrapper.data = api.SetQuestionByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetQuestionByChannelIdByCode()  {
        
            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/set/by-channel-id/by-code";
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
            wrapper.data = api.SetQuestionByChannelIdByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelQuestionByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelQuestionByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelQuestionByChannelIdByOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionBool wrapper = new ResponseQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/del/by-channel-id/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelQuestionByChannelIdByOrgId(
                        
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
                    
        public virtual void GetQuestionListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListByCode() {
        
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListByName() {
        
             _name = ()util.GetParamValue(_context, "@name");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-name";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListByType() {
        
             _type = ()util.GetParamValue(_context, "@type");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-type";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByType(
                _type
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListByChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListByChannelIdByOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-channel-id/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByChannelIdByOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetQuestionListByChannelIdByCode() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _code = ()util.GetParamValue(_context, "@code");

            ResponseQuestionList wrapper = new ResponseQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "question/get/by-channel-id/by-code";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Question> objs = api.GetQuestionListByChannelIdByCode(
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
                    
        public virtual void CountProfileOfferByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOfferInt wrapper = new ResponseProfileOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOfferByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOfferByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOfferInt wrapper = new ResponseProfileOfferInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOfferByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileOfferListByFilter()  {
        
            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileOfferResult result = api.BrowseProfileOfferListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileOfferByUuid()  {
        
            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileOffer obj = new ProfileOffer();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _url = util.GetParamValue(_context, "@url");
            if(!String.IsNoneOrEmpty(_url))
                obj.url = ()_url;
            
            string _offer_id = util.GetParamValue(_context, "@offer_id");
            if(!String.IsNoneOrEmpty(_offer_id))
                obj.offer_id = ()_offer_id;
            
            string _redeem_code = util.GetParamValue(_context, "@redeem_code");
            if(!String.IsNoneOrEmpty(_redeem_code))
                obj.redeem_code = ()_redeem_code;
            
            string _redeemed = util.GetParamValue(_context, "@redeemed");
            if(!String.IsNoneOrEmpty(_redeemed))
                obj.redeemed = ()_redeemed;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            
            // get data
            wrapper.data = api.SetProfileOfferByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOfferByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileOfferByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOfferByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOfferBool wrapper = new ResponseProfileOfferBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/del/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileOfferByProfileId(
                        
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
                    
        public virtual void GetProfileOfferListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOffer> objs = api.GetProfileOfferListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOfferListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOfferList wrapper = new ResponseProfileOfferList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-offer/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOffer> objs = api.GetProfileOfferListByProfileId(
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
                    
        public virtual void CountProfileAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileAppInt wrapper = new ResponseProfileAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileAppByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileAppByProfileIdByAppId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppInt wrapper = new ResponseProfileAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/count/by-profile-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileAppByProfileIdByAppId(
                _profile_id
                , _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileAppListByFilter()  {
        
            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileAppResult result = api.BrowseProfileAppListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAppByUuid()  {
        
            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/set/by-uuid";
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetProfileAppByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileAppByProfileIdByAppId()  {
        
            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/set/by-profile-id/by-app-id";
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetProfileAppByProfileIdByAppId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileAppByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileAppByProfileIdByAppId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppBool wrapper = new ResponseProfileAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/del/by-profile-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileAppByProfileIdByAppId(
                        
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
                    
        public virtual void GetProfileAppListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileAppListByProfileIdByAppId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseProfileAppList wrapper = new ResponseProfileAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-app/get/by-profile-id/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileApp> objs = api.GetProfileAppListByProfileIdByAppId(
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
                    
        public virtual void CountProfileOrgByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOrgByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOrgByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileOrgByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOrgInt wrapper = new ResponseProfileOrgInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileOrgByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileOrgListByFilter()  {
        
            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileOrgResult result = api.BrowseProfileOrgListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileOrgByUuid()  {
        
            ResponseProfileOrgBool wrapper = new ResponseProfileOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/set/by-uuid";
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
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            
            // get data
            wrapper.data = api.SetProfileOrgByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileOrgByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOrgBool wrapper = new ResponseProfileOrgBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileOrgByUuid(
                        
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
                    
        public virtual void GetProfileOrgListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOrg> objs = api.GetProfileOrgListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOrg> objs = api.GetProfileOrgListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileOrgListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileOrgList wrapper = new ResponseProfileOrgList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-org/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileOrg> objs = api.GetProfileOrgListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocation() {
        

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/count";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameLocationByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByGameLocationId() {
        
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/count/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameLocationByGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameLocationByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByProfileIdByGameLocationId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/count/by-profile-id/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileGameLocationByProfileIdByGameLocationId(
                _profile_id
                , _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileGameLocationListByFilter()  {
        
            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileGameLocationResult result = api.BrowseProfileGameLocationListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileGameLocationByUuid()  {
        
            ResponseProfileGameLocationBool wrapper = new ResponseProfileGameLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileGameLocation obj = new ProfileGameLocation();
            
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
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _game_location_id = util.GetParamValue(_context, "@game_location_id");
            if(!String.IsNoneOrEmpty(_game_location_id))
                obj.game_location_id = ()_game_location_id;
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            
            // get data
            wrapper.data = api.SetProfileGameLocationByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameLocationByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameLocationBool wrapper = new ResponseProfileGameLocationBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileGameLocationByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationList() {
        

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/get";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameLocation> objs = api.GetProfileGameLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByGameLocationId() {
        
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/get/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByProfileIdByGameLocationId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");
             _game_location_id = ()util.GetParamValue(_context, "@game_location_id");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-game-location/get/by-profile-id/by-game-location-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByProfileIdByGameLocationId(
                _profile_id
                , _game_location_id
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
                    
        public virtual void CountProfileQuestionByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionByChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionByQuestionId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-question-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByQuestionId(
                _question_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionByChannelIdByOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-channel-id/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByChannelIdByOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionByChannelIdByProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-channel-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByChannelIdByProfileId(
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileQuestionByQuestionIdByProfileId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionInt wrapper = new ResponseProfileQuestionInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/count/by-question-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileQuestionByQuestionIdByProfileId(
                _question_id
                , _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileQuestionListByFilter()  {
        
            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileQuestionResult result = api.BrowseProfileQuestionListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionByUuid()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
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
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionByChannelIdByProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/by-channel-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
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
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionByChannelIdByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionByQuestionIdByProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/by-question-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
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
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionByQuestionIdByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileQuestionByChannelIdByQuestionIdByProfileId()  {
        
            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/set/by-channel-id/by-question-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
                        
            ProfileQuestion obj = new ProfileQuestion();
            
            string _status = util.GetParamValue(_context, "@status");
            if(!String.IsNoneOrEmpty(_status))
                obj.status = ()_status;
            
            string _answer = util.GetParamValue(_context, "@answer");
            if(!String.IsNoneOrEmpty(_answer))
                obj.answer = ()_answer;
            
            string _uuid = util.GetParamValue(_context, "@uuid");
            if(!String.IsNoneOrEmpty(_uuid))
                obj.uuid = ()_uuid;
            
            string _date_modified = util.GetParamValue(_context, "@date_modified");
            if(!String.IsNoneOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_id = util.GetParamValue(_context, "@profile_id");
            if(!String.IsNoneOrEmpty(_profile_id))
                obj.profile_id = ()_profile_id;
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
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
            
            string _data = util.GetParamValue(_context, "@data");
            if(!String.IsNoneOrEmpty(_data))
                obj.data = ()_data;
            
            string _question_id = util.GetParamValue(_context, "@question_id");
            if(!String.IsNoneOrEmpty(_question_id))
                obj.question_id = ()_question_id;
            
            
            // get data
            wrapper.data = api.SetProfileQuestionByChannelIdByQuestionIdByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileQuestionByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileQuestionByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileQuestionByChannelIdByOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionBool wrapper = new ResponseProfileQuestionBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/del/by-channel-id/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileQuestionByChannelIdByOrgId(
                        
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
                    
        public virtual void GetProfileQuestionListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListByChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListByQuestionId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-question-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByQuestionId(
                _question_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListByChannelIdByOrgId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-channel-id/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByChannelIdByOrgId(
                _channel_id
                , _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListByChannelIdByProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-channel-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByChannelIdByProfileId(
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileQuestionListByQuestionIdByProfileId() {
        
             _question_id = ()util.GetParamValue(_context, "@question_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileQuestionList wrapper = new ResponseProfileQuestionList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-question/get/by-question-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileQuestion> objs = api.GetProfileQuestionListByQuestionIdByProfileId(
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
                    
        public virtual void CountProfileChannelByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelByChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/by-channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelByChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileChannelByChannelIdByProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelInt wrapper = new ResponseProfileChannelInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/count/by-channel-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountProfileChannelByChannelIdByProfileId(
                _channel_id
                , _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileChannelListByFilter()  {
        
            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            ProfileChannelResult result = api.BrowseProfileChannelListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileChannelByUuid()  {
        
            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/set/by-uuid";
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
            
            
            // get data
            wrapper.data = api.SetProfileChannelByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileChannelByChannelIdByProfileId()  {
        
            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/set/by-channel-id/by-profile-id";
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
            
            
            // get data
            wrapper.data = api.SetProfileChannelByChannelIdByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileChannelByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileChannelByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileChannelByChannelIdByProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelBool wrapper = new ResponseProfileChannelBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/del/by-channel-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelProfileChannelByChannelIdByProfileId(
                        
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
                    
        public virtual void GetProfileChannelListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListByChannelId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/by-channel-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListByChannelId(
                _channel_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListByProfileId() {
        
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileChannelListByChannelIdByProfileId() {
        
             _channel_id = ()util.GetParamValue(_context, "@channel_id");
             _profile_id = ()util.GetParamValue(_context, "@profile_id");

            ResponseProfileChannelList wrapper = new ResponseProfileChannelList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "profile-channel/get/by-channel-id/by-profile-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<ProfileChannel> objs = api.GetProfileChannelListByChannelIdByProfileId(
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
                    
        public virtual void CountOrgSiteByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteBySiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteBySiteId(
                _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountOrgSiteByOrgIdBySiteId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteInt wrapper = new ResponseOrgSiteInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/count/by-org-id/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountOrgSiteByOrgIdBySiteId(
                _org_id
                , _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseOrgSiteListByFilter()  {
        
            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            OrgSiteResult result = api.BrowseOrgSiteListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgSiteByUuid()  {
        
            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/set/by-uuid";
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
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            
            // get data
            wrapper.data = api.SetOrgSiteByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetOrgSiteByOrgIdBySiteId()  {
        
            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/set/by-org-id/by-site-id";
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
            
            string _org_id = util.GetParamValue(_context, "@org_id");
            if(!String.IsNoneOrEmpty(_org_id))
                obj.org_id = ()_org_id;
            
            
            // get data
            wrapper.data = api.SetOrgSiteByOrgIdBySiteId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgSiteByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgSiteByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelOrgSiteByOrgIdBySiteId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteBool wrapper = new ResponseOrgSiteBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/del/by-org-id/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelOrgSiteByOrgIdBySiteId(
                        
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
                    
        public virtual void GetOrgSiteListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListByOrgId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/by-org-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListBySiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListBySiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetOrgSiteListByOrgIdBySiteId() {
        
             _org_id = ()util.GetParamValue(_context, "@org_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseOrgSiteList wrapper = new ResponseOrgSiteList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "org-site/get/by-org-id/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<OrgSite> objs = api.GetOrgSiteListByOrgIdBySiteId(
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
                    
        public virtual void CountSiteAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppBySiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppBySiteId(
                _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountSiteAppByAppIdBySiteId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppInt wrapper = new ResponseSiteAppInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/count/by-app-id/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountSiteAppByAppIdBySiteId(
                _app_id
                , _site_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseSiteAppListByFilter()  {
        
            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            SiteAppResult result = api.BrowseSiteAppListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteAppByUuid()  {
        
            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/set/by-uuid";
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetSiteAppByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetSiteAppByAppIdBySiteId()  {
        
            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/set/by-app-id/by-site-id";
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
            
            string _app_id = util.GetParamValue(_context, "@app_id");
            if(!String.IsNoneOrEmpty(_app_id))
                obj.app_id = ()_app_id;
            
            
            // get data
            wrapper.data = api.SetSiteAppByAppIdBySiteId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteAppByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteAppByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelSiteAppByAppIdBySiteId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppBool wrapper = new ResponseSiteAppBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/del/by-app-id/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelSiteAppByAppIdBySiteId(
                        
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
                    
        public virtual void GetSiteAppListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListByAppId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/by-app-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListBySiteId() {
        
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListBySiteId(
                _site_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetSiteAppListByAppIdBySiteId() {
        
             _app_id = ()util.GetParamValue(_context, "@app_id");
             _site_id = ()util.GetParamValue(_context, "@site_id");

            ResponseSiteAppList wrapper = new ResponseSiteAppList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "site-app/get/by-app-id/by-site-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<SiteApp> objs = api.GetSiteAppListByAppIdBySiteId(
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
                    
        public virtual void CountPhotoByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoByExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoByUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/by-url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoByUrlByExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/by-url/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountPhotoByUuidByExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoInt wrapper = new ResponsePhotoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/count/by-uuid/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountPhotoByUuidByExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowsePhotoListByFilter()  {
        
            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            PhotoResult result = api.BrowsePhotoListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoByUuid()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/by-uuid";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoByExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/by-external-id";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoByUrl()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/by-url";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoByUrlByExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/by-url/by-external-id";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoByUrlByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetPhotoByUuidByExternalId()  {
        
            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/set/by-uuid/by-external-id";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetPhotoByUuidByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoByExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoByExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoByUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/by-url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoByUrlByExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/by-url/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoByUrlByExternalId(
                        
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelPhotoByUuidByExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoBool wrapper = new ResponsePhotoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/del/by-uuid/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelPhotoByUuidByExternalId(
                        
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
                    
        public virtual void GetPhotoListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListByExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListByUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/by-url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListByUrlByExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/by-url/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetPhotoListByUuidByExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponsePhotoList wrapper = new ResponsePhotoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "photo/get/by-uuid/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Photo> objs = api.GetPhotoListByUuidByExternalId(
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
                    
        public virtual void CountVideoByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoByExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoByUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/by-url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoByUrlByExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/by-url/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountVideoByUuidByExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoInt wrapper = new ResponseVideoInt();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/count/by-uuid/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            int i = api.CountVideoByUuidByExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseVideoListByFilter()  {
        
            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/browse/by-filter";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "@page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "@page-size"));
            obj.filter = util.GetParamValue(_context, "@filter");
            
            VideoResult result = api.BrowseVideoListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoByUuid()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/by-uuid";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoByExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/by-external-id";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoByUrl()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/by-url";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoByUrlByExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/by-url/by-external-id";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoByUrlByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetVideoByUuidByExternalId()  {
        
            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/set/by-uuid/by-external-id";
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
            
            string _active = util.GetParamValue(_context, "@active");
            if(!String.IsNoneOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "@date_created");
            if(!String.IsNoneOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _external_id = util.GetParamValue(_context, "@external_id");
            if(!String.IsNoneOrEmpty(_external_id))
                obj.external_id = ()_external_id;
            
            string _description = util.GetParamValue(_context, "@description");
            if(!String.IsNoneOrEmpty(_description))
                obj.description = ()_description;
            
            
            // get data
            wrapper.data = api.SetVideoByUuidByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoByExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoByExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoByUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/by-url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoByUrlByExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/by-url/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoByUrlByExternalId(
                        
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelVideoByUuidByExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoBool wrapper = new ResponseVideoBool();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/del/by-uuid/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            bool completed = api.DelVideoByUuidByExternalId(
                        
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
                    
        public virtual void GetVideoListByUuid() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/by-uuid";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListByExternalId() {
        
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListByUrl() {
        
             _url = ()util.GetParamValue(_context, "@url");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/by-url";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListByUrlByExternalId() {
        
             _url = ()util.GetParamValue(_context, "@url");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/by-url/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetVideoListByUuidByExternalId() {
        
             _uuid = ()util.GetParamValue(_context, "@uuid");
             _external_id = ()util.GetParamValue(_context, "@external_id");

            ResponseVideoList wrapper = new ResponseVideoList();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = "video/get/by-uuid/by-external-id";
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);

            List<Video> objs = api.GetVideoListByUuidByExternalId(
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





