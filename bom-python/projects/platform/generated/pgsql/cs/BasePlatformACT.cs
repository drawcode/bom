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
        public virtual int CountAppByUuid(
            string uuid
        )  {            
            return data.CountAppByUuid(
                uuid
            );
        }       
        public virtual int CountAppByCode(
            string code
        )  {            
            return data.CountAppByCode(
                code
            );
        }       
        public virtual int CountAppByTypeId(
            string type_id
        )  {            
            return data.CountAppByTypeId(
                type_id
            );
        }       
        public virtual int CountAppByCodeByTypeId(
            string code
            , string type_id
        )  {            
            return data.CountAppByCodeByTypeId(
                code
                , type_id
            );
        }       
        public virtual int CountAppByPlatformByTypeId(
            string platform
            , string type_id
        )  {            
            return data.CountAppByPlatformByTypeId(
                platform
                , type_id
            );
        }       
        public virtual int CountAppByPlatform(
            string platform
        )  {            
            return data.CountAppByPlatform(
                platform
            );
        }       
        public virtual AppResult BrowseAppListByFilter(SearchFilter obj)  {
            AppResult result = new AppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseAppListByFilter(obj);
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
        public virtual bool SetAppByUuid(string set_type, App obj)  {            
            return data.SetAppByUuid(set_type, obj);
        }    
        public virtual bool SetAppByCode(string set_type, App obj)  {            
            return data.SetAppByCode(set_type, obj);
        }    
        public virtual bool DelAppByUuid(
            string uuid
        )  {
            return data.DelAppByUuid(
                uuid
            );
        }                     
        public virtual bool DelAppByCode(
            string code
        )  {
            return data.DelAppByCode(
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
        
        
        public virtual List<App> GetAppListByUuid(
            string uuid
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListByUuid(
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
        
        
        public virtual List<App> GetAppListByCode(
            string code
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListByCode(
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
        
        
        public virtual List<App> GetAppListByTypeId(
            string type_id
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListByTypeId(
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
        
        
        public virtual List<App> GetAppListByCodeByTypeId(
            string code
            , string type_id
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListByCodeByTypeId(
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
        
        
        public virtual List<App> GetAppListByPlatformByTypeId(
            string platform
            , string type_id
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListByPlatformByTypeId(
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
        
        
        public virtual List<App> GetAppListByPlatform(
            string platform
        )  {
            List<App> list = new List<App>();
            DataSet ds = data.GetAppListByPlatform(
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
        public virtual int CountAppTypeByUuid(
            string uuid
        )  {            
            return data.CountAppTypeByUuid(
                uuid
            );
        }       
        public virtual int CountAppTypeByCode(
            string code
        )  {            
            return data.CountAppTypeByCode(
                code
            );
        }       
        public virtual AppTypeResult BrowseAppTypeListByFilter(SearchFilter obj)  {
            AppTypeResult result = new AppTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseAppTypeListByFilter(obj);
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
        public virtual bool SetAppTypeByUuid(string set_type, AppType obj)  {            
            return data.SetAppTypeByUuid(set_type, obj);
        }    
        public virtual bool SetAppTypeByCode(string set_type, AppType obj)  {            
            return data.SetAppTypeByCode(set_type, obj);
        }    
        public virtual bool DelAppTypeByUuid(
            string uuid
        )  {
            return data.DelAppTypeByUuid(
                uuid
            );
        }                     
        public virtual bool DelAppTypeByCode(
            string code
        )  {
            return data.DelAppTypeByCode(
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
        
        
        public virtual List<AppType> GetAppTypeListByUuid(
            string uuid
        )  {
            List<AppType> list = new List<AppType>();
            DataSet ds = data.GetAppTypeListByUuid(
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
        
        
        public virtual List<AppType> GetAppTypeListByCode(
            string code
        )  {
            List<AppType> list = new List<AppType>();
            DataSet ds = data.GetAppTypeListByCode(
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
        public virtual int CountSiteByUuid(
            string uuid
        )  {            
            return data.CountSiteByUuid(
                uuid
            );
        }       
        public virtual int CountSiteByCode(
            string code
        )  {            
            return data.CountSiteByCode(
                code
            );
        }       
        public virtual int CountSiteByTypeId(
            string type_id
        )  {            
            return data.CountSiteByTypeId(
                type_id
            );
        }       
        public virtual int CountSiteByCodeByTypeId(
            string code
            , string type_id
        )  {            
            return data.CountSiteByCodeByTypeId(
                code
                , type_id
            );
        }       
        public virtual int CountSiteByDomainByTypeId(
            string domain
            , string type_id
        )  {            
            return data.CountSiteByDomainByTypeId(
                domain
                , type_id
            );
        }       
        public virtual int CountSiteByDomain(
            string domain
        )  {            
            return data.CountSiteByDomain(
                domain
            );
        }       
        public virtual SiteResult BrowseSiteListByFilter(SearchFilter obj)  {
            SiteResult result = new SiteResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseSiteListByFilter(obj);
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
        public virtual bool SetSiteByUuid(string set_type, Site obj)  {            
            return data.SetSiteByUuid(set_type, obj);
        }    
        public virtual bool SetSiteByCode(string set_type, Site obj)  {            
            return data.SetSiteByCode(set_type, obj);
        }    
        public virtual bool DelSiteByUuid(
            string uuid
        )  {
            return data.DelSiteByUuid(
                uuid
            );
        }                     
        public virtual bool DelSiteByCode(
            string code
        )  {
            return data.DelSiteByCode(
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
        
        
        public virtual List<Site> GetSiteListByUuid(
            string uuid
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListByUuid(
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
        
        
        public virtual List<Site> GetSiteListByCode(
            string code
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListByCode(
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
        
        
        public virtual List<Site> GetSiteListByTypeId(
            string type_id
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListByTypeId(
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
        
        
        public virtual List<Site> GetSiteListByCodeByTypeId(
            string code
            , string type_id
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListByCodeByTypeId(
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
        
        
        public virtual List<Site> GetSiteListByDomainByTypeId(
            string domain
            , string type_id
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListByDomainByTypeId(
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
        
        
        public virtual List<Site> GetSiteListByDomain(
            string domain
        )  {
            List<Site> list = new List<Site>();
            DataSet ds = data.GetSiteListByDomain(
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
        public virtual int CountSiteTypeByUuid(
            string uuid
        )  {            
            return data.CountSiteTypeByUuid(
                uuid
            );
        }       
        public virtual int CountSiteTypeByCode(
            string code
        )  {            
            return data.CountSiteTypeByCode(
                code
            );
        }       
        public virtual SiteTypeResult BrowseSiteTypeListByFilter(SearchFilter obj)  {
            SiteTypeResult result = new SiteTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseSiteTypeListByFilter(obj);
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
        public virtual bool SetSiteTypeByUuid(string set_type, SiteType obj)  {            
            return data.SetSiteTypeByUuid(set_type, obj);
        }    
        public virtual bool SetSiteTypeByCode(string set_type, SiteType obj)  {            
            return data.SetSiteTypeByCode(set_type, obj);
        }    
        public virtual bool DelSiteTypeByUuid(
            string uuid
        )  {
            return data.DelSiteTypeByUuid(
                uuid
            );
        }                     
        public virtual bool DelSiteTypeByCode(
            string code
        )  {
            return data.DelSiteTypeByCode(
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
        
        
        public virtual List<SiteType> GetSiteTypeListByUuid(
            string uuid
        )  {
            List<SiteType> list = new List<SiteType>();
            DataSet ds = data.GetSiteTypeListByUuid(
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
        
        
        public virtual List<SiteType> GetSiteTypeListByCode(
            string code
        )  {
            List<SiteType> list = new List<SiteType>();
            DataSet ds = data.GetSiteTypeListByCode(
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
        public virtual int CountOrgByUuid(
            string uuid
        )  {            
            return data.CountOrgByUuid(
                uuid
            );
        }       
        public virtual int CountOrgByCode(
            string code
        )  {            
            return data.CountOrgByCode(
                code
            );
        }       
        public virtual int CountOrgByName(
            string name
        )  {            
            return data.CountOrgByName(
                name
            );
        }       
        public virtual OrgResult BrowseOrgListByFilter(SearchFilter obj)  {
            OrgResult result = new OrgResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOrgListByFilter(obj);
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
        public virtual bool SetOrgByUuid(string set_type, Org obj)  {            
            return data.SetOrgByUuid(set_type, obj);
        }    
        public virtual bool DelOrgByUuid(
            string uuid
        )  {
            return data.DelOrgByUuid(
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
        
        
        public virtual List<Org> GetOrgListByUuid(
            string uuid
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListByUuid(
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
        
        
        public virtual List<Org> GetOrgListByCode(
            string code
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListByCode(
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
        
        
        public virtual List<Org> GetOrgListByName(
            string name
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListByName(
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
        public virtual int CountOrgTypeByUuid(
            string uuid
        )  {            
            return data.CountOrgTypeByUuid(
                uuid
            );
        }       
        public virtual int CountOrgTypeByCode(
            string code
        )  {            
            return data.CountOrgTypeByCode(
                code
            );
        }       
        public virtual OrgTypeResult BrowseOrgTypeListByFilter(SearchFilter obj)  {
            OrgTypeResult result = new OrgTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOrgTypeListByFilter(obj);
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
        public virtual bool SetOrgTypeByUuid(string set_type, OrgType obj)  {            
            return data.SetOrgTypeByUuid(set_type, obj);
        }    
        public virtual bool SetOrgTypeByCode(string set_type, OrgType obj)  {            
            return data.SetOrgTypeByCode(set_type, obj);
        }    
        public virtual bool DelOrgTypeByUuid(
            string uuid
        )  {
            return data.DelOrgTypeByUuid(
                uuid
            );
        }                     
        public virtual bool DelOrgTypeByCode(
            string code
        )  {
            return data.DelOrgTypeByCode(
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
        
        
        public virtual List<OrgType> GetOrgTypeListByUuid(
            string uuid
        )  {
            List<OrgType> list = new List<OrgType>();
            DataSet ds = data.GetOrgTypeListByUuid(
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
        
        
        public virtual List<OrgType> GetOrgTypeListByCode(
            string code
        )  {
            List<OrgType> list = new List<OrgType>();
            DataSet ds = data.GetOrgTypeListByCode(
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
        public virtual int CountContentItemByUuid(
            string uuid
        )  {            
            return data.CountContentItemByUuid(
                uuid
            );
        }       
        public virtual int CountContentItemByCode(
            string code
        )  {            
            return data.CountContentItemByCode(
                code
            );
        }       
        public virtual int CountContentItemByName(
            string name
        )  {            
            return data.CountContentItemByName(
                name
            );
        }       
        public virtual int CountContentItemByPath(
            string path
        )  {            
            return data.CountContentItemByPath(
                path
            );
        }       
        public virtual ContentItemResult BrowseContentItemListByFilter(SearchFilter obj)  {
            ContentItemResult result = new ContentItemResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseContentItemListByFilter(obj);
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
        public virtual bool SetContentItemByUuid(string set_type, ContentItem obj)  {            
            return data.SetContentItemByUuid(set_type, obj);
        }    
        public virtual bool DelContentItemByUuid(
            string uuid
        )  {
            return data.DelContentItemByUuid(
                uuid
            );
        }                     
        public virtual bool DelContentItemByPath(
            string path
        )  {
            return data.DelContentItemByPath(
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
        
        
        public virtual List<ContentItem> GetContentItemListByUuid(
            string uuid
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListByUuid(
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
        
        
        public virtual List<ContentItem> GetContentItemListByCode(
            string code
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListByCode(
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
        
        
        public virtual List<ContentItem> GetContentItemListByName(
            string name
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListByName(
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
        
        
        public virtual List<ContentItem> GetContentItemListByPath(
            string path
        )  {
            List<ContentItem> list = new List<ContentItem>();
            DataSet ds = data.GetContentItemListByPath(
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
        public virtual int CountContentItemTypeByUuid(
            string uuid
        )  {            
            return data.CountContentItemTypeByUuid(
                uuid
            );
        }       
        public virtual int CountContentItemTypeByCode(
            string code
        )  {            
            return data.CountContentItemTypeByCode(
                code
            );
        }       
        public virtual ContentItemTypeResult BrowseContentItemTypeListByFilter(SearchFilter obj)  {
            ContentItemTypeResult result = new ContentItemTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseContentItemTypeListByFilter(obj);
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
        public virtual bool SetContentItemTypeByUuid(string set_type, ContentItemType obj)  {            
            return data.SetContentItemTypeByUuid(set_type, obj);
        }    
        public virtual bool SetContentItemTypeByCode(string set_type, ContentItemType obj)  {            
            return data.SetContentItemTypeByCode(set_type, obj);
        }    
        public virtual bool DelContentItemTypeByUuid(
            string uuid
        )  {
            return data.DelContentItemTypeByUuid(
                uuid
            );
        }                     
        public virtual bool DelContentItemTypeByCode(
            string code
        )  {
            return data.DelContentItemTypeByCode(
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
        
        
        public virtual List<ContentItemType> GetContentItemTypeListByUuid(
            string uuid
        )  {
            List<ContentItemType> list = new List<ContentItemType>();
            DataSet ds = data.GetContentItemTypeListByUuid(
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
        
        
        public virtual List<ContentItemType> GetContentItemTypeListByCode(
            string code
        )  {
            List<ContentItemType> list = new List<ContentItemType>();
            DataSet ds = data.GetContentItemTypeListByCode(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountContentPageByUuid(
            string uuid
        )  {            
            return data.CountContentPageByUuid(
                uuid
            );
        }       
        public virtual int CountContentPageByCode(
            string code
        )  {            
            return data.CountContentPageByCode(
                code
            );
        }       
        public virtual int CountContentPageByName(
            string name
        )  {            
            return data.CountContentPageByName(
                name
            );
        }       
        public virtual int CountContentPageByPath(
            string path
        )  {            
            return data.CountContentPageByPath(
                path
            );
        }       
        public virtual ContentPageResult BrowseContentPageListByFilter(SearchFilter obj)  {
            ContentPageResult result = new ContentPageResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseContentPageListByFilter(obj);
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
        public virtual bool SetContentPageByUuid(string set_type, ContentPage obj)  {            
            return data.SetContentPageByUuid(set_type, obj);
        }    
        public virtual bool DelContentPageByUuid(
            string uuid
        )  {
            return data.DelContentPageByUuid(
                uuid
            );
        }                     
        public virtual bool DelContentPageByPathBySiteId(
            string path
            , string site_id
        )  {
            return data.DelContentPageByPathBySiteId(
                path
                , site_id
            );
        }                     
        public virtual bool DelContentPageByPath(
            string path
        )  {
            return data.DelContentPageByPath(
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
        
        
        public virtual List<ContentPage> GetContentPageListByUuid(
            string uuid
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListByUuid(
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
        
        
        public virtual List<ContentPage> GetContentPageListByCode(
            string code
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListByCode(
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
        
        
        public virtual List<ContentPage> GetContentPageListByName(
            string name
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListByName(
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
        
        
        public virtual List<ContentPage> GetContentPageListByPath(
            string path
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListByPath(
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
        
        
        public virtual List<ContentPage> GetContentPageListBySiteId(
            string site_id
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListBySiteId(
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
        
        
        public virtual List<ContentPage> GetContentPageListBySiteIdByPath(
            string site_id
            , string path
        )  {
            List<ContentPage> list = new List<ContentPage>();
            DataSet ds = data.GetContentPageListBySiteIdByPath(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountMessageByUuid(
            string uuid
        )  {            
            return data.CountMessageByUuid(
                uuid
            );
        }       
        public virtual MessageResult BrowseMessageListByFilter(SearchFilter obj)  {
            MessageResult result = new MessageResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseMessageListByFilter(obj);
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
        public virtual bool SetMessageByUuid(string set_type, Message obj)  {            
            return data.SetMessageByUuid(set_type, obj);
        }    
        public virtual bool DelMessageByUuid(
            string uuid
        )  {
            return data.DelMessageByUuid(
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
        
        
        public virtual List<Message> GetMessageListByUuid(
            string uuid
        )  {
            List<Message> list = new List<Message>();
            DataSet ds = data.GetMessageListByUuid(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountOfferByUuid(
            string uuid
        )  {            
            return data.CountOfferByUuid(
                uuid
            );
        }       
        public virtual int CountOfferByCode(
            string code
        )  {            
            return data.CountOfferByCode(
                code
            );
        }       
        public virtual int CountOfferByName(
            string name
        )  {            
            return data.CountOfferByName(
                name
            );
        }       
        public virtual int CountOfferByOrgId(
            string org_id
        )  {            
            return data.CountOfferByOrgId(
                org_id
            );
        }       
        public virtual OfferResult BrowseOfferListByFilter(SearchFilter obj)  {
            OfferResult result = new OfferResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferListByFilter(obj);
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
        public virtual bool SetOfferByUuid(string set_type, Offer obj)  {            
            return data.SetOfferByUuid(set_type, obj);
        }    
        public virtual bool DelOfferByUuid(
            string uuid
        )  {
            return data.DelOfferByUuid(
                uuid
            );
        }                     
        public virtual bool DelOfferByOrgId(
            string org_id
        )  {
            return data.DelOfferByOrgId(
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
        
        
        public virtual List<Offer> GetOfferListByUuid(
            string uuid
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListByUuid(
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
        
        
        public virtual List<Offer> GetOfferListByCode(
            string code
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListByCode(
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
        
        
        public virtual List<Offer> GetOfferListByName(
            string name
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListByName(
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
        
        
        public virtual List<Offer> GetOfferListByOrgId(
            string org_id
        )  {
            List<Offer> list = new List<Offer>();
            DataSet ds = data.GetOfferListByOrgId(
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
        public virtual int CountOfferTypeByUuid(
            string uuid
        )  {            
            return data.CountOfferTypeByUuid(
                uuid
            );
        }       
        public virtual int CountOfferTypeByCode(
            string code
        )  {            
            return data.CountOfferTypeByCode(
                code
            );
        }       
        public virtual int CountOfferTypeByName(
            string name
        )  {            
            return data.CountOfferTypeByName(
                name
            );
        }       
        public virtual OfferTypeResult BrowseOfferTypeListByFilter(SearchFilter obj)  {
            OfferTypeResult result = new OfferTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferTypeListByFilter(obj);
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
        public virtual bool SetOfferTypeByUuid(string set_type, OfferType obj)  {            
            return data.SetOfferTypeByUuid(set_type, obj);
        }    
        public virtual bool DelOfferTypeByUuid(
            string uuid
        )  {
            return data.DelOfferTypeByUuid(
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
        
        
        public virtual List<OfferType> GetOfferTypeListByUuid(
            string uuid
        )  {
            List<OfferType> list = new List<OfferType>();
            DataSet ds = data.GetOfferTypeListByUuid(
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
        
        
        public virtual List<OfferType> GetOfferTypeListByCode(
            string code
        )  {
            List<OfferType> list = new List<OfferType>();
            DataSet ds = data.GetOfferTypeListByCode(
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
        
        
        public virtual List<OfferType> GetOfferTypeListByName(
            string name
        )  {
            List<OfferType> list = new List<OfferType>();
            DataSet ds = data.GetOfferTypeListByName(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountOfferLocationByUuid(
            string uuid
        )  {            
            return data.CountOfferLocationByUuid(
                uuid
            );
        }       
        public virtual int CountOfferLocationByOfferId(
            string offer_id
        )  {            
            return data.CountOfferLocationByOfferId(
                offer_id
            );
        }       
        public virtual int CountOfferLocationByCity(
            string city
        )  {            
            return data.CountOfferLocationByCity(
                city
            );
        }       
        public virtual int CountOfferLocationByCountryCode(
            string country_code
        )  {            
            return data.CountOfferLocationByCountryCode(
                country_code
            );
        }       
        public virtual int CountOfferLocationByPostalCode(
            string postal_code
        )  {            
            return data.CountOfferLocationByPostalCode(
                postal_code
            );
        }       
        public virtual OfferLocationResult BrowseOfferLocationListByFilter(SearchFilter obj)  {
            OfferLocationResult result = new OfferLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferLocationListByFilter(obj);
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
        public virtual bool SetOfferLocationByUuid(string set_type, OfferLocation obj)  {            
            return data.SetOfferLocationByUuid(set_type, obj);
        }    
        public virtual bool DelOfferLocationByUuid(
            string uuid
        )  {
            return data.DelOfferLocationByUuid(
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
        
        
        public virtual List<OfferLocation> GetOfferLocationListByUuid(
            string uuid
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListByUuid(
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
        
        
        public virtual List<OfferLocation> GetOfferLocationListByOfferId(
            string offer_id
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListByOfferId(
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
        
        
        public virtual List<OfferLocation> GetOfferLocationListByCity(
            string city
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListByCity(
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
        
        
        public virtual List<OfferLocation> GetOfferLocationListByCountryCode(
            string country_code
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListByCountryCode(
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
        
        
        public virtual List<OfferLocation> GetOfferLocationListByPostalCode(
            string postal_code
        )  {
            List<OfferLocation> list = new List<OfferLocation>();
            DataSet ds = data.GetOfferLocationListByPostalCode(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountOfferCategoryByUuid(
            string uuid
        )  {            
            return data.CountOfferCategoryByUuid(
                uuid
            );
        }       
        public virtual int CountOfferCategoryByCode(
            string code
        )  {            
            return data.CountOfferCategoryByCode(
                code
            );
        }       
        public virtual int CountOfferCategoryByName(
            string name
        )  {            
            return data.CountOfferCategoryByName(
                name
            );
        }       
        public virtual int CountOfferCategoryByOrgId(
            string org_id
        )  {            
            return data.CountOfferCategoryByOrgId(
                org_id
            );
        }       
        public virtual int CountOfferCategoryByTypeId(
            string type_id
        )  {            
            return data.CountOfferCategoryByTypeId(
                type_id
            );
        }       
        public virtual int CountOfferCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountOfferCategoryByOrgIdByTypeId(
                org_id
                , type_id
            );
        }       
        public virtual OfferCategoryResult BrowseOfferCategoryListByFilter(SearchFilter obj)  {
            OfferCategoryResult result = new OfferCategoryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferCategoryListByFilter(obj);
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
        public virtual bool SetOfferCategoryByUuid(string set_type, OfferCategory obj)  {            
            return data.SetOfferCategoryByUuid(set_type, obj);
        }    
        public virtual bool DelOfferCategoryByUuid(
            string uuid
        )  {
            return data.DelOfferCategoryByUuid(
                uuid
            );
        }                     
        public virtual bool DelOfferCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {
            return data.DelOfferCategoryByCodeByOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelOfferCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelOfferCategoryByCodeByOrgIdByTypeId(
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
        
        
        public virtual List<OfferCategory> GetOfferCategoryListByUuid(
            string uuid
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListByUuid(
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
        
        
        public virtual List<OfferCategory> GetOfferCategoryListByCode(
            string code
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListByCode(
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
        
        
        public virtual List<OfferCategory> GetOfferCategoryListByName(
            string name
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListByName(
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
        
        
        public virtual List<OfferCategory> GetOfferCategoryListByOrgId(
            string org_id
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListByOrgId(
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
        
        
        public virtual List<OfferCategory> GetOfferCategoryListByTypeId(
            string type_id
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListByTypeId(
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
        
        
        public virtual List<OfferCategory> GetOfferCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<OfferCategory> list = new List<OfferCategory>();
            DataSet ds = data.GetOfferCategoryListByOrgIdByTypeId(
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
        public virtual int CountOfferCategoryTreeByUuid(
            string uuid
        )  {            
            return data.CountOfferCategoryTreeByUuid(
                uuid
            );
        }       
        public virtual int CountOfferCategoryTreeByParentId(
            string parent_id
        )  {            
            return data.CountOfferCategoryTreeByParentId(
                parent_id
            );
        }       
        public virtual int CountOfferCategoryTreeByCategoryId(
            string category_id
        )  {            
            return data.CountOfferCategoryTreeByCategoryId(
                category_id
            );
        }       
        public virtual int CountOfferCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return data.CountOfferCategoryTreeByParentIdByCategoryId(
                parent_id
                , category_id
            );
        }       
        public virtual OfferCategoryTreeResult BrowseOfferCategoryTreeListByFilter(SearchFilter obj)  {
            OfferCategoryTreeResult result = new OfferCategoryTreeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferCategoryTreeListByFilter(obj);
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
        public virtual bool SetOfferCategoryTreeByUuid(string set_type, OfferCategoryTree obj)  {            
            return data.SetOfferCategoryTreeByUuid(set_type, obj);
        }    
        public virtual bool DelOfferCategoryTreeByUuid(
            string uuid
        )  {
            return data.DelOfferCategoryTreeByUuid(
                uuid
            );
        }                     
        public virtual bool DelOfferCategoryTreeByParentId(
            string parent_id
        )  {
            return data.DelOfferCategoryTreeByParentId(
                parent_id
            );
        }                     
        public virtual bool DelOfferCategoryTreeByCategoryId(
            string category_id
        )  {
            return data.DelOfferCategoryTreeByCategoryId(
                category_id
            );
        }                     
        public virtual bool DelOfferCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            return data.DelOfferCategoryTreeByParentIdByCategoryId(
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
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByUuid(
            string uuid
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListByUuid(
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
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByParentId(
            string parent_id
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListByParentId(
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
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByCategoryId(
            string category_id
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListByCategoryId(
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
        
        
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<OfferCategoryTree> list = new List<OfferCategoryTree>();
            DataSet ds = data.GetOfferCategoryTreeListByParentIdByCategoryId(
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
        public virtual int CountOfferCategoryAssocByUuid(
            string uuid
        )  {            
            return data.CountOfferCategoryAssocByUuid(
                uuid
            );
        }       
        public virtual int CountOfferCategoryAssocByOfferId(
            string offer_id
        )  {            
            return data.CountOfferCategoryAssocByOfferId(
                offer_id
            );
        }       
        public virtual int CountOfferCategoryAssocByCategoryId(
            string category_id
        )  {            
            return data.CountOfferCategoryAssocByCategoryId(
                category_id
            );
        }       
        public virtual int CountOfferCategoryAssocByOfferIdByCategoryId(
            string offer_id
            , string category_id
        )  {            
            return data.CountOfferCategoryAssocByOfferIdByCategoryId(
                offer_id
                , category_id
            );
        }       
        public virtual OfferCategoryAssocResult BrowseOfferCategoryAssocListByFilter(SearchFilter obj)  {
            OfferCategoryAssocResult result = new OfferCategoryAssocResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferCategoryAssocListByFilter(obj);
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
        public virtual bool SetOfferCategoryAssocByUuid(string set_type, OfferCategoryAssoc obj)  {            
            return data.SetOfferCategoryAssocByUuid(set_type, obj);
        }    
        public virtual bool DelOfferCategoryAssocByUuid(
            string uuid
        )  {
            return data.DelOfferCategoryAssocByUuid(
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
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByUuid(
            string uuid
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListByUuid(
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
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByOfferId(
            string offer_id
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListByOfferId(
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
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByCategoryId(
            string category_id
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListByCategoryId(
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
        
        
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByOfferIdByCategoryId(
            string offer_id
            , string category_id
        )  {
            List<OfferCategoryAssoc> list = new List<OfferCategoryAssoc>();
            DataSet ds = data.GetOfferCategoryAssocListByOfferIdByCategoryId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                

            return obj;
        }
        
        public virtual int CountOfferGameLocation(
        )  {            
            return data.CountOfferGameLocation(
            );
        }       
        public virtual int CountOfferGameLocationByUuid(
            string uuid
        )  {            
            return data.CountOfferGameLocationByUuid(
                uuid
            );
        }       
        public virtual int CountOfferGameLocationByGameLocationId(
            string game_location_id
        )  {            
            return data.CountOfferGameLocationByGameLocationId(
                game_location_id
            );
        }       
        public virtual int CountOfferGameLocationByOfferId(
            string offer_id
        )  {            
            return data.CountOfferGameLocationByOfferId(
                offer_id
            );
        }       
        public virtual int CountOfferGameLocationByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        )  {            
            return data.CountOfferGameLocationByOfferIdByGameLocationId(
                offer_id
                , game_location_id
            );
        }       
        public virtual OfferGameLocationResult BrowseOfferGameLocationListByFilter(SearchFilter obj)  {
            OfferGameLocationResult result = new OfferGameLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOfferGameLocationListByFilter(obj);
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
        public virtual bool SetOfferGameLocationByUuid(string set_type, OfferGameLocation obj)  {            
            return data.SetOfferGameLocationByUuid(set_type, obj);
        }    
        public virtual bool DelOfferGameLocationByUuid(
            string uuid
        )  {
            return data.DelOfferGameLocationByUuid(
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
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListByUuid(
            string uuid
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListByUuid(
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
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListByGameLocationId(
            string game_location_id
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListByGameLocationId(
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
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListByOfferId(
            string offer_id
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListByOfferId(
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
        
        
        public virtual List<OfferGameLocation> GetOfferGameLocationListByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            List<OfferGameLocation> list = new List<OfferGameLocation>();
            DataSet ds = data.GetOfferGameLocationListByOfferIdByGameLocationId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountEventInfoByUuid(
            string uuid
        )  {            
            return data.CountEventInfoByUuid(
                uuid
            );
        }       
        public virtual int CountEventInfoByCode(
            string code
        )  {            
            return data.CountEventInfoByCode(
                code
            );
        }       
        public virtual int CountEventInfoByName(
            string name
        )  {            
            return data.CountEventInfoByName(
                name
            );
        }       
        public virtual int CountEventInfoByOrgId(
            string org_id
        )  {            
            return data.CountEventInfoByOrgId(
                org_id
            );
        }       
        public virtual EventInfoResult BrowseEventInfoListByFilter(SearchFilter obj)  {
            EventInfoResult result = new EventInfoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventInfoListByFilter(obj);
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
        public virtual bool SetEventInfoByUuid(string set_type, EventInfo obj)  {            
            return data.SetEventInfoByUuid(set_type, obj);
        }    
        public virtual bool DelEventInfoByUuid(
            string uuid
        )  {
            return data.DelEventInfoByUuid(
                uuid
            );
        }                     
        public virtual bool DelEventInfoByOrgId(
            string org_id
        )  {
            return data.DelEventInfoByOrgId(
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
        
        
        public virtual List<EventInfo> GetEventInfoListByUuid(
            string uuid
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListByUuid(
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
        
        
        public virtual List<EventInfo> GetEventInfoListByCode(
            string code
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListByCode(
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
        
        
        public virtual List<EventInfo> GetEventInfoListByName(
            string name
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListByName(
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
        
        
        public virtual List<EventInfo> GetEventInfoListByOrgId(
            string org_id
        )  {
            List<EventInfo> list = new List<EventInfo>();
            DataSet ds = data.GetEventInfoListByOrgId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountEventLocationByUuid(
            string uuid
        )  {            
            return data.CountEventLocationByUuid(
                uuid
            );
        }       
        public virtual int CountEventLocationByEventId(
            string event_id
        )  {            
            return data.CountEventLocationByEventId(
                event_id
            );
        }       
        public virtual int CountEventLocationByCity(
            string city
        )  {            
            return data.CountEventLocationByCity(
                city
            );
        }       
        public virtual int CountEventLocationByCountryCode(
            string country_code
        )  {            
            return data.CountEventLocationByCountryCode(
                country_code
            );
        }       
        public virtual int CountEventLocationByPostalCode(
            string postal_code
        )  {            
            return data.CountEventLocationByPostalCode(
                postal_code
            );
        }       
        public virtual EventLocationResult BrowseEventLocationListByFilter(SearchFilter obj)  {
            EventLocationResult result = new EventLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventLocationListByFilter(obj);
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
        public virtual bool SetEventLocationByUuid(string set_type, EventLocation obj)  {            
            return data.SetEventLocationByUuid(set_type, obj);
        }    
        public virtual bool DelEventLocationByUuid(
            string uuid
        )  {
            return data.DelEventLocationByUuid(
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
        
        
        public virtual List<EventLocation> GetEventLocationListByUuid(
            string uuid
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListByUuid(
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
        
        
        public virtual List<EventLocation> GetEventLocationListByEventId(
            string event_id
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListByEventId(
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
        
        
        public virtual List<EventLocation> GetEventLocationListByCity(
            string city
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListByCity(
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
        
        
        public virtual List<EventLocation> GetEventLocationListByCountryCode(
            string country_code
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListByCountryCode(
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
        
        
        public virtual List<EventLocation> GetEventLocationListByPostalCode(
            string postal_code
        )  {
            List<EventLocation> list = new List<EventLocation>();
            DataSet ds = data.GetEventLocationListByPostalCode(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountEventCategoryByUuid(
            string uuid
        )  {            
            return data.CountEventCategoryByUuid(
                uuid
            );
        }       
        public virtual int CountEventCategoryByCode(
            string code
        )  {            
            return data.CountEventCategoryByCode(
                code
            );
        }       
        public virtual int CountEventCategoryByName(
            string name
        )  {            
            return data.CountEventCategoryByName(
                name
            );
        }       
        public virtual int CountEventCategoryByOrgId(
            string org_id
        )  {            
            return data.CountEventCategoryByOrgId(
                org_id
            );
        }       
        public virtual int CountEventCategoryByTypeId(
            string type_id
        )  {            
            return data.CountEventCategoryByTypeId(
                type_id
            );
        }       
        public virtual int CountEventCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountEventCategoryByOrgIdByTypeId(
                org_id
                , type_id
            );
        }       
        public virtual EventCategoryResult BrowseEventCategoryListByFilter(SearchFilter obj)  {
            EventCategoryResult result = new EventCategoryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventCategoryListByFilter(obj);
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
        public virtual bool SetEventCategoryByUuid(string set_type, EventCategory obj)  {            
            return data.SetEventCategoryByUuid(set_type, obj);
        }    
        public virtual bool DelEventCategoryByUuid(
            string uuid
        )  {
            return data.DelEventCategoryByUuid(
                uuid
            );
        }                     
        public virtual bool DelEventCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {
            return data.DelEventCategoryByCodeByOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelEventCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelEventCategoryByCodeByOrgIdByTypeId(
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
        
        
        public virtual List<EventCategory> GetEventCategoryListByUuid(
            string uuid
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListByUuid(
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
        
        
        public virtual List<EventCategory> GetEventCategoryListByCode(
            string code
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListByCode(
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
        
        
        public virtual List<EventCategory> GetEventCategoryListByName(
            string name
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListByName(
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
        
        
        public virtual List<EventCategory> GetEventCategoryListByOrgId(
            string org_id
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListByOrgId(
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
        
        
        public virtual List<EventCategory> GetEventCategoryListByTypeId(
            string type_id
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListByTypeId(
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
        
        
        public virtual List<EventCategory> GetEventCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<EventCategory> list = new List<EventCategory>();
            DataSet ds = data.GetEventCategoryListByOrgIdByTypeId(
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
        public virtual int CountEventCategoryTreeByUuid(
            string uuid
        )  {            
            return data.CountEventCategoryTreeByUuid(
                uuid
            );
        }       
        public virtual int CountEventCategoryTreeByParentId(
            string parent_id
        )  {            
            return data.CountEventCategoryTreeByParentId(
                parent_id
            );
        }       
        public virtual int CountEventCategoryTreeByCategoryId(
            string category_id
        )  {            
            return data.CountEventCategoryTreeByCategoryId(
                category_id
            );
        }       
        public virtual int CountEventCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return data.CountEventCategoryTreeByParentIdByCategoryId(
                parent_id
                , category_id
            );
        }       
        public virtual EventCategoryTreeResult BrowseEventCategoryTreeListByFilter(SearchFilter obj)  {
            EventCategoryTreeResult result = new EventCategoryTreeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventCategoryTreeListByFilter(obj);
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
        public virtual bool SetEventCategoryTreeByUuid(string set_type, EventCategoryTree obj)  {            
            return data.SetEventCategoryTreeByUuid(set_type, obj);
        }    
        public virtual bool DelEventCategoryTreeByUuid(
            string uuid
        )  {
            return data.DelEventCategoryTreeByUuid(
                uuid
            );
        }                     
        public virtual bool DelEventCategoryTreeByParentId(
            string parent_id
        )  {
            return data.DelEventCategoryTreeByParentId(
                parent_id
            );
        }                     
        public virtual bool DelEventCategoryTreeByCategoryId(
            string category_id
        )  {
            return data.DelEventCategoryTreeByCategoryId(
                category_id
            );
        }                     
        public virtual bool DelEventCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            return data.DelEventCategoryTreeByParentIdByCategoryId(
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
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByUuid(
            string uuid
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListByUuid(
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
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByParentId(
            string parent_id
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListByParentId(
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
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByCategoryId(
            string category_id
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListByCategoryId(
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
        
        
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<EventCategoryTree> list = new List<EventCategoryTree>();
            DataSet ds = data.GetEventCategoryTreeListByParentIdByCategoryId(
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
        public virtual int CountEventCategoryAssocByUuid(
            string uuid
        )  {            
            return data.CountEventCategoryAssocByUuid(
                uuid
            );
        }       
        public virtual int CountEventCategoryAssocByEventId(
            string event_id
        )  {            
            return data.CountEventCategoryAssocByEventId(
                event_id
            );
        }       
        public virtual int CountEventCategoryAssocByCategoryId(
            string category_id
        )  {            
            return data.CountEventCategoryAssocByCategoryId(
                category_id
            );
        }       
        public virtual int CountEventCategoryAssocByEventIdByCategoryId(
            string event_id
            , string category_id
        )  {            
            return data.CountEventCategoryAssocByEventIdByCategoryId(
                event_id
                , category_id
            );
        }       
        public virtual EventCategoryAssocResult BrowseEventCategoryAssocListByFilter(SearchFilter obj)  {
            EventCategoryAssocResult result = new EventCategoryAssocResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseEventCategoryAssocListByFilter(obj);
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
        public virtual bool SetEventCategoryAssocByUuid(string set_type, EventCategoryAssoc obj)  {            
            return data.SetEventCategoryAssocByUuid(set_type, obj);
        }    
        public virtual bool DelEventCategoryAssocByUuid(
            string uuid
        )  {
            return data.DelEventCategoryAssocByUuid(
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
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByUuid(
            string uuid
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListByUuid(
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
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByEventId(
            string event_id
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListByEventId(
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
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByCategoryId(
            string category_id
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListByCategoryId(
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
        
        
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByEventIdByCategoryId(
            string event_id
            , string category_id
        )  {
            List<EventCategoryAssoc> list = new List<EventCategoryAssoc>();
            DataSet ds = data.GetEventCategoryAssocListByEventIdByCategoryId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountChannelByUuid(
            string uuid
        )  {            
            return data.CountChannelByUuid(
                uuid
            );
        }       
        public virtual int CountChannelByCode(
            string code
        )  {            
            return data.CountChannelByCode(
                code
            );
        }       
        public virtual int CountChannelByName(
            string name
        )  {            
            return data.CountChannelByName(
                name
            );
        }       
        public virtual int CountChannelByOrgId(
            string org_id
        )  {            
            return data.CountChannelByOrgId(
                org_id
            );
        }       
        public virtual int CountChannelByTypeId(
            string type_id
        )  {            
            return data.CountChannelByTypeId(
                type_id
            );
        }       
        public virtual int CountChannelByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountChannelByOrgIdByTypeId(
                org_id
                , type_id
            );
        }       
        public virtual ChannelResult BrowseChannelListByFilter(SearchFilter obj)  {
            ChannelResult result = new ChannelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseChannelListByFilter(obj);
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
        public virtual bool SetChannelByUuid(string set_type, Channel obj)  {            
            return data.SetChannelByUuid(set_type, obj);
        }    
        public virtual bool DelChannelByUuid(
            string uuid
        )  {
            return data.DelChannelByUuid(
                uuid
            );
        }                     
        public virtual bool DelChannelByCodeByOrgId(
            string code
            , string org_id
        )  {
            return data.DelChannelByCodeByOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelChannelByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelChannelByCodeByOrgIdByTypeId(
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
        
        
        public virtual List<Channel> GetChannelListByUuid(
            string uuid
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByUuid(
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
        
        
        public virtual List<Channel> GetChannelListByCode(
            string code
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByCode(
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
        
        
        public virtual List<Channel> GetChannelListByName(
            string name
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByName(
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
        
        
        public virtual List<Channel> GetChannelListByOrgId(
            string org_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByOrgId(
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
        
        
        public virtual List<Channel> GetChannelListByTypeId(
            string type_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByTypeId(
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
        
        
        public virtual List<Channel> GetChannelListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByOrgIdByTypeId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountChannelTypeByUuid(
            string uuid
        )  {            
            return data.CountChannelTypeByUuid(
                uuid
            );
        }       
        public virtual int CountChannelTypeByCode(
            string code
        )  {            
            return data.CountChannelTypeByCode(
                code
            );
        }       
        public virtual int CountChannelTypeByName(
            string name
        )  {            
            return data.CountChannelTypeByName(
                name
            );
        }       
        public virtual ChannelTypeResult BrowseChannelTypeListByFilter(SearchFilter obj)  {
            ChannelTypeResult result = new ChannelTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseChannelTypeListByFilter(obj);
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
        public virtual bool SetChannelTypeByUuid(string set_type, ChannelType obj)  {            
            return data.SetChannelTypeByUuid(set_type, obj);
        }    
        public virtual bool DelChannelTypeByUuid(
            string uuid
        )  {
            return data.DelChannelTypeByUuid(
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
        
        
        public virtual List<ChannelType> GetChannelTypeListByUuid(
            string uuid
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListByUuid(
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
        
        
        public virtual List<ChannelType> GetChannelTypeListByCode(
            string code
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListByCode(
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
        
        
        public virtual List<ChannelType> GetChannelTypeListByName(
            string name
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListByName(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountQuestionByUuid(
            string uuid
        )  {            
            return data.CountQuestionByUuid(
                uuid
            );
        }       
        public virtual int CountQuestionByCode(
            string code
        )  {            
            return data.CountQuestionByCode(
                code
            );
        }       
        public virtual int CountQuestionByName(
            string name
        )  {            
            return data.CountQuestionByName(
                name
            );
        }       
        public virtual int CountQuestionByChannelId(
            string channel_id
        )  {            
            return data.CountQuestionByChannelId(
                channel_id
            );
        }       
        public virtual int CountQuestionByOrgId(
            string org_id
        )  {            
            return data.CountQuestionByOrgId(
                org_id
            );
        }       
        public virtual int CountQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return data.CountQuestionByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }       
        public virtual int CountQuestionByChannelIdByCode(
            string channel_id
            , string code
        )  {            
            return data.CountQuestionByChannelIdByCode(
                channel_id
                , code
            );
        }       
        public virtual QuestionResult BrowseQuestionListByFilter(SearchFilter obj)  {
            QuestionResult result = new QuestionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseQuestionListByFilter(obj);
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
        public virtual bool SetQuestionByUuid(string set_type, Question obj)  {            
            return data.SetQuestionByUuid(set_type, obj);
        }    
        public virtual bool SetQuestionByChannelIdByCode(string set_type, Question obj)  {            
            return data.SetQuestionByChannelIdByCode(set_type, obj);
        }    
        public virtual bool DelQuestionByUuid(
            string uuid
        )  {
            return data.DelQuestionByUuid(
                uuid
            );
        }                     
        public virtual bool DelQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return data.DelQuestionByChannelIdByOrgId(
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
        
        
        public virtual List<Question> GetQuestionListByUuid(
            string uuid
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByUuid(
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
        
        
        public virtual List<Question> GetQuestionListByCode(
            string code
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByCode(
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
        
        
        public virtual List<Question> GetQuestionListByName(
            string name
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByName(
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
        
        
        public virtual List<Question> GetQuestionListByType(
            string type
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByType(
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
        
        
        public virtual List<Question> GetQuestionListByChannelId(
            string channel_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByChannelId(
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
        
        
        public virtual List<Question> GetQuestionListByOrgId(
            string org_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByOrgId(
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
        
        
        public virtual List<Question> GetQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByChannelIdByOrgId(
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
        
        
        public virtual List<Question> GetQuestionListByChannelIdByCode(
            string channel_id
            , string code
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByChannelIdByCode(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountProfileOfferByUuid(
            string uuid
        )  {            
            return data.CountProfileOfferByUuid(
                uuid
            );
        }       
        public virtual int CountProfileOfferByProfileId(
            string profile_id
        )  {            
            return data.CountProfileOfferByProfileId(
                profile_id
            );
        }       
        public virtual ProfileOfferResult BrowseProfileOfferListByFilter(SearchFilter obj)  {
            ProfileOfferResult result = new ProfileOfferResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileOfferListByFilter(obj);
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
        public virtual bool SetProfileOfferByUuid(string set_type, ProfileOffer obj)  {            
            return data.SetProfileOfferByUuid(set_type, obj);
        }    
        public virtual bool DelProfileOfferByUuid(
            string uuid
        )  {
            return data.DelProfileOfferByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileOfferByProfileId(
            string profile_id
        )  {
            return data.DelProfileOfferByProfileId(
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
        
        
        public virtual List<ProfileOffer> GetProfileOfferListByUuid(
            string uuid
        )  {
            List<ProfileOffer> list = new List<ProfileOffer>();
            DataSet ds = data.GetProfileOfferListByUuid(
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
        
        
        public virtual List<ProfileOffer> GetProfileOfferListByProfileId(
            string profile_id
        )  {
            List<ProfileOffer> list = new List<ProfileOffer>();
            DataSet ds = data.GetProfileOfferListByProfileId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                

            return obj;
        }
        
        public virtual int CountProfileApp(
        )  {            
            return data.CountProfileApp(
            );
        }       
        public virtual int CountProfileAppByUuid(
            string uuid
        )  {            
            return data.CountProfileAppByUuid(
                uuid
            );
        }       
        public virtual int CountProfileAppByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {            
            return data.CountProfileAppByProfileIdByAppId(
                profile_id
                , app_id
            );
        }       
        public virtual ProfileAppResult BrowseProfileAppListByFilter(SearchFilter obj)  {
            ProfileAppResult result = new ProfileAppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAppListByFilter(obj);
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
        public virtual bool SetProfileAppByUuid(string set_type, ProfileApp obj)  {            
            return data.SetProfileAppByUuid(set_type, obj);
        }    
        public virtual bool SetProfileAppByProfileIdByAppId(string set_type, ProfileApp obj)  {            
            return data.SetProfileAppByProfileIdByAppId(set_type, obj);
        }    
        public virtual bool DelProfileAppByUuid(
            string uuid
        )  {
            return data.DelProfileAppByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAppByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {
            return data.DelProfileAppByProfileIdByAppId(
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
        
        
        public virtual List<ProfileApp> GetProfileAppListByUuid(
            string uuid
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListByUuid(
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
        
        
        public virtual List<ProfileApp> GetProfileAppListByAppId(
            string app_id
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListByAppId(
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
        
        
        public virtual List<ProfileApp> GetProfileAppListByProfileId(
            string profile_id
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListByProfileId(
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
        
        
        public virtual List<ProfileApp> GetProfileAppListByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {
            List<ProfileApp> list = new List<ProfileApp>();
            DataSet ds = data.GetProfileAppListByProfileIdByAppId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                

            return obj;
        }
        
        public virtual int CountProfileOrg(
        )  {            
            return data.CountProfileOrg(
            );
        }       
        public virtual int CountProfileOrgByUuid(
            string uuid
        )  {            
            return data.CountProfileOrgByUuid(
                uuid
            );
        }       
        public virtual int CountProfileOrgByOrgId(
            string org_id
        )  {            
            return data.CountProfileOrgByOrgId(
                org_id
            );
        }       
        public virtual int CountProfileOrgByProfileId(
            string profile_id
        )  {            
            return data.CountProfileOrgByProfileId(
                profile_id
            );
        }       
        public virtual ProfileOrgResult BrowseProfileOrgListByFilter(SearchFilter obj)  {
            ProfileOrgResult result = new ProfileOrgResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileOrgListByFilter(obj);
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
        public virtual bool SetProfileOrgByUuid(string set_type, ProfileOrg obj)  {            
            return data.SetProfileOrgByUuid(set_type, obj);
        }    
        public virtual bool DelProfileOrgByUuid(
            string uuid
        )  {
            return data.DelProfileOrgByUuid(
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
        
        
        public virtual List<ProfileOrg> GetProfileOrgListByUuid(
            string uuid
        )  {
            List<ProfileOrg> list = new List<ProfileOrg>();
            DataSet ds = data.GetProfileOrgListByUuid(
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
        
        
        public virtual List<ProfileOrg> GetProfileOrgListByOrgId(
            string org_id
        )  {
            List<ProfileOrg> list = new List<ProfileOrg>();
            DataSet ds = data.GetProfileOrgListByOrgId(
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
        
        
        public virtual List<ProfileOrg> GetProfileOrgListByProfileId(
            string profile_id
        )  {
            List<ProfileOrg> list = new List<ProfileOrg>();
            DataSet ds = data.GetProfileOrgListByProfileId(
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
        public virtual int CountProfileQuestionByUuid(
            string uuid
        )  {            
            return data.CountProfileQuestionByUuid(
                uuid
            );
        }       
        public virtual int CountProfileQuestionByChannelId(
            string channel_id
        )  {            
            return data.CountProfileQuestionByChannelId(
                channel_id
            );
        }       
        public virtual int CountProfileQuestionByOrgId(
            string org_id
        )  {            
            return data.CountProfileQuestionByOrgId(
                org_id
            );
        }       
        public virtual int CountProfileQuestionByProfileId(
            string profile_id
        )  {            
            return data.CountProfileQuestionByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileQuestionByQuestionId(
            string question_id
        )  {            
            return data.CountProfileQuestionByQuestionId(
                question_id
            );
        }       
        public virtual int CountProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return data.CountProfileQuestionByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }       
        public virtual int CountProfileQuestionByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return data.CountProfileQuestionByChannelIdByProfileId(
                channel_id
                , profile_id
            );
        }       
        public virtual int CountProfileQuestionByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {            
            return data.CountProfileQuestionByQuestionIdByProfileId(
                question_id
                , profile_id
            );
        }       
        public virtual ProfileQuestionResult BrowseProfileQuestionListByFilter(SearchFilter obj)  {
            ProfileQuestionResult result = new ProfileQuestionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileQuestionListByFilter(obj);
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
        public virtual bool SetProfileQuestionByUuid(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByUuid(set_type, obj);
        }    
        public virtual bool SetProfileQuestionByChannelIdByProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByChannelIdByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileQuestionByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByQuestionIdByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileQuestionByChannelIdByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByChannelIdByQuestionIdByProfileId(set_type, obj);
        }    
        public virtual bool DelProfileQuestionByUuid(
            string uuid
        )  {
            return data.DelProfileQuestionByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return data.DelProfileQuestionByChannelIdByOrgId(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByUuid(
            string uuid
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByUuid(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelId(
            string channel_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByChannelId(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByOrgId(
            string org_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByOrgId(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByProfileId(
            string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByProfileId(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByQuestionId(
            string question_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByQuestionId(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByChannelIdByOrgId(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByChannelIdByProfileId(
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
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByQuestionIdByProfileId(
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
        public virtual int CountProfileChannelByUuid(
            string uuid
        )  {            
            return data.CountProfileChannelByUuid(
                uuid
            );
        }       
        public virtual int CountProfileChannelByChannelId(
            string channel_id
        )  {            
            return data.CountProfileChannelByChannelId(
                channel_id
            );
        }       
        public virtual int CountProfileChannelByProfileId(
            string profile_id
        )  {            
            return data.CountProfileChannelByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return data.CountProfileChannelByChannelIdByProfileId(
                channel_id
                , profile_id
            );
        }       
        public virtual ProfileChannelResult BrowseProfileChannelListByFilter(SearchFilter obj)  {
            ProfileChannelResult result = new ProfileChannelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileChannelListByFilter(obj);
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
        public virtual bool SetProfileChannelByUuid(string set_type, ProfileChannel obj)  {            
            return data.SetProfileChannelByUuid(set_type, obj);
        }    
        public virtual bool SetProfileChannelByChannelIdByProfileId(string set_type, ProfileChannel obj)  {            
            return data.SetProfileChannelByChannelIdByProfileId(set_type, obj);
        }    
        public virtual bool DelProfileChannelByUuid(
            string uuid
        )  {
            return data.DelProfileChannelByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            return data.DelProfileChannelByChannelIdByProfileId(
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
        
        
        public virtual List<ProfileChannel> GetProfileChannelListByUuid(
            string uuid
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByUuid(
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
        
        
        public virtual List<ProfileChannel> GetProfileChannelListByChannelId(
            string channel_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByChannelId(
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
        
        
        public virtual List<ProfileChannel> GetProfileChannelListByProfileId(
            string profile_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByProfileId(
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
        
        
        public virtual List<ProfileChannel> GetProfileChannelListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByChannelIdByProfileId(
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
        public virtual int CountOrgSiteByUuid(
            string uuid
        )  {            
            return data.CountOrgSiteByUuid(
                uuid
            );
        }       
        public virtual int CountOrgSiteByOrgId(
            string org_id
        )  {            
            return data.CountOrgSiteByOrgId(
                org_id
            );
        }       
        public virtual int CountOrgSiteBySiteId(
            string site_id
        )  {            
            return data.CountOrgSiteBySiteId(
                site_id
            );
        }       
        public virtual int CountOrgSiteByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {            
            return data.CountOrgSiteByOrgIdBySiteId(
                org_id
                , site_id
            );
        }       
        public virtual OrgSiteResult BrowseOrgSiteListByFilter(SearchFilter obj)  {
            OrgSiteResult result = new OrgSiteResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOrgSiteListByFilter(obj);
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
        public virtual bool SetOrgSiteByUuid(string set_type, OrgSite obj)  {            
            return data.SetOrgSiteByUuid(set_type, obj);
        }    
        public virtual bool SetOrgSiteByOrgIdBySiteId(string set_type, OrgSite obj)  {            
            return data.SetOrgSiteByOrgIdBySiteId(set_type, obj);
        }    
        public virtual bool DelOrgSiteByUuid(
            string uuid
        )  {
            return data.DelOrgSiteByUuid(
                uuid
            );
        }                     
        public virtual bool DelOrgSiteByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {
            return data.DelOrgSiteByOrgIdBySiteId(
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
        
        
        public virtual List<OrgSite> GetOrgSiteListByUuid(
            string uuid
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListByUuid(
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
        
        
        public virtual List<OrgSite> GetOrgSiteListByOrgId(
            string org_id
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListByOrgId(
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
        
        
        public virtual List<OrgSite> GetOrgSiteListBySiteId(
            string site_id
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListBySiteId(
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
        
        
        public virtual List<OrgSite> GetOrgSiteListByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {
            List<OrgSite> list = new List<OrgSite>();
            DataSet ds = data.GetOrgSiteListByOrgIdBySiteId(
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
        public virtual int CountSiteAppByUuid(
            string uuid
        )  {            
            return data.CountSiteAppByUuid(
                uuid
            );
        }       
        public virtual int CountSiteAppByAppId(
            string app_id
        )  {            
            return data.CountSiteAppByAppId(
                app_id
            );
        }       
        public virtual int CountSiteAppBySiteId(
            string site_id
        )  {            
            return data.CountSiteAppBySiteId(
                site_id
            );
        }       
        public virtual int CountSiteAppByAppIdBySiteId(
            string app_id
            , string site_id
        )  {            
            return data.CountSiteAppByAppIdBySiteId(
                app_id
                , site_id
            );
        }       
        public virtual SiteAppResult BrowseSiteAppListByFilter(SearchFilter obj)  {
            SiteAppResult result = new SiteAppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseSiteAppListByFilter(obj);
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
        public virtual bool SetSiteAppByUuid(string set_type, SiteApp obj)  {            
            return data.SetSiteAppByUuid(set_type, obj);
        }    
        public virtual bool SetSiteAppByAppIdBySiteId(string set_type, SiteApp obj)  {            
            return data.SetSiteAppByAppIdBySiteId(set_type, obj);
        }    
        public virtual bool DelSiteAppByUuid(
            string uuid
        )  {
            return data.DelSiteAppByUuid(
                uuid
            );
        }                     
        public virtual bool DelSiteAppByAppIdBySiteId(
            string app_id
            , string site_id
        )  {
            return data.DelSiteAppByAppIdBySiteId(
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
        
        
        public virtual List<SiteApp> GetSiteAppListByUuid(
            string uuid
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListByUuid(
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
        
        
        public virtual List<SiteApp> GetSiteAppListByAppId(
            string app_id
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListByAppId(
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
        
        
        public virtual List<SiteApp> GetSiteAppListBySiteId(
            string site_id
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListBySiteId(
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
        
        
        public virtual List<SiteApp> GetSiteAppListByAppIdBySiteId(
            string app_id
            , string site_id
        )  {
            List<SiteApp> list = new List<SiteApp>();
            DataSet ds = data.GetSiteAppListByAppIdBySiteId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountPhotoByUuid(
            string uuid
        )  {            
            return data.CountPhotoByUuid(
                uuid
            );
        }       
        public virtual int CountPhotoByExternalId(
            string external_id
        )  {            
            return data.CountPhotoByExternalId(
                external_id
            );
        }       
        public virtual int CountPhotoByUrl(
            string url
        )  {            
            return data.CountPhotoByUrl(
                url
            );
        }       
        public virtual int CountPhotoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return data.CountPhotoByUrlByExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountPhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountPhotoByUuidByExternalId(
                uuid
                , external_id
            );
        }       
        public virtual PhotoResult BrowsePhotoListByFilter(SearchFilter obj)  {
            PhotoResult result = new PhotoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowsePhotoListByFilter(obj);
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
        public virtual bool SetPhotoByUuid(string set_type, Photo obj)  {            
            return data.SetPhotoByUuid(set_type, obj);
        }    
        public virtual bool SetPhotoByExternalId(string set_type, Photo obj)  {            
            return data.SetPhotoByExternalId(set_type, obj);
        }    
        public virtual bool SetPhotoByUrl(string set_type, Photo obj)  {            
            return data.SetPhotoByUrl(set_type, obj);
        }    
        public virtual bool SetPhotoByUrlByExternalId(string set_type, Photo obj)  {            
            return data.SetPhotoByUrlByExternalId(set_type, obj);
        }    
        public virtual bool SetPhotoByUuidByExternalId(string set_type, Photo obj)  {            
            return data.SetPhotoByUuidByExternalId(set_type, obj);
        }    
        public virtual bool DelPhotoByUuid(
            string uuid
        )  {
            return data.DelPhotoByUuid(
                uuid
            );
        }                     
        public virtual bool DelPhotoByExternalId(
            string external_id
        )  {
            return data.DelPhotoByExternalId(
                external_id
            );
        }                     
        public virtual bool DelPhotoByUrl(
            string url
        )  {
            return data.DelPhotoByUrl(
                url
            );
        }                     
        public virtual bool DelPhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            return data.DelPhotoByUrlByExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelPhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelPhotoByUuidByExternalId(
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
        
        
        public virtual List<Photo> GetPhotoListByUuid(
            string uuid
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListByUuid(
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
        
        
        public virtual List<Photo> GetPhotoListByExternalId(
            string external_id
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListByExternalId(
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
        
        
        public virtual List<Photo> GetPhotoListByUrl(
            string url
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListByUrl(
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
        
        
        public virtual List<Photo> GetPhotoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListByUrlByExternalId(
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
        
        
        public virtual List<Photo> GetPhotoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<Photo> list = new List<Photo>();
            DataSet ds = data.GetPhotoListByUuidByExternalId(
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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
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
        public virtual int CountVideoByUuid(
            string uuid
        )  {            
            return data.CountVideoByUuid(
                uuid
            );
        }       
        public virtual int CountVideoByExternalId(
            string external_id
        )  {            
            return data.CountVideoByExternalId(
                external_id
            );
        }       
        public virtual int CountVideoByUrl(
            string url
        )  {            
            return data.CountVideoByUrl(
                url
            );
        }       
        public virtual int CountVideoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return data.CountVideoByUrlByExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountVideoByUuidByExternalId(
                uuid
                , external_id
            );
        }       
        public virtual VideoResult BrowseVideoListByFilter(SearchFilter obj)  {
            VideoResult result = new VideoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseVideoListByFilter(obj);
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
        public virtual bool SetVideoByUuid(string set_type, Video obj)  {            
            return data.SetVideoByUuid(set_type, obj);
        }    
        public virtual bool SetVideoByExternalId(string set_type, Video obj)  {            
            return data.SetVideoByExternalId(set_type, obj);
        }    
        public virtual bool SetVideoByUrl(string set_type, Video obj)  {            
            return data.SetVideoByUrl(set_type, obj);
        }    
        public virtual bool SetVideoByUrlByExternalId(string set_type, Video obj)  {            
            return data.SetVideoByUrlByExternalId(set_type, obj);
        }    
        public virtual bool SetVideoByUuidByExternalId(string set_type, Video obj)  {            
            return data.SetVideoByUuidByExternalId(set_type, obj);
        }    
        public virtual bool DelVideoByUuid(
            string uuid
        )  {
            return data.DelVideoByUuid(
                uuid
            );
        }                     
        public virtual bool DelVideoByExternalId(
            string external_id
        )  {
            return data.DelVideoByExternalId(
                external_id
            );
        }                     
        public virtual bool DelVideoByUrl(
            string url
        )  {
            return data.DelVideoByUrl(
                url
            );
        }                     
        public virtual bool DelVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            return data.DelVideoByUrlByExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelVideoByUuidByExternalId(
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
        
        
        public virtual List<Video> GetVideoListByUuid(
            string uuid
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListByUuid(
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
        
        
        public virtual List<Video> GetVideoListByExternalId(
            string external_id
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListByExternalId(
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
        
        
        public virtual List<Video> GetVideoListByUrl(
            string url
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListByUrl(
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
        
        
        public virtual List<Video> GetVideoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListByUrlByExternalId(
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
        
        
        public virtual List<Video> GetVideoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<Video> list = new List<Video>();
            DataSet ds = data.GetVideoListByUuidByExternalId(
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






