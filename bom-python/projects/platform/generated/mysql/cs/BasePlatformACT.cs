using System;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.data.pgsql;
using ah.core.ent;

using platform;
using platform.ent;

namespace platform {

    public class BasePlatformACT {
    
        PlatformData data = new PlatformData();
        DataType dataType = new DataType();
        
        public BasePlatformACT(){
        
        }
        
        
        public virtual App FillApp(DataRow dr) {
            App obj = new App();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["platform"] != null)                    
                    obj.platform = dataType.FillDataString(dr, "platform");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountApp(
        )  {            
            return data.CountApp(
            );
        }       
        public virtual int CountAppUuid(
            string uuid
        )  {            
            return data.CountAppUuid(
                uuid
            );
        }       
        public virtual int CountAppCode(
            string code
        )  {            
            return data.CountAppCode(
                code
            );
        }       
        public virtual int CountAppTypeId(
            string type_id
        )  {            
            return data.CountAppTypeId(
                type_id
            );
        }       
        public virtual int CountAppCodeTypeId(
            string code
            , string type_id
        )  {            
            return data.CountAppCodeTypeId(
                code
                , type_id
            );
        }       
        public virtual int CountAppPlatformTypeId(
            string platform
            , string type_id
        )  {            
            return data.CountAppPlatformTypeId(
                platform
                , type_id
            );
        }       
        public virtual int CountAppPlatform(
            string platform
        )  {            
            return data.CountAppPlatform(
                platform
            );
        }       
        public virtual AppResult BrowseAppListFilter(SearchFilter obj)  {
            AppResult result = new AppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseAppListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        result.data.Add(app);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetAppUuid(string set_type, App obj)  {            
            return data.SetAppUuid(set_type, obj);
        }    
        public virtual bool SetAppCode(string set_type, App obj)  {            
            return data.SetAppCode(set_type, obj);
        }    
        public virtual bool DelAppUuid(
            string uuid
        )  {
            return data.DelAppUuid(
                uuid
            );
        }                     
        public virtual bool DelAppCode(
            string code
        )  {
            return data.DelAppCode(
                code
            );
        }                     
        public virtual List<App> GetAppList(
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        list.Add(app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<App> GetAppListUuid(
            string uuid
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        list.Add(app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<App> GetAppListCode(
            string code
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        list.Add(app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<App> GetAppListTypeId(
            string type_id
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        list.Add(app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<App> GetAppListCodeTypeId(
            string code
            , string type_id
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListCodeTypeId(
                code
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        list.Add(app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<App> GetAppListPlatformTypeId(
            string platform
            , string type_id
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListPlatformTypeId(
                platform
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        list.Add(app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<App> GetAppListPlatform(
            string platform
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListPlatform(
                platform
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       App app  = FillApp(dr);
                        list.Add(app);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual AppType FillAppType(DataRow dr) {
            AppType obj = new AppType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountAppType(
        )  {            
            return data.CountAppType(
            );
        }       
        public virtual int CountAppTypeUuid(
            string uuid
        )  {            
            return data.CountAppTypeUuid(
                uuid
            );
        }       
        public virtual int CountAppTypeCode(
            string code
        )  {            
            return data.CountAppTypeCode(
                code
            );
        }       
        public virtual AppTypeResult BrowseAppTypeListFilter(SearchFilter obj)  {
            AppTypeResult result = new AppTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseAppTypeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       AppType app_type  = FillAppType(dr);
                        result.data.Add(app_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetAppTypeUuid(string set_type, AppType obj)  {            
            return data.SetAppTypeUuid(set_type, obj);
        }    
        public virtual bool SetAppTypeCode(string set_type, AppType obj)  {            
            return data.SetAppTypeCode(set_type, obj);
        }    
        public virtual bool DelAppTypeUuid(
            string uuid
        )  {
            return data.DelAppTypeUuid(
                uuid
            );
        }                     
        public virtual bool DelAppTypeCode(
            string code
        )  {
            return data.DelAppTypeCode(
                code
            );
        }                     
        public virtual List<AppType> GetAppTypeList(
        )  {
            List<AppType> list = new List<AppType>();
            DataSet ds = data.GetAppTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       AppType app_type  = FillAppType(dr);
                        list.Add(app_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<AppType> GetAppTypeListUuid(
            string uuid
        )  {
            List<AppType> list = new List<AppType>();
            DataSet ds = data.GetAppTypeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       AppType app_type  = FillAppType(dr);
                        list.Add(app_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<AppType> GetAppTypeListCode(
            string code
        )  {
            List<AppType> list = new List<AppType>();
            DataSet ds = data.GetAppTypeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       AppType app_type  = FillAppType(dr);
                        list.Add(app_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Site FillSite(DataRow dr) {
            Site obj = new Site();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["domain"] != null)                    
                    obj.domain = dataType.FillDataString(dr, "domain");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountSite(
        )  {            
            return data.CountSite(
            );
        }       
        public virtual int CountSiteUuid(
            string uuid
        )  {            
            return data.CountSiteUuid(
                uuid
            );
        }       
        public virtual int CountSiteCode(
            string code
        )  {            
            return data.CountSiteCode(
                code
            );
        }       
        public virtual int CountSiteTypeId(
            string type_id
        )  {            
            return data.CountSiteTypeId(
                type_id
            );
        }       
        public virtual int CountSiteCodeTypeId(
            string code
            , string type_id
        )  {            
            return data.CountSiteCodeTypeId(
                code
                , type_id
            );
        }       
        public virtual int CountSiteDomainTypeId(
            string domain
            , string type_id
        )  {            
            return data.CountSiteDomainTypeId(
                domain
                , type_id
            );
        }       
        public virtual int CountSiteDomain(
            string domain
        )  {            
            return data.CountSiteDomain(
                domain
            );
        }       
        public virtual SiteResult BrowseSiteListFilter(SearchFilter obj)  {
            SiteResult result = new SiteResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseSiteListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        result.data.Add(site);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetSiteUuid(string set_type, Site obj)  {            
            return data.SetSiteUuid(set_type, obj);
        }    
        public virtual bool SetSiteCode(string set_type, Site obj)  {            
            return data.SetSiteCode(set_type, obj);
        }    
        public virtual bool DelSiteUuid(
            string uuid
        )  {
            return data.DelSiteUuid(
                uuid
            );
        }                     
        public virtual bool DelSiteCode(
            string code
        )  {
            return data.DelSiteCode(
                code
            );
        }                     
        public virtual List<Site> GetSiteList(
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        list.Add(site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Site> GetSiteListUuid(
            string uuid
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        list.Add(site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Site> GetSiteListCode(
            string code
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        list.Add(site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Site> GetSiteListTypeId(
            string type_id
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        list.Add(site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Site> GetSiteListCodeTypeId(
            string code
            , string type_id
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListCodeTypeId(
                code
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        list.Add(site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Site> GetSiteListDomainTypeId(
            string domain
            , string type_id
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListDomainTypeId(
                domain
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        list.Add(site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Site> GetSiteListDomain(
            string domain
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListDomain(
                domain
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Site site  = FillSite(dr);
                        list.Add(site);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual SiteType FillSiteType(DataRow dr) {
            SiteType obj = new SiteType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountSiteType(
        )  {            
            return data.CountSiteType(
            );
        }       
        public virtual int CountSiteTypeUuid(
            string uuid
        )  {            
            return data.CountSiteTypeUuid(
                uuid
            );
        }       
        public virtual int CountSiteTypeCode(
            string code
        )  {            
            return data.CountSiteTypeCode(
                code
            );
        }       
        public virtual SiteTypeResult BrowseSiteTypeListFilter(SearchFilter obj)  {
            SiteTypeResult result = new SiteTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseSiteTypeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteType site_type  = FillSiteType(dr);
                        result.data.Add(site_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetSiteTypeUuid(string set_type, SiteType obj)  {            
            return data.SetSiteTypeUuid(set_type, obj);
        }    
        public virtual bool SetSiteTypeCode(string set_type, SiteType obj)  {            
            return data.SetSiteTypeCode(set_type, obj);
        }    
        public virtual bool DelSiteTypeUuid(
            string uuid
        )  {
            return data.DelSiteTypeUuid(
                uuid
            );
        }                     
        public virtual bool DelSiteTypeCode(
            string code
        )  {
            return data.DelSiteTypeCode(
                code
            );
        }                     
        public virtual List<SiteType> GetSiteTypeList(
        )  {
            List<SiteType> list = new List<SiteType>();
            DataSet ds = data.GetSiteTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteType site_type  = FillSiteType(dr);
                        list.Add(site_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<SiteType> GetSiteTypeListUuid(
            string uuid
        )  {
            List<SiteType> list = new List<SiteType>();
            DataSet ds = data.GetSiteTypeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteType site_type  = FillSiteType(dr);
                        list.Add(site_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<SiteType> GetSiteTypeListCode(
            string code
        )  {
            List<SiteType> list = new List<SiteType>();
            DataSet ds = data.GetSiteTypeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteType site_type  = FillSiteType(dr);
                        list.Add(site_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Org FillOrg(DataRow dr) {
            Org obj = new Org();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountOrg(
        )  {            
            return data.CountOrg(
            );
        }       
        public virtual int CountOrgUuid(
            string uuid
        )  {            
            return data.CountOrgUuid(
                uuid
            );
        }       
        public virtual int CountOrgCode(
            string code
        )  {            
            return data.CountOrgCode(
                code
            );
        }       
        public virtual int CountOrgName(
            string name
        )  {            
            return data.CountOrgName(
                name
            );
        }       
        public virtual OrgResult BrowseOrgListFilter(SearchFilter obj)  {
            OrgResult result = new OrgResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOrgListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        result.data.Add(org);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOrgUuid(string set_type, Org obj)  {            
            return data.SetOrgUuid(set_type, obj);
        }    
        public virtual bool DelOrgUuid(
            string uuid
        )  {
            return data.DelOrgUuid(
                uuid
            );
        }                     
        public virtual List<Org> GetOrgList(
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        list.Add(org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Org> GetOrgListUuid(
            string uuid
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        list.Add(org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Org> GetOrgListCode(
            string code
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        list.Add(org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Org> GetOrgListName(
            string name
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        list.Add(org);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OrgType FillOrgType(DataRow dr) {
            OrgType obj = new OrgType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountOrgType(
        )  {            
            return data.CountOrgType(
            );
        }       
        public virtual int CountOrgTypeUuid(
            string uuid
        )  {            
            return data.CountOrgTypeUuid(
                uuid
            );
        }       
        public virtual int CountOrgTypeCode(
            string code
        )  {            
            return data.CountOrgTypeCode(
                code
            );
        }       
        public virtual OrgTypeResult BrowseOrgTypeListFilter(SearchFilter obj)  {
            OrgTypeResult result = new OrgTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOrgTypeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgType org_type  = FillOrgType(dr);
                        result.data.Add(org_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOrgTypeUuid(string set_type, OrgType obj)  {            
            return data.SetOrgTypeUuid(set_type, obj);
        }    
        public virtual bool SetOrgTypeCode(string set_type, OrgType obj)  {            
            return data.SetOrgTypeCode(set_type, obj);
        }    
        public virtual bool DelOrgTypeUuid(
            string uuid
        )  {
            return data.DelOrgTypeUuid(
                uuid
            );
        }                     
        public virtual bool DelOrgTypeCode(
            string code
        )  {
            return data.DelOrgTypeCode(
                code
            );
        }                     
        public virtual List<OrgType> GetOrgTypeList(
        )  {
            List<OrgType> list = new List<OrgType>();
            DataSet ds = data.GetOrgTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgType org_type  = FillOrgType(dr);
                        list.Add(org_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OrgType> GetOrgTypeListUuid(
            string uuid
        )  {
            List<OrgType> list = new List<OrgType>();
            DataSet ds = data.GetOrgTypeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgType org_type  = FillOrgType(dr);
                        list.Add(org_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OrgType> GetOrgTypeListCode(
            string code
        )  {
            List<OrgType> list = new List<OrgType>();
            DataSet ds = data.GetOrgTypeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgType org_type  = FillOrgType(dr);
                        list.Add(org_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ContentItem FillContentItem(DataRow dr) {
            ContentItem obj = new ContentItem();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["date_end"] != null)                    
                    obj.date_end = dataType.FillDataDateTime(dr, "date_end");                
            if (dr["date_start"] != null)                    
                    obj.date_start = dataType.FillDataDateTime(dr, "date_start");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["path"] != null)                    
                    obj.path = dataType.FillDataString(dr, "path");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountContentItem(
        )  {            
            return data.CountContentItem(
            );
        }       
        public virtual int CountContentItemUuid(
            string uuid
        )  {            
            return data.CountContentItemUuid(
                uuid
            );
        }       
        public virtual int CountContentItemCode(
            string code
        )  {            
            return data.CountContentItemCode(
                code
            );
        }       
        public virtual int CountContentItemName(
            string name
        )  {            
            return data.CountContentItemName(
                name
            );
        }       
        public virtual int CountContentItemPath(
            string path
        )  {            
            return data.CountContentItemPath(
                path
            );
        }       
        public virtual ContentItemResult BrowseContentItemListFilter(SearchFilter obj)  {
            ContentItemResult result = new ContentItemResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseContentItemListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItem content_item  = FillContentItem(dr);
                        result.data.Add(content_item);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetContentItemUuid(string set_type, ContentItem obj)  {            
            return data.SetContentItemUuid(set_type, obj);
        }    
        public virtual bool DelContentItemUuid(
            string uuid
        )  {
            return data.DelContentItemUuid(
                uuid
            );
        }                     
        public virtual bool DelContentItemPath(
            string path
        )  {
            return data.DelContentItemPath(
                path
            );
        }                     
        public virtual List<ContentItem> GetContentItemList(
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItem content_item  = FillContentItem(dr);
                        list.Add(content_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentItem> GetContentItemListUuid(
            string uuid
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItem content_item  = FillContentItem(dr);
                        list.Add(content_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentItem> GetContentItemListCode(
            string code
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItem content_item  = FillContentItem(dr);
                        list.Add(content_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentItem> GetContentItemListName(
            string name
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItem content_item  = FillContentItem(dr);
                        list.Add(content_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentItem> GetContentItemListPath(
            string path
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListPath(
                path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItem content_item  = FillContentItem(dr);
                        list.Add(content_item);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ContentItemType FillContentItemType(DataRow dr) {
            ContentItemType obj = new ContentItemType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountContentItemType(
        )  {            
            return data.CountContentItemType(
            );
        }       
        public virtual int CountContentItemTypeUuid(
            string uuid
        )  {            
            return data.CountContentItemTypeUuid(
                uuid
            );
        }       
        public virtual int CountContentItemTypeCode(
            string code
        )  {            
            return data.CountContentItemTypeCode(
                code
            );
        }       
        public virtual ContentItemTypeResult BrowseContentItemTypeListFilter(SearchFilter obj)  {
            ContentItemTypeResult result = new ContentItemTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseContentItemTypeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItemType content_item_type  = FillContentItemType(dr);
                        result.data.Add(content_item_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetContentItemTypeUuid(string set_type, ContentItemType obj)  {            
            return data.SetContentItemTypeUuid(set_type, obj);
        }    
        public virtual bool SetContentItemTypeCode(string set_type, ContentItemType obj)  {            
            return data.SetContentItemTypeCode(set_type, obj);
        }    
        public virtual bool DelContentItemTypeUuid(
            string uuid
        )  {
            return data.DelContentItemTypeUuid(
                uuid
            );
        }                     
        public virtual bool DelContentItemTypeCode(
            string code
        )  {
            return data.DelContentItemTypeCode(
                code
            );
        }                     
        public virtual List<ContentItemType> GetContentItemTypeList(
        )  {
            List<ContentItemType> list = new List<ContentItemType>();
            DataSet ds = data.GetContentItemTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItemType content_item_type  = FillContentItemType(dr);
                        list.Add(content_item_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentItemType> GetContentItemTypeListUuid(
            string uuid
        )  {
            List<ContentItemType> list = new List<ContentItemType>();
            DataSet ds = data.GetContentItemTypeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItemType content_item_type  = FillContentItemType(dr);
                        list.Add(content_item_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentItemType> GetContentItemTypeListCode(
            string code
        )  {
            List<ContentItemType> list = new List<ContentItemType>();
            DataSet ds = data.GetContentItemTypeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentItemType content_item_type  = FillContentItemType(dr);
                        list.Add(content_item_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ContentPage FillContentPage(DataRow dr) {
            ContentPage obj = new ContentPage();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["date_end"] != null)                    
                    obj.date_end = dataType.FillDataDateTime(dr, "date_end");                
            if (dr["date_start"] != null)                    
                    obj.date_start = dataType.FillDataDateTime(dr, "date_start");                
            if (dr["site_id"] != null)                    
                    obj.site_id = dataType.FillDataString(dr, "site_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["template"] != null)                    
                    obj.template = dataType.FillDataString(dr, "template");                
            if (dr["path"] != null)                    
                    obj.path = dataType.FillDataString(dr, "path");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountContentPage(
        )  {            
            return data.CountContentPage(
            );
        }       
        public virtual int CountContentPageUuid(
            string uuid
        )  {            
            return data.CountContentPageUuid(
                uuid
            );
        }       
        public virtual int CountContentPageCode(
            string code
        )  {            
            return data.CountContentPageCode(
                code
            );
        }       
        public virtual int CountContentPageName(
            string name
        )  {            
            return data.CountContentPageName(
                name
            );
        }       
        public virtual int CountContentPagePath(
            string path
        )  {            
            return data.CountContentPagePath(
                path
            );
        }       
        public virtual ContentPageResult BrowseContentPageListFilter(SearchFilter obj)  {
            ContentPageResult result = new ContentPageResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseContentPageListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        result.data.Add(content_page);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetContentPageUuid(string set_type, ContentPage obj)  {            
            return data.SetContentPageUuid(set_type, obj);
        }    
        public virtual bool DelContentPageUuid(
            string uuid
        )  {
            return data.DelContentPageUuid(
                uuid
            );
        }                     
        public virtual bool DelContentPagePathSiteId(
            string path
            , string site_id
        )  {
            return data.DelContentPagePathSiteId(
                path
                , site_id
            );
        }                     
        public virtual bool DelContentPagePath(
            string path
        )  {
            return data.DelContentPagePath(
                path
            );
        }                     
        public virtual List<ContentPage> GetContentPageList(
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        list.Add(content_page);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentPage> GetContentPageListUuid(
            string uuid
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        list.Add(content_page);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentPage> GetContentPageListCode(
            string code
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        list.Add(content_page);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentPage> GetContentPageListName(
            string name
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        list.Add(content_page);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentPage> GetContentPageListPath(
            string path
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListPath(
                path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        list.Add(content_page);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentPage> GetContentPageListSiteId(
            string site_id
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListSiteId(
                site_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        list.Add(content_page);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ContentPage> GetContentPageListSiteIdPath(
            string site_id
            , string path
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListSiteIdPath(
                site_id
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ContentPage content_page  = FillContentPage(dr);
                        list.Add(content_page);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Message FillMessage(DataRow dr) {
            Message obj = new Message();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["profile_from_name"] != null)                    
                    obj.profile_from_name = dataType.FillDataString(dr, "profile_from_name");                
            if (dr["read"] != null)                    
                    obj.read = dataType.FillDataBool(dr, "read");                
            if (dr["profile_from_id"] != null)                    
                    obj.profile_from_id = dataType.FillDataString(dr, "profile_from_id");                
            if (dr["profile_to_token"] != null)                    
                    obj.profile_to_token = dataType.FillDataString(dr, "profile_to_token");                
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["subject"] != null)                    
                    obj.subject = dataType.FillDataString(dr, "subject");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["profile_to_id"] != null)                    
                    obj.profile_to_id = dataType.FillDataString(dr, "profile_to_id");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["profile_to_name"] != null)                    
                    obj.profile_to_name = dataType.FillDataString(dr, "profile_to_name");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["sent"] != null)                    
                    obj.sent = dataType.FillDataBool(dr, "sent");                

            return obj;
        }
        
        public virtual int CountMessage(
        )  {            
            return data.CountMessage(
            );
        }       
        public virtual int CountMessageUuid(
            string uuid
        )  {            
            return data.CountMessageUuid(
                uuid
            );
        }       
        public virtual MessageResult BrowseMessageListFilter(SearchFilter obj)  {
            MessageResult result = new MessageResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseMessageListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Message message  = FillMessage(dr);
                        result.data.Add(message);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetMessageUuid(string set_type, Message obj)  {            
            return data.SetMessageUuid(set_type, obj);
        }    
        public virtual bool DelMessageUuid(
            string uuid
        )  {
            return data.DelMessageUuid(
                uuid
            );
        }                     
        public virtual List<Message> GetMessageList(
        )  {
            List<Message> list = new List<Message>();
            DataSet ds = data.GetMessageList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Message message  = FillMessage(dr);
                        list.Add(message);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Message> GetMessageListUuid(
            string uuid
        )  {
            List<Message> list = new List<Message>();
            DataSet ds = data.GetMessageListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Message message  = FillMessage(dr);
                        list.Add(message);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Offer FillOffer(DataRow dr) {
            Offer obj = new Offer();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["usage_count"] != null)                    
                    obj.usage_count = dataType.FillDataInt(dr, "usage_count");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountOffer(
        )  {            
            return data.CountOffer(
            );
        }       
        public virtual int CountOfferUuid(
            string uuid
        )  {            
            return data.CountOfferUuid(
                uuid
            );
        }       
        public virtual int CountOfferCode(
            string code
        )  {            
            return data.CountOfferCode(
                code
            );
        }       
        public virtual int CountOfferName(
            string name
        )  {            
            return data.CountOfferName(
                name
            );
        }       
        public virtual int CountOfferOrgId(
            string org_id
        )  {            
            return data.CountOfferOrgId(
                org_id
            );
        }       
        public virtual OfferResult BrowseOfferListFilter(SearchFilter obj)  {
            OfferResult result = new OfferResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Offer offer  = FillOffer(dr);
                        result.data.Add(offer);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOfferUuid(string set_type, Offer obj)  {            
            return data.SetOfferUuid(set_type, obj);
        }    
        public virtual bool DelOfferUuid(
            string uuid
        )  {
            return data.DelOfferUuid(
                uuid
            );
        }                     
        public virtual bool DelOfferOrgId(
            string org_id
        )  {
            return data.DelOfferOrgId(
                org_id
            );
        }                     
        public virtual List<Offer> GetOfferList(
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Offer offer  = FillOffer(dr);
                        list.Add(offer);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Offer> GetOfferListUuid(
            string uuid
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Offer offer  = FillOffer(dr);
                        list.Add(offer);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Offer> GetOfferListCode(
            string code
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Offer offer  = FillOffer(dr);
                        list.Add(offer);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Offer> GetOfferListName(
            string name
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Offer offer  = FillOffer(dr);
                        list.Add(offer);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Offer> GetOfferListOrgId(
            string org_id
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Offer offer  = FillOffer(dr);
                        list.Add(offer);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OfferType FillOfferType(DataRow dr) {
            OfferType obj = new OfferType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountOfferType(
        )  {            
            return data.CountOfferType(
            );
        }       
        public virtual int CountOfferTypeUuid(
            string uuid
        )  {            
            return data.CountOfferTypeUuid(
                uuid
            );
        }       
        public virtual int CountOfferTypeCode(
            string code
        )  {            
            return data.CountOfferTypeCode(
                code
            );
        }       
        public virtual int CountOfferTypeName(
            string name
        )  {            
            return data.CountOfferTypeName(
                name
            );
        }       
        public virtual OfferTypeResult BrowseOfferTypeListFilter(SearchFilter obj)  {
            OfferTypeResult result = new OfferTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferTypeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferType offer_type  = FillOfferType(dr);
                        result.data.Add(offer_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOfferTypeUuid(string set_type, OfferType obj)  {            
            return data.SetOfferTypeUuid(set_type, obj);
        }    
        public virtual bool DelOfferTypeUuid(
            string uuid
        )  {
            return data.DelOfferTypeUuid(
                uuid
            );
        }                     
        public virtual List<OfferType> GetOfferTypeList(
        )  {
            List<OfferType> list = new List<OfferType>();
            DataSet ds = data.GetOfferTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferType offer_type  = FillOfferType(dr);
                        list.Add(offer_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferType> GetOfferTypeListUuid(
            string uuid
        )  {
            List<OfferType> list = new List<OfferType>();
            DataSet ds = data.GetOfferTypeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferType offer_type  = FillOfferType(dr);
                        list.Add(offer_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferType> GetOfferTypeListCode(
            string code
        )  {
            List<OfferType> list = new List<OfferType>();
            DataSet ds = data.GetOfferTypeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferType offer_type  = FillOfferType(dr);
                        list.Add(offer_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferType> GetOfferTypeListName(
            string name
        )  {
            List<OfferType> list = new List<OfferType>();
            DataSet ds = data.GetOfferTypeListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferType offer_type  = FillOfferType(dr);
                        list.Add(offer_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OfferLocation FillOfferLocation(DataRow dr) {
            OfferLocation obj = new OfferLocation();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["fax"] != null)                    
                    obj.fax = dataType.FillDataString(dr, "fax");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["address1"] != null)                    
                    obj.address1 = dataType.FillDataString(dr, "address1");                
            if (dr["twitter"] != null)                    
                    obj.twitter = dataType.FillDataString(dr, "twitter");                
            if (dr["phone"] != null)                    
                    obj.phone = dataType.FillDataString(dr, "phone");                
            if (dr["postal_code"] != null)                    
                    obj.postal_code = dataType.FillDataString(dr, "postal_code");                
            if (dr["offer_id"] != null)                    
                    obj.offer_id = dataType.FillDataString(dr, "offer_id");                
            if (dr["country_code"] != null)                    
                    obj.country_code = dataType.FillDataString(dr, "country_code");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["state_province"] != null)                    
                    obj.state_province = dataType.FillDataString(dr, "state_province");                
            if (dr["city"] != null)                    
                    obj.city = dataType.FillDataString(dr, "city");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["dob"] != null)                    
                    obj.dob = dataType.FillDataDateTime(dr, "dob");                
            if (dr["date_start"] != null)                    
                    obj.date_start = dataType.FillDataDateTime(dr, "date_start");                
            if (dr["longitude"] != null)                    
                    obj.longitude = dataType.FillDataDouble(dr, "longitude");                
            if (dr["email"] != null)                    
                    obj.email = dataType.FillDataString(dr, "email");                
            if (dr["date_end"] != null)                    
                    obj.date_end = dataType.FillDataDateTime(dr, "date_end");                
            if (dr["latitude"] != null)                    
                    obj.latitude = dataType.FillDataDouble(dr, "latitude");                
            if (dr["facebook"] != null)                    
                    obj.facebook = dataType.FillDataString(dr, "facebook");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["address2"] != null)                    
                    obj.address2 = dataType.FillDataString(dr, "address2");                

            return obj;
        }
        
        public virtual int CountOfferLocation(
        )  {            
            return data.CountOfferLocation(
            );
        }       
        public virtual int CountOfferLocationUuid(
            string uuid
        )  {            
            return data.CountOfferLocationUuid(
                uuid
            );
        }       
        public virtual int CountOfferLocationOfferId(
            string offer_id
        )  {            
            return data.CountOfferLocationOfferId(
                offer_id
            );
        }       
        public virtual int CountOfferLocationCity(
            string city
        )  {            
            return data.CountOfferLocationCity(
                city
            );
        }       
        public virtual int CountOfferLocationCountryCode(
            string country_code
        )  {            
            return data.CountOfferLocationCountryCode(
                country_code
            );
        }       
        public virtual int CountOfferLocationPostalCode(
            string postal_code
        )  {            
            return data.CountOfferLocationPostalCode(
                postal_code
            );
        }       
        public virtual OfferLocationResult BrowseOfferLocationListFilter(SearchFilter obj)  {
            OfferLocationResult result = new OfferLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferLocationListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferLocation offer_location  = FillOfferLocation(dr);
                        result.data.Add(offer_location);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOfferLocationUuid(string set_type, OfferLocation obj)  {            
            return data.SetOfferLocationUuid(set_type, obj);
        }    
        public virtual bool DelOfferLocationUuid(
            string uuid
        )  {
            return data.DelOfferLocationUuid(
                uuid
            );
        }                     
        public virtual List<OfferLocation> GetOfferLocationList(
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferLocation offer_location  = FillOfferLocation(dr);
                        list.Add(offer_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferLocation> GetOfferLocationListUuid(
            string uuid
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferLocation offer_location  = FillOfferLocation(dr);
                        list.Add(offer_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferLocation> GetOfferLocationListOfferId(
            string offer_id
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListOfferId(
                offer_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferLocation offer_location  = FillOfferLocation(dr);
                        list.Add(offer_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferLocation> GetOfferLocationListCity(
            string city
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListCity(
                city
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferLocation offer_location  = FillOfferLocation(dr);
                        list.Add(offer_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferLocation> GetOfferLocationListCountryCode(
            string country_code
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListCountryCode(
                country_code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferLocation offer_location  = FillOfferLocation(dr);
                        list.Add(offer_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferLocation> GetOfferLocationListPostalCode(
            string postal_code
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListPostalCode(
                postal_code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferLocation offer_location  = FillOfferLocation(dr);
                        list.Add(offer_location);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OfferCategory FillOfferCategory(DataRow dr) {
            OfferCategory obj = new OfferCategory();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountOfferCategory(
        )  {            
            return data.CountOfferCategory(
            );
        }       
        public virtual int CountOfferCategoryUuid(
            string uuid
        )  {            
            return data.CountOfferCategoryUuid(
                uuid
            );
        }       
        public virtual int CountOfferCategoryCode(
            string code
        )  {            
            return data.CountOfferCategoryCode(
                code
            );
        }       
        public virtual int CountOfferCategoryName(
            string name
        )  {            
            return data.CountOfferCategoryName(
                name
            );
        }       
        public virtual int CountOfferCategoryOrgId(
            string org_id
        )  {            
            return data.CountOfferCategoryOrgId(
                org_id
            );
        }       
        public virtual int CountOfferCategoryTypeId(
            string type_id
        )  {            
            return data.CountOfferCategoryTypeId(
                type_id
            );
        }       
        public virtual int CountOfferCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountOfferCategoryOrgIdTypeId(
                org_id
                , type_id
            );
        }       
        public virtual OfferCategoryResult BrowseOfferCategoryListFilter(SearchFilter obj)  {
            OfferCategoryResult result = new OfferCategoryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferCategoryListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        result.data.Add(offer_category);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOfferCategoryUuid(string set_type, OfferCategory obj)  {            
            return data.SetOfferCategoryUuid(set_type, obj);
        }    
        public virtual bool DelOfferCategoryUuid(
            string uuid
        )  {
            return data.DelOfferCategoryUuid(
                uuid
            );
        }                     
        public virtual bool DelOfferCategoryCodeOrgId(
            string code
            , string org_id
        )  {
            return data.DelOfferCategoryCodeOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelOfferCategoryCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelOfferCategoryCodeOrgIdTypeId(
                code
                , org_id
                , type_id
            );
        }                     
        public virtual List<OfferCategory> GetOfferCategoryList(
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        list.Add(offer_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategory> GetOfferCategoryListUuid(
            string uuid
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        list.Add(offer_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategory> GetOfferCategoryListCode(
            string code
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        list.Add(offer_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategory> GetOfferCategoryListName(
            string name
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        list.Add(offer_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategory> GetOfferCategoryListOrgId(
            string org_id
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        list.Add(offer_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategory> GetOfferCategoryListTypeId(
            string type_id
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        list.Add(offer_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategory> GetOfferCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListOrgIdTypeId(
                org_id
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategory offer_category  = FillOfferCategory(dr);
                        list.Add(offer_category);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OfferCategoryTree FillOfferCategoryTree(DataRow dr) {
            OfferCategoryTree obj = new OfferCategoryTree();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["parent_id"] != null)                    
                    obj.parent_id = dataType.FillDataString(dr, "parent_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["category_id"] != null)                    
                    obj.category_id = dataType.FillDataString(dr, "category_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountOfferCategoryTree(
        )  {            
            return data.CountOfferCategoryTree(
            );
        }       
        public virtual int CountOfferCategoryTreeUuid(
            string uuid
        )  {            
            return data.CountOfferCategoryTreeUuid(
                uuid
            );
        }       
        public virtual int CountOfferCategoryTreeParentId(
            string parent_id
        )  {            
            return data.CountOfferCategoryTreeParentId(
                parent_id
            );
        }       
        public virtual int CountOfferCategoryTreeCategoryId(
            string category_id
        )  {            
            return data.CountOfferCategoryTreeCategoryId(
                category_id
            );
        }       
        public virtual int CountOfferCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return data.CountOfferCategoryTreeParentIdCategoryId(
                parent_id
                , category_id
            );
        }       
        public virtual OfferCategoryTreeResult BrowseOfferCategoryTreeListFilter(SearchFilter obj)  {
            OfferCategoryTreeResult result = new OfferCategoryTreeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferCategoryTreeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryTree offer_category_tree  = FillOfferCategoryTree(dr);
                        result.data.Add(offer_category_tree);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOfferCategoryTreeUuid(string set_type, OfferCategoryTree obj)  {            
            return data.SetOfferCategoryTreeUuid(set_type, obj);
        }    
        public virtual bool DelOfferCategoryTreeUuid(
            string uuid
        )  {
            return data.DelOfferCategoryTreeUuid(
                uuid
            );
        }                     
        public virtual bool DelOfferCategoryTreeParentId(
            string parent_id
        )  {
            return data.DelOfferCategoryTreeParentId(
                parent_id
            );
        }                     
        public virtual bool DelOfferCategoryTreeCategoryId(
            string category_id
        )  {
            return data.DelOfferCategoryTreeCategoryId(
                category_id
            );
        }                     
        public virtual bool DelOfferCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            return data.DelOfferCategoryTreeParentIdCategoryId(
                parent_id
                , category_id
            );
        }                     
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeList(
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryTree offer_category_tree  = FillOfferCategoryTree(dr);
                        list.Add(offer_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListUuid(
            string uuid
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryTree offer_category_tree  = FillOfferCategoryTree(dr);
                        list.Add(offer_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListParentId(
            string parent_id
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListParentId(
                parent_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryTree offer_category_tree  = FillOfferCategoryTree(dr);
                        list.Add(offer_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListCategoryId(
            string category_id
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryTree offer_category_tree  = FillOfferCategoryTree(dr);
                        list.Add(offer_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListParentIdCategoryId(
                parent_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryTree offer_category_tree  = FillOfferCategoryTree(dr);
                        list.Add(offer_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OfferCategoryAssoc FillOfferCategoryAssoc(DataRow dr) {
            OfferCategoryAssoc obj = new OfferCategoryAssoc();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["offer_id"] != null)                    
                    obj.offer_id = dataType.FillDataString(dr, "offer_id");                
            if (dr["category_id"] != null)                    
                    obj.category_id = dataType.FillDataString(dr, "category_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountOfferCategoryAssoc(
        )  {            
            return data.CountOfferCategoryAssoc(
            );
        }       
        public virtual int CountOfferCategoryAssocUuid(
            string uuid
        )  {            
            return data.CountOfferCategoryAssocUuid(
                uuid
            );
        }       
        public virtual int CountOfferCategoryAssocOfferId(
            string offer_id
        )  {            
            return data.CountOfferCategoryAssocOfferId(
                offer_id
            );
        }       
        public virtual int CountOfferCategoryAssocCategoryId(
            string category_id
        )  {            
            return data.CountOfferCategoryAssocCategoryId(
                category_id
            );
        }       
        public virtual int CountOfferCategoryAssocOfferIdCategoryId(
            string offer_id
            , string category_id
        )  {            
            return data.CountOfferCategoryAssocOfferIdCategoryId(
                offer_id
                , category_id
            );
        }       
        public virtual OfferCategoryAssocResult BrowseOfferCategoryAssocListFilter(SearchFilter obj)  {
            OfferCategoryAssocResult result = new OfferCategoryAssocResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferCategoryAssocListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryAssoc offer_category_assoc  = FillOfferCategoryAssoc(dr);
                        result.data.Add(offer_category_assoc);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOfferCategoryAssocUuid(string set_type, OfferCategoryAssoc obj)  {            
            return data.SetOfferCategoryAssocUuid(set_type, obj);
        }    
        public virtual bool DelOfferCategoryAssocUuid(
            string uuid
        )  {
            return data.DelOfferCategoryAssocUuid(
                uuid
            );
        }                     
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocList(
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryAssoc offer_category_assoc  = FillOfferCategoryAssoc(dr);
                        list.Add(offer_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListUuid(
            string uuid
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryAssoc offer_category_assoc  = FillOfferCategoryAssoc(dr);
                        list.Add(offer_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListOfferId(
            string offer_id
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListOfferId(
                offer_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryAssoc offer_category_assoc  = FillOfferCategoryAssoc(dr);
                        list.Add(offer_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListCategoryId(
            string category_id
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryAssoc offer_category_assoc  = FillOfferCategoryAssoc(dr);
                        list.Add(offer_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListOfferIdCategoryId(
            string offer_id
            , string category_id
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListOfferIdCategoryId(
                offer_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferCategoryAssoc offer_category_assoc  = FillOfferCategoryAssoc(dr);
                        list.Add(offer_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OfferGameLocation FillOfferGameLocation(DataRow dr) {
            OfferGameLocation obj = new OfferGameLocation();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["game_location_id"] != null)                    
                    obj.game_location_id = dataType.FillDataString(dr, "game_location_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["offer_id"] != null)                    
                    obj.offer_id = dataType.FillDataString(dr, "offer_id");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountOfferGameLocation(
        )  {            
            return data.CountOfferGameLocation(
            );
        }       
        public virtual int CountOfferGameLocationUuid(
            string uuid
        )  {            
            return data.CountOfferGameLocationUuid(
                uuid
            );
        }       
        public virtual int CountOfferGameLocationGameLocationId(
            string game_location_id
        )  {            
            return data.CountOfferGameLocationGameLocationId(
                game_location_id
            );
        }       
        public virtual int CountOfferGameLocationOfferId(
            string offer_id
        )  {            
            return data.CountOfferGameLocationOfferId(
                offer_id
            );
        }       
        public virtual int CountOfferGameLocationOfferIdGameLocationId(
            string offer_id
            , string game_location_id
        )  {            
            return data.CountOfferGameLocationOfferIdGameLocationId(
                offer_id
                , game_location_id
            );
        }       
        public virtual OfferGameLocationResult BrowseOfferGameLocationListFilter(SearchFilter obj)  {
            OfferGameLocationResult result = new OfferGameLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferGameLocationListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferGameLocation offer_game_location  = FillOfferGameLocation(dr);
                        result.data.Add(offer_game_location);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOfferGameLocationUuid(string set_type, OfferGameLocation obj)  {            
            return data.SetOfferGameLocationUuid(set_type, obj);
        }    
        public virtual bool DelOfferGameLocationUuid(
            string uuid
        )  {
            return data.DelOfferGameLocationUuid(
                uuid
            );
        }                     
        public virtual List<OfferGameLocation> GetOfferGameLocationList(
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferGameLocation offer_game_location  = FillOfferGameLocation(dr);
                        list.Add(offer_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListUuid(
            string uuid
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferGameLocation offer_game_location  = FillOfferGameLocation(dr);
                        list.Add(offer_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListGameLocationId(
            string game_location_id
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListGameLocationId(
                game_location_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferGameLocation offer_game_location  = FillOfferGameLocation(dr);
                        list.Add(offer_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListOfferId(
            string offer_id
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListOfferId(
                offer_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferGameLocation offer_game_location  = FillOfferGameLocation(dr);
                        list.Add(offer_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListOfferIdGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListOfferIdGameLocationId(
                offer_id
                , game_location_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OfferGameLocation offer_game_location  = FillOfferGameLocation(dr);
                        list.Add(offer_game_location);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual EventInfo FillEventInfo(DataRow dr) {
            EventInfo obj = new EventInfo();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["usage_count"] != null)                    
                    obj.usage_count = dataType.FillDataInt(dr, "usage_count");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountEventInfo(
        )  {            
            return data.CountEventInfo(
            );
        }       
        public virtual int CountEventInfoUuid(
            string uuid
        )  {            
            return data.CountEventInfoUuid(
                uuid
            );
        }       
        public virtual int CountEventInfoCode(
            string code
        )  {            
            return data.CountEventInfoCode(
                code
            );
        }       
        public virtual int CountEventInfoName(
            string name
        )  {            
            return data.CountEventInfoName(
                name
            );
        }       
        public virtual int CountEventInfoOrgId(
            string org_id
        )  {            
            return data.CountEventInfoOrgId(
                org_id
            );
        }       
        public virtual EventInfoResult BrowseEventInfoListFilter(SearchFilter obj)  {
            EventInfoResult result = new EventInfoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventInfoListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventInfo event_info  = FillEventInfo(dr);
                        result.data.Add(event_info);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetEventInfoUuid(string set_type, EventInfo obj)  {            
            return data.SetEventInfoUuid(set_type, obj);
        }    
        public virtual bool DelEventInfoUuid(
            string uuid
        )  {
            return data.DelEventInfoUuid(
                uuid
            );
        }                     
        public virtual bool DelEventInfoOrgId(
            string org_id
        )  {
            return data.DelEventInfoOrgId(
                org_id
            );
        }                     
        public virtual List<EventInfo> GetEventInfoList(
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventInfo event_info  = FillEventInfo(dr);
                        list.Add(event_info);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventInfo> GetEventInfoListUuid(
            string uuid
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventInfo event_info  = FillEventInfo(dr);
                        list.Add(event_info);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventInfo> GetEventInfoListCode(
            string code
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventInfo event_info  = FillEventInfo(dr);
                        list.Add(event_info);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventInfo> GetEventInfoListName(
            string name
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventInfo event_info  = FillEventInfo(dr);
                        list.Add(event_info);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventInfo> GetEventInfoListOrgId(
            string org_id
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventInfo event_info  = FillEventInfo(dr);
                        list.Add(event_info);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual EventLocation FillEventLocation(DataRow dr) {
            EventLocation obj = new EventLocation();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["fax"] != null)                    
                    obj.fax = dataType.FillDataString(dr, "fax");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["address1"] != null)                    
                    obj.address1 = dataType.FillDataString(dr, "address1");                
            if (dr["twitter"] != null)                    
                    obj.twitter = dataType.FillDataString(dr, "twitter");                
            if (dr["phone"] != null)                    
                    obj.phone = dataType.FillDataString(dr, "phone");                
            if (dr["postal_code"] != null)                    
                    obj.postal_code = dataType.FillDataString(dr, "postal_code");                
            if (dr["country_code"] != null)                    
                    obj.country_code = dataType.FillDataString(dr, "country_code");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["state_province"] != null)                    
                    obj.state_province = dataType.FillDataString(dr, "state_province");                
            if (dr["city"] != null)                    
                    obj.city = dataType.FillDataString(dr, "city");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["dob"] != null)                    
                    obj.dob = dataType.FillDataDateTime(dr, "dob");                
            if (dr["date_start"] != null)                    
                    obj.date_start = dataType.FillDataDateTime(dr, "date_start");                
            if (dr["longitude"] != null)                    
                    obj.longitude = dataType.FillDataDouble(dr, "longitude");                
            if (dr["email"] != null)                    
                    obj.email = dataType.FillDataString(dr, "email");                
            if (dr["event_id"] != null)                    
                    obj.event_id = dataType.FillDataString(dr, "event_id");                
            if (dr["date_end"] != null)                    
                    obj.date_end = dataType.FillDataDateTime(dr, "date_end");                
            if (dr["latitude"] != null)                    
                    obj.latitude = dataType.FillDataDouble(dr, "latitude");                
            if (dr["facebook"] != null)                    
                    obj.facebook = dataType.FillDataString(dr, "facebook");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["address2"] != null)                    
                    obj.address2 = dataType.FillDataString(dr, "address2");                

            return obj;
        }
        
        public virtual int CountEventLocation(
        )  {            
            return data.CountEventLocation(
            );
        }       
        public virtual int CountEventLocationUuid(
            string uuid
        )  {            
            return data.CountEventLocationUuid(
                uuid
            );
        }       
        public virtual int CountEventLocationEventId(
            string event_id
        )  {            
            return data.CountEventLocationEventId(
                event_id
            );
        }       
        public virtual int CountEventLocationCity(
            string city
        )  {            
            return data.CountEventLocationCity(
                city
            );
        }       
        public virtual int CountEventLocationCountryCode(
            string country_code
        )  {            
            return data.CountEventLocationCountryCode(
                country_code
            );
        }       
        public virtual int CountEventLocationPostalCode(
            string postal_code
        )  {            
            return data.CountEventLocationPostalCode(
                postal_code
            );
        }       
        public virtual EventLocationResult BrowseEventLocationListFilter(SearchFilter obj)  {
            EventLocationResult result = new EventLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventLocationListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventLocation event_location  = FillEventLocation(dr);
                        result.data.Add(event_location);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetEventLocationUuid(string set_type, EventLocation obj)  {            
            return data.SetEventLocationUuid(set_type, obj);
        }    
        public virtual bool DelEventLocationUuid(
            string uuid
        )  {
            return data.DelEventLocationUuid(
                uuid
            );
        }                     
        public virtual List<EventLocation> GetEventLocationList(
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventLocation event_location  = FillEventLocation(dr);
                        list.Add(event_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventLocation> GetEventLocationListUuid(
            string uuid
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventLocation event_location  = FillEventLocation(dr);
                        list.Add(event_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventLocation> GetEventLocationListEventId(
            string event_id
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListEventId(
                event_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventLocation event_location  = FillEventLocation(dr);
                        list.Add(event_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventLocation> GetEventLocationListCity(
            string city
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListCity(
                city
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventLocation event_location  = FillEventLocation(dr);
                        list.Add(event_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventLocation> GetEventLocationListCountryCode(
            string country_code
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListCountryCode(
                country_code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventLocation event_location  = FillEventLocation(dr);
                        list.Add(event_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventLocation> GetEventLocationListPostalCode(
            string postal_code
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListPostalCode(
                postal_code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventLocation event_location  = FillEventLocation(dr);
                        list.Add(event_location);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual EventCategory FillEventCategory(DataRow dr) {
            EventCategory obj = new EventCategory();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountEventCategory(
        )  {            
            return data.CountEventCategory(
            );
        }       
        public virtual int CountEventCategoryUuid(
            string uuid
        )  {            
            return data.CountEventCategoryUuid(
                uuid
            );
        }       
        public virtual int CountEventCategoryCode(
            string code
        )  {            
            return data.CountEventCategoryCode(
                code
            );
        }       
        public virtual int CountEventCategoryName(
            string name
        )  {            
            return data.CountEventCategoryName(
                name
            );
        }       
        public virtual int CountEventCategoryOrgId(
            string org_id
        )  {            
            return data.CountEventCategoryOrgId(
                org_id
            );
        }       
        public virtual int CountEventCategoryTypeId(
            string type_id
        )  {            
            return data.CountEventCategoryTypeId(
                type_id
            );
        }       
        public virtual int CountEventCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountEventCategoryOrgIdTypeId(
                org_id
                , type_id
            );
        }       
        public virtual EventCategoryResult BrowseEventCategoryListFilter(SearchFilter obj)  {
            EventCategoryResult result = new EventCategoryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventCategoryListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        result.data.Add(event_category);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetEventCategoryUuid(string set_type, EventCategory obj)  {            
            return data.SetEventCategoryUuid(set_type, obj);
        }    
        public virtual bool DelEventCategoryUuid(
            string uuid
        )  {
            return data.DelEventCategoryUuid(
                uuid
            );
        }                     
        public virtual bool DelEventCategoryCodeOrgId(
            string code
            , string org_id
        )  {
            return data.DelEventCategoryCodeOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelEventCategoryCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelEventCategoryCodeOrgIdTypeId(
                code
                , org_id
                , type_id
            );
        }                     
        public virtual List<EventCategory> GetEventCategoryList(
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        list.Add(event_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategory> GetEventCategoryListUuid(
            string uuid
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        list.Add(event_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategory> GetEventCategoryListCode(
            string code
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        list.Add(event_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategory> GetEventCategoryListName(
            string name
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        list.Add(event_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategory> GetEventCategoryListOrgId(
            string org_id
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        list.Add(event_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategory> GetEventCategoryListTypeId(
            string type_id
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        list.Add(event_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategory> GetEventCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListOrgIdTypeId(
                org_id
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategory event_category  = FillEventCategory(dr);
                        list.Add(event_category);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual EventCategoryTree FillEventCategoryTree(DataRow dr) {
            EventCategoryTree obj = new EventCategoryTree();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["parent_id"] != null)                    
                    obj.parent_id = dataType.FillDataString(dr, "parent_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["category_id"] != null)                    
                    obj.category_id = dataType.FillDataString(dr, "category_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountEventCategoryTree(
        )  {            
            return data.CountEventCategoryTree(
            );
        }       
        public virtual int CountEventCategoryTreeUuid(
            string uuid
        )  {            
            return data.CountEventCategoryTreeUuid(
                uuid
            );
        }       
        public virtual int CountEventCategoryTreeParentId(
            string parent_id
        )  {            
            return data.CountEventCategoryTreeParentId(
                parent_id
            );
        }       
        public virtual int CountEventCategoryTreeCategoryId(
            string category_id
        )  {            
            return data.CountEventCategoryTreeCategoryId(
                category_id
            );
        }       
        public virtual int CountEventCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return data.CountEventCategoryTreeParentIdCategoryId(
                parent_id
                , category_id
            );
        }       
        public virtual EventCategoryTreeResult BrowseEventCategoryTreeListFilter(SearchFilter obj)  {
            EventCategoryTreeResult result = new EventCategoryTreeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventCategoryTreeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryTree event_category_tree  = FillEventCategoryTree(dr);
                        result.data.Add(event_category_tree);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetEventCategoryTreeUuid(string set_type, EventCategoryTree obj)  {            
            return data.SetEventCategoryTreeUuid(set_type, obj);
        }    
        public virtual bool DelEventCategoryTreeUuid(
            string uuid
        )  {
            return data.DelEventCategoryTreeUuid(
                uuid
            );
        }                     
        public virtual bool DelEventCategoryTreeParentId(
            string parent_id
        )  {
            return data.DelEventCategoryTreeParentId(
                parent_id
            );
        }                     
        public virtual bool DelEventCategoryTreeCategoryId(
            string category_id
        )  {
            return data.DelEventCategoryTreeCategoryId(
                category_id
            );
        }                     
        public virtual bool DelEventCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            return data.DelEventCategoryTreeParentIdCategoryId(
                parent_id
                , category_id
            );
        }                     
        public virtual List<EventCategoryTree> GetEventCategoryTreeList(
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryTree event_category_tree  = FillEventCategoryTree(dr);
                        list.Add(event_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListUuid(
            string uuid
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryTree event_category_tree  = FillEventCategoryTree(dr);
                        list.Add(event_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListParentId(
            string parent_id
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListParentId(
                parent_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryTree event_category_tree  = FillEventCategoryTree(dr);
                        list.Add(event_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListCategoryId(
            string category_id
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryTree event_category_tree  = FillEventCategoryTree(dr);
                        list.Add(event_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListParentIdCategoryId(
                parent_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryTree event_category_tree  = FillEventCategoryTree(dr);
                        list.Add(event_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual EventCategoryAssoc FillEventCategoryAssoc(DataRow dr) {
            EventCategoryAssoc obj = new EventCategoryAssoc();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["event_id"] != null)                    
                    obj.event_id = dataType.FillDataString(dr, "event_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["category_id"] != null)                    
                    obj.category_id = dataType.FillDataString(dr, "category_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountEventCategoryAssoc(
        )  {            
            return data.CountEventCategoryAssoc(
            );
        }       
        public virtual int CountEventCategoryAssocUuid(
            string uuid
        )  {            
            return data.CountEventCategoryAssocUuid(
                uuid
            );
        }       
        public virtual int CountEventCategoryAssocEventId(
            string event_id
        )  {            
            return data.CountEventCategoryAssocEventId(
                event_id
            );
        }       
        public virtual int CountEventCategoryAssocCategoryId(
            string category_id
        )  {            
            return data.CountEventCategoryAssocCategoryId(
                category_id
            );
        }       
        public virtual int CountEventCategoryAssocEventIdCategoryId(
            string event_id
            , string category_id
        )  {            
            return data.CountEventCategoryAssocEventIdCategoryId(
                event_id
                , category_id
            );
        }       
        public virtual EventCategoryAssocResult BrowseEventCategoryAssocListFilter(SearchFilter obj)  {
            EventCategoryAssocResult result = new EventCategoryAssocResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventCategoryAssocListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryAssoc event_category_assoc  = FillEventCategoryAssoc(dr);
                        result.data.Add(event_category_assoc);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetEventCategoryAssocUuid(string set_type, EventCategoryAssoc obj)  {            
            return data.SetEventCategoryAssocUuid(set_type, obj);
        }    
        public virtual bool DelEventCategoryAssocUuid(
            string uuid
        )  {
            return data.DelEventCategoryAssocUuid(
                uuid
            );
        }                     
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocList(
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryAssoc event_category_assoc  = FillEventCategoryAssoc(dr);
                        list.Add(event_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListUuid(
            string uuid
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryAssoc event_category_assoc  = FillEventCategoryAssoc(dr);
                        list.Add(event_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListEventId(
            string event_id
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListEventId(
                event_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryAssoc event_category_assoc  = FillEventCategoryAssoc(dr);
                        list.Add(event_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListCategoryId(
            string category_id
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryAssoc event_category_assoc  = FillEventCategoryAssoc(dr);
                        list.Add(event_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListEventIdCategoryId(
            string event_id
            , string category_id
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListEventIdCategoryId(
                event_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       EventCategoryAssoc event_category_assoc  = FillEventCategoryAssoc(dr);
                        list.Add(event_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Channel FillChannel(DataRow dr) {
            Channel obj = new Channel();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountChannel(
        )  {            
            return data.CountChannel(
            );
        }       
        public virtual int CountChannelUuid(
            string uuid
        )  {            
            return data.CountChannelUuid(
                uuid
            );
        }       
        public virtual int CountChannelCode(
            string code
        )  {            
            return data.CountChannelCode(
                code
            );
        }       
        public virtual int CountChannelName(
            string name
        )  {            
            return data.CountChannelName(
                name
            );
        }       
        public virtual int CountChannelOrgId(
            string org_id
        )  {            
            return data.CountChannelOrgId(
                org_id
            );
        }       
        public virtual int CountChannelTypeId(
            string type_id
        )  {            
            return data.CountChannelTypeId(
                type_id
            );
        }       
        public virtual int CountChannelOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountChannelOrgIdTypeId(
                org_id
                , type_id
            );
        }       
        public virtual ChannelResult BrowseChannelListFilter(SearchFilter obj)  {
            ChannelResult result = new ChannelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseChannelListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        result.data.Add(channel);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetChannelUuid(string set_type, Channel obj)  {            
            return data.SetChannelUuid(set_type, obj);
        }    
        public virtual bool DelChannelUuid(
            string uuid
        )  {
            return data.DelChannelUuid(
                uuid
            );
        }                     
        public virtual bool DelChannelCodeOrgId(
            string code
            , string org_id
        )  {
            return data.DelChannelCodeOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelChannelCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelChannelCodeOrgIdTypeId(
                code
                , org_id
                , type_id
            );
        }                     
        public virtual List<Channel> GetChannelList(
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListUuid(
            string uuid
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListCode(
            string code
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListName(
            string name
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListOrgId(
            string org_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListTypeId(
            string type_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListOrgIdTypeId(
                org_id
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ChannelType FillChannelType(DataRow dr) {
            ChannelType obj = new ChannelType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountChannelType(
        )  {            
            return data.CountChannelType(
            );
        }       
        public virtual int CountChannelTypeUuid(
            string uuid
        )  {            
            return data.CountChannelTypeUuid(
                uuid
            );
        }       
        public virtual int CountChannelTypeCode(
            string code
        )  {            
            return data.CountChannelTypeCode(
                code
            );
        }       
        public virtual int CountChannelTypeName(
            string name
        )  {            
            return data.CountChannelTypeName(
                name
            );
        }       
        public virtual ChannelTypeResult BrowseChannelTypeListFilter(SearchFilter obj)  {
            ChannelTypeResult result = new ChannelTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseChannelTypeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        result.data.Add(channel_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetChannelTypeUuid(string set_type, ChannelType obj)  {            
            return data.SetChannelTypeUuid(set_type, obj);
        }    
        public virtual bool DelChannelTypeUuid(
            string uuid
        )  {
            return data.DelChannelTypeUuid(
                uuid
            );
        }                     
        public virtual List<ChannelType> GetChannelTypeList(
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        list.Add(channel_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ChannelType> GetChannelTypeListUuid(
            string uuid
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        list.Add(channel_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ChannelType> GetChannelTypeListCode(
            string code
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        list.Add(channel_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ChannelType> GetChannelTypeListName(
            string name
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        list.Add(channel_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Question FillQuestion(DataRow dr) {
            Question obj = new Question();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["choices"] != null)                    
                    obj.choices = dataType.FillDataString(dr, "choices");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountQuestion(
        )  {            
            return data.CountQuestion(
            );
        }       
        public virtual int CountQuestionUuid(
            string uuid
        )  {            
            return data.CountQuestionUuid(
                uuid
            );
        }       
        public virtual int CountQuestionCode(
            string code
        )  {            
            return data.CountQuestionCode(
                code
            );
        }       
        public virtual int CountQuestionName(
            string name
        )  {            
            return data.CountQuestionName(
                name
            );
        }       
        public virtual int CountQuestionChannelId(
            string channel_id
        )  {            
            return data.CountQuestionChannelId(
                channel_id
            );
        }       
        public virtual int CountQuestionOrgId(
            string org_id
        )  {            
            return data.CountQuestionOrgId(
                org_id
            );
        }       
        public virtual int CountQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {            
            return data.CountQuestionChannelIdOrgId(
                channel_id
                , org_id
            );
        }       
        public virtual int CountQuestionChannelIdCode(
            string channel_id
            , string code
        )  {            
            return data.CountQuestionChannelIdCode(
                channel_id
                , code
            );
        }       
        public virtual QuestionResult BrowseQuestionListFilter(SearchFilter obj)  {
            QuestionResult result = new QuestionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseQuestionListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        result.data.Add(question);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetQuestionUuid(string set_type, Question obj)  {            
            return data.SetQuestionUuid(set_type, obj);
        }    
        public virtual bool SetQuestionChannelIdCode(string set_type, Question obj)  {            
            return data.SetQuestionChannelIdCode(set_type, obj);
        }    
        public virtual bool DelQuestionUuid(
            string uuid
        )  {
            return data.DelQuestionUuid(
                uuid
            );
        }                     
        public virtual bool DelQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            return data.DelQuestionChannelIdOrgId(
                channel_id
                , org_id
            );
        }                     
        public virtual List<Question> GetQuestionList(
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListUuid(
            string uuid
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListCode(
            string code
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListName(
            string name
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListType(
            string type
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListType(
                type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListChannelId(
            string channel_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListOrgId(
            string org_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListChannelIdOrgId(
                channel_id
                , org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListChannelIdCode(
            string channel_id
            , string code
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListChannelIdCode(
                channel_id
                , code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileOffer FillProfileOffer(DataRow dr) {
            ProfileOffer obj = new ProfileOffer();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["redeem_code"] != null)                    
                    obj.redeem_code = dataType.FillDataString(dr, "redeem_code");                
            if (dr["offer_id"] != null)                    
                    obj.offer_id = dataType.FillDataString(dr, "offer_id");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["redeemed"] != null)                    
                    obj.redeemed = dataType.FillDataString(dr, "redeemed");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileOffer(
        )  {            
            return data.CountProfileOffer(
            );
        }       
        public virtual int CountProfileOfferUuid(
            string uuid
        )  {            
            return data.CountProfileOfferUuid(
                uuid
            );
        }       
        public virtual int CountProfileOfferProfileId(
            string profile_id
        )  {            
            return data.CountProfileOfferProfileId(
                profile_id
            );
        }       
        public virtual ProfileOfferResult BrowseProfileOfferListFilter(SearchFilter obj)  {
            ProfileOfferResult result = new ProfileOfferResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileOfferListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOffer profile_offer  = FillProfileOffer(dr);
                        result.data.Add(profile_offer);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileOfferUuid(string set_type, ProfileOffer obj)  {            
            return data.SetProfileOfferUuid(set_type, obj);
        }    
        public virtual bool DelProfileOfferUuid(
            string uuid
        )  {
            return data.DelProfileOfferUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileOfferProfileId(
            string profile_id
        )  {
            return data.DelProfileOfferProfileId(
                profile_id
            );
        }                     
        public virtual List<ProfileOffer> GetProfileOfferList(
        )  {
            List<ProfileOffer> list = new List<ProfileOffer>();
            DataSet ds = data.GetProfileOfferList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOffer profile_offer  = FillProfileOffer(dr);
                        list.Add(profile_offer);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileOffer> GetProfileOfferListUuid(
            string uuid
        )  {
            List<ProfileOffer> list = new List<ProfileOffer>();
            DataSet ds = data.GetProfileOfferListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOffer profile_offer  = FillProfileOffer(dr);
                        list.Add(profile_offer);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileOffer> GetProfileOfferListProfileId(
            string profile_id
        )  {
            List<ProfileOffer> list = new List<ProfileOffer>();
            DataSet ds = data.GetProfileOfferListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOffer profile_offer  = FillProfileOffer(dr);
                        list.Add(profile_offer);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileApp FillProfileApp(DataRow dr) {
            ProfileApp obj = new ProfileApp();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                

            return obj;
        }
        
        public virtual int CountProfileApp(
        )  {            
            return data.CountProfileApp(
            );
        }       
        public virtual int CountProfileAppUuid(
            string uuid
        )  {            
            return data.CountProfileAppUuid(
                uuid
            );
        }       
        public virtual int CountProfileAppProfileIdAppId(
            string profile_id
            , string app_id
        )  {            
            return data.CountProfileAppProfileIdAppId(
                profile_id
                , app_id
            );
        }       
        public virtual ProfileAppResult BrowseProfileAppListFilter(SearchFilter obj)  {
            ProfileAppResult result = new ProfileAppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAppListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileApp profile_app  = FillProfileApp(dr);
                        result.data.Add(profile_app);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileAppUuid(string set_type, ProfileApp obj)  {            
            return data.SetProfileAppUuid(set_type, obj);
        }    
        public virtual bool SetProfileAppProfileIdAppId(string set_type, ProfileApp obj)  {            
            return data.SetProfileAppProfileIdAppId(set_type, obj);
        }    
        public virtual bool DelProfileAppUuid(
            string uuid
        )  {
            return data.DelProfileAppUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAppProfileIdAppId(
            string profile_id
            , string app_id
        )  {
            return data.DelProfileAppProfileIdAppId(
                profile_id
                , app_id
            );
        }                     
        public virtual List<ProfileApp> GetProfileAppList(
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileApp profile_app  = FillProfileApp(dr);
                        list.Add(profile_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileApp> GetProfileAppListUuid(
            string uuid
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileApp profile_app  = FillProfileApp(dr);
                        list.Add(profile_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileApp> GetProfileAppListAppId(
            string app_id
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListAppId(
                app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileApp profile_app  = FillProfileApp(dr);
                        list.Add(profile_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileApp> GetProfileAppListProfileId(
            string profile_id
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileApp profile_app  = FillProfileApp(dr);
                        list.Add(profile_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileApp> GetProfileAppListProfileIdAppId(
            string profile_id
            , string app_id
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListProfileIdAppId(
                profile_id
                , app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileApp profile_app  = FillProfileApp(dr);
                        list.Add(profile_app);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileOrg FillProfileOrg(DataRow dr) {
            ProfileOrg obj = new ProfileOrg();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                

            return obj;
        }
        
        public virtual int CountProfileOrg(
        )  {            
            return data.CountProfileOrg(
            );
        }       
        public virtual int CountProfileOrgUuid(
            string uuid
        )  {            
            return data.CountProfileOrgUuid(
                uuid
            );
        }       
        public virtual int CountProfileOrgOrgId(
            string org_id
        )  {            
            return data.CountProfileOrgOrgId(
                org_id
            );
        }       
        public virtual int CountProfileOrgProfileId(
            string profile_id
        )  {            
            return data.CountProfileOrgProfileId(
                profile_id
            );
        }       
        public virtual ProfileOrgResult BrowseProfileOrgListFilter(SearchFilter obj)  {
            ProfileOrgResult result = new ProfileOrgResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileOrgListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOrg profile_org  = FillProfileOrg(dr);
                        result.data.Add(profile_org);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileOrgUuid(string set_type, ProfileOrg obj)  {            
            return data.SetProfileOrgUuid(set_type, obj);
        }    
        public virtual bool DelProfileOrgUuid(
            string uuid
        )  {
            return data.DelProfileOrgUuid(
                uuid
            );
        }                     
        public virtual List<ProfileOrg> GetProfileOrgList(
        )  {
            List<ProfileOrg> list = new List<ProfileOrg>();
            DataSet ds = data.GetProfileOrgList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOrg profile_org  = FillProfileOrg(dr);
                        list.Add(profile_org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileOrg> GetProfileOrgListUuid(
            string uuid
        )  {
            List<ProfileOrg> list = new List<ProfileOrg>();
            DataSet ds = data.GetProfileOrgListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOrg profile_org  = FillProfileOrg(dr);
                        list.Add(profile_org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileOrg> GetProfileOrgListOrgId(
            string org_id
        )  {
            List<ProfileOrg> list = new List<ProfileOrg>();
            DataSet ds = data.GetProfileOrgListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOrg profile_org  = FillProfileOrg(dr);
                        list.Add(profile_org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileOrg> GetProfileOrgListProfileId(
            string profile_id
        )  {
            List<ProfileOrg> list = new List<ProfileOrg>();
            DataSet ds = data.GetProfileOrgListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileOrg profile_org  = FillProfileOrg(dr);
                        list.Add(profile_org);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileQuestion FillProfileQuestion(DataRow dr) {
            ProfileQuestion obj = new ProfileQuestion();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["answer"] != null)                    
                    obj.answer = dataType.FillDataString(dr, "answer");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["question_id"] != null)                    
                    obj.question_id = dataType.FillDataString(dr, "question_id");                

            return obj;
        }
        
        public virtual int CountProfileQuestion(
        )  {            
            return data.CountProfileQuestion(
            );
        }       
        public virtual int CountProfileQuestionUuid(
            string uuid
        )  {            
            return data.CountProfileQuestionUuid(
                uuid
            );
        }       
        public virtual int CountProfileQuestionChannelId(
            string channel_id
        )  {            
            return data.CountProfileQuestionChannelId(
                channel_id
            );
        }       
        public virtual int CountProfileQuestionOrgId(
            string org_id
        )  {            
            return data.CountProfileQuestionOrgId(
                org_id
            );
        }       
        public virtual int CountProfileQuestionProfileId(
            string profile_id
        )  {            
            return data.CountProfileQuestionProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileQuestionQuestionId(
            string question_id
        )  {            
            return data.CountProfileQuestionQuestionId(
                question_id
            );
        }       
        public virtual int CountProfileQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {            
            return data.CountProfileQuestionChannelIdOrgId(
                channel_id
                , org_id
            );
        }       
        public virtual int CountProfileQuestionChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {            
            return data.CountProfileQuestionChannelIdProfileId(
                channel_id
                , profile_id
            );
        }       
        public virtual int CountProfileQuestionQuestionIdProfileId(
            string question_id
            , string profile_id
        )  {            
            return data.CountProfileQuestionQuestionIdProfileId(
                question_id
                , profile_id
            );
        }       
        public virtual ProfileQuestionResult BrowseProfileQuestionListFilter(SearchFilter obj)  {
            ProfileQuestionResult result = new ProfileQuestionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileQuestionListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        result.data.Add(profile_question);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileQuestionUuid(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionUuid(set_type, obj);
        }    
        public virtual bool SetProfileQuestionChannelIdProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionChannelIdProfileId(set_type, obj);
        }    
        public virtual bool SetProfileQuestionQuestionIdProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionQuestionIdProfileId(set_type, obj);
        }    
        public virtual bool SetProfileQuestionChannelIdQuestionIdProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionChannelIdQuestionIdProfileId(set_type, obj);
        }    
        public virtual bool DelProfileQuestionUuid(
            string uuid
        )  {
            return data.DelProfileQuestionUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            return data.DelProfileQuestionChannelIdOrgId(
                channel_id
                , org_id
            );
        }                     
        public virtual List<ProfileQuestion> GetProfileQuestionList(
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListUuid(
            string uuid
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListChannelId(
            string channel_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListOrgId(
            string org_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListProfileId(
            string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListQuestionId(
            string question_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListQuestionId(
                question_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListChannelIdOrgId(
                channel_id
                , org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListChannelIdProfileId(
                channel_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListQuestionIdProfileId(
            string question_id
            , string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListQuestionIdProfileId(
                question_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileChannel FillProfileChannel(DataRow dr) {
            ProfileChannel obj = new ProfileChannel();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileChannel(
        )  {            
            return data.CountProfileChannel(
            );
        }       
        public virtual int CountProfileChannelUuid(
            string uuid
        )  {            
            return data.CountProfileChannelUuid(
                uuid
            );
        }       
        public virtual int CountProfileChannelChannelId(
            string channel_id
        )  {            
            return data.CountProfileChannelChannelId(
                channel_id
            );
        }       
        public virtual int CountProfileChannelProfileId(
            string profile_id
        )  {            
            return data.CountProfileChannelProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileChannelChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {            
            return data.CountProfileChannelChannelIdProfileId(
                channel_id
                , profile_id
            );
        }       
        public virtual ProfileChannelResult BrowseProfileChannelListFilter(SearchFilter obj)  {
            ProfileChannelResult result = new ProfileChannelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileChannelListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        result.data.Add(profile_channel);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileChannelUuid(string set_type, ProfileChannel obj)  {            
            return data.SetProfileChannelUuid(set_type, obj);
        }    
        public virtual bool SetProfileChannelChannelIdProfileId(string set_type, ProfileChannel obj)  {            
            return data.SetProfileChannelChannelIdProfileId(set_type, obj);
        }    
        public virtual bool DelProfileChannelUuid(
            string uuid
        )  {
            return data.DelProfileChannelUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileChannelChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {
            return data.DelProfileChannelChannelIdProfileId(
                channel_id
                , profile_id
            );
        }                     
        public virtual List<ProfileChannel> GetProfileChannelList(
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileChannel> GetProfileChannelListUuid(
            string uuid
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileChannel> GetProfileChannelListChannelId(
            string channel_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileChannel> GetProfileChannelListProfileId(
            string profile_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileChannel> GetProfileChannelListChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListChannelIdProfileId(
                channel_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual OrgSite FillOrgSite(DataRow dr) {
            OrgSite obj = new OrgSite();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["site_id"] != null)                    
                    obj.site_id = dataType.FillDataString(dr, "site_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                

            return obj;
        }
        
        public virtual int CountOrgSite(
        )  {            
            return data.CountOrgSite(
            );
        }       
        public virtual int CountOrgSiteUuid(
            string uuid
        )  {            
            return data.CountOrgSiteUuid(
                uuid
            );
        }       
        public virtual int CountOrgSiteOrgId(
            string org_id
        )  {            
            return data.CountOrgSiteOrgId(
                org_id
            );
        }       
        public virtual int CountOrgSiteSiteId(
            string site_id
        )  {            
            return data.CountOrgSiteSiteId(
                site_id
            );
        }       
        public virtual int CountOrgSiteOrgIdSiteId(
            string org_id
            , string site_id
        )  {            
            return data.CountOrgSiteOrgIdSiteId(
                org_id
                , site_id
            );
        }       
        public virtual OrgSiteResult BrowseOrgSiteListFilter(SearchFilter obj)  {
            OrgSiteResult result = new OrgSiteResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOrgSiteListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgSite org_site  = FillOrgSite(dr);
                        result.data.Add(org_site);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOrgSiteUuid(string set_type, OrgSite obj)  {            
            return data.SetOrgSiteUuid(set_type, obj);
        }    
        public virtual bool SetOrgSiteOrgIdSiteId(string set_type, OrgSite obj)  {            
            return data.SetOrgSiteOrgIdSiteId(set_type, obj);
        }    
        public virtual bool DelOrgSiteUuid(
            string uuid
        )  {
            return data.DelOrgSiteUuid(
                uuid
            );
        }                     
        public virtual bool DelOrgSiteOrgIdSiteId(
            string org_id
            , string site_id
        )  {
            return data.DelOrgSiteOrgIdSiteId(
                org_id
                , site_id
            );
        }                     
        public virtual List<OrgSite> GetOrgSiteList(
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgSite org_site  = FillOrgSite(dr);
                        list.Add(org_site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OrgSite> GetOrgSiteListUuid(
            string uuid
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgSite org_site  = FillOrgSite(dr);
                        list.Add(org_site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OrgSite> GetOrgSiteListOrgId(
            string org_id
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgSite org_site  = FillOrgSite(dr);
                        list.Add(org_site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OrgSite> GetOrgSiteListSiteId(
            string site_id
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListSiteId(
                site_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgSite org_site  = FillOrgSite(dr);
                        list.Add(org_site);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<OrgSite> GetOrgSiteListOrgIdSiteId(
            string org_id
            , string site_id
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListOrgIdSiteId(
                org_id
                , site_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       OrgSite org_site  = FillOrgSite(dr);
                        list.Add(org_site);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual SiteApp FillSiteApp(DataRow dr) {
            SiteApp obj = new SiteApp();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["site_id"] != null)                    
                    obj.site_id = dataType.FillDataString(dr, "site_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                

            return obj;
        }
        
        public virtual int CountSiteApp(
        )  {            
            return data.CountSiteApp(
            );
        }       
        public virtual int CountSiteAppUuid(
            string uuid
        )  {            
            return data.CountSiteAppUuid(
                uuid
            );
        }       
        public virtual int CountSiteAppAppId(
            string app_id
        )  {            
            return data.CountSiteAppAppId(
                app_id
            );
        }       
        public virtual int CountSiteAppSiteId(
            string site_id
        )  {            
            return data.CountSiteAppSiteId(
                site_id
            );
        }       
        public virtual int CountSiteAppAppIdSiteId(
            string app_id
            , string site_id
        )  {            
            return data.CountSiteAppAppIdSiteId(
                app_id
                , site_id
            );
        }       
        public virtual SiteAppResult BrowseSiteAppListFilter(SearchFilter obj)  {
            SiteAppResult result = new SiteAppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseSiteAppListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteApp site_app  = FillSiteApp(dr);
                        result.data.Add(site_app);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetSiteAppUuid(string set_type, SiteApp obj)  {            
            return data.SetSiteAppUuid(set_type, obj);
        }    
        public virtual bool SetSiteAppAppIdSiteId(string set_type, SiteApp obj)  {            
            return data.SetSiteAppAppIdSiteId(set_type, obj);
        }    
        public virtual bool DelSiteAppUuid(
            string uuid
        )  {
            return data.DelSiteAppUuid(
                uuid
            );
        }                     
        public virtual bool DelSiteAppAppIdSiteId(
            string app_id
            , string site_id
        )  {
            return data.DelSiteAppAppIdSiteId(
                app_id
                , site_id
            );
        }                     
        public virtual List<SiteApp> GetSiteAppList(
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteApp site_app  = FillSiteApp(dr);
                        list.Add(site_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<SiteApp> GetSiteAppListUuid(
            string uuid
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteApp site_app  = FillSiteApp(dr);
                        list.Add(site_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<SiteApp> GetSiteAppListAppId(
            string app_id
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListAppId(
                app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteApp site_app  = FillSiteApp(dr);
                        list.Add(site_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<SiteApp> GetSiteAppListSiteId(
            string site_id
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListSiteId(
                site_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteApp site_app  = FillSiteApp(dr);
                        list.Add(site_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<SiteApp> GetSiteAppListAppIdSiteId(
            string app_id
            , string site_id
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListAppIdSiteId(
                app_id
                , site_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       SiteApp site_app  = FillSiteApp(dr);
                        list.Add(site_app);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Photo FillPhoto(DataRow dr) {
            Photo obj = new Photo();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["third_party_data"] != null)                    
                    obj.third_party_data = dataType.FillDataString(dr, "third_party_data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["external_id"] != null)                    
                    obj.external_id = dataType.FillDataString(dr, "external_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountPhoto(
        )  {            
            return data.CountPhoto(
            );
        }       
        public virtual int CountPhotoUuid(
            string uuid
        )  {            
            return data.CountPhotoUuid(
                uuid
            );
        }       
        public virtual int CountPhotoExternalId(
            string external_id
        )  {            
            return data.CountPhotoExternalId(
                external_id
            );
        }       
        public virtual int CountPhotoUrl(
            string url
        )  {            
            return data.CountPhotoUrl(
                url
            );
        }       
        public virtual int CountPhotoUrlExternalId(
            string url
            , string external_id
        )  {            
            return data.CountPhotoUrlExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountPhotoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountPhotoUuidExternalId(
                uuid
                , external_id
            );
        }       
        public virtual PhotoResult BrowsePhotoListFilter(SearchFilter obj)  {
            PhotoResult result = new PhotoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowsePhotoListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Photo photo  = FillPhoto(dr);
                        result.data.Add(photo);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetPhotoUuid(string set_type, Photo obj)  {            
            return data.SetPhotoUuid(set_type, obj);
        }    
        public virtual bool SetPhotoExternalId(string set_type, Photo obj)  {            
            return data.SetPhotoExternalId(set_type, obj);
        }    
        public virtual bool SetPhotoUrl(string set_type, Photo obj)  {            
            return data.SetPhotoUrl(set_type, obj);
        }    
        public virtual bool SetPhotoUrlExternalId(string set_type, Photo obj)  {            
            return data.SetPhotoUrlExternalId(set_type, obj);
        }    
        public virtual bool SetPhotoUuidExternalId(string set_type, Photo obj)  {            
            return data.SetPhotoUuidExternalId(set_type, obj);
        }    
        public virtual bool DelPhotoUuid(
            string uuid
        )  {
            return data.DelPhotoUuid(
                uuid
            );
        }                     
        public virtual bool DelPhotoExternalId(
            string external_id
        )  {
            return data.DelPhotoExternalId(
                external_id
            );
        }                     
        public virtual bool DelPhotoUrl(
            string url
        )  {
            return data.DelPhotoUrl(
                url
            );
        }                     
        public virtual bool DelPhotoUrlExternalId(
            string url
            , string external_id
        )  {
            return data.DelPhotoUrlExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelPhotoUuidExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelPhotoUuidExternalId(
                uuid
                , external_id
            );
        }                     
        public virtual List<Photo> GetPhotoList(
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Photo photo  = FillPhoto(dr);
                        list.Add(photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Photo> GetPhotoListUuid(
            string uuid
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Photo photo  = FillPhoto(dr);
                        list.Add(photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Photo> GetPhotoListExternalId(
            string external_id
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListExternalId(
                external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Photo photo  = FillPhoto(dr);
                        list.Add(photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Photo> GetPhotoListUrl(
            string url
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Photo photo  = FillPhoto(dr);
                        list.Add(photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Photo> GetPhotoListUrlExternalId(
            string url
            , string external_id
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListUrlExternalId(
                url
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Photo photo  = FillPhoto(dr);
                        list.Add(photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Photo> GetPhotoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListUuidExternalId(
                uuid
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Photo photo  = FillPhoto(dr);
                        list.Add(photo);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Video FillVideo(DataRow dr) {
            Video obj = new Video();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["third_party_data"] != null)                    
                    obj.third_party_data = dataType.FillDataString(dr, "third_party_data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["external_id"] != null)                    
                    obj.external_id = dataType.FillDataString(dr, "external_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountVideo(
        )  {            
            return data.CountVideo(
            );
        }       
        public virtual int CountVideoUuid(
            string uuid
        )  {            
            return data.CountVideoUuid(
                uuid
            );
        }       
        public virtual int CountVideoExternalId(
            string external_id
        )  {            
            return data.CountVideoExternalId(
                external_id
            );
        }       
        public virtual int CountVideoUrl(
            string url
        )  {            
            return data.CountVideoUrl(
                url
            );
        }       
        public virtual int CountVideoUrlExternalId(
            string url
            , string external_id
        )  {            
            return data.CountVideoUrlExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountVideoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountVideoUuidExternalId(
                uuid
                , external_id
            );
        }       
        public virtual VideoResult BrowseVideoListFilter(SearchFilter obj)  {
            VideoResult result = new VideoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseVideoListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Video video  = FillVideo(dr);
                        result.data.Add(video);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetVideoUuid(string set_type, Video obj)  {            
            return data.SetVideoUuid(set_type, obj);
        }    
        public virtual bool SetVideoExternalId(string set_type, Video obj)  {            
            return data.SetVideoExternalId(set_type, obj);
        }    
        public virtual bool SetVideoUrl(string set_type, Video obj)  {            
            return data.SetVideoUrl(set_type, obj);
        }    
        public virtual bool SetVideoUrlExternalId(string set_type, Video obj)  {            
            return data.SetVideoUrlExternalId(set_type, obj);
        }    
        public virtual bool SetVideoUuidExternalId(string set_type, Video obj)  {            
            return data.SetVideoUuidExternalId(set_type, obj);
        }    
        public virtual bool DelVideoUuid(
            string uuid
        )  {
            return data.DelVideoUuid(
                uuid
            );
        }                     
        public virtual bool DelVideoExternalId(
            string external_id
        )  {
            return data.DelVideoExternalId(
                external_id
            );
        }                     
        public virtual bool DelVideoUrl(
            string url
        )  {
            return data.DelVideoUrl(
                url
            );
        }                     
        public virtual bool DelVideoUrlExternalId(
            string url
            , string external_id
        )  {
            return data.DelVideoUrlExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelVideoUuidExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelVideoUuidExternalId(
                uuid
                , external_id
            );
        }                     
        public virtual List<Video> GetVideoList(
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Video video  = FillVideo(dr);
                        list.Add(video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Video> GetVideoListUuid(
            string uuid
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Video video  = FillVideo(dr);
                        list.Add(video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Video> GetVideoListExternalId(
            string external_id
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListExternalId(
                external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Video video  = FillVideo(dr);
                        list.Add(video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Video> GetVideoListUrl(
            string url
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Video video  = FillVideo(dr);
                        list.Add(video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Video> GetVideoListUrlExternalId(
            string url
            , string external_id
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListUrlExternalId(
                url
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Video video  = FillVideo(dr);
                        list.Add(video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Video> GetVideoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListUuidExternalId(
                uuid
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Video video  = FillVideo(dr);
                        list.Add(video);
                    }
                }
            }
            return list;
        }
        
        
    }
}






