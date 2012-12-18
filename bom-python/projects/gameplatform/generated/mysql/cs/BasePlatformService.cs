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
            if(IsContext("profile-game-data-attribute/count")){
                CountProfileGameDataAttribute();
            }
            else if(IsContext("profile-game-data-attribute/count/by-uuid")){
                CountProfileGameDataAttributeByUuid();
            }
            else if(IsContext("profile-game-data-attribute/count/by-profile-id")){
                CountProfileGameDataAttributeByProfileId();
            }
            else if(IsContext("profile-game-data-attribute/count/by-profile-id/by-game-id/by-code")){
                CountProfileGameDataAttributeByProfileIdByGameIdByCode();
            }
            else if(IsContext("profile-game-data-attribute/browse/by-filter")){
                BrowseProfileGameDataAttributeListByFilter();
            }
            else if(IsContext("profile-game-data-attribute/set/by-uuid")){
                SetProfileGameDataAttributeByUuid();
            }
            else if(IsContext("profile-game-data-attribute/set/by-profile-id")){
                SetProfileGameDataAttributeByProfileId();
            }
            else if(IsContext("profile-game-data-attribute/set/by-profile-id/by-game-id/by-code")){
                SetProfileGameDataAttributeByProfileIdByGameIdByCode();
            }
            else if(IsContext("profile-game-data-attribute/del/by-uuid")){
                DelProfileGameDataAttributeByUuid();
            }
            else if(IsContext("profile-game-data-attribute/del/by-profile-id")){
                DelProfileGameDataAttributeByProfileId();
            }
            else if(IsContext("profile-game-data-attribute/del/by-profile-id/by-game-id/by-code")){
                DelProfileGameDataAttributeByProfileIdByGameIdByCode();
            }
            else if(IsContext("profile-game-data-attribute/get/by-uuid")){
                GetProfileGameDataAttributeListByUuid();
            }
            else if(IsContext("profile-game-data-attribute/get/by-profile-id")){
                GetProfileGameDataAttributeListByProfileId();
            }
            else if(IsContext("profile-game-data-attribute/get/by-profile-id/by-game-id/by-code")){
                GetProfileGameDataAttributeListByProfileIdByGameIdByCode();
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
            if(IsContext("game-content/count")){
                CountGameContent();
            }
            else if(IsContext("game-content/count/by-uuid")){
                CountGameContentByUuid();
            }
            else if(IsContext("game-content/count/by-game-id")){
                CountGameContentByGameId();
            }
            else if(IsContext("game-content/count/by-game-id/by-path")){
                CountGameContentByGameIdByPath();
            }
            else if(IsContext("game-content/count/by-game-id/by-path/by-version")){
                CountGameContentByGameIdByPathByVersion();
            }
            else if(IsContext("game-content/count/by-game-id/by-path/by-version/by-platform/by-increment")){
                CountGameContentByGameIdByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-content/browse/by-filter")){
                BrowseGameContentListByFilter();
            }
            else if(IsContext("game-content/set/by-uuid")){
                SetGameContentByUuid();
            }
            else if(IsContext("game-content/set/by-game-id")){
                SetGameContentByGameId();
            }
            else if(IsContext("game-content/set/by-game-id/by-path")){
                SetGameContentByGameIdByPath();
            }
            else if(IsContext("game-content/set/by-game-id/by-path/by-version")){
                SetGameContentByGameIdByPathByVersion();
            }
            else if(IsContext("game-content/set/by-game-id/by-path/by-version/by-platform/by-increment")){
                SetGameContentByGameIdByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-content/del/by-uuid")){
                DelGameContentByUuid();
            }
            else if(IsContext("game-content/del/by-game-id")){
                DelGameContentByGameId();
            }
            else if(IsContext("game-content/del/by-game-id/by-path")){
                DelGameContentByGameIdByPath();
            }
            else if(IsContext("game-content/del/by-game-id/by-path/by-version")){
                DelGameContentByGameIdByPathByVersion();
            }
            else if(IsContext("game-content/del/by-game-id/by-path/by-version/by-platform/by-increment")){
                DelGameContentByGameIdByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-content/get")){
                GetGameContentList();
            }
            else if(IsContext("game-content/get/by-uuid")){
                GetGameContentListByUuid();
            }
            else if(IsContext("game-content/get/by-game-id")){
                GetGameContentListByGameId();
            }
            else if(IsContext("game-content/get/by-game-id/by-path")){
                GetGameContentListByGameIdByPath();
            }
            else if(IsContext("game-content/get/by-game-id/by-path/by-version")){
                GetGameContentListByGameIdByPathByVersion();
            }
            else if(IsContext("game-content/get/by-game-id/by-path/by-version/by-platform/by-increment")){
                GetGameContentListByGameIdByPathByVersionByPlatformByIncrement();
            }
            if(IsContext("game-profile-content/count")){
                CountGameProfileContent();
            }
            else if(IsContext("game-profile-content/count/by-uuid")){
                CountGameProfileContentByUuid();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-profile-id")){
                CountGameProfileContentByGameIdByProfileId();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-username")){
                CountGameProfileContentByGameIdByUsername();
            }
            else if(IsContext("game-profile-content/count/by-username")){
                CountGameProfileContentByUsername();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-profile-id/by-path")){
                CountGameProfileContentByGameIdByProfileIdByPath();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-profile-id/by-path/by-version")){
                CountGameProfileContentByGameIdByProfileIdByPathByVersion();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment")){
                CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-username/by-path")){
                CountGameProfileContentByGameIdByUsernameByPath();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-username/by-path/by-version")){
                CountGameProfileContentByGameIdByUsernameByPathByVersion();
            }
            else if(IsContext("game-profile-content/count/by-game-id/by-username/by-path/by-version/by-platform/by-increment")){
                CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-profile-content/browse/by-filter")){
                BrowseGameProfileContentListByFilter();
            }
            else if(IsContext("game-profile-content/set/by-uuid")){
                SetGameProfileContentByUuid();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-profile-id")){
                SetGameProfileContentByGameIdByProfileId();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-username")){
                SetGameProfileContentByGameIdByUsername();
            }
            else if(IsContext("game-profile-content/set/by-username")){
                SetGameProfileContentByUsername();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-profile-id/by-path")){
                SetGameProfileContentByGameIdByProfileIdByPath();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-profile-id/by-path/by-version")){
                SetGameProfileContentByGameIdByProfileIdByPathByVersion();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment")){
                SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-username/by-path")){
                SetGameProfileContentByGameIdByUsernameByPath();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-username/by-path/by-version")){
                SetGameProfileContentByGameIdByUsernameByPathByVersion();
            }
            else if(IsContext("game-profile-content/set/by-game-id/by-username/by-path/by-version/by-platform/by-increment")){
                SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-profile-content/del/by-uuid")){
                DelGameProfileContentByUuid();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-profile-id")){
                DelGameProfileContentByGameIdByProfileId();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-username")){
                DelGameProfileContentByGameIdByUsername();
            }
            else if(IsContext("game-profile-content/del/by-username")){
                DelGameProfileContentByUsername();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-profile-id/by-path")){
                DelGameProfileContentByGameIdByProfileIdByPath();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-profile-id/by-path/by-version")){
                DelGameProfileContentByGameIdByProfileIdByPathByVersion();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment")){
                DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-username/by-path")){
                DelGameProfileContentByGameIdByUsernameByPath();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-username/by-path/by-version")){
                DelGameProfileContentByGameIdByUsernameByPathByVersion();
            }
            else if(IsContext("game-profile-content/del/by-game-id/by-username/by-path/by-version/by-platform/by-increment")){
                DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-profile-content/get")){
                GetGameProfileContentList();
            }
            else if(IsContext("game-profile-content/get/by-uuid")){
                GetGameProfileContentListByUuid();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-profile-id")){
                GetGameProfileContentListByGameIdByProfileId();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-username")){
                GetGameProfileContentListByGameIdByUsername();
            }
            else if(IsContext("game-profile-content/get/by-username")){
                GetGameProfileContentListByUsername();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-profile-id/by-path")){
                GetGameProfileContentListByGameIdByProfileIdByPath();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-profile-id/by-path/by-version")){
                GetGameProfileContentListByGameIdByProfileIdByPathByVersion();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment")){
                GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-username/by-path")){
                GetGameProfileContentListByGameIdByUsernameByPath();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-username/by-path/by-version")){
                GetGameProfileContentListByGameIdByUsernameByPathByVersion();
            }
            else if(IsContext("game-profile-content/get/by-game-id/by-username/by-path/by-version/by-platform/by-increment")){
                GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement();
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
            if(IsContext("game-photo/count")){
                CountGamePhoto();
            }
            else if(IsContext("game-photo/count/by-uuid")){
                CountGamePhotoByUuid();
            }
            else if(IsContext("game-photo/count/by-external-id")){
                CountGamePhotoByExternalId();
            }
            else if(IsContext("game-photo/count/by-url")){
                CountGamePhotoByUrl();
            }
            else if(IsContext("game-photo/count/by-url/by-external-id")){
                CountGamePhotoByUrlByExternalId();
            }
            else if(IsContext("game-photo/count/by-uuid/by-external-id")){
                CountGamePhotoByUuidByExternalId();
            }
            else if(IsContext("game-photo/browse/by-filter")){
                BrowseGamePhotoListByFilter();
            }
            else if(IsContext("game-photo/set/by-uuid")){
                SetGamePhotoByUuid();
            }
            else if(IsContext("game-photo/set/by-external-id")){
                SetGamePhotoByExternalId();
            }
            else if(IsContext("game-photo/set/by-url")){
                SetGamePhotoByUrl();
            }
            else if(IsContext("game-photo/set/by-url/by-external-id")){
                SetGamePhotoByUrlByExternalId();
            }
            else if(IsContext("game-photo/set/by-uuid/by-external-id")){
                SetGamePhotoByUuidByExternalId();
            }
            else if(IsContext("game-photo/del/by-uuid")){
                DelGamePhotoByUuid();
            }
            else if(IsContext("game-photo/del/by-external-id")){
                DelGamePhotoByExternalId();
            }
            else if(IsContext("game-photo/del/by-url")){
                DelGamePhotoByUrl();
            }
            else if(IsContext("game-photo/del/by-url/by-external-id")){
                DelGamePhotoByUrlByExternalId();
            }
            else if(IsContext("game-photo/del/by-uuid/by-external-id")){
                DelGamePhotoByUuidByExternalId();
            }
            else if(IsContext("game-photo/get")){
                GetGamePhotoList();
            }
            else if(IsContext("game-photo/get/by-uuid")){
                GetGamePhotoListByUuid();
            }
            else if(IsContext("game-photo/get/by-external-id")){
                GetGamePhotoListByExternalId();
            }
            else if(IsContext("game-photo/get/by-url")){
                GetGamePhotoListByUrl();
            }
            else if(IsContext("game-photo/get/by-url/by-external-id")){
                GetGamePhotoListByUrlByExternalId();
            }
            else if(IsContext("game-photo/get/by-uuid/by-external-id")){
                GetGamePhotoListByUuidByExternalId();
            }
            if(IsContext("game-video/count")){
                CountGameVideo();
            }
            else if(IsContext("game-video/count/by-uuid")){
                CountGameVideoByUuid();
            }
            else if(IsContext("game-video/count/by-external-id")){
                CountGameVideoByExternalId();
            }
            else if(IsContext("game-video/count/by-url")){
                CountGameVideoByUrl();
            }
            else if(IsContext("game-video/count/by-url/by-external-id")){
                CountGameVideoByUrlByExternalId();
            }
            else if(IsContext("game-video/count/by-uuid/by-external-id")){
                CountGameVideoByUuidByExternalId();
            }
            else if(IsContext("game-video/browse/by-filter")){
                BrowseGameVideoListByFilter();
            }
            else if(IsContext("game-video/set/by-uuid")){
                SetGameVideoByUuid();
            }
            else if(IsContext("game-video/set/by-external-id")){
                SetGameVideoByExternalId();
            }
            else if(IsContext("game-video/set/by-url")){
                SetGameVideoByUrl();
            }
            else if(IsContext("game-video/set/by-url/by-external-id")){
                SetGameVideoByUrlByExternalId();
            }
            else if(IsContext("game-video/set/by-uuid/by-external-id")){
                SetGameVideoByUuidByExternalId();
            }
            else if(IsContext("game-video/del/by-uuid")){
                DelGameVideoByUuid();
            }
            else if(IsContext("game-video/del/by-external-id")){
                DelGameVideoByExternalId();
            }
            else if(IsContext("game-video/del/by-url")){
                DelGameVideoByUrl();
            }
            else if(IsContext("game-video/del/by-url/by-external-id")){
                DelGameVideoByUrlByExternalId();
            }
            else if(IsContext("game-video/del/by-uuid/by-external-id")){
                DelGameVideoByUuidByExternalId();
            }
            else if(IsContext("game-video/get")){
                GetGameVideoList();
            }
            else if(IsContext("game-video/get/by-uuid")){
                GetGameVideoListByUuid();
            }
            else if(IsContext("game-video/get/by-external-id")){
                GetGameVideoListByExternalId();
            }
            else if(IsContext("game-video/get/by-url")){
                GetGameVideoListByUrl();
            }
            else if(IsContext("game-video/get/by-url/by-external-id")){
                GetGameVideoListByUrlByExternalId();
            }
            else if(IsContext("game-video/get/by-uuid/by-external-id")){
                GetGameVideoListByUuidByExternalId();
            }
            if(IsContext("game-rpg-item/count")){
                CountGameRpgItem();
            }
            else if(IsContext("game-rpg-item/count/by-uuid")){
                CountGameRpgItemByUuid();
            }
            else if(IsContext("game-rpg-item/count/by-game-id")){
                CountGameRpgItemByGameId();
            }
            else if(IsContext("game-rpg-item/count/by-url")){
                CountGameRpgItemByUrl();
            }
            else if(IsContext("game-rpg-item/count/by-url/by-game-id")){
                CountGameRpgItemByUrlByGameId();
            }
            else if(IsContext("game-rpg-item/count/by-uuid/by-game-id")){
                CountGameRpgItemByUuidByGameId();
            }
            else if(IsContext("game-rpg-item/browse/by-filter")){
                BrowseGameRpgItemListByFilter();
            }
            else if(IsContext("game-rpg-item/set/by-uuid")){
                SetGameRpgItemByUuid();
            }
            else if(IsContext("game-rpg-item/set/by-game-id")){
                SetGameRpgItemByGameId();
            }
            else if(IsContext("game-rpg-item/set/by-url")){
                SetGameRpgItemByUrl();
            }
            else if(IsContext("game-rpg-item/set/by-url/by-game-id")){
                SetGameRpgItemByUrlByGameId();
            }
            else if(IsContext("game-rpg-item/set/by-uuid/by-game-id")){
                SetGameRpgItemByUuidByGameId();
            }
            else if(IsContext("game-rpg-item/del/by-uuid")){
                DelGameRpgItemByUuid();
            }
            else if(IsContext("game-rpg-item/del/by-game-id")){
                DelGameRpgItemByGameId();
            }
            else if(IsContext("game-rpg-item/del/by-url")){
                DelGameRpgItemByUrl();
            }
            else if(IsContext("game-rpg-item/del/by-url/by-game-id")){
                DelGameRpgItemByUrlByGameId();
            }
            else if(IsContext("game-rpg-item/del/by-uuid/by-game-id")){
                DelGameRpgItemByUuidByGameId();
            }
            else if(IsContext("game-rpg-item/get")){
                GetGameRpgItemList();
            }
            else if(IsContext("game-rpg-item/get/by-uuid")){
                GetGameRpgItemListByUuid();
            }
            else if(IsContext("game-rpg-item/get/by-game-id")){
                GetGameRpgItemListByGameId();
            }
            else if(IsContext("game-rpg-item/get/by-url")){
                GetGameRpgItemListByUrl();
            }
            else if(IsContext("game-rpg-item/get/by-url/by-game-id")){
                GetGameRpgItemListByUrlByGameId();
            }
            else if(IsContext("game-rpg-item/get/by-uuid/by-game-id")){
                GetGameRpgItemListByUuidByGameId();
            }
            if(IsContext("game-rpg-item-weapon/count")){
                CountGameRpgItemWeapon();
            }
            else if(IsContext("game-rpg-item-weapon/count/by-uuid")){
                CountGameRpgItemWeaponByUuid();
            }
            else if(IsContext("game-rpg-item-weapon/count/by-game-id")){
                CountGameRpgItemWeaponByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/count/by-url")){
                CountGameRpgItemWeaponByUrl();
            }
            else if(IsContext("game-rpg-item-weapon/count/by-url/by-game-id")){
                CountGameRpgItemWeaponByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/count/by-uuid/by-game-id")){
                CountGameRpgItemWeaponByUuidByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/browse/by-filter")){
                BrowseGameRpgItemWeaponListByFilter();
            }
            else if(IsContext("game-rpg-item-weapon/set/by-uuid")){
                SetGameRpgItemWeaponByUuid();
            }
            else if(IsContext("game-rpg-item-weapon/set/by-game-id")){
                SetGameRpgItemWeaponByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/set/by-url")){
                SetGameRpgItemWeaponByUrl();
            }
            else if(IsContext("game-rpg-item-weapon/set/by-url/by-game-id")){
                SetGameRpgItemWeaponByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/set/by-uuid/by-game-id")){
                SetGameRpgItemWeaponByUuidByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/del/by-uuid")){
                DelGameRpgItemWeaponByUuid();
            }
            else if(IsContext("game-rpg-item-weapon/del/by-game-id")){
                DelGameRpgItemWeaponByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/del/by-url")){
                DelGameRpgItemWeaponByUrl();
            }
            else if(IsContext("game-rpg-item-weapon/del/by-url/by-game-id")){
                DelGameRpgItemWeaponByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/del/by-uuid/by-game-id")){
                DelGameRpgItemWeaponByUuidByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/get")){
                GetGameRpgItemWeaponList();
            }
            else if(IsContext("game-rpg-item-weapon/get/by-uuid")){
                GetGameRpgItemWeaponListByUuid();
            }
            else if(IsContext("game-rpg-item-weapon/get/by-game-id")){
                GetGameRpgItemWeaponListByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/get/by-url")){
                GetGameRpgItemWeaponListByUrl();
            }
            else if(IsContext("game-rpg-item-weapon/get/by-url/by-game-id")){
                GetGameRpgItemWeaponListByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-weapon/get/by-uuid/by-game-id")){
                GetGameRpgItemWeaponListByUuidByGameId();
            }
            if(IsContext("game-rpg-item-skill/count")){
                CountGameRpgItemSkill();
            }
            else if(IsContext("game-rpg-item-skill/count/by-uuid")){
                CountGameRpgItemSkillByUuid();
            }
            else if(IsContext("game-rpg-item-skill/count/by-game-id")){
                CountGameRpgItemSkillByGameId();
            }
            else if(IsContext("game-rpg-item-skill/count/by-url")){
                CountGameRpgItemSkillByUrl();
            }
            else if(IsContext("game-rpg-item-skill/count/by-url/by-game-id")){
                CountGameRpgItemSkillByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-skill/count/by-uuid/by-game-id")){
                CountGameRpgItemSkillByUuidByGameId();
            }
            else if(IsContext("game-rpg-item-skill/browse/by-filter")){
                BrowseGameRpgItemSkillListByFilter();
            }
            else if(IsContext("game-rpg-item-skill/set/by-uuid")){
                SetGameRpgItemSkillByUuid();
            }
            else if(IsContext("game-rpg-item-skill/set/by-game-id")){
                SetGameRpgItemSkillByGameId();
            }
            else if(IsContext("game-rpg-item-skill/set/by-url")){
                SetGameRpgItemSkillByUrl();
            }
            else if(IsContext("game-rpg-item-skill/set/by-url/by-game-id")){
                SetGameRpgItemSkillByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-skill/set/by-uuid/by-game-id")){
                SetGameRpgItemSkillByUuidByGameId();
            }
            else if(IsContext("game-rpg-item-skill/del/by-uuid")){
                DelGameRpgItemSkillByUuid();
            }
            else if(IsContext("game-rpg-item-skill/del/by-game-id")){
                DelGameRpgItemSkillByGameId();
            }
            else if(IsContext("game-rpg-item-skill/del/by-url")){
                DelGameRpgItemSkillByUrl();
            }
            else if(IsContext("game-rpg-item-skill/del/by-url/by-game-id")){
                DelGameRpgItemSkillByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-skill/del/by-uuid/by-game-id")){
                DelGameRpgItemSkillByUuidByGameId();
            }
            else if(IsContext("game-rpg-item-skill/get")){
                GetGameRpgItemSkillList();
            }
            else if(IsContext("game-rpg-item-skill/get/by-uuid")){
                GetGameRpgItemSkillListByUuid();
            }
            else if(IsContext("game-rpg-item-skill/get/by-game-id")){
                GetGameRpgItemSkillListByGameId();
            }
            else if(IsContext("game-rpg-item-skill/get/by-url")){
                GetGameRpgItemSkillListByUrl();
            }
            else if(IsContext("game-rpg-item-skill/get/by-url/by-game-id")){
                GetGameRpgItemSkillListByUrlByGameId();
            }
            else if(IsContext("game-rpg-item-skill/get/by-uuid/by-game-id")){
                GetGameRpgItemSkillListByUuidByGameId();
            }
            if(IsContext("game-product/count")){
                CountGameProduct();
            }
            else if(IsContext("game-product/count/by-uuid")){
                CountGameProductByUuid();
            }
            else if(IsContext("game-product/count/by-game-id")){
                CountGameProductByGameId();
            }
            else if(IsContext("game-product/count/by-url")){
                CountGameProductByUrl();
            }
            else if(IsContext("game-product/count/by-url/by-game-id")){
                CountGameProductByUrlByGameId();
            }
            else if(IsContext("game-product/count/by-uuid/by-game-id")){
                CountGameProductByUuidByGameId();
            }
            else if(IsContext("game-product/browse/by-filter")){
                BrowseGameProductListByFilter();
            }
            else if(IsContext("game-product/set/by-uuid")){
                SetGameProductByUuid();
            }
            else if(IsContext("game-product/set/by-game-id")){
                SetGameProductByGameId();
            }
            else if(IsContext("game-product/set/by-url")){
                SetGameProductByUrl();
            }
            else if(IsContext("game-product/set/by-url/by-game-id")){
                SetGameProductByUrlByGameId();
            }
            else if(IsContext("game-product/set/by-uuid/by-game-id")){
                SetGameProductByUuidByGameId();
            }
            else if(IsContext("game-product/del/by-uuid")){
                DelGameProductByUuid();
            }
            else if(IsContext("game-product/del/by-game-id")){
                DelGameProductByGameId();
            }
            else if(IsContext("game-product/del/by-url")){
                DelGameProductByUrl();
            }
            else if(IsContext("game-product/del/by-url/by-game-id")){
                DelGameProductByUrlByGameId();
            }
            else if(IsContext("game-product/del/by-uuid/by-game-id")){
                DelGameProductByUuidByGameId();
            }
            else if(IsContext("game-product/get")){
                GetGameProductList();
            }
            else if(IsContext("game-product/get/by-uuid")){
                GetGameProductListByUuid();
            }
            else if(IsContext("game-product/get/by-game-id")){
                GetGameProductListByGameId();
            }
            else if(IsContext("game-product/get/by-url")){
                GetGameProductListByUrl();
            }
            else if(IsContext("game-product/get/by-url/by-game-id")){
                GetGameProductListByUrlByGameId();
            }
            else if(IsContext("game-product/get/by-uuid/by-game-id")){
                GetGameProductListByUuidByGameId();
            }
            if(IsContext("game-statistic-leaderboard/count")){
                CountGameStatisticLeaderboard();
            }
            else if(IsContext("game-statistic-leaderboard/count/by-uuid")){
                CountGameStatisticLeaderboardByUuid();
            }
            else if(IsContext("game-statistic-leaderboard/count/by-key")){
                CountGameStatisticLeaderboardByKey();
            }
            else if(IsContext("game-statistic-leaderboard/count/by-game-id")){
                CountGameStatisticLeaderboardByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/count/by-key/by-game-id")){
                CountGameStatisticLeaderboardByKeyByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/count/by-profile-id/by-game-id")){
                CountGameStatisticLeaderboardByProfileIdByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/count/by-key/by-profile-id/by-game-id")){
                CountGameStatisticLeaderboardByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/count/by-key/by-profile-id/by-game-id/by-timestamp")){
                CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-statistic-leaderboard/browse/by-filter")){
                BrowseGameStatisticLeaderboardListByFilter();
            }
            else if(IsContext("game-statistic-leaderboard/set/by-uuid")){
                SetGameStatisticLeaderboardByUuid();
            }
            else if(IsContext("game-statistic-leaderboard/set/by-uuid/by-profile-id/by-game-id/by-timestamp")){
                SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-statistic-leaderboard/set/by-profile-id/by-key")){
                SetGameStatisticLeaderboardByProfileIdByKey();
            }
            else if(IsContext("game-statistic-leaderboard/set/by-profile-id/by-key/by-timestamp")){
                SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp();
            }
            else if(IsContext("game-statistic-leaderboard/set/by-key/by-profile-id/by-game-id/by-timestamp")){
                SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-statistic-leaderboard/set/by-profile-id/by-game-id/by-key")){
                SetGameStatisticLeaderboardByProfileIdByGameIdByKey();
            }
            else if(IsContext("game-statistic-leaderboard/del/by-uuid")){
                DelGameStatisticLeaderboardByUuid();
            }
            else if(IsContext("game-statistic-leaderboard/del/by-key/by-game-id")){
                DelGameStatisticLeaderboardByKeyByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/del/by-profile-id/by-game-id")){
                DelGameStatisticLeaderboardByProfileIdByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/del/by-key/by-profile-id/by-game-id")){
                DelGameStatisticLeaderboardByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/get")){
                GetGameStatisticLeaderboardList();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-uuid")){
                GetGameStatisticLeaderboardListByUuid();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-key")){
                GetGameStatisticLeaderboardListByKey();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-game-id")){
                GetGameStatisticLeaderboardListByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-key/by-game-id")){
                GetGameStatisticLeaderboardListByKeyByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-profile-id/by-game-id")){
                GetGameStatisticLeaderboardListByProfileIdByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-profile-id/by-game-id/by-timestamp")){
                GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-key/by-profile-id/by-game-id")){
                GetGameStatisticLeaderboardListByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-statistic-leaderboard/get/by-key/by-profile-id/by-game-id/by-timestamp")){
                GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp();
            }
            if(IsContext("game-live-queue/count")){
                CountGameLiveQueue();
            }
            else if(IsContext("game-live-queue/count/by-uuid")){
                CountGameLiveQueueByUuid();
            }
            else if(IsContext("game-live-queue/count/by-profile-id/by-game-id")){
                CountGameLiveQueueByProfileIdByGameId();
            }
            else if(IsContext("game-live-queue/browse/by-filter")){
                BrowseGameLiveQueueListByFilter();
            }
            else if(IsContext("game-live-queue/set/by-uuid")){
                SetGameLiveQueueByUuid();
            }
            else if(IsContext("game-live-queue/set/by-profile-id/by-game-id")){
                SetGameLiveQueueByProfileIdByGameId();
            }
            else if(IsContext("game-live-queue/del/by-uuid")){
                DelGameLiveQueueByUuid();
            }
            else if(IsContext("game-live-queue/del/by-profile-id/by-game-id")){
                DelGameLiveQueueByProfileIdByGameId();
            }
            else if(IsContext("game-live-queue/get")){
                GetGameLiveQueueList();
            }
            else if(IsContext("game-live-queue/get/by-uuid")){
                GetGameLiveQueueListByUuid();
            }
            else if(IsContext("game-live-queue/get/by-game-id")){
                GetGameLiveQueueListByGameId();
            }
            else if(IsContext("game-live-queue/get/by-profile-id/by-game-id")){
                GetGameLiveQueueListByProfileIdByGameId();
            }
            if(IsContext("game-live-recent-queue/count")){
                CountGameLiveRecentQueue();
            }
            else if(IsContext("game-live-recent-queue/count/by-uuid")){
                CountGameLiveRecentQueueByUuid();
            }
            else if(IsContext("game-live-recent-queue/count/by-profile-id/by-game-id")){
                CountGameLiveRecentQueueByProfileIdByGameId();
            }
            else if(IsContext("game-live-recent-queue/browse/by-filter")){
                BrowseGameLiveRecentQueueListByFilter();
            }
            else if(IsContext("game-live-recent-queue/set/by-uuid")){
                SetGameLiveRecentQueueByUuid();
            }
            else if(IsContext("game-live-recent-queue/set/by-profile-id/by-game-id")){
                SetGameLiveRecentQueueByProfileIdByGameId();
            }
            else if(IsContext("game-live-recent-queue/del/by-uuid")){
                DelGameLiveRecentQueueByUuid();
            }
            else if(IsContext("game-live-recent-queue/del/by-profile-id/by-game-id")){
                DelGameLiveRecentQueueByProfileIdByGameId();
            }
            else if(IsContext("game-live-recent-queue/get")){
                GetGameLiveRecentQueueList();
            }
            else if(IsContext("game-live-recent-queue/get/by-uuid")){
                GetGameLiveRecentQueueListByUuid();
            }
            else if(IsContext("game-live-recent-queue/get/by-game-id")){
                GetGameLiveRecentQueueListByGameId();
            }
            else if(IsContext("game-live-recent-queue/get/by-profile-id/by-game-id")){
                GetGameLiveRecentQueueListByProfileIdByGameId();
            }
            if(IsContext("game-profile-statistic/count")){
                CountGameProfileStatistic();
            }
            else if(IsContext("game-profile-statistic/count/by-uuid")){
                CountGameProfileStatisticByUuid();
            }
            else if(IsContext("game-profile-statistic/count/by-key")){
                CountGameProfileStatisticByKey();
            }
            else if(IsContext("game-profile-statistic/count/by-game-id")){
                CountGameProfileStatisticByGameId();
            }
            else if(IsContext("game-profile-statistic/count/by-key/by-game-id")){
                CountGameProfileStatisticByKeyByGameId();
            }
            else if(IsContext("game-profile-statistic/count/by-profile-id/by-game-id")){
                CountGameProfileStatisticByProfileIdByGameId();
            }
            else if(IsContext("game-profile-statistic/count/by-key/by-profile-id/by-game-id")){
                CountGameProfileStatisticByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-profile-statistic/count/by-key/by-profile-id/by-game-id/by-timestamp")){
                CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-statistic/browse/by-filter")){
                BrowseGameProfileStatisticListByFilter();
            }
            else if(IsContext("game-profile-statistic/set/by-uuid")){
                SetGameProfileStatisticByUuid();
            }
            else if(IsContext("game-profile-statistic/set/by-uuid/by-profile-id/by-game-id/by-timestamp")){
                SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-statistic/set/by-profile-id/by-key")){
                SetGameProfileStatisticByProfileIdByKey();
            }
            else if(IsContext("game-profile-statistic/set/by-profile-id/by-key/by-timestamp")){
                SetGameProfileStatisticByProfileIdByKeyByTimestamp();
            }
            else if(IsContext("game-profile-statistic/set/by-key/by-profile-id/by-game-id/by-timestamp")){
                SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-statistic/set/by-profile-id/by-game-id/by-key")){
                SetGameProfileStatisticByProfileIdByGameIdByKey();
            }
            else if(IsContext("game-profile-statistic/del/by-uuid")){
                DelGameProfileStatisticByUuid();
            }
            else if(IsContext("game-profile-statistic/del/by-key/by-game-id")){
                DelGameProfileStatisticByKeyByGameId();
            }
            else if(IsContext("game-profile-statistic/del/by-profile-id/by-game-id")){
                DelGameProfileStatisticByProfileIdByGameId();
            }
            else if(IsContext("game-profile-statistic/del/by-key/by-profile-id/by-game-id")){
                DelGameProfileStatisticByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-profile-statistic/get/by-uuid")){
                GetGameProfileStatisticListByUuid();
            }
            else if(IsContext("game-profile-statistic/get/by-key")){
                GetGameProfileStatisticListByKey();
            }
            else if(IsContext("game-profile-statistic/get/by-game-id")){
                GetGameProfileStatisticListByGameId();
            }
            else if(IsContext("game-profile-statistic/get/by-key/by-game-id")){
                GetGameProfileStatisticListByKeyByGameId();
            }
            else if(IsContext("game-profile-statistic/get/by-profile-id/by-game-id")){
                GetGameProfileStatisticListByProfileIdByGameId();
            }
            else if(IsContext("game-profile-statistic/get/by-profile-id/by-game-id/by-timestamp")){
                GetGameProfileStatisticListByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-statistic/get/by-key/by-profile-id/by-game-id")){
                GetGameProfileStatisticListByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-profile-statistic/get/by-key/by-profile-id/by-game-id/by-timestamp")){
                GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp();
            }
            if(IsContext("game-statistic-meta/count")){
                CountGameStatisticMeta();
            }
            else if(IsContext("game-statistic-meta/count/by-uuid")){
                CountGameStatisticMetaByUuid();
            }
            else if(IsContext("game-statistic-meta/count/by-code")){
                CountGameStatisticMetaByCode();
            }
            else if(IsContext("game-statistic-meta/count/by-name")){
                CountGameStatisticMetaByName();
            }
            else if(IsContext("game-statistic-meta/count/by-key")){
                CountGameStatisticMetaByKey();
            }
            else if(IsContext("game-statistic-meta/count/by-game-id")){
                CountGameStatisticMetaByGameId();
            }
            else if(IsContext("game-statistic-meta/count/by-key/by-game-id")){
                CountGameStatisticMetaByKeyByGameId();
            }
            else if(IsContext("game-statistic-meta/browse/by-filter")){
                BrowseGameStatisticMetaListByFilter();
            }
            else if(IsContext("game-statistic-meta/set/by-uuid")){
                SetGameStatisticMetaByUuid();
            }
            else if(IsContext("game-statistic-meta/set/by-key/by-game-id")){
                SetGameStatisticMetaByKeyByGameId();
            }
            else if(IsContext("game-statistic-meta/del/by-uuid")){
                DelGameStatisticMetaByUuid();
            }
            else if(IsContext("game-statistic-meta/del/by-key/by-game-id")){
                DelGameStatisticMetaByKeyByGameId();
            }
            else if(IsContext("game-statistic-meta/get/by-uuid")){
                GetGameStatisticMetaListByUuid();
            }
            else if(IsContext("game-statistic-meta/get/by-code")){
                GetGameStatisticMetaListByCode();
            }
            else if(IsContext("game-statistic-meta/get/by-name")){
                GetGameStatisticMetaListByName();
            }
            else if(IsContext("game-statistic-meta/get/by-key")){
                GetGameStatisticMetaListByKey();
            }
            else if(IsContext("game-statistic-meta/get/by-game-id")){
                GetGameStatisticMetaListByGameId();
            }
            else if(IsContext("game-statistic-meta/get/by-key/by-game-id")){
                GetGameStatisticMetaListByKeyByGameId();
            }
            if(IsContext("game-profile-statistic-timestamp/count")){
                CountGameProfileStatisticTimestamp();
            }
            else if(IsContext("game-profile-statistic-timestamp/count/by-uuid")){
                CountGameProfileStatisticTimestampByUuid();
            }
            else if(IsContext("game-profile-statistic-timestamp/count/by-key/by-profile-id/by-game-id/by-timestamp")){
                CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-statistic-timestamp/browse/by-filter")){
                BrowseGameProfileStatisticTimestampListByFilter();
            }
            else if(IsContext("game-profile-statistic-timestamp/set/by-uuid")){
                SetGameProfileStatisticTimestampByUuid();
            }
            else if(IsContext("game-profile-statistic-timestamp/set/by-key/by-profile-id/by-game-id/by-timestamp")){
                SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-statistic-timestamp/del/by-uuid")){
                DelGameProfileStatisticTimestampByUuid();
            }
            else if(IsContext("game-profile-statistic-timestamp/del/by-key/by-profile-id/by-game-id/by-timestamp")){
                DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-statistic-timestamp/get/by-uuid")){
                GetGameProfileStatisticTimestampListByUuid();
            }
            else if(IsContext("game-profile-statistic-timestamp/get/by-key/by-profile-id/by-game-id/by-timestamp")){
                GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp();
            }
            if(IsContext("game-key-meta/count")){
                CountGameKeyMeta();
            }
            else if(IsContext("game-key-meta/count/by-uuid")){
                CountGameKeyMetaByUuid();
            }
            else if(IsContext("game-key-meta/count/by-code")){
                CountGameKeyMetaByCode();
            }
            else if(IsContext("game-key-meta/count/by-name")){
                CountGameKeyMetaByName();
            }
            else if(IsContext("game-key-meta/count/by-key")){
                CountGameKeyMetaByKey();
            }
            else if(IsContext("game-key-meta/count/by-game-id")){
                CountGameKeyMetaByGameId();
            }
            else if(IsContext("game-key-meta/count/by-key/by-game-id")){
                CountGameKeyMetaByKeyByGameId();
            }
            else if(IsContext("game-key-meta/browse/by-filter")){
                BrowseGameKeyMetaListByFilter();
            }
            else if(IsContext("game-key-meta/set/by-uuid")){
                SetGameKeyMetaByUuid();
            }
            else if(IsContext("game-key-meta/set/by-key/by-game-id")){
                SetGameKeyMetaByKeyByGameId();
            }
            else if(IsContext("game-key-meta/set/by-key/by-game-id/by-level")){
                SetGameKeyMetaByKeyByGameIdByLevel();
            }
            else if(IsContext("game-key-meta/del/by-uuid")){
                DelGameKeyMetaByUuid();
            }
            else if(IsContext("game-key-meta/del/by-key/by-game-id")){
                DelGameKeyMetaByKeyByGameId();
            }
            else if(IsContext("game-key-meta/get/by-uuid")){
                GetGameKeyMetaListByUuid();
            }
            else if(IsContext("game-key-meta/get/by-code")){
                GetGameKeyMetaListByCode();
            }
            else if(IsContext("game-key-meta/get/by-name")){
                GetGameKeyMetaListByName();
            }
            else if(IsContext("game-key-meta/get/by-key")){
                GetGameKeyMetaListByKey();
            }
            else if(IsContext("game-key-meta/get/by-game-id")){
                GetGameKeyMetaListByGameId();
            }
            else if(IsContext("game-key-meta/get/by-key/by-game-id")){
                GetGameKeyMetaListByKeyByGameId();
            }
            else if(IsContext("game-key-meta/get/by-code/by-level")){
                GetGameKeyMetaListByCodeByLevel();
            }
            if(IsContext("game-level/count")){
                CountGameLevel();
            }
            else if(IsContext("game-level/count/by-uuid")){
                CountGameLevelByUuid();
            }
            else if(IsContext("game-level/count/by-code")){
                CountGameLevelByCode();
            }
            else if(IsContext("game-level/count/by-name")){
                CountGameLevelByName();
            }
            else if(IsContext("game-level/count/by-key")){
                CountGameLevelByKey();
            }
            else if(IsContext("game-level/count/by-game-id")){
                CountGameLevelByGameId();
            }
            else if(IsContext("game-level/count/by-key/by-game-id")){
                CountGameLevelByKeyByGameId();
            }
            else if(IsContext("game-level/browse/by-filter")){
                BrowseGameLevelListByFilter();
            }
            else if(IsContext("game-level/set/by-uuid")){
                SetGameLevelByUuid();
            }
            else if(IsContext("game-level/set/by-key/by-game-id")){
                SetGameLevelByKeyByGameId();
            }
            else if(IsContext("game-level/del/by-uuid")){
                DelGameLevelByUuid();
            }
            else if(IsContext("game-level/del/by-key/by-game-id")){
                DelGameLevelByKeyByGameId();
            }
            else if(IsContext("game-level/get/by-uuid")){
                GetGameLevelListByUuid();
            }
            else if(IsContext("game-level/get/by-code")){
                GetGameLevelListByCode();
            }
            else if(IsContext("game-level/get/by-name")){
                GetGameLevelListByName();
            }
            else if(IsContext("game-level/get/by-key")){
                GetGameLevelListByKey();
            }
            else if(IsContext("game-level/get/by-game-id")){
                GetGameLevelListByGameId();
            }
            else if(IsContext("game-level/get/by-key/by-game-id")){
                GetGameLevelListByKeyByGameId();
            }
            if(IsContext("game-profile-achievement/count")){
                CountGameProfileAchievement();
            }
            else if(IsContext("game-profile-achievement/count/by-uuid")){
                CountGameProfileAchievementByUuid();
            }
            else if(IsContext("game-profile-achievement/count/by-profile-id/by-key")){
                CountGameProfileAchievementByProfileIdByKey();
            }
            else if(IsContext("game-profile-achievement/count/by-username")){
                CountGameProfileAchievementByUsername();
            }
            else if(IsContext("game-profile-achievement/count/by-key/by-profile-id/by-game-id")){
                CountGameProfileAchievementByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-profile-achievement/count/by-key/by-profile-id/by-game-id/by-timestamp")){
                CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-achievement/browse/by-filter")){
                BrowseGameProfileAchievementListByFilter();
            }
            else if(IsContext("game-profile-achievement/set/by-uuid")){
                SetGameProfileAchievementByUuid();
            }
            else if(IsContext("game-profile-achievement/set/by-uuid/by-key")){
                SetGameProfileAchievementByUuidByKey();
            }
            else if(IsContext("game-profile-achievement/set/by-profile-id/by-key")){
                SetGameProfileAchievementByProfileIdByKey();
            }
            else if(IsContext("game-profile-achievement/set/by-key/by-profile-id/by-game-id")){
                SetGameProfileAchievementByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-profile-achievement/set/by-key/by-profile-id/by-game-id/by-timestamp")){
                SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-achievement/del/by-uuid")){
                DelGameProfileAchievementByUuid();
            }
            else if(IsContext("game-profile-achievement/del/by-profile-id/by-key")){
                DelGameProfileAchievementByProfileIdByKey();
            }
            else if(IsContext("game-profile-achievement/del/by-uuid/by-key")){
                DelGameProfileAchievementByUuidByKey();
            }
            else if(IsContext("game-profile-achievement/get/by-uuid")){
                GetGameProfileAchievementListByUuid();
            }
            else if(IsContext("game-profile-achievement/get/by-profile-id/by-key")){
                GetGameProfileAchievementListByProfileIdByKey();
            }
            else if(IsContext("game-profile-achievement/get/by-username")){
                GetGameProfileAchievementListByUsername();
            }
            else if(IsContext("game-profile-achievement/get/by-key")){
                GetGameProfileAchievementListByKey();
            }
            else if(IsContext("game-profile-achievement/get/by-game-id")){
                GetGameProfileAchievementListByGameId();
            }
            else if(IsContext("game-profile-achievement/get/by-key/by-game-id")){
                GetGameProfileAchievementListByKeyByGameId();
            }
            else if(IsContext("game-profile-achievement/get/by-profile-id/by-game-id")){
                GetGameProfileAchievementListByProfileIdByGameId();
            }
            else if(IsContext("game-profile-achievement/get/by-profile-id/by-game-id/by-timestamp")){
                GetGameProfileAchievementListByProfileIdByGameIdByTimestamp();
            }
            else if(IsContext("game-profile-achievement/get/by-key/by-profile-id/by-game-id")){
                GetGameProfileAchievementListByKeyByProfileIdByGameId();
            }
            else if(IsContext("game-profile-achievement/get/by-key/by-profile-id/by-game-id/by-timestamp")){
                GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp();
            }
            if(IsContext("game-achievement-meta/count")){
                CountGameAchievementMeta();
            }
            else if(IsContext("game-achievement-meta/count/by-uuid")){
                CountGameAchievementMetaByUuid();
            }
            else if(IsContext("game-achievement-meta/count/by-code")){
                CountGameAchievementMetaByCode();
            }
            else if(IsContext("game-achievement-meta/count/by-name")){
                CountGameAchievementMetaByName();
            }
            else if(IsContext("game-achievement-meta/count/by-key")){
                CountGameAchievementMetaByKey();
            }
            else if(IsContext("game-achievement-meta/count/by-game-id")){
                CountGameAchievementMetaByGameId();
            }
            else if(IsContext("game-achievement-meta/count/by-key/by-game-id")){
                CountGameAchievementMetaByKeyByGameId();
            }
            else if(IsContext("game-achievement-meta/browse/by-filter")){
                BrowseGameAchievementMetaListByFilter();
            }
            else if(IsContext("game-achievement-meta/set/by-uuid")){
                SetGameAchievementMetaByUuid();
            }
            else if(IsContext("game-achievement-meta/set/by-key/by-game-id")){
                SetGameAchievementMetaByKeyByGameId();
            }
            else if(IsContext("game-achievement-meta/del/by-uuid")){
                DelGameAchievementMetaByUuid();
            }
            else if(IsContext("game-achievement-meta/del/by-key/by-game-id")){
                DelGameAchievementMetaByKeyByGameId();
            }
            else if(IsContext("game-achievement-meta/get/by-uuid")){
                GetGameAchievementMetaListByUuid();
            }
            else if(IsContext("game-achievement-meta/get/by-code")){
                GetGameAchievementMetaListByCode();
            }
            else if(IsContext("game-achievement-meta/get/by-name")){
                GetGameAchievementMetaListByName();
            }
            else if(IsContext("game-achievement-meta/get/by-key")){
                GetGameAchievementMetaListByKey();
            }
            else if(IsContext("game-achievement-meta/get/by-game-id")){
                GetGameAchievementMetaListByGameId();
            }
            else if(IsContext("game-achievement-meta/get/by-key/by-game-id")){
                GetGameAchievementMetaListByKeyByGameId();
            }
        }    
        
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGame() {
        

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/count";

            int i = api.CountGame(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/count/by-uuid";

            int i = api.CountGameByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/count/by-code";

            int i = api.CountGameByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/count/by-name";

            int i = api.CountGameByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/count/by-org-id";

            int i = api.CountGameByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/count/by-app-id";

            int i = api.CountGameByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameByOrgIdByAppId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameInt wrapper = new ResponseGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/count/by-org-id/by-app-id";

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
            wrapper.code = 0;
            wrapper.action = "game/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game/set/by-uuid";
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
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
            wrapper.data = api.SetGameByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByCode()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/set/by-code";
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
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
            wrapper.data = api.SetGameByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByName()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/set/by-name";
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
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
            wrapper.data = api.SetGameByName(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByOrgId()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/set/by-org-id";
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
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
            wrapper.data = api.SetGameByOrgId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByAppId()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/set/by-app-id";
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
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
            wrapper.data = api.SetGameByAppId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameByOrgIdByAppId()  {
        
            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/set/by-org-id/by-app-id";
                        
            Game obj = new Game();
            
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
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
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
            wrapper.data = api.SetGameByOrgIdByAppId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/del/by-uuid";

            bool completed = api.DelGameByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/del/by-code";

            bool completed = api.DelGameByCode(
                        
                _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/del/by-name";

            bool completed = api.DelGameByName(
                        
                _name
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/del/by-org-id";

            bool completed = api.DelGameByOrgId(
                        
                _org_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/del/by-app-id";

            bool completed = api.DelGameByAppId(
                        
                _app_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameByOrgIdByAppId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameBool wrapper = new ResponseGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/del/by-org-id/by-app-id";

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
            wrapper.code = 0;
            wrapper.action = "game/get";

            List<Game> objs = api.GetGameList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/get/by-uuid";

            List<Game> objs = api.GetGameListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/get/by-code";

            List<Game> objs = api.GetGameListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/get/by-name";

            List<Game> objs = api.GetGameListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/get/by-org-id";

            List<Game> objs = api.GetGameListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/get/by-app-id";

            List<Game> objs = api.GetGameListByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameListByOrgIdByAppId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameList wrapper = new ResponseGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game/get/by-org-id/by-app-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category/count";

            int i = api.CountGameCategory(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/count/by-uuid";

            int i = api.CountGameCategoryByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/count/by-code";

            int i = api.CountGameCategoryByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/count/by-name";

            int i = api.CountGameCategoryByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/count/by-org-id";

            int i = api.CountGameCategoryByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/count/by-type-id";

            int i = api.CountGameCategoryByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryByOrgIdByTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseGameCategoryInt wrapper = new ResponseGameCategoryInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/count/by-org-id/by-type-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game-category/set/by-uuid";
                        
            GameCategory obj = new GameCategory();
            
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
            wrapper.data = api.SetGameCategoryByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryBool wrapper = new ResponseGameCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/del/by-uuid";

            bool completed = api.DelGameCategoryByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryByCodeByOrgId() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseGameCategoryBool wrapper = new ResponseGameCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/del/by-code/by-org-id";

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
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseGameCategoryBool wrapper = new ResponseGameCategoryBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/del/by-code/by-org-id/by-type-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category/get";

            List<GameCategory> objs = api.GetGameCategoryList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/get/by-uuid";

            List<GameCategory> objs = api.GetGameCategoryListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/get/by-code";

            List<GameCategory> objs = api.GetGameCategoryListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/get/by-name";

            List<GameCategory> objs = api.GetGameCategoryListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByOrgId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/get/by-org-id";

            List<GameCategory> objs = api.GetGameCategoryListByOrgId(
                _org_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByTypeId() {
        
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/get/by-type-id";

            List<GameCategory> objs = api.GetGameCategoryListByTypeId(
                _type_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryListByOrgIdByTypeId() {
        
            string _org_id = (string)util.GetParamValue(_context, "org_id");
            string _type_id = (string)util.GetParamValue(_context, "type_id");

            ResponseGameCategoryList wrapper = new ResponseGameCategoryList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category/get/by-org-id/by-type-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category-tree/count";

            int i = api.CountGameCategoryTree(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/count/by-uuid";

            int i = api.CountGameCategoryTreeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/count/by-parent-id";

            int i = api.CountGameCategoryTreeByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/count/by-category-id";

            int i = api.CountGameCategoryTreeByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryTreeByParentIdByCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryTreeInt wrapper = new ResponseGameCategoryTreeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/count/by-parent-id/by-category-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category-tree/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game-category-tree/set/by-uuid";
                        
            GameCategoryTree obj = new GameCategoryTree();
            
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
            wrapper.data = api.SetGameCategoryTreeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/del/by-uuid";

            bool completed = api.DelGameCategoryTreeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/del/by-parent-id";

            bool completed = api.DelGameCategoryTreeByParentId(
                        
                _parent_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/del/by-category-id";

            bool completed = api.DelGameCategoryTreeByCategoryId(
                        
                _category_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryTreeByParentIdByCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryTreeBool wrapper = new ResponseGameCategoryTreeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/del/by-parent-id/by-category-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category-tree/get";

            List<GameCategoryTree> objs = api.GetGameCategoryTreeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/get/by-uuid";

            List<GameCategoryTree> objs = api.GetGameCategoryTreeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByParentId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/get/by-parent-id";

            List<GameCategoryTree> objs = api.GetGameCategoryTreeListByParentId(
                _parent_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/get/by-category-id";

            List<GameCategoryTree> objs = api.GetGameCategoryTreeListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryTreeListByParentIdByCategoryId() {
        
            string _parent_id = (string)util.GetParamValue(_context, "parent_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryTreeList wrapper = new ResponseGameCategoryTreeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-tree/get/by-parent-id/by-category-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/count";

            int i = api.CountGameCategoryAssoc(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/count/by-uuid";

            int i = api.CountGameCategoryAssocByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/count/by-game-id";

            int i = api.CountGameCategoryAssocByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/count/by-category-id";

            int i = api.CountGameCategoryAssocByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameCategoryAssocByGameIdByCategoryId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryAssocInt wrapper = new ResponseGameCategoryAssocInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/count/by-game-id/by-category-id";

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
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/set/by-uuid";
                        
            GameCategoryAssoc obj = new GameCategoryAssoc();
            
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
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _category_id = util.GetParamValue(_context, "category_id");
            if(!String.IsNullOrEmpty(_category_id))
                obj.category_id = (string)_category_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameCategoryAssocByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameCategoryAssocByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryAssocBool wrapper = new ResponseGameCategoryAssocBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/get";

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/get/by-uuid";

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/get/by-game-id";

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByCategoryId() {
        
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/get/by-category-id";

            List<GameCategoryAssoc> objs = api.GetGameCategoryAssocListByCategoryId(
                _category_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameCategoryAssocListByGameIdByCategoryId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _category_id = (string)util.GetParamValue(_context, "category_id");

            ResponseGameCategoryAssocList wrapper = new ResponseGameCategoryAssocList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-category-assoc/get/by-game-id/by-category-id";

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
            wrapper.code = 0;
            wrapper.action = "game-type/count";

            int i = api.CountGameType(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameTypeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameTypeInt wrapper = new ResponseGameTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-type/count/by-uuid";

            int i = api.CountGameTypeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameTypeByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameTypeInt wrapper = new ResponseGameTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-type/count/by-code";

            int i = api.CountGameTypeByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameTypeByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameTypeInt wrapper = new ResponseGameTypeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-type/count/by-name";

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
            wrapper.code = 0;
            wrapper.action = "game-type/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game-type/set/by-uuid";
                        
            GameType obj = new GameType();
            
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
            wrapper.data = api.SetGameTypeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameTypeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameTypeBool wrapper = new ResponseGameTypeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-type/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "game-type/get";

            List<GameType> objs = api.GetGameTypeList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameTypeListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-type/get/by-uuid";

            List<GameType> objs = api.GetGameTypeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameTypeListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-type/get/by-code";

            List<GameType> objs = api.GetGameTypeListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameTypeListByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameTypeList wrapper = new ResponseGameTypeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-type/get/by-name";

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
            wrapper.code = 0;
            wrapper.action = "profile-game/count";

            int i = api.CountProfileGame(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/count/by-uuid";

            int i = api.CountProfileGameByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/count/by-game-id";

            int i = api.CountProfileGameByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/count/by-profile-id";

            int i = api.CountProfileGameByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameInt wrapper = new ResponseProfileGameInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/count/by-profile-id/by-game-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-game/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-game/set/by-uuid";
                        
            ProfileGame obj = new ProfileGame();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _type_id = util.GetParamValue(_context, "type_id");
            if(!String.IsNullOrEmpty(_type_id))
                obj.type_id = (string)_type_id;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _game_profile = util.GetParamValue(_context, "game_profile");
            if(!String.IsNullOrEmpty(_game_profile))
                obj.game_profile = (string)_game_profile;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _profile_version = util.GetParamValue(_context, "profile_version");
            if(!String.IsNullOrEmpty(_profile_version))
                obj.profile_version = (string)_profile_version;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetProfileGameByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameBool wrapper = new ResponseProfileGameBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "profile-game/get";

            List<ProfileGame> objs = api.GetProfileGameList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/get/by-uuid";

            List<ProfileGame> objs = api.GetProfileGameListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/get/by-game-id";

            List<ProfileGame> objs = api.GetProfileGameListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/get/by-profile-id";

            List<ProfileGame> objs = api.GetProfileGameListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameList wrapper = new ResponseProfileGameList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game/get/by-profile-id/by-game-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-game-network/count";

            int i = api.CountProfileGameNetwork(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/count/by-uuid";

            int i = api.CountProfileGameNetworkByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/count/by-game-id";

            int i = api.CountProfileGameNetworkByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/count/by-profile-id";

            int i = api.CountProfileGameNetworkByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameNetworkByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameNetworkInt wrapper = new ResponseProfileGameNetworkInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/count/by-profile-id/by-game-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-game-network/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-game-network/set/by-uuid";
                        
            ProfileGameNetwork obj = new ProfileGameNetwork();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _game_network_id = util.GetParamValue(_context, "game_network_id");
            if(!String.IsNullOrEmpty(_game_network_id))
                obj.game_network_id = (string)_game_network_id;
            
            string _network_username = util.GetParamValue(_context, "network_username");
            if(!String.IsNullOrEmpty(_network_username))
                obj.network_username = (string)_network_username;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _secret = util.GetParamValue(_context, "secret");
            if(!String.IsNullOrEmpty(_secret))
                obj.secret = (string)_secret;
            
            string _token = util.GetParamValue(_context, "token");
            if(!String.IsNullOrEmpty(_token))
                obj.token = (string)_token;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetProfileGameNetworkByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameNetworkByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameNetworkBool wrapper = new ResponseProfileGameNetworkBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "profile-game-network/get";

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/get/by-uuid";

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/get/by-game-id";

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/get/by-profile-id";

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameNetworkListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseProfileGameNetworkList wrapper = new ResponseProfileGameNetworkList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-network/get/by-profile-id/by-game-id";

            List<ProfileGameNetwork> objs = api.GetProfileGameNetworkListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameDataAttribute() {
        

            ResponseProfileGameDataAttributeInt wrapper = new ResponseProfileGameDataAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/count";

            int i = api.CountProfileGameDataAttribute(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameDataAttributeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameDataAttributeInt wrapper = new ResponseProfileGameDataAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/count/by-uuid";

            int i = api.CountProfileGameDataAttributeByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameDataAttributeByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameDataAttributeInt wrapper = new ResponseProfileGameDataAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/count/by-profile-id";

            int i = api.CountProfileGameDataAttributeByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameDataAttributeByProfileIdByGameIdByCode() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileGameDataAttributeInt wrapper = new ResponseProfileGameDataAttributeInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/count/by-profile-id/by-game-id/by-code";

            int i = api.CountProfileGameDataAttributeByProfileIdByGameIdByCode(
                _profile_id
                , _game_id
                , _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseProfileGameDataAttributeListByFilter()  {
        
            ResponseProfileGameDataAttributeList wrapper = new ResponseProfileGameDataAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            ProfileGameDataAttributeResult result = api.BrowseProfileGameDataAttributeListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileGameDataAttributeByUuid()  {
        
            ResponseProfileGameDataAttributeBool wrapper = new ResponseProfileGameDataAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/set/by-uuid";
                        
            ProfileGameDataAttribute obj = new ProfileGameDataAttribute();
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _val = util.GetParamValue(_context, "val");
            if(!String.IsNullOrEmpty(_val))
                obj.val = (string)_val;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _otype = util.GetParamValue(_context, "otype");
            if(!String.IsNullOrEmpty(_otype))
                obj.otype = (string)_otype;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            
            // get data
            wrapper.data = api.SetProfileGameDataAttributeByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileGameDataAttributeByProfileId()  {
        
            ResponseProfileGameDataAttributeBool wrapper = new ResponseProfileGameDataAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/set/by-profile-id";
                        
            ProfileGameDataAttribute obj = new ProfileGameDataAttribute();
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _val = util.GetParamValue(_context, "val");
            if(!String.IsNullOrEmpty(_val))
                obj.val = (string)_val;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _otype = util.GetParamValue(_context, "otype");
            if(!String.IsNullOrEmpty(_otype))
                obj.otype = (string)_otype;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            
            // get data
            wrapper.data = api.SetProfileGameDataAttributeByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetProfileGameDataAttributeByProfileIdByGameIdByCode()  {
        
            ResponseProfileGameDataAttributeBool wrapper = new ResponseProfileGameDataAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/set/by-profile-id/by-game-id/by-code";
                        
            ProfileGameDataAttribute obj = new ProfileGameDataAttribute();
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _val = util.GetParamValue(_context, "val");
            if(!String.IsNullOrEmpty(_val))
                obj.val = (string)_val;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _otype = util.GetParamValue(_context, "otype");
            if(!String.IsNullOrEmpty(_otype))
                obj.otype = (string)_otype;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            
            // get data
            wrapper.data = api.SetProfileGameDataAttributeByProfileIdByGameIdByCode(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameDataAttributeByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameDataAttributeBool wrapper = new ResponseProfileGameDataAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/del/by-uuid";

            bool completed = api.DelProfileGameDataAttributeByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameDataAttributeByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameDataAttributeBool wrapper = new ResponseProfileGameDataAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/del/by-profile-id";

            bool completed = api.DelProfileGameDataAttributeByProfileId(
                        
                _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameDataAttributeByProfileIdByGameIdByCode() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileGameDataAttributeBool wrapper = new ResponseProfileGameDataAttributeBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/del/by-profile-id/by-game-id/by-code";

            bool completed = api.DelProfileGameDataAttributeByProfileIdByGameIdByCode(
                        
                _profile_id
                , _game_id
                , _code
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameDataAttributeListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameDataAttributeList wrapper = new ResponseProfileGameDataAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/get/by-uuid";

            List<ProfileGameDataAttribute> objs = api.GetProfileGameDataAttributeListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameDataAttributeListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameDataAttributeList wrapper = new ResponseProfileGameDataAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/get/by-profile-id";

            List<ProfileGameDataAttribute> objs = api.GetProfileGameDataAttributeListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameDataAttributeListByProfileIdByGameIdByCode() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseProfileGameDataAttributeList wrapper = new ResponseProfileGameDataAttributeList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-data-attribute/get/by-profile-id/by-game-id/by-code";

            List<ProfileGameDataAttribute> objs = api.GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                _profile_id
                , _game_id
                , _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSession() {
        

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/count";

            int i = api.CountGameSession(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/count/by-uuid";

            int i = api.CountGameSessionByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/count/by-game-id";

            int i = api.CountGameSessionByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/count/by-profile-id";

            int i = api.CountGameSessionByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameSessionInt wrapper = new ResponseGameSessionInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/count/by-profile-id/by-game-id";

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
            wrapper.code = 0;
            wrapper.action = "game-session/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game-session/set/by-uuid";
                        
            GameSession obj = new GameSession();
            
            string _game_area = util.GetParamValue(_context, "game_area");
            if(!String.IsNullOrEmpty(_game_area))
                obj.game_area = (string)_game_area;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _network_uuid = util.GetParamValue(_context, "network_uuid");
            if(!String.IsNullOrEmpty(_network_uuid))
                obj.network_uuid = (string)_network_uuid;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _game_level = util.GetParamValue(_context, "game_level");
            if(!String.IsNullOrEmpty(_game_level))
                obj.game_level = (string)_game_level;
            
            string _profile_network = util.GetParamValue(_context, "profile_network");
            if(!String.IsNullOrEmpty(_profile_network))
                obj.profile_network = (string)_profile_network;
            
            string _profile_device = util.GetParamValue(_context, "profile_device");
            if(!String.IsNullOrEmpty(_profile_device))
                obj.profile_device = (string)_profile_device;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _network_external_port = util.GetParamValue(_context, "network_external_port");
            if(!String.IsNullOrEmpty(_network_external_port))
                obj.network_external_port = Convert.ToInt32(_network_external_port);
            
            string _game_players_connected = util.GetParamValue(_context, "game_players_connected");
            if(!String.IsNullOrEmpty(_game_players_connected))
                obj.game_players_connected = Convert.ToInt32(_game_players_connected);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _game_state = util.GetParamValue(_context, "game_state");
            if(!String.IsNullOrEmpty(_game_state))
                obj.game_state = (string)_game_state;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _network_external_ip = util.GetParamValue(_context, "network_external_ip");
            if(!String.IsNullOrEmpty(_network_external_ip))
                obj.network_external_ip = (string)_network_external_ip;
            
            string _profile_username = util.GetParamValue(_context, "profile_username");
            if(!String.IsNullOrEmpty(_profile_username))
                obj.profile_username = (string)_profile_username;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_code = util.GetParamValue(_context, "game_code");
            if(!String.IsNullOrEmpty(_game_code))
                obj.game_code = (string)_game_code;
            
            string _game_player_z = util.GetParamValue(_context, "game_player_z");
            if(!String.IsNullOrEmpty(_game_player_z))
                obj.game_player_z = float.Parse(_game_player_z);
            
            string _game_player_x = util.GetParamValue(_context, "game_player_x");
            if(!String.IsNullOrEmpty(_game_player_x))
                obj.game_player_x = float.Parse(_game_player_x);
            
            string _game_player_y = util.GetParamValue(_context, "game_player_y");
            if(!String.IsNullOrEmpty(_game_player_y))
                obj.game_player_y = float.Parse(_game_player_y);
            
            string _network_port = util.GetParamValue(_context, "network_port");
            if(!String.IsNullOrEmpty(_network_port))
                obj.network_port = Convert.ToInt32(_network_port);
            
            string _game_players_allowed = util.GetParamValue(_context, "game_players_allowed");
            if(!String.IsNullOrEmpty(_game_players_allowed))
                obj.game_players_allowed = Convert.ToInt32(_game_players_allowed);
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = (string)_game_type;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _network_ip = util.GetParamValue(_context, "network_ip");
            if(!String.IsNullOrEmpty(_network_ip))
                obj.network_ip = (string)_network_ip;
            
            string _network_use_nat = util.GetParamValue(_context, "network_use_nat");
            if(!String.IsNullOrEmpty(_network_use_nat))
                obj.network_use_nat = Convert.ToBoolean(_network_use_nat);
            
            
            // get data
            wrapper.data = api.SetGameSessionByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameSessionByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameSessionBool wrapper = new ResponseGameSessionBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "game-session/get";

            List<GameSession> objs = api.GetGameSessionList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/get/by-uuid";

            List<GameSession> objs = api.GetGameSessionListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/get/by-game-id";

            List<GameSession> objs = api.GetGameSessionListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/get/by-profile-id";

            List<GameSession> objs = api.GetGameSessionListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameSessionList wrapper = new ResponseGameSessionList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session/get/by-profile-id/by-game-id";

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
            wrapper.code = 0;
            wrapper.action = "game-session-data/count";

            int i = api.CountGameSessionData(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameSessionDataByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameSessionDataInt wrapper = new ResponseGameSessionDataInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session-data/count/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "game-session-data/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game-session-data/set/by-uuid";
                        
            GameSessionData obj = new GameSessionData();
            
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
            
            string _data_results = util.GetParamValue(_context, "data_results");
            if(!String.IsNullOrEmpty(_data_results))
                obj.data_results = (string)_data_results;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _data_layer_projectile = util.GetParamValue(_context, "data_layer_projectile");
            if(!String.IsNullOrEmpty(_data_layer_projectile))
                obj.data_layer_projectile = (string)_data_layer_projectile;
            
            string _data_layer_actors = util.GetParamValue(_context, "data_layer_actors");
            if(!String.IsNullOrEmpty(_data_layer_actors))
                obj.data_layer_actors = (string)_data_layer_actors;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _data_layer_enemy = util.GetParamValue(_context, "data_layer_enemy");
            if(!String.IsNullOrEmpty(_data_layer_enemy))
                obj.data_layer_enemy = (string)_data_layer_enemy;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameSessionDataByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameSessionDataByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameSessionDataBool wrapper = new ResponseGameSessionDataBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session-data/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "game-session-data/get";

            List<GameSessionData> objs = api.GetGameSessionDataList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameSessionDataListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameSessionDataList wrapper = new ResponseGameSessionDataList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-session-data/get/by-uuid";

            List<GameSessionData> objs = api.GetGameSessionDataListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameContent() {
        

            ResponseGameContentInt wrapper = new ResponseGameContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/count";

            int i = api.CountGameContent(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameContentByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameContentInt wrapper = new ResponseGameContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/count/by-uuid";

            int i = api.CountGameContentByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameContentByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameContentInt wrapper = new ResponseGameContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/count/by-game-id";

            int i = api.CountGameContentByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameContentByGameIdByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameContentInt wrapper = new ResponseGameContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/count/by-game-id/by-path";

            int i = api.CountGameContentByGameIdByPath(
                _game_id
                , _path
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameContentByGameIdByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameContentInt wrapper = new ResponseGameContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/count/by-game-id/by-path/by-version";

            int i = api.CountGameContentByGameIdByPathByVersion(
                _game_id
                , _path
                , _version
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameContentByGameIdByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameContentInt wrapper = new ResponseGameContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/count/by-game-id/by-path/by-version/by-platform/by-increment";

            int i = api.CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
                _game_id
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameContentListByFilter()  {
        
            ResponseGameContentList wrapper = new ResponseGameContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameContentResult result = api.BrowseGameContentListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameContentByUuid()  {
        
            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/set/by-uuid";
                        
            GameContent obj = new GameContent();
            
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
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
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
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameContentByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameContentByGameId()  {
        
            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/set/by-game-id";
                        
            GameContent obj = new GameContent();
            
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
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
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
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameContentByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameContentByGameIdByPath()  {
        
            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/set/by-game-id/by-path";
                        
            GameContent obj = new GameContent();
            
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
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
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
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameContentByGameIdByPath(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameContentByGameIdByPathByVersion()  {
        
            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/set/by-game-id/by-path/by-version";
                        
            GameContent obj = new GameContent();
            
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
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
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
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameContentByGameIdByPathByVersion(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameContentByGameIdByPathByVersionByPlatformByIncrement()  {
        
            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/set/by-game-id/by-path/by-version/by-platform/by-increment";
                        
            GameContent obj = new GameContent();
            
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
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
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
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameContentByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/del/by-uuid";

            bool completed = api.DelGameContentByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameContentByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/del/by-game-id";

            bool completed = api.DelGameContentByGameId(
                        
                _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameContentByGameIdByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/del/by-game-id/by-path";

            bool completed = api.DelGameContentByGameIdByPath(
                        
                _game_id
                , _path
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameContentByGameIdByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/del/by-game-id/by-path/by-version";

            bool completed = api.DelGameContentByGameIdByPathByVersion(
                        
                _game_id
                , _path
                , _version
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameContentByGameIdByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameContentBool wrapper = new ResponseGameContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/del/by-game-id/by-path/by-version/by-platform/by-increment";

            bool completed = api.DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
                        
                _game_id
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameContentList() {
        

            ResponseGameContentList wrapper = new ResponseGameContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/get";

            List<GameContent> objs = api.GetGameContentList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameContentListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameContentList wrapper = new ResponseGameContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/get/by-uuid";

            List<GameContent> objs = api.GetGameContentListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameContentListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameContentList wrapper = new ResponseGameContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/get/by-game-id";

            List<GameContent> objs = api.GetGameContentListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameContentListByGameIdByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameContentList wrapper = new ResponseGameContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/get/by-game-id/by-path";

            List<GameContent> objs = api.GetGameContentListByGameIdByPath(
                _game_id
                , _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameContentListByGameIdByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameContentList wrapper = new ResponseGameContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/get/by-game-id/by-path/by-version";

            List<GameContent> objs = api.GetGameContentListByGameIdByPathByVersion(
                _game_id
                , _path
                , _version
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameContentListByGameIdByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameContentList wrapper = new ResponseGameContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-content/get/by-game-id/by-path/by-version/by-platform/by-increment";

            List<GameContent> objs = api.GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                _game_id
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContent() {
        

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count";

            int i = api.CountGameProfileContent(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-uuid";

            int i = api.CountGameProfileContentByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByProfileId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-profile-id";

            int i = api.CountGameProfileContentByGameIdByProfileId(
                _game_id
                , _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByUsername() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-username";

            int i = api.CountGameProfileContentByGameIdByUsername(
                _game_id
                , _username
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-username";

            int i = api.CountGameProfileContentByUsername(
                _username
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByProfileIdByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-profile-id/by-path";

            int i = api.CountGameProfileContentByGameIdByProfileIdByPath(
                _game_id
                , _profile_id
                , _path
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByProfileIdByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-profile-id/by-path/by-version";

            int i = api.CountGameProfileContentByGameIdByProfileIdByPathByVersion(
                _game_id
                , _profile_id
                , _path
                , _version
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment";

            int i = api.CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                _game_id
                , _profile_id
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByUsernameByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-username/by-path";

            int i = api.CountGameProfileContentByGameIdByUsernameByPath(
                _game_id
                , _username
                , _path
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByUsernameByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-username/by-path/by-version";

            int i = api.CountGameProfileContentByGameIdByUsernameByPathByVersion(
                _game_id
                , _username
                , _path
                , _version
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameProfileContentInt wrapper = new ResponseGameProfileContentInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/count/by-game-id/by-username/by-path/by-version/by-platform/by-increment";

            int i = api.CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                _game_id
                , _username
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameProfileContentListByFilter()  {
        
            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameProfileContentResult result = api.BrowseGameProfileContentListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByUuid()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-uuid";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByProfileId()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-profile-id";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByProfileId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByUsername()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-username";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByUsername(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByUsername()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-username";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByUsername(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByProfileIdByPath()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-profile-id/by-path";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByProfileIdByPath(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByProfileIdByPathByVersion()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-profile-id/by-path/by-version";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByProfileIdByPathByVersion(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByUsernameByPath()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-username/by-path";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByUsernameByPath(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByUsernameByPathByVersion()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-username/by-path/by-version";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByUsernameByPathByVersion(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement()  {
        
            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/set/by-game-id/by-username/by-path/by-version/by-platform/by-increment";
                        
            GameProfileContent obj = new GameProfileContent();
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _increment = util.GetParamValue(_context, "increment");
            if(!String.IsNullOrEmpty(_increment))
                obj.increment = Convert.ToInt32(_increment);
            
            string _path = util.GetParamValue(_context, "path");
            if(!String.IsNullOrEmpty(_path))
                obj.path = (string)_path;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _platform = util.GetParamValue(_context, "platform");
            if(!String.IsNullOrEmpty(_platform))
                obj.platform = (string)_platform;
            
            string _filename = util.GetParamValue(_context, "filename");
            if(!String.IsNullOrEmpty(_filename))
                obj.filename = (string)_filename;
            
            string _source = util.GetParamValue(_context, "source");
            if(!String.IsNullOrEmpty(_source))
                obj.source = (string)_source;
            
            string _version = util.GetParamValue(_context, "version");
            if(!String.IsNullOrEmpty(_version))
                obj.version = (string)_version;
            
            string _game_network = util.GetParamValue(_context, "game_network");
            if(!String.IsNullOrEmpty(_game_network))
                obj.game_network = (string)_game_network;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _hash = util.GetParamValue(_context, "hash");
            if(!String.IsNullOrEmpty(_hash))
                obj.hash = (string)_hash;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _extension = util.GetParamValue(_context, "extension");
            if(!String.IsNullOrEmpty(_extension))
                obj.extension = (string)_extension;
            
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
            
            
            // get data
            wrapper.data = api.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-uuid";

            bool completed = api.DelGameProfileContentByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByProfileId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-profile-id";

            bool completed = api.DelGameProfileContentByGameIdByProfileId(
                        
                _game_id
                , _profile_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByUsername() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-username";

            bool completed = api.DelGameProfileContentByGameIdByUsername(
                        
                _game_id
                , _username
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-username";

            bool completed = api.DelGameProfileContentByUsername(
                        
                _username
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByProfileIdByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-profile-id/by-path";

            bool completed = api.DelGameProfileContentByGameIdByProfileIdByPath(
                        
                _game_id
                , _profile_id
                , _path
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByProfileIdByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-profile-id/by-path/by-version";

            bool completed = api.DelGameProfileContentByGameIdByProfileIdByPathByVersion(
                        
                _game_id
                , _profile_id
                , _path
                , _version
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment";

            bool completed = api.DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                        
                _game_id
                , _profile_id
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByUsernameByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-username/by-path";

            bool completed = api.DelGameProfileContentByGameIdByUsernameByPath(
                        
                _game_id
                , _username
                , _path
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByUsernameByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-username/by-path/by-version";

            bool completed = api.DelGameProfileContentByGameIdByUsernameByPathByVersion(
                        
                _game_id
                , _username
                , _path
                , _version
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameProfileContentBool wrapper = new ResponseGameProfileContentBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/del/by-game-id/by-username/by-path/by-version/by-platform/by-increment";

            bool completed = api.DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                        
                _game_id
                , _username
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentList() {
        

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get";

            List<GameProfileContent> objs = api.GetGameProfileContentList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-uuid";

            List<GameProfileContent> objs = api.GetGameProfileContentListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByProfileId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-profile-id";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByProfileId(
                _game_id
                , _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByUsername() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-username";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByUsername(
                _game_id
                , _username
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-username";

            List<GameProfileContent> objs = api.GetGameProfileContentListByUsername(
                _username
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByProfileIdByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-profile-id/by-path";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByProfileIdByPath(
                _game_id
                , _profile_id
                , _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByProfileIdByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-profile-id/by-path/by-version";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                _game_id
                , _profile_id
                , _path
                , _version
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-profile-id/by-path/by-version/by-platform/by-increment";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                _game_id
                , _profile_id
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByUsernameByPath() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-username/by-path";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByUsernameByPath(
                _game_id
                , _username
                , _path
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByUsernameByPathByVersion() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-username/by-path/by-version";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByUsernameByPathByVersion(
                _game_id
                , _username
                , _path
                , _version
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _username = (string)util.GetParamValue(_context, "username");
            string _path = (string)util.GetParamValue(_context, "path");
            string _version = (string)util.GetParamValue(_context, "version");
            string _platform = (string)util.GetParamValue(_context, "platform");
            int _increment = int.Parse(util.GetParamValue(_context, "increment"));

            ResponseGameProfileContentList wrapper = new ResponseGameProfileContentList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-content/get/by-game-id/by-username/by-path/by-version/by-platform/by-increment";

            List<GameProfileContent> objs = api.GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                _game_id
                , _username
                , _path
                , _version
                , _platform
                , _increment
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameApp() {
        

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/count";

            int i = api.CountGameApp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/count/by-uuid";

            int i = api.CountGameAppByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/count/by-game-id";

            int i = api.CountGameAppByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/count/by-app-id";

            int i = api.CountGameAppByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAppByGameIdByAppId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameAppInt wrapper = new ResponseGameAppInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/count/by-game-id/by-app-id";

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
            wrapper.code = 0;
            wrapper.action = "game-app/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "game-app/set/by-uuid";
                        
            GameApp obj = new GameApp();
            
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
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _app_id = util.GetParamValue(_context, "app_id");
            if(!String.IsNullOrEmpty(_app_id))
                obj.app_id = (string)_app_id;
            
            
            // get data
            wrapper.data = api.SetGameAppByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameAppByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameAppBool wrapper = new ResponseGameAppBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "game-app/get";

            List<GameApp> objs = api.GetGameAppList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/get/by-uuid";

            List<GameApp> objs = api.GetGameAppListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/get/by-game-id";

            List<GameApp> objs = api.GetGameAppListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByAppId() {
        
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/get/by-app-id";

            List<GameApp> objs = api.GetGameAppListByAppId(
                _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAppListByGameIdByAppId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            string _app_id = (string)util.GetParamValue(_context, "app_id");

            ResponseGameAppList wrapper = new ResponseGameAppList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-app/get/by-game-id/by-app-id";

            List<GameApp> objs = api.GetGameAppListByGameIdByAppId(
                _game_id
                , _app_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocation() {
        

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/count";

            int i = api.CountProfileGameLocation(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/count/by-uuid";

            int i = api.CountProfileGameLocationByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByGameLocationId() {
        
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/count/by-game-location-id";

            int i = api.CountProfileGameLocationByGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/count/by-profile-id";

            int i = api.CountProfileGameLocationByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountProfileGameLocationByProfileIdByGameLocationId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseProfileGameLocationInt wrapper = new ResponseProfileGameLocationInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/count/by-profile-id/by-game-location-id";

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
            wrapper.code = 0;
            wrapper.action = "profile-game-location/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
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
            wrapper.code = 0;
            wrapper.action = "profile-game-location/set/by-uuid";
                        
            ProfileGameLocation obj = new ProfileGameLocation();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _game_location_id = util.GetParamValue(_context, "game_location_id");
            if(!String.IsNullOrEmpty(_game_location_id))
                obj.game_location_id = (string)_game_location_id;
            
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
            
            
            // get data
            wrapper.data = api.SetProfileGameLocationByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelProfileGameLocationByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameLocationBool wrapper = new ResponseProfileGameLocationBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/del/by-uuid";

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
            wrapper.code = 0;
            wrapper.action = "profile-game-location/get";

            List<ProfileGameLocation> objs = api.GetProfileGameLocationList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/get/by-uuid";

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByGameLocationId() {
        
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/get/by-game-location-id";

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByGameLocationId(
                _game_location_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByProfileId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/get/by-profile-id";

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByProfileId(
                _profile_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetProfileGameLocationListByProfileIdByGameLocationId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_location_id = (string)util.GetParamValue(_context, "game_location_id");

            ResponseProfileGameLocationList wrapper = new ResponseProfileGameLocationList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "profile-game-location/get/by-profile-id/by-game-location-id";

            List<ProfileGameLocation> objs = api.GetProfileGameLocationListByProfileIdByGameLocationId(
                _profile_id
                , _game_location_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGamePhoto() {
        

            ResponseGamePhotoInt wrapper = new ResponseGamePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/count";

            int i = api.CountGamePhoto(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGamePhotoByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGamePhotoInt wrapper = new ResponseGamePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/count/by-uuid";

            int i = api.CountGamePhotoByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGamePhotoByExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoInt wrapper = new ResponseGamePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/count/by-external-id";

            int i = api.CountGamePhotoByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGamePhotoByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGamePhotoInt wrapper = new ResponseGamePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/count/by-url";

            int i = api.CountGamePhotoByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGamePhotoByUrlByExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoInt wrapper = new ResponseGamePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/count/by-url/by-external-id";

            int i = api.CountGamePhotoByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGamePhotoByUuidByExternalId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoInt wrapper = new ResponseGamePhotoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/count/by-uuid/by-external-id";

            int i = api.CountGamePhotoByUuidByExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGamePhotoListByFilter()  {
        
            ResponseGamePhotoList wrapper = new ResponseGamePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GamePhotoResult result = api.BrowseGamePhotoListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGamePhotoByUuid()  {
        
            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/set/by-uuid";
                        
            GamePhoto obj = new GamePhoto();
            
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
            wrapper.data = api.SetGamePhotoByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGamePhotoByExternalId()  {
        
            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/set/by-external-id";
                        
            GamePhoto obj = new GamePhoto();
            
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
            wrapper.data = api.SetGamePhotoByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGamePhotoByUrl()  {
        
            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/set/by-url";
                        
            GamePhoto obj = new GamePhoto();
            
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
            wrapper.data = api.SetGamePhotoByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGamePhotoByUrlByExternalId()  {
        
            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/set/by-url/by-external-id";
                        
            GamePhoto obj = new GamePhoto();
            
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
            wrapper.data = api.SetGamePhotoByUrlByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGamePhotoByUuidByExternalId()  {
        
            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/set/by-uuid/by-external-id";
                        
            GamePhoto obj = new GamePhoto();
            
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
            wrapper.data = api.SetGamePhotoByUuidByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGamePhotoByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/del/by-uuid";

            bool completed = api.DelGamePhotoByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGamePhotoByExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/del/by-external-id";

            bool completed = api.DelGamePhotoByExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGamePhotoByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/del/by-url";

            bool completed = api.DelGamePhotoByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGamePhotoByUrlByExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/del/by-url/by-external-id";

            bool completed = api.DelGamePhotoByUrlByExternalId(
                        
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGamePhotoByUuidByExternalId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoBool wrapper = new ResponseGamePhotoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/del/by-uuid/by-external-id";

            bool completed = api.DelGamePhotoByUuidByExternalId(
                        
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGamePhotoList() {
        

            ResponseGamePhotoList wrapper = new ResponseGamePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/get";

            List<GamePhoto> objs = api.GetGamePhotoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGamePhotoListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGamePhotoList wrapper = new ResponseGamePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/get/by-uuid";

            List<GamePhoto> objs = api.GetGamePhotoListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGamePhotoListByExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoList wrapper = new ResponseGamePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/get/by-external-id";

            List<GamePhoto> objs = api.GetGamePhotoListByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGamePhotoListByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGamePhotoList wrapper = new ResponseGamePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/get/by-url";

            List<GamePhoto> objs = api.GetGamePhotoListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGamePhotoListByUrlByExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoList wrapper = new ResponseGamePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/get/by-url/by-external-id";

            List<GamePhoto> objs = api.GetGamePhotoListByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGamePhotoListByUuidByExternalId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGamePhotoList wrapper = new ResponseGamePhotoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-photo/get/by-uuid/by-external-id";

            List<GamePhoto> objs = api.GetGamePhotoListByUuidByExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameVideo() {
        

            ResponseGameVideoInt wrapper = new ResponseGameVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/count";

            int i = api.CountGameVideo(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameVideoByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameVideoInt wrapper = new ResponseGameVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/count/by-uuid";

            int i = api.CountGameVideoByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameVideoByExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoInt wrapper = new ResponseGameVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/count/by-external-id";

            int i = api.CountGameVideoByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameVideoByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameVideoInt wrapper = new ResponseGameVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/count/by-url";

            int i = api.CountGameVideoByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameVideoByUrlByExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoInt wrapper = new ResponseGameVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/count/by-url/by-external-id";

            int i = api.CountGameVideoByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameVideoByUuidByExternalId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoInt wrapper = new ResponseGameVideoInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/count/by-uuid/by-external-id";

            int i = api.CountGameVideoByUuidByExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameVideoListByFilter()  {
        
            ResponseGameVideoList wrapper = new ResponseGameVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameVideoResult result = api.BrowseGameVideoListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameVideoByUuid()  {
        
            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/set/by-uuid";
                        
            GameVideo obj = new GameVideo();
            
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
            wrapper.data = api.SetGameVideoByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameVideoByExternalId()  {
        
            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/set/by-external-id";
                        
            GameVideo obj = new GameVideo();
            
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
            wrapper.data = api.SetGameVideoByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameVideoByUrl()  {
        
            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/set/by-url";
                        
            GameVideo obj = new GameVideo();
            
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
            wrapper.data = api.SetGameVideoByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameVideoByUrlByExternalId()  {
        
            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/set/by-url/by-external-id";
                        
            GameVideo obj = new GameVideo();
            
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
            wrapper.data = api.SetGameVideoByUrlByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameVideoByUuidByExternalId()  {
        
            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/set/by-uuid/by-external-id";
                        
            GameVideo obj = new GameVideo();
            
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
            wrapper.data = api.SetGameVideoByUuidByExternalId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameVideoByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/del/by-uuid";

            bool completed = api.DelGameVideoByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameVideoByExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/del/by-external-id";

            bool completed = api.DelGameVideoByExternalId(
                        
                _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameVideoByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/del/by-url";

            bool completed = api.DelGameVideoByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameVideoByUrlByExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/del/by-url/by-external-id";

            bool completed = api.DelGameVideoByUrlByExternalId(
                        
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameVideoByUuidByExternalId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoBool wrapper = new ResponseGameVideoBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/del/by-uuid/by-external-id";

            bool completed = api.DelGameVideoByUuidByExternalId(
                        
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameVideoList() {
        

            ResponseGameVideoList wrapper = new ResponseGameVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/get";

            List<GameVideo> objs = api.GetGameVideoList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameVideoListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameVideoList wrapper = new ResponseGameVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/get/by-uuid";

            List<GameVideo> objs = api.GetGameVideoListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameVideoListByExternalId() {
        
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoList wrapper = new ResponseGameVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/get/by-external-id";

            List<GameVideo> objs = api.GetGameVideoListByExternalId(
                _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameVideoListByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameVideoList wrapper = new ResponseGameVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/get/by-url";

            List<GameVideo> objs = api.GetGameVideoListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameVideoListByUrlByExternalId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoList wrapper = new ResponseGameVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/get/by-url/by-external-id";

            List<GameVideo> objs = api.GetGameVideoListByUrlByExternalId(
                _url
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameVideoListByUuidByExternalId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _external_id = (string)util.GetParamValue(_context, "external_id");

            ResponseGameVideoList wrapper = new ResponseGameVideoList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-video/get/by-uuid/by-external-id";

            List<GameVideo> objs = api.GetGameVideoListByUuidByExternalId(
                _uuid
                , _external_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItem() {
        

            ResponseGameRpgItemInt wrapper = new ResponseGameRpgItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/count";

            int i = api.CountGameRpgItem(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemInt wrapper = new ResponseGameRpgItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/count/by-uuid";

            int i = api.CountGameRpgItemByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemInt wrapper = new ResponseGameRpgItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/count/by-game-id";

            int i = api.CountGameRpgItemByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemInt wrapper = new ResponseGameRpgItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/count/by-url";

            int i = api.CountGameRpgItemByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemInt wrapper = new ResponseGameRpgItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/count/by-url/by-game-id";

            int i = api.CountGameRpgItemByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemInt wrapper = new ResponseGameRpgItemInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/count/by-uuid/by-game-id";

            int i = api.CountGameRpgItemByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameRpgItemListByFilter()  {
        
            ResponseGameRpgItemList wrapper = new ResponseGameRpgItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameRpgItemResult result = api.BrowseGameRpgItemListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemByUuid()  {
        
            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/set/by-uuid";
                        
            GameRpgItem obj = new GameRpgItem();
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemByGameId()  {
        
            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/set/by-game-id";
                        
            GameRpgItem obj = new GameRpgItem();
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemByUrl()  {
        
            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/set/by-url";
                        
            GameRpgItem obj = new GameRpgItem();
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemByUrlByGameId()  {
        
            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/set/by-url/by-game-id";
                        
            GameRpgItem obj = new GameRpgItem();
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemByUrlByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemByUuidByGameId()  {
        
            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/set/by-uuid/by-game-id";
                        
            GameRpgItem obj = new GameRpgItem();
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemByUuidByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/del/by-uuid";

            bool completed = api.DelGameRpgItemByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/del/by-game-id";

            bool completed = api.DelGameRpgItemByGameId(
                        
                _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/del/by-url";

            bool completed = api.DelGameRpgItemByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/del/by-url/by-game-id";

            bool completed = api.DelGameRpgItemByUrlByGameId(
                        
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemBool wrapper = new ResponseGameRpgItemBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/del/by-uuid/by-game-id";

            bool completed = api.DelGameRpgItemByUuidByGameId(
                        
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemList() {
        

            ResponseGameRpgItemList wrapper = new ResponseGameRpgItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/get";

            List<GameRpgItem> objs = api.GetGameRpgItemList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemList wrapper = new ResponseGameRpgItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/get/by-uuid";

            List<GameRpgItem> objs = api.GetGameRpgItemListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemList wrapper = new ResponseGameRpgItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/get/by-game-id";

            List<GameRpgItem> objs = api.GetGameRpgItemListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemListByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemList wrapper = new ResponseGameRpgItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/get/by-url";

            List<GameRpgItem> objs = api.GetGameRpgItemListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemListByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemList wrapper = new ResponseGameRpgItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/get/by-url/by-game-id";

            List<GameRpgItem> objs = api.GetGameRpgItemListByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemListByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemList wrapper = new ResponseGameRpgItemList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item/get/by-uuid/by-game-id";

            List<GameRpgItem> objs = api.GetGameRpgItemListByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemWeapon() {
        

            ResponseGameRpgItemWeaponInt wrapper = new ResponseGameRpgItemWeaponInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/count";

            int i = api.CountGameRpgItemWeapon(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemWeaponByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemWeaponInt wrapper = new ResponseGameRpgItemWeaponInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/count/by-uuid";

            int i = api.CountGameRpgItemWeaponByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemWeaponByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponInt wrapper = new ResponseGameRpgItemWeaponInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/count/by-game-id";

            int i = api.CountGameRpgItemWeaponByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemWeaponByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemWeaponInt wrapper = new ResponseGameRpgItemWeaponInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/count/by-url";

            int i = api.CountGameRpgItemWeaponByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemWeaponByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponInt wrapper = new ResponseGameRpgItemWeaponInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/count/by-url/by-game-id";

            int i = api.CountGameRpgItemWeaponByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemWeaponByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponInt wrapper = new ResponseGameRpgItemWeaponInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/count/by-uuid/by-game-id";

            int i = api.CountGameRpgItemWeaponByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameRpgItemWeaponListByFilter()  {
        
            ResponseGameRpgItemWeaponList wrapper = new ResponseGameRpgItemWeaponList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameRpgItemWeaponResult result = api.BrowseGameRpgItemWeaponListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemWeaponByUuid()  {
        
            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/set/by-uuid";
                        
            GameRpgItemWeapon obj = new GameRpgItemWeapon();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemWeaponByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemWeaponByGameId()  {
        
            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/set/by-game-id";
                        
            GameRpgItemWeapon obj = new GameRpgItemWeapon();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemWeaponByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemWeaponByUrl()  {
        
            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/set/by-url";
                        
            GameRpgItemWeapon obj = new GameRpgItemWeapon();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemWeaponByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemWeaponByUrlByGameId()  {
        
            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/set/by-url/by-game-id";
                        
            GameRpgItemWeapon obj = new GameRpgItemWeapon();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemWeaponByUrlByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemWeaponByUuidByGameId()  {
        
            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/set/by-uuid/by-game-id";
                        
            GameRpgItemWeapon obj = new GameRpgItemWeapon();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemWeaponByUuidByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemWeaponByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/del/by-uuid";

            bool completed = api.DelGameRpgItemWeaponByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemWeaponByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/del/by-game-id";

            bool completed = api.DelGameRpgItemWeaponByGameId(
                        
                _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemWeaponByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/del/by-url";

            bool completed = api.DelGameRpgItemWeaponByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemWeaponByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/del/by-url/by-game-id";

            bool completed = api.DelGameRpgItemWeaponByUrlByGameId(
                        
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemWeaponByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponBool wrapper = new ResponseGameRpgItemWeaponBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/del/by-uuid/by-game-id";

            bool completed = api.DelGameRpgItemWeaponByUuidByGameId(
                        
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemWeaponList() {
        

            ResponseGameRpgItemWeaponList wrapper = new ResponseGameRpgItemWeaponList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/get";

            List<GameRpgItemWeapon> objs = api.GetGameRpgItemWeaponList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemWeaponListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemWeaponList wrapper = new ResponseGameRpgItemWeaponList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/get/by-uuid";

            List<GameRpgItemWeapon> objs = api.GetGameRpgItemWeaponListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemWeaponListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponList wrapper = new ResponseGameRpgItemWeaponList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/get/by-game-id";

            List<GameRpgItemWeapon> objs = api.GetGameRpgItemWeaponListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemWeaponListByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemWeaponList wrapper = new ResponseGameRpgItemWeaponList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/get/by-url";

            List<GameRpgItemWeapon> objs = api.GetGameRpgItemWeaponListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemWeaponListByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponList wrapper = new ResponseGameRpgItemWeaponList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/get/by-url/by-game-id";

            List<GameRpgItemWeapon> objs = api.GetGameRpgItemWeaponListByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemWeaponListByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemWeaponList wrapper = new ResponseGameRpgItemWeaponList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-weapon/get/by-uuid/by-game-id";

            List<GameRpgItemWeapon> objs = api.GetGameRpgItemWeaponListByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemSkill() {
        

            ResponseGameRpgItemSkillInt wrapper = new ResponseGameRpgItemSkillInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/count";

            int i = api.CountGameRpgItemSkill(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemSkillByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemSkillInt wrapper = new ResponseGameRpgItemSkillInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/count/by-uuid";

            int i = api.CountGameRpgItemSkillByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemSkillByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillInt wrapper = new ResponseGameRpgItemSkillInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/count/by-game-id";

            int i = api.CountGameRpgItemSkillByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemSkillByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemSkillInt wrapper = new ResponseGameRpgItemSkillInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/count/by-url";

            int i = api.CountGameRpgItemSkillByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemSkillByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillInt wrapper = new ResponseGameRpgItemSkillInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/count/by-url/by-game-id";

            int i = api.CountGameRpgItemSkillByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameRpgItemSkillByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillInt wrapper = new ResponseGameRpgItemSkillInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/count/by-uuid/by-game-id";

            int i = api.CountGameRpgItemSkillByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameRpgItemSkillListByFilter()  {
        
            ResponseGameRpgItemSkillList wrapper = new ResponseGameRpgItemSkillList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameRpgItemSkillResult result = api.BrowseGameRpgItemSkillListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemSkillByUuid()  {
        
            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/set/by-uuid";
                        
            GameRpgItemSkill obj = new GameRpgItemSkill();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemSkillByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemSkillByGameId()  {
        
            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/set/by-game-id";
                        
            GameRpgItemSkill obj = new GameRpgItemSkill();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemSkillByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemSkillByUrl()  {
        
            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/set/by-url";
                        
            GameRpgItemSkill obj = new GameRpgItemSkill();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemSkillByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemSkillByUrlByGameId()  {
        
            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/set/by-url/by-game-id";
                        
            GameRpgItemSkill obj = new GameRpgItemSkill();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemSkillByUrlByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameRpgItemSkillByUuidByGameId()  {
        
            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/set/by-uuid/by-game-id";
                        
            GameRpgItemSkill obj = new GameRpgItemSkill();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _third_party_oembed = util.GetParamValue(_context, "third_party_oembed");
            if(!String.IsNullOrEmpty(_third_party_oembed))
                obj.third_party_oembed = (string)_third_party_oembed;
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            string _game_defense = util.GetParamValue(_context, "game_defense");
            if(!String.IsNullOrEmpty(_game_defense))
                obj.game_defense = float.Parse(_game_defense);
            
            string _third_party_url = util.GetParamValue(_context, "third_party_url");
            if(!String.IsNullOrEmpty(_third_party_url))
                obj.third_party_url = (string)_third_party_url;
            
            string _third_party_id = util.GetParamValue(_context, "third_party_id");
            if(!String.IsNullOrEmpty(_third_party_id))
                obj.third_party_id = (string)_third_party_id;
            
            string _content_type = util.GetParamValue(_context, "content_type");
            if(!String.IsNullOrEmpty(_content_type))
                obj.content_type = (string)_content_type;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _game_attack = util.GetParamValue(_context, "game_attack");
            if(!String.IsNullOrEmpty(_game_attack))
                obj.game_attack = float.Parse(_game_attack);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
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
            
            string _game_price = util.GetParamValue(_context, "game_price");
            if(!String.IsNullOrEmpty(_game_price))
                obj.game_price = float.Parse(_game_price);
            
            string _game_type = util.GetParamValue(_context, "game_type");
            if(!String.IsNullOrEmpty(_game_type))
                obj.game_type = float.Parse(_game_type);
            
            string _game_skill = util.GetParamValue(_context, "game_skill");
            if(!String.IsNullOrEmpty(_game_skill))
                obj.game_skill = float.Parse(_game_skill);
            
            string _game_health = util.GetParamValue(_context, "game_health");
            if(!String.IsNullOrEmpty(_game_health))
                obj.game_health = float.Parse(_game_health);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _game_energy = util.GetParamValue(_context, "game_energy");
            if(!String.IsNullOrEmpty(_game_energy))
                obj.game_energy = float.Parse(_game_energy);
            
            string _game_data = util.GetParamValue(_context, "game_data");
            if(!String.IsNullOrEmpty(_game_data))
                obj.game_data = (string)_game_data;
            
            
            // get data
            wrapper.data = api.SetGameRpgItemSkillByUuidByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemSkillByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/del/by-uuid";

            bool completed = api.DelGameRpgItemSkillByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemSkillByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/del/by-game-id";

            bool completed = api.DelGameRpgItemSkillByGameId(
                        
                _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemSkillByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/del/by-url";

            bool completed = api.DelGameRpgItemSkillByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemSkillByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/del/by-url/by-game-id";

            bool completed = api.DelGameRpgItemSkillByUrlByGameId(
                        
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameRpgItemSkillByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillBool wrapper = new ResponseGameRpgItemSkillBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/del/by-uuid/by-game-id";

            bool completed = api.DelGameRpgItemSkillByUuidByGameId(
                        
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemSkillList() {
        

            ResponseGameRpgItemSkillList wrapper = new ResponseGameRpgItemSkillList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/get";

            List<GameRpgItemSkill> objs = api.GetGameRpgItemSkillList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemSkillListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameRpgItemSkillList wrapper = new ResponseGameRpgItemSkillList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/get/by-uuid";

            List<GameRpgItemSkill> objs = api.GetGameRpgItemSkillListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemSkillListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillList wrapper = new ResponseGameRpgItemSkillList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/get/by-game-id";

            List<GameRpgItemSkill> objs = api.GetGameRpgItemSkillListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemSkillListByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameRpgItemSkillList wrapper = new ResponseGameRpgItemSkillList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/get/by-url";

            List<GameRpgItemSkill> objs = api.GetGameRpgItemSkillListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemSkillListByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillList wrapper = new ResponseGameRpgItemSkillList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/get/by-url/by-game-id";

            List<GameRpgItemSkill> objs = api.GetGameRpgItemSkillListByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameRpgItemSkillListByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameRpgItemSkillList wrapper = new ResponseGameRpgItemSkillList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-rpg-item-skill/get/by-uuid/by-game-id";

            List<GameRpgItemSkill> objs = api.GetGameRpgItemSkillListByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProduct() {
        

            ResponseGameProductInt wrapper = new ResponseGameProductInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/count";

            int i = api.CountGameProduct(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProductByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProductInt wrapper = new ResponseGameProductInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/count/by-uuid";

            int i = api.CountGameProductByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProductByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductInt wrapper = new ResponseGameProductInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/count/by-game-id";

            int i = api.CountGameProductByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProductByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameProductInt wrapper = new ResponseGameProductInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/count/by-url";

            int i = api.CountGameProductByUrl(
                _url
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProductByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductInt wrapper = new ResponseGameProductInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/count/by-url/by-game-id";

            int i = api.CountGameProductByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProductByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductInt wrapper = new ResponseGameProductInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/count/by-uuid/by-game-id";

            int i = api.CountGameProductByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameProductListByFilter()  {
        
            ResponseGameProductList wrapper = new ResponseGameProductList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameProductResult result = api.BrowseGameProductListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProductByUuid()  {
        
            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/set/by-uuid";
                        
            GameProduct obj = new GameProduct();
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            wrapper.data = api.SetGameProductByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProductByGameId()  {
        
            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/set/by-game-id";
                        
            GameProduct obj = new GameProduct();
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            wrapper.data = api.SetGameProductByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProductByUrl()  {
        
            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/set/by-url";
                        
            GameProduct obj = new GameProduct();
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            wrapper.data = api.SetGameProductByUrl(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProductByUrlByGameId()  {
        
            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/set/by-url/by-game-id";
                        
            GameProduct obj = new GameProduct();
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            wrapper.data = api.SetGameProductByUrlByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProductByUuidByGameId()  {
        
            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/set/by-uuid/by-game-id";
                        
            GameProduct obj = new GameProduct();
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            wrapper.data = api.SetGameProductByUuidByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProductByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/del/by-uuid";

            bool completed = api.DelGameProductByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProductByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/del/by-game-id";

            bool completed = api.DelGameProductByGameId(
                        
                _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProductByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/del/by-url";

            bool completed = api.DelGameProductByUrl(
                        
                _url
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProductByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/del/by-url/by-game-id";

            bool completed = api.DelGameProductByUrlByGameId(
                        
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProductByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductBool wrapper = new ResponseGameProductBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/del/by-uuid/by-game-id";

            bool completed = api.DelGameProductByUuidByGameId(
                        
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProductList() {
        

            ResponseGameProductList wrapper = new ResponseGameProductList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/get";

            List<GameProduct> objs = api.GetGameProductList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProductListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProductList wrapper = new ResponseGameProductList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/get/by-uuid";

            List<GameProduct> objs = api.GetGameProductListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProductListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductList wrapper = new ResponseGameProductList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/get/by-game-id";

            List<GameProduct> objs = api.GetGameProductListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProductListByUrl() {
        
            string _url = (string)util.GetParamValue(_context, "url");

            ResponseGameProductList wrapper = new ResponseGameProductList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/get/by-url";

            List<GameProduct> objs = api.GetGameProductListByUrl(
                _url
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProductListByUrlByGameId() {
        
            string _url = (string)util.GetParamValue(_context, "url");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductList wrapper = new ResponseGameProductList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/get/by-url/by-game-id";

            List<GameProduct> objs = api.GetGameProductListByUrlByGameId(
                _url
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProductListByUuidByGameId() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProductList wrapper = new ResponseGameProductList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-product/get/by-uuid/by-game-id";

            List<GameProduct> objs = api.GetGameProductListByUuidByGameId(
                _uuid
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboard() {
        

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count";

            int i = api.CountGameStatisticLeaderboard(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboardByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count/by-uuid";

            int i = api.CountGameStatisticLeaderboardByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboardByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count/by-key";

            int i = api.CountGameStatisticLeaderboardByKey(
                _key
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboardByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count/by-game-id";

            int i = api.CountGameStatisticLeaderboardByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboardByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count/by-key/by-game-id";

            int i = api.CountGameStatisticLeaderboardByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboardByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count/by-profile-id/by-game-id";

            int i = api.CountGameStatisticLeaderboardByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboardByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count/by-key/by-profile-id/by-game-id";

            int i = api.CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameStatisticLeaderboardInt wrapper = new ResponseGameStatisticLeaderboardInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/count/by-key/by-profile-id/by-game-id/by-timestamp";

            int i = api.CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameStatisticLeaderboardListByFilter()  {
        
            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameStatisticLeaderboardResult result = api.BrowseGameStatisticLeaderboardListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticLeaderboardByUuid()  {
        
            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/set/by-uuid";
                        
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _stat_value_formatted = util.GetParamValue(_context, "stat_value_formatted");
            if(!String.IsNullOrEmpty(_stat_value_formatted))
                obj.stat_value_formatted = (string)_stat_value_formatted;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _rank = util.GetParamValue(_context, "rank");
            if(!String.IsNullOrEmpty(_rank))
                obj.rank = Convert.ToInt32(_rank);
            
            string _rank_change = util.GetParamValue(_context, "rank_change");
            if(!String.IsNullOrEmpty(_rank_change))
                obj.rank_change = Convert.ToInt32(_rank_change);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _rank_total_count = util.GetParamValue(_context, "rank_total_count");
            if(!String.IsNullOrEmpty(_rank_total_count))
                obj.rank_total_count = Convert.ToInt32(_rank_total_count);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameStatisticLeaderboardByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp()  {
        
            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/set/by-uuid/by-profile-id/by-game-id/by-timestamp";
                        
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _stat_value_formatted = util.GetParamValue(_context, "stat_value_formatted");
            if(!String.IsNullOrEmpty(_stat_value_formatted))
                obj.stat_value_formatted = (string)_stat_value_formatted;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _rank = util.GetParamValue(_context, "rank");
            if(!String.IsNullOrEmpty(_rank))
                obj.rank = Convert.ToInt32(_rank);
            
            string _rank_change = util.GetParamValue(_context, "rank_change");
            if(!String.IsNullOrEmpty(_rank_change))
                obj.rank_change = Convert.ToInt32(_rank_change);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _rank_total_count = util.GetParamValue(_context, "rank_total_count");
            if(!String.IsNullOrEmpty(_rank_total_count))
                obj.rank_total_count = Convert.ToInt32(_rank_total_count);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticLeaderboardByProfileIdByKey()  {
        
            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/set/by-profile-id/by-key";
                        
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _stat_value_formatted = util.GetParamValue(_context, "stat_value_formatted");
            if(!String.IsNullOrEmpty(_stat_value_formatted))
                obj.stat_value_formatted = (string)_stat_value_formatted;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _rank = util.GetParamValue(_context, "rank");
            if(!String.IsNullOrEmpty(_rank))
                obj.rank = Convert.ToInt32(_rank);
            
            string _rank_change = util.GetParamValue(_context, "rank_change");
            if(!String.IsNullOrEmpty(_rank_change))
                obj.rank_change = Convert.ToInt32(_rank_change);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _rank_total_count = util.GetParamValue(_context, "rank_total_count");
            if(!String.IsNullOrEmpty(_rank_total_count))
                obj.rank_total_count = Convert.ToInt32(_rank_total_count);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameStatisticLeaderboardByProfileIdByKey(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp()  {
        
            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/set/by-profile-id/by-key/by-timestamp";
                        
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _stat_value_formatted = util.GetParamValue(_context, "stat_value_formatted");
            if(!String.IsNullOrEmpty(_stat_value_formatted))
                obj.stat_value_formatted = (string)_stat_value_formatted;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _rank = util.GetParamValue(_context, "rank");
            if(!String.IsNullOrEmpty(_rank))
                obj.rank = Convert.ToInt32(_rank);
            
            string _rank_change = util.GetParamValue(_context, "rank_change");
            if(!String.IsNullOrEmpty(_rank_change))
                obj.rank_change = Convert.ToInt32(_rank_change);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _rank_total_count = util.GetParamValue(_context, "rank_total_count");
            if(!String.IsNullOrEmpty(_rank_total_count))
                obj.rank_total_count = Convert.ToInt32(_rank_total_count);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp()  {
        
            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/set/by-key/by-profile-id/by-game-id/by-timestamp";
                        
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _stat_value_formatted = util.GetParamValue(_context, "stat_value_formatted");
            if(!String.IsNullOrEmpty(_stat_value_formatted))
                obj.stat_value_formatted = (string)_stat_value_formatted;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _rank = util.GetParamValue(_context, "rank");
            if(!String.IsNullOrEmpty(_rank))
                obj.rank = Convert.ToInt32(_rank);
            
            string _rank_change = util.GetParamValue(_context, "rank_change");
            if(!String.IsNullOrEmpty(_rank_change))
                obj.rank_change = Convert.ToInt32(_rank_change);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _rank_total_count = util.GetParamValue(_context, "rank_total_count");
            if(!String.IsNullOrEmpty(_rank_total_count))
                obj.rank_total_count = Convert.ToInt32(_rank_total_count);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticLeaderboardByProfileIdByGameIdByKey()  {
        
            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/set/by-profile-id/by-game-id/by-key";
                        
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _stat_value_formatted = util.GetParamValue(_context, "stat_value_formatted");
            if(!String.IsNullOrEmpty(_stat_value_formatted))
                obj.stat_value_formatted = (string)_stat_value_formatted;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _rank = util.GetParamValue(_context, "rank");
            if(!String.IsNullOrEmpty(_rank))
                obj.rank = Convert.ToInt32(_rank);
            
            string _rank_change = util.GetParamValue(_context, "rank_change");
            if(!String.IsNullOrEmpty(_rank_change))
                obj.rank_change = Convert.ToInt32(_rank_change);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _rank_total_count = util.GetParamValue(_context, "rank_total_count");
            if(!String.IsNullOrEmpty(_rank_total_count))
                obj.rank_total_count = Convert.ToInt32(_rank_total_count);
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameStatisticLeaderboardByProfileIdByGameIdByKey(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameStatisticLeaderboardByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/del/by-uuid";

            bool completed = api.DelGameStatisticLeaderboardByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameStatisticLeaderboardByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/del/by-key/by-game-id";

            bool completed = api.DelGameStatisticLeaderboardByKeyByGameId(
                        
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameStatisticLeaderboardByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/del/by-profile-id/by-game-id";

            bool completed = api.DelGameStatisticLeaderboardByProfileIdByGameId(
                        
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameStatisticLeaderboardByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardBool wrapper = new ResponseGameStatisticLeaderboardBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/del/by-key/by-profile-id/by-game-id";

            bool completed = api.DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
                        
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardList() {
        

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-uuid";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-key";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByKey(
                _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-game-id";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-key/by-game-id";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-profile-id/by-game-id";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-profile-id/by-game-id/by-timestamp";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-key/by-profile-id/by-game-id";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameStatisticLeaderboardList wrapper = new ResponseGameStatisticLeaderboardList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-leaderboard/get/by-key/by-profile-id/by-game-id/by-timestamp";

            List<GameStatisticLeaderboard> objs = api.GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLiveQueue() {
        

            ResponseGameLiveQueueInt wrapper = new ResponseGameLiveQueueInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/count";

            int i = api.CountGameLiveQueue(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLiveQueueByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLiveQueueInt wrapper = new ResponseGameLiveQueueInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/count/by-uuid";

            int i = api.CountGameLiveQueueByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLiveQueueByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveQueueInt wrapper = new ResponseGameLiveQueueInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/count/by-profile-id/by-game-id";

            int i = api.CountGameLiveQueueByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameLiveQueueListByFilter()  {
        
            ResponseGameLiveQueueList wrapper = new ResponseGameLiveQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameLiveQueueResult result = api.BrowseGameLiveQueueListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameLiveQueueByUuid()  {
        
            ResponseGameLiveQueueBool wrapper = new ResponseGameLiveQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/set/by-uuid";
                        
            GameLiveQueue obj = new GameLiveQueue();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _data_stat = util.GetParamValue(_context, "data_stat");
            if(!String.IsNullOrEmpty(_data_stat))
                obj.data_stat = (string)_data_stat;
            
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
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _data_ad = util.GetParamValue(_context, "data_ad");
            if(!String.IsNullOrEmpty(_data_ad))
                obj.data_ad = (string)_data_ad;
            
            
            // get data
            wrapper.data = api.SetGameLiveQueueByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameLiveQueueByProfileIdByGameId()  {
        
            ResponseGameLiveQueueBool wrapper = new ResponseGameLiveQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/set/by-profile-id/by-game-id";
                        
            GameLiveQueue obj = new GameLiveQueue();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _data_stat = util.GetParamValue(_context, "data_stat");
            if(!String.IsNullOrEmpty(_data_stat))
                obj.data_stat = (string)_data_stat;
            
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
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            string _data_ad = util.GetParamValue(_context, "data_ad");
            if(!String.IsNullOrEmpty(_data_ad))
                obj.data_ad = (string)_data_ad;
            
            
            // get data
            wrapper.data = api.SetGameLiveQueueByProfileIdByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameLiveQueueByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLiveQueueBool wrapper = new ResponseGameLiveQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/del/by-uuid";

            bool completed = api.DelGameLiveQueueByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameLiveQueueByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveQueueBool wrapper = new ResponseGameLiveQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/del/by-profile-id/by-game-id";

            bool completed = api.DelGameLiveQueueByProfileIdByGameId(
                        
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveQueueList() {
        

            ResponseGameLiveQueueList wrapper = new ResponseGameLiveQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/get";

            List<GameLiveQueue> objs = api.GetGameLiveQueueList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveQueueListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLiveQueueList wrapper = new ResponseGameLiveQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/get/by-uuid";

            List<GameLiveQueue> objs = api.GetGameLiveQueueListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveQueueListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveQueueList wrapper = new ResponseGameLiveQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/get/by-game-id";

            List<GameLiveQueue> objs = api.GetGameLiveQueueListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveQueueListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveQueueList wrapper = new ResponseGameLiveQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-queue/get/by-profile-id/by-game-id";

            List<GameLiveQueue> objs = api.GetGameLiveQueueListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLiveRecentQueue() {
        

            ResponseGameLiveRecentQueueInt wrapper = new ResponseGameLiveRecentQueueInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/count";

            int i = api.CountGameLiveRecentQueue(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLiveRecentQueueByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLiveRecentQueueInt wrapper = new ResponseGameLiveRecentQueueInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/count/by-uuid";

            int i = api.CountGameLiveRecentQueueByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLiveRecentQueueByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveRecentQueueInt wrapper = new ResponseGameLiveRecentQueueInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/count/by-profile-id/by-game-id";

            int i = api.CountGameLiveRecentQueueByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameLiveRecentQueueListByFilter()  {
        
            ResponseGameLiveRecentQueueList wrapper = new ResponseGameLiveRecentQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameLiveRecentQueueResult result = api.BrowseGameLiveRecentQueueListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameLiveRecentQueueByUuid()  {
        
            ResponseGameLiveRecentQueueBool wrapper = new ResponseGameLiveRecentQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/set/by-uuid";
                        
            GameLiveRecentQueue obj = new GameLiveRecentQueue();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
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
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game = util.GetParamValue(_context, "game");
            if(!String.IsNullOrEmpty(_game))
                obj.game = (string)_game;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            wrapper.data = api.SetGameLiveRecentQueueByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameLiveRecentQueueByProfileIdByGameId()  {
        
            ResponseGameLiveRecentQueueBool wrapper = new ResponseGameLiveRecentQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/set/by-profile-id/by-game-id";
                        
            GameLiveRecentQueue obj = new GameLiveRecentQueue();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
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
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _game = util.GetParamValue(_context, "game");
            if(!String.IsNullOrEmpty(_game))
                obj.game = (string)_game;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            wrapper.data = api.SetGameLiveRecentQueueByProfileIdByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameLiveRecentQueueByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLiveRecentQueueBool wrapper = new ResponseGameLiveRecentQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/del/by-uuid";

            bool completed = api.DelGameLiveRecentQueueByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameLiveRecentQueueByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveRecentQueueBool wrapper = new ResponseGameLiveRecentQueueBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/del/by-profile-id/by-game-id";

            bool completed = api.DelGameLiveRecentQueueByProfileIdByGameId(
                        
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveRecentQueueList() {
        

            ResponseGameLiveRecentQueueList wrapper = new ResponseGameLiveRecentQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/get";

            List<GameLiveRecentQueue> objs = api.GetGameLiveRecentQueueList(
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveRecentQueueListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLiveRecentQueueList wrapper = new ResponseGameLiveRecentQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/get/by-uuid";

            List<GameLiveRecentQueue> objs = api.GetGameLiveRecentQueueListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveRecentQueueListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveRecentQueueList wrapper = new ResponseGameLiveRecentQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/get/by-game-id";

            List<GameLiveRecentQueue> objs = api.GetGameLiveRecentQueueListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLiveRecentQueueListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLiveRecentQueueList wrapper = new ResponseGameLiveRecentQueueList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-live-recent-queue/get/by-profile-id/by-game-id";

            List<GameLiveRecentQueue> objs = api.GetGameLiveRecentQueueListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatistic() {
        

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count";

            int i = api.CountGameProfileStatistic(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count/by-uuid";

            int i = api.CountGameProfileStatisticByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count/by-key";

            int i = api.CountGameProfileStatisticByKey(
                _key
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count/by-game-id";

            int i = api.CountGameProfileStatisticByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count/by-key/by-game-id";

            int i = api.CountGameProfileStatisticByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count/by-profile-id/by-game-id";

            int i = api.CountGameProfileStatisticByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count/by-key/by-profile-id/by-game-id";

            int i = api.CountGameProfileStatisticByKeyByProfileIdByGameId(
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileStatisticInt wrapper = new ResponseGameProfileStatisticInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/count/by-key/by-profile-id/by-game-id/by-timestamp";

            int i = api.CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameProfileStatisticListByFilter()  {
        
            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameProfileStatisticResult result = api.BrowseGameProfileStatisticListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticByUuid()  {
        
            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/set/by-uuid";
                        
            GameProfileStatistic obj = new GameProfileStatistic();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp()  {
        
            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/set/by-uuid/by-profile-id/by-game-id/by-timestamp";
                        
            GameProfileStatistic obj = new GameProfileStatistic();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticByProfileIdByKey()  {
        
            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/set/by-profile-id/by-key";
                        
            GameProfileStatistic obj = new GameProfileStatistic();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticByProfileIdByKey(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticByProfileIdByKeyByTimestamp()  {
        
            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/set/by-profile-id/by-key/by-timestamp";
                        
            GameProfileStatistic obj = new GameProfileStatistic();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticByProfileIdByKeyByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp()  {
        
            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/set/by-key/by-profile-id/by-game-id/by-timestamp";
                        
            GameProfileStatistic obj = new GameProfileStatistic();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticByProfileIdByGameIdByKey()  {
        
            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/set/by-profile-id/by-game-id/by-key";
                        
            GameProfileStatistic obj = new GameProfileStatistic();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _stat_value = util.GetParamValue(_context, "stat_value");
            if(!String.IsNullOrEmpty(_stat_value))
                obj.stat_value = float.Parse(_stat_value);
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticByProfileIdByGameIdByKey(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileStatisticByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/del/by-uuid";

            bool completed = api.DelGameProfileStatisticByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileStatisticByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/del/by-key/by-game-id";

            bool completed = api.DelGameProfileStatisticByKeyByGameId(
                        
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileStatisticByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/del/by-profile-id/by-game-id";

            bool completed = api.DelGameProfileStatisticByProfileIdByGameId(
                        
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileStatisticByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticBool wrapper = new ResponseGameProfileStatisticBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/del/by-key/by-profile-id/by-game-id";

            bool completed = api.DelGameProfileStatisticByKeyByProfileIdByGameId(
                        
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-uuid";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-key";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByKey(
                _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-game-id";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-key/by-game-id";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-profile-id/by-game-id";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByProfileIdByGameIdByTimestamp() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-profile-id/by-game-id/by-timestamp";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-key/by-profile-id/by-game-id";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByKeyByProfileIdByGameId(
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileStatisticList wrapper = new ResponseGameProfileStatisticList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic/get/by-key/by-profile-id/by-game-id/by-timestamp";

            List<GameProfileStatistic> objs = api.GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticMeta() {
        

            ResponseGameStatisticMetaInt wrapper = new ResponseGameStatisticMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/count";

            int i = api.CountGameStatisticMeta(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticMetaByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameStatisticMetaInt wrapper = new ResponseGameStatisticMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/count/by-uuid";

            int i = api.CountGameStatisticMetaByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticMetaByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameStatisticMetaInt wrapper = new ResponseGameStatisticMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/count/by-code";

            int i = api.CountGameStatisticMetaByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticMetaByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameStatisticMetaInt wrapper = new ResponseGameStatisticMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/count/by-name";

            int i = api.CountGameStatisticMetaByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticMetaByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameStatisticMetaInt wrapper = new ResponseGameStatisticMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/count/by-key";

            int i = api.CountGameStatisticMetaByKey(
                _key
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticMetaByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticMetaInt wrapper = new ResponseGameStatisticMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/count/by-game-id";

            int i = api.CountGameStatisticMetaByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameStatisticMetaByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticMetaInt wrapper = new ResponseGameStatisticMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/count/by-key/by-game-id";

            int i = api.CountGameStatisticMetaByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameStatisticMetaListByFilter()  {
        
            ResponseGameStatisticMetaList wrapper = new ResponseGameStatisticMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameStatisticMetaResult result = api.BrowseGameStatisticMetaListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticMetaByUuid()  {
        
            ResponseGameStatisticMetaBool wrapper = new ResponseGameStatisticMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/set/by-uuid";
                        
            GameStatisticMeta obj = new GameStatisticMeta();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _store_count = util.GetParamValue(_context, "store_count");
            if(!String.IsNullOrEmpty(_store_count))
                obj.store_count = Convert.ToInt32(_store_count);
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = (string)_order;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameStatisticMetaByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameStatisticMetaByKeyByGameId()  {
        
            ResponseGameStatisticMetaBool wrapper = new ResponseGameStatisticMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/set/by-key/by-game-id";
                        
            GameStatisticMeta obj = new GameStatisticMeta();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _store_count = util.GetParamValue(_context, "store_count");
            if(!String.IsNullOrEmpty(_store_count))
                obj.store_count = Convert.ToInt32(_store_count);
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = (string)_order;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameStatisticMetaByKeyByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameStatisticMetaByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameStatisticMetaBool wrapper = new ResponseGameStatisticMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/del/by-uuid";

            bool completed = api.DelGameStatisticMetaByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameStatisticMetaByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticMetaBool wrapper = new ResponseGameStatisticMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/del/by-key/by-game-id";

            bool completed = api.DelGameStatisticMetaByKeyByGameId(
                        
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticMetaListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameStatisticMetaList wrapper = new ResponseGameStatisticMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/get/by-uuid";

            List<GameStatisticMeta> objs = api.GetGameStatisticMetaListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticMetaListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameStatisticMetaList wrapper = new ResponseGameStatisticMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/get/by-code";

            List<GameStatisticMeta> objs = api.GetGameStatisticMetaListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticMetaListByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameStatisticMetaList wrapper = new ResponseGameStatisticMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/get/by-name";

            List<GameStatisticMeta> objs = api.GetGameStatisticMetaListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticMetaListByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameStatisticMetaList wrapper = new ResponseGameStatisticMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/get/by-key";

            List<GameStatisticMeta> objs = api.GetGameStatisticMetaListByKey(
                _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticMetaListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticMetaList wrapper = new ResponseGameStatisticMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/get/by-game-id";

            List<GameStatisticMeta> objs = api.GetGameStatisticMetaListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameStatisticMetaListByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameStatisticMetaList wrapper = new ResponseGameStatisticMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-statistic-meta/get/by-key/by-game-id";

            List<GameStatisticMeta> objs = api.GetGameStatisticMetaListByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticTimestamp() {
        

            ResponseGameProfileStatisticTimestampInt wrapper = new ResponseGameProfileStatisticTimestampInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/count";

            int i = api.CountGameProfileStatisticTimestamp(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticTimestampByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileStatisticTimestampInt wrapper = new ResponseGameProfileStatisticTimestampInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/count/by-uuid";

            int i = api.CountGameProfileStatisticTimestampByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            DateTime _timestamp = Convert.ToDateTime(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileStatisticTimestampInt wrapper = new ResponseGameProfileStatisticTimestampInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/count/by-key/by-profile-id/by-game-id/by-timestamp";

            int i = api.CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameProfileStatisticTimestampListByFilter()  {
        
            ResponseGameProfileStatisticTimestampList wrapper = new ResponseGameProfileStatisticTimestampList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameProfileStatisticTimestampResult result = api.BrowseGameProfileStatisticTimestampListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticTimestampByUuid()  {
        
            ResponseGameProfileStatisticTimestampBool wrapper = new ResponseGameProfileStatisticTimestampBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/set/by-uuid";
                        
            GameProfileStatisticTimestamp obj = new GameProfileStatisticTimestamp();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = Convert.ToDateTime(_timestamp);
            else 
                obj.timestamp = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
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
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticTimestampByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp()  {
        
            ResponseGameProfileStatisticTimestampBool wrapper = new ResponseGameProfileStatisticTimestampBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/set/by-key/by-profile-id/by-game-id/by-timestamp";
                        
            GameProfileStatisticTimestamp obj = new GameProfileStatisticTimestamp();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = Convert.ToDateTime(_timestamp);
            else 
                obj.timestamp = DateTime.Now;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
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
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileStatisticTimestampByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileStatisticTimestampBool wrapper = new ResponseGameProfileStatisticTimestampBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/del/by-uuid";

            bool completed = api.DelGameProfileStatisticTimestampByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            DateTime _timestamp = Convert.ToDateTime(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileStatisticTimestampBool wrapper = new ResponseGameProfileStatisticTimestampBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/del/by-key/by-profile-id/by-game-id/by-timestamp";

            bool completed = api.DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
                        
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticTimestampListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileStatisticTimestampList wrapper = new ResponseGameProfileStatisticTimestampList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/get/by-uuid";

            List<GameProfileStatisticTimestamp> objs = api.GetGameProfileStatisticTimestampListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            DateTime _timestamp = Convert.ToDateTime(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileStatisticTimestampList wrapper = new ResponseGameProfileStatisticTimestampList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-statistic-timestamp/get/by-key/by-profile-id/by-game-id/by-timestamp";

            List<GameProfileStatisticTimestamp> objs = api.GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameKeyMeta() {
        

            ResponseGameKeyMetaInt wrapper = new ResponseGameKeyMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/count";

            int i = api.CountGameKeyMeta(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameKeyMetaByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameKeyMetaInt wrapper = new ResponseGameKeyMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/count/by-uuid";

            int i = api.CountGameKeyMetaByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameKeyMetaByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameKeyMetaInt wrapper = new ResponseGameKeyMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/count/by-code";

            int i = api.CountGameKeyMetaByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameKeyMetaByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameKeyMetaInt wrapper = new ResponseGameKeyMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/count/by-name";

            int i = api.CountGameKeyMetaByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameKeyMetaByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameKeyMetaInt wrapper = new ResponseGameKeyMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/count/by-key";

            int i = api.CountGameKeyMetaByKey(
                _key
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameKeyMetaByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameKeyMetaInt wrapper = new ResponseGameKeyMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/count/by-game-id";

            int i = api.CountGameKeyMetaByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameKeyMetaByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameKeyMetaInt wrapper = new ResponseGameKeyMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/count/by-key/by-game-id";

            int i = api.CountGameKeyMetaByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameKeyMetaListByFilter()  {
        
            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameKeyMetaResult result = api.BrowseGameKeyMetaListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameKeyMetaByUuid()  {
        
            ResponseGameKeyMetaBool wrapper = new ResponseGameKeyMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/set/by-uuid";
                        
            GameKeyMeta obj = new GameKeyMeta();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _key_level = util.GetParamValue(_context, "key_level");
            if(!String.IsNullOrEmpty(_key_level))
                obj.key_level = (string)_key_level;
            
            string _store_count = util.GetParamValue(_context, "store_count");
            if(!String.IsNullOrEmpty(_store_count))
                obj.store_count = Convert.ToInt32(_store_count);
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = (string)_order;
            
            string _key_stat = util.GetParamValue(_context, "key_stat");
            if(!String.IsNullOrEmpty(_key_stat))
                obj.key_stat = (string)_key_stat;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameKeyMetaByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameKeyMetaByKeyByGameId()  {
        
            ResponseGameKeyMetaBool wrapper = new ResponseGameKeyMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/set/by-key/by-game-id";
                        
            GameKeyMeta obj = new GameKeyMeta();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _key_level = util.GetParamValue(_context, "key_level");
            if(!String.IsNullOrEmpty(_key_level))
                obj.key_level = (string)_key_level;
            
            string _store_count = util.GetParamValue(_context, "store_count");
            if(!String.IsNullOrEmpty(_store_count))
                obj.store_count = Convert.ToInt32(_store_count);
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = (string)_order;
            
            string _key_stat = util.GetParamValue(_context, "key_stat");
            if(!String.IsNullOrEmpty(_key_stat))
                obj.key_stat = (string)_key_stat;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameKeyMetaByKeyByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameKeyMetaByKeyByGameIdByLevel()  {
        
            ResponseGameKeyMetaBool wrapper = new ResponseGameKeyMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/set/by-key/by-game-id/by-level";
                        
            GameKeyMeta obj = new GameKeyMeta();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _key_level = util.GetParamValue(_context, "key_level");
            if(!String.IsNullOrEmpty(_key_level))
                obj.key_level = (string)_key_level;
            
            string _store_count = util.GetParamValue(_context, "store_count");
            if(!String.IsNullOrEmpty(_store_count))
                obj.store_count = Convert.ToInt32(_store_count);
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = (string)_order;
            
            string _key_stat = util.GetParamValue(_context, "key_stat");
            if(!String.IsNullOrEmpty(_key_stat))
                obj.key_stat = (string)_key_stat;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameKeyMetaByKeyByGameIdByLevel(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameKeyMetaByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameKeyMetaBool wrapper = new ResponseGameKeyMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/del/by-uuid";

            bool completed = api.DelGameKeyMetaByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameKeyMetaByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameKeyMetaBool wrapper = new ResponseGameKeyMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/del/by-key/by-game-id";

            bool completed = api.DelGameKeyMetaByKeyByGameId(
                        
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameKeyMetaListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/get/by-uuid";

            List<GameKeyMeta> objs = api.GetGameKeyMetaListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameKeyMetaListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/get/by-code";

            List<GameKeyMeta> objs = api.GetGameKeyMetaListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameKeyMetaListByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/get/by-name";

            List<GameKeyMeta> objs = api.GetGameKeyMetaListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameKeyMetaListByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/get/by-key";

            List<GameKeyMeta> objs = api.GetGameKeyMetaListByKey(
                _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameKeyMetaListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/get/by-game-id";

            List<GameKeyMeta> objs = api.GetGameKeyMetaListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameKeyMetaListByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/get/by-key/by-game-id";

            List<GameKeyMeta> objs = api.GetGameKeyMetaListByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameKeyMetaListByCodeByLevel() {
        
            string _code = (string)util.GetParamValue(_context, "code");
            string _level = (string)util.GetParamValue(_context, "level");

            ResponseGameKeyMetaList wrapper = new ResponseGameKeyMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-key-meta/get/by-code/by-level";

            List<GameKeyMeta> objs = api.GetGameKeyMetaListByCodeByLevel(
                _code
                , _level
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLevel() {
        

            ResponseGameLevelInt wrapper = new ResponseGameLevelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/count";

            int i = api.CountGameLevel(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLevelByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLevelInt wrapper = new ResponseGameLevelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/count/by-uuid";

            int i = api.CountGameLevelByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLevelByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameLevelInt wrapper = new ResponseGameLevelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/count/by-code";

            int i = api.CountGameLevelByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLevelByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameLevelInt wrapper = new ResponseGameLevelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/count/by-name";

            int i = api.CountGameLevelByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLevelByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameLevelInt wrapper = new ResponseGameLevelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/count/by-key";

            int i = api.CountGameLevelByKey(
                _key
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLevelByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLevelInt wrapper = new ResponseGameLevelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/count/by-game-id";

            int i = api.CountGameLevelByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameLevelByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLevelInt wrapper = new ResponseGameLevelInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/count/by-key/by-game-id";

            int i = api.CountGameLevelByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameLevelListByFilter()  {
        
            ResponseGameLevelList wrapper = new ResponseGameLevelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameLevelResult result = api.BrowseGameLevelListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameLevelByUuid()  {
        
            ResponseGameLevelBool wrapper = new ResponseGameLevelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/set/by-uuid";
                        
            GameLevel obj = new GameLevel();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = (string)_order;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameLevelByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameLevelByKeyByGameId()  {
        
            ResponseGameLevelBool wrapper = new ResponseGameLevelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/set/by-key/by-game-id";
                        
            GameLevel obj = new GameLevel();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
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
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _order = util.GetParamValue(_context, "order");
            if(!String.IsNullOrEmpty(_order))
                obj.order = (string)_order;
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameLevelByKeyByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameLevelByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLevelBool wrapper = new ResponseGameLevelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/del/by-uuid";

            bool completed = api.DelGameLevelByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameLevelByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLevelBool wrapper = new ResponseGameLevelBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/del/by-key/by-game-id";

            bool completed = api.DelGameLevelByKeyByGameId(
                        
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLevelListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameLevelList wrapper = new ResponseGameLevelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/get/by-uuid";

            List<GameLevel> objs = api.GetGameLevelListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLevelListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameLevelList wrapper = new ResponseGameLevelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/get/by-code";

            List<GameLevel> objs = api.GetGameLevelListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLevelListByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameLevelList wrapper = new ResponseGameLevelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/get/by-name";

            List<GameLevel> objs = api.GetGameLevelListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLevelListByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameLevelList wrapper = new ResponseGameLevelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/get/by-key";

            List<GameLevel> objs = api.GetGameLevelListByKey(
                _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLevelListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLevelList wrapper = new ResponseGameLevelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/get/by-game-id";

            List<GameLevel> objs = api.GetGameLevelListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameLevelListByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameLevelList wrapper = new ResponseGameLevelList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-level/get/by-key/by-game-id";

            List<GameLevel> objs = api.GetGameLevelListByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileAchievement() {
        

            ResponseGameProfileAchievementInt wrapper = new ResponseGameProfileAchievementInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/count";

            int i = api.CountGameProfileAchievement(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileAchievementByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileAchievementInt wrapper = new ResponseGameProfileAchievementInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/count/by-uuid";

            int i = api.CountGameProfileAchievementByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileAchievementByProfileIdByKey() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameProfileAchievementInt wrapper = new ResponseGameProfileAchievementInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/count/by-profile-id/by-key";

            int i = api.CountGameProfileAchievementByProfileIdByKey(
                _profile_id
                , _key
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileAchievementByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileAchievementInt wrapper = new ResponseGameProfileAchievementInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/count/by-username";

            int i = api.CountGameProfileAchievementByUsername(
                _username
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileAchievementByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileAchievementInt wrapper = new ResponseGameProfileAchievementInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/count/by-key/by-profile-id/by-game-id";

            int i = api.CountGameProfileAchievementByKeyByProfileIdByGameId(
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileAchievementInt wrapper = new ResponseGameProfileAchievementInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/count/by-key/by-profile-id/by-game-id/by-timestamp";

            int i = api.CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameProfileAchievementListByFilter()  {
        
            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameProfileAchievementResult result = api.BrowseGameProfileAchievementListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileAchievementByUuid()  {
        
            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/set/by-uuid";
                        
            GameProfileAchievement obj = new GameProfileAchievement();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _completed = util.GetParamValue(_context, "completed");
            if(!String.IsNullOrEmpty(_completed))
                obj.completed = Convert.ToBoolean(_completed);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _achievement_value = util.GetParamValue(_context, "achievement_value");
            if(!String.IsNullOrEmpty(_achievement_value))
                obj.achievement_value = float.Parse(_achievement_value);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileAchievementByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileAchievementByUuidByKey()  {
        
            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/set/by-uuid/by-key";
                        
            GameProfileAchievement obj = new GameProfileAchievement();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _completed = util.GetParamValue(_context, "completed");
            if(!String.IsNullOrEmpty(_completed))
                obj.completed = Convert.ToBoolean(_completed);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _achievement_value = util.GetParamValue(_context, "achievement_value");
            if(!String.IsNullOrEmpty(_achievement_value))
                obj.achievement_value = float.Parse(_achievement_value);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileAchievementByUuidByKey(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileAchievementByProfileIdByKey()  {
        
            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/set/by-profile-id/by-key";
                        
            GameProfileAchievement obj = new GameProfileAchievement();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _completed = util.GetParamValue(_context, "completed");
            if(!String.IsNullOrEmpty(_completed))
                obj.completed = Convert.ToBoolean(_completed);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _achievement_value = util.GetParamValue(_context, "achievement_value");
            if(!String.IsNullOrEmpty(_achievement_value))
                obj.achievement_value = float.Parse(_achievement_value);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileAchievementByProfileIdByKey(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileAchievementByKeyByProfileIdByGameId()  {
        
            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/set/by-key/by-profile-id/by-game-id";
                        
            GameProfileAchievement obj = new GameProfileAchievement();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _completed = util.GetParamValue(_context, "completed");
            if(!String.IsNullOrEmpty(_completed))
                obj.completed = Convert.ToBoolean(_completed);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _achievement_value = util.GetParamValue(_context, "achievement_value");
            if(!String.IsNullOrEmpty(_achievement_value))
                obj.achievement_value = float.Parse(_achievement_value);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileAchievementByKeyByProfileIdByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp()  {
        
            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/set/by-key/by-profile-id/by-game-id/by-timestamp";
                        
            GameProfileAchievement obj = new GameProfileAchievement();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _username = util.GetParamValue(_context, "username");
            if(!String.IsNullOrEmpty(_username))
                obj.username = (string)_username;
            
            string _timestamp = util.GetParamValue(_context, "timestamp");
            if(!String.IsNullOrEmpty(_timestamp))
                obj.timestamp = float.Parse(_timestamp);
            
            string _completed = util.GetParamValue(_context, "completed");
            if(!String.IsNullOrEmpty(_completed))
                obj.completed = Convert.ToBoolean(_completed);
            
            string _profile_id = util.GetParamValue(_context, "profile_id");
            if(!String.IsNullOrEmpty(_profile_id))
                obj.profile_id = (string)_profile_id;
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _active = util.GetParamValue(_context, "active");
            if(!String.IsNullOrEmpty(_active))
                obj.active = Convert.ToBoolean(_active);
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
            string _achievement_value = util.GetParamValue(_context, "achievement_value");
            if(!String.IsNullOrEmpty(_achievement_value))
                obj.achievement_value = float.Parse(_achievement_value);
            
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
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _date_created = util.GetParamValue(_context, "date_created");
            if(!String.IsNullOrEmpty(_date_created))
                obj.date_created = Convert.ToDateTime(_date_created);
            else 
                obj.date_created = DateTime.Now;
            
            string _type = util.GetParamValue(_context, "type");
            if(!String.IsNullOrEmpty(_type))
                obj.type = (string)_type;
            
            
            // get data
            wrapper.data = api.SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileAchievementByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/del/by-uuid";

            bool completed = api.DelGameProfileAchievementByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileAchievementByProfileIdByKey() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/del/by-profile-id/by-key";

            bool completed = api.DelGameProfileAchievementByProfileIdByKey(
                        
                _profile_id
                , _key
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameProfileAchievementByUuidByKey() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameProfileAchievementBool wrapper = new ResponseGameProfileAchievementBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/del/by-uuid/by-key";

            bool completed = api.DelGameProfileAchievementByUuidByKey(
                        
                _uuid
                , _key
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-uuid";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByProfileIdByKey() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-profile-id/by-key";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByProfileIdByKey(
                _profile_id
                , _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByUsername() {
        
            string _username = (string)util.GetParamValue(_context, "username");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-username";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByUsername(
                _username
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-key";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByKey(
                _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-game-id";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-key/by-game-id";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByProfileIdByGameId() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-profile-id/by-game-id";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByProfileIdByGameId(
                _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByProfileIdByGameIdByTimestamp() {
        
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-profile-id/by-game-id/by-timestamp";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByKeyByProfileIdByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-key/by-profile-id/by-game-id";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByKeyByProfileIdByGameId(
                _key
                , _profile_id
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _profile_id = (string)util.GetParamValue(_context, "profile_id");
            string _game_id = (string)util.GetParamValue(_context, "game_id");
            float _timestamp = float.Parse(util.GetParamValue(_context, "timestamp"));

            ResponseGameProfileAchievementList wrapper = new ResponseGameProfileAchievementList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-profile-achievement/get/by-key/by-profile-id/by-game-id/by-timestamp";

            List<GameProfileAchievement> objs = api.GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
                _key
                , _profile_id
                , _game_id
                , _timestamp
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAchievementMeta() {
        

            ResponseGameAchievementMetaInt wrapper = new ResponseGameAchievementMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/count";

            int i = api.CountGameAchievementMeta(
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAchievementMetaByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameAchievementMetaInt wrapper = new ResponseGameAchievementMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/count/by-uuid";

            int i = api.CountGameAchievementMetaByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAchievementMetaByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameAchievementMetaInt wrapper = new ResponseGameAchievementMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/count/by-code";

            int i = api.CountGameAchievementMetaByCode(
                _code
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAchievementMetaByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameAchievementMetaInt wrapper = new ResponseGameAchievementMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/count/by-name";

            int i = api.CountGameAchievementMetaByName(
                _name
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAchievementMetaByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameAchievementMetaInt wrapper = new ResponseGameAchievementMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/count/by-key";

            int i = api.CountGameAchievementMetaByKey(
                _key
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAchievementMetaByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameAchievementMetaInt wrapper = new ResponseGameAchievementMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/count/by-game-id";

            int i = api.CountGameAchievementMetaByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void CountGameAchievementMetaByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameAchievementMetaInt wrapper = new ResponseGameAchievementMetaInt();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/count/by-key/by-game-id";

            int i = api.CountGameAchievementMetaByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = i;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void BrowseGameAchievementMetaListByFilter()  {
        
            ResponseGameAchievementMetaList wrapper = new ResponseGameAchievementMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/browse/by-filter";
            
            SearchFilter obj = new SearchFilter();
            obj.page = Convert.ToInt32(util.GetParamValue(_context, "page"));
            obj.page_size = Convert.ToInt32(util.GetParamValue(_context, "page-size"));
            obj.filter = util.GetParamValue(_context, "filter");
            
            GameAchievementMetaResult result = api.BrowseGameAchievementMetaListByFilter(obj);
            wrapper.info.Add("total_rows", result.total_rows);
            wrapper.info.Add("total_pages", result.total_pages);
            wrapper.info.Add("page", result.page);
            wrapper.info.Add("page_size", result.page_size);
            
            // get data
            wrapper.data = result.data;
                        
	    util.SerializeTypeToResponse(_format, _context, wrapper);          
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameAchievementMetaByUuid()  {
        
            ResponseGameAchievementMetaBool wrapper = new ResponseGameAchievementMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/set/by-uuid";
                        
            GameAchievementMeta obj = new GameAchievementMeta();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _game_stat = util.GetParamValue(_context, "game_stat");
            if(!String.IsNullOrEmpty(_game_stat))
                obj.game_stat = Convert.ToBoolean(_game_stat);
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _points = util.GetParamValue(_context, "points");
            if(!String.IsNullOrEmpty(_points))
                obj.points = Convert.ToInt32(_points);
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _leaderboard = util.GetParamValue(_context, "leaderboard");
            if(!String.IsNullOrEmpty(_leaderboard))
                obj.leaderboard = Convert.ToBoolean(_leaderboard);
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameAchievementMetaByUuid(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void SetGameAchievementMetaByKeyByGameId()  {
        
            ResponseGameAchievementMetaBool wrapper = new ResponseGameAchievementMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/set/by-key/by-game-id";
                        
            GameAchievementMeta obj = new GameAchievementMeta();
            
            string _status = util.GetParamValue(_context, "status");
            if(!String.IsNullOrEmpty(_status))
                obj.status = (string)_status;
            
            string _sort = util.GetParamValue(_context, "sort");
            if(!String.IsNullOrEmpty(_sort))
                obj.sort = Convert.ToInt32(_sort);
            
            string _code = util.GetParamValue(_context, "code");
            if(!String.IsNullOrEmpty(_code))
                obj.code = (string)_code;
            
            string _display_name = util.GetParamValue(_context, "display_name");
            if(!String.IsNullOrEmpty(_display_name))
                obj.display_name = (string)_display_name;
            
            string _name = util.GetParamValue(_context, "name");
            if(!String.IsNullOrEmpty(_name))
                obj.name = (string)_name;
            
            string _game_stat = util.GetParamValue(_context, "game_stat");
            if(!String.IsNullOrEmpty(_game_stat))
                obj.game_stat = Convert.ToBoolean(_game_stat);
            
            string _date_modified = util.GetParamValue(_context, "date_modified");
            if(!String.IsNullOrEmpty(_date_modified))
                obj.date_modified = Convert.ToDateTime(_date_modified);
            else 
                obj.date_modified = DateTime.Now;
            
            string _data = util.GetParamValue(_context, "data");
            if(!String.IsNullOrEmpty(_data))
                obj.data = (string)_data;
            
            string _level = util.GetParamValue(_context, "level");
            if(!String.IsNullOrEmpty(_level))
                obj.level = (string)_level;
            
            string _uuid = util.GetParamValue(_context, "uuid");
            if(!String.IsNullOrEmpty(_uuid))
                obj.uuid = (string)_uuid;
            
            string _points = util.GetParamValue(_context, "points");
            if(!String.IsNullOrEmpty(_points))
                obj.points = Convert.ToInt32(_points);
            
            string _key = util.GetParamValue(_context, "key");
            if(!String.IsNullOrEmpty(_key))
                obj.key = (string)_key;
            
            string _game_id = util.GetParamValue(_context, "game_id");
            if(!String.IsNullOrEmpty(_game_id))
                obj.game_id = (string)_game_id;
            
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
            
            string _leaderboard = util.GetParamValue(_context, "leaderboard");
            if(!String.IsNullOrEmpty(_leaderboard))
                obj.leaderboard = Convert.ToBoolean(_leaderboard);
            
            string _description = util.GetParamValue(_context, "description");
            if(!String.IsNullOrEmpty(_description))
                obj.description = (string)_description;
            
            
            // get data
            wrapper.data = api.SetGameAchievementMetaByKeyByGameId(obj);
                        
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameAchievementMetaByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameAchievementMetaBool wrapper = new ResponseGameAchievementMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/del/by-uuid";

            bool completed = api.DelGameAchievementMetaByUuid(
                        
                _uuid
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
        public virtual void DelGameAchievementMetaByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameAchievementMetaBool wrapper = new ResponseGameAchievementMetaBool();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/del/by-key/by-game-id";

            bool completed = api.DelGameAchievementMetaByKeyByGameId(
                        
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = completed;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAchievementMetaListByUuid() {
        
            string _uuid = (string)util.GetParamValue(_context, "uuid");

            ResponseGameAchievementMetaList wrapper = new ResponseGameAchievementMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/get/by-uuid";

            List<GameAchievementMeta> objs = api.GetGameAchievementMetaListByUuid(
                _uuid
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAchievementMetaListByCode() {
        
            string _code = (string)util.GetParamValue(_context, "code");

            ResponseGameAchievementMetaList wrapper = new ResponseGameAchievementMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/get/by-code";

            List<GameAchievementMeta> objs = api.GetGameAchievementMetaListByCode(
                _code
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAchievementMetaListByName() {
        
            string _name = (string)util.GetParamValue(_context, "name");

            ResponseGameAchievementMetaList wrapper = new ResponseGameAchievementMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/get/by-name";

            List<GameAchievementMeta> objs = api.GetGameAchievementMetaListByName(
                _name
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAchievementMetaListByKey() {
        
            string _key = (string)util.GetParamValue(_context, "key");

            ResponseGameAchievementMetaList wrapper = new ResponseGameAchievementMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/get/by-key";

            List<GameAchievementMeta> objs = api.GetGameAchievementMetaListByKey(
                _key
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAchievementMetaListByGameId() {
        
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameAchievementMetaList wrapper = new ResponseGameAchievementMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/get/by-game-id";

            List<GameAchievementMeta> objs = api.GetGameAchievementMetaListByGameId(
                _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
//------------------------------------------------------------------------------                    
                    
        public virtual void GetGameAchievementMetaListByKeyByGameId() {
        
            string _key = (string)util.GetParamValue(_context, "key");
            string _game_id = (string)util.GetParamValue(_context, "game_id");

            ResponseGameAchievementMetaList wrapper = new ResponseGameAchievementMetaList();
            wrapper.message = "Success";
            wrapper.code = 0;
            wrapper.action = "game-achievement-meta/get/by-key/by-game-id";

            List<GameAchievementMeta> objs = api.GetGameAchievementMetaListByKeyByGameId(
                _key
                , _game_id
            );
            
            // get data
            wrapper.data = objs;
            
	    util.SerializeTypeToResponse(_format, _context, wrapper);
        }     
    }
}






