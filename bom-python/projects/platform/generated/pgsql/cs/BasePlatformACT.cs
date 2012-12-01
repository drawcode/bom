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
        
        
        
        public virtual Game FillGame(DataRow dr) {
            Game obj = new Game();

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
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                
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
        
        public virtual int CountGame(
        )  {            
            return data.CountGame(
            );
        }       
        public virtual int CountGameByUuid(
            string uuid
        )  {            
            return data.CountGameByUuid(
                uuid
            );
        }       
        public virtual int CountGameByCode(
            string code
        )  {            
            return data.CountGameByCode(
                code
            );
        }       
        public virtual int CountGameByName(
            string name
        )  {            
            return data.CountGameByName(
                name
            );
        }       
        public virtual int CountGameByOrgId(
            string org_id
        )  {            
            return data.CountGameByOrgId(
                org_id
            );
        }       
        public virtual int CountGameByAppId(
            string app_id
        )  {            
            return data.CountGameByAppId(
                app_id
            );
        }       
        public virtual int CountGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {            
            return data.CountGameByOrgIdByAppId(
                org_id
                , app_id
            );
        }       
        public virtual GameResult BrowseGameListByFilter(SearchFilter obj)  {
            GameResult result = new GameResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        result.data.Add(game);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameByUuid(string set_type, Game obj)  {            
            return data.SetGameByUuid(set_type, obj);
        }    
        public virtual bool SetGameByCode(string set_type, Game obj)  {            
            return data.SetGameByCode(set_type, obj);
        }    
        public virtual bool SetGameByName(string set_type, Game obj)  {            
            return data.SetGameByName(set_type, obj);
        }    
        public virtual bool SetGameByOrgId(string set_type, Game obj)  {            
            return data.SetGameByOrgId(set_type, obj);
        }    
        public virtual bool SetGameByAppId(string set_type, Game obj)  {            
            return data.SetGameByAppId(set_type, obj);
        }    
        public virtual bool SetGameByOrgIdByAppId(string set_type, Game obj)  {            
            return data.SetGameByOrgIdByAppId(set_type, obj);
        }    
        public virtual bool DelGameByUuid(
            string uuid
        )  {
            return data.DelGameByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameByCode(
            string code
        )  {
            return data.DelGameByCode(
                code
            );
        }                     
        public virtual bool DelGameByName(
            string name
        )  {
            return data.DelGameByName(
                name
            );
        }                     
        public virtual bool DelGameByOrgId(
            string org_id
        )  {
            return data.DelGameByOrgId(
                org_id
            );
        }                     
        public virtual bool DelGameByAppId(
            string app_id
        )  {
            return data.DelGameByAppId(
                app_id
            );
        }                     
        public virtual bool DelGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            return data.DelGameByOrgIdByAppId(
                org_id
                , app_id
            );
        }                     
        public virtual List<Game> GetGameList(
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByUuid(
            string uuid
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByCode(
            string code
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByName(
            string name
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByOrgId(
            string org_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByAppId(
            string app_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByAppId(
                app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByOrgIdByAppId(
                org_id
                , app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameCategory FillGameCategory(DataRow dr) {
            GameCategory obj = new GameCategory();

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
        
        public virtual int CountGameCategory(
        )  {            
            return data.CountGameCategory(
            );
        }       
        public virtual int CountGameCategoryByUuid(
            string uuid
        )  {            
            return data.CountGameCategoryByUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryByCode(
            string code
        )  {            
            return data.CountGameCategoryByCode(
                code
            );
        }       
        public virtual int CountGameCategoryByName(
            string name
        )  {            
            return data.CountGameCategoryByName(
                name
            );
        }       
        public virtual int CountGameCategoryByOrgId(
            string org_id
        )  {            
            return data.CountGameCategoryByOrgId(
                org_id
            );
        }       
        public virtual int CountGameCategoryByTypeId(
            string type_id
        )  {            
            return data.CountGameCategoryByTypeId(
                type_id
            );
        }       
        public virtual int CountGameCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountGameCategoryByOrgIdByTypeId(
                org_id
                , type_id
            );
        }       
        public virtual GameCategoryResult BrowseGameCategoryListByFilter(SearchFilter obj)  {
            GameCategoryResult result = new GameCategoryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        result.data.Add(game_category);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameCategoryByUuid(string set_type, GameCategory obj)  {            
            return data.SetGameCategoryByUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryByUuid(
            string uuid
        )  {
            return data.DelGameCategoryByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {
            return data.DelGameCategoryByCodeByOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelGameCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelGameCategoryByCodeByOrgIdByTypeId(
                code
                , org_id
                , type_id
            );
        }                     
        public virtual List<GameCategory> GetGameCategoryList(
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByUuid(
            string uuid
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByCode(
            string code
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByName(
            string name
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByOrgId(
            string org_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByTypeId(
            string type_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameCategoryTree FillGameCategoryTree(DataRow dr) {
            GameCategoryTree obj = new GameCategoryTree();

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
        
        public virtual int CountGameCategoryTree(
        )  {            
            return data.CountGameCategoryTree(
            );
        }       
        public virtual int CountGameCategoryTreeByUuid(
            string uuid
        )  {            
            return data.CountGameCategoryTreeByUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryTreeByParentId(
            string parent_id
        )  {            
            return data.CountGameCategoryTreeByParentId(
                parent_id
            );
        }       
        public virtual int CountGameCategoryTreeByCategoryId(
            string category_id
        )  {            
            return data.CountGameCategoryTreeByCategoryId(
                category_id
            );
        }       
        public virtual int CountGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return data.CountGameCategoryTreeByParentIdByCategoryId(
                parent_id
                , category_id
            );
        }       
        public virtual GameCategoryTreeResult BrowseGameCategoryTreeListByFilter(SearchFilter obj)  {
            GameCategoryTreeResult result = new GameCategoryTreeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryTreeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        result.data.Add(game_category_tree);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameCategoryTreeByUuid(string set_type, GameCategoryTree obj)  {            
            return data.SetGameCategoryTreeByUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryTreeByUuid(
            string uuid
        )  {
            return data.DelGameCategoryTreeByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameCategoryTreeByParentId(
            string parent_id
        )  {
            return data.DelGameCategoryTreeByParentId(
                parent_id
            );
        }                     
        public virtual bool DelGameCategoryTreeByCategoryId(
            string category_id
        )  {
            return data.DelGameCategoryTreeByCategoryId(
                category_id
            );
        }                     
        public virtual bool DelGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            return data.DelGameCategoryTreeByParentIdByCategoryId(
                parent_id
                , category_id
            );
        }                     
        public virtual List<GameCategoryTree> GetGameCategoryTreeList(
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByUuid(
            string uuid
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByParentId(
            string parent_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByParentId(
                parent_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByCategoryId(
            string category_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameCategoryAssoc FillGameCategoryAssoc(DataRow dr) {
            GameCategoryAssoc obj = new GameCategoryAssoc();

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
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["category_id"] != null)                    
                    obj.category_id = dataType.FillDataString(dr, "category_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameCategoryAssoc(
        )  {            
            return data.CountGameCategoryAssoc(
            );
        }       
        public virtual int CountGameCategoryAssocByUuid(
            string uuid
        )  {            
            return data.CountGameCategoryAssocByUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryAssocByGameId(
            string game_id
        )  {            
            return data.CountGameCategoryAssocByGameId(
                game_id
            );
        }       
        public virtual int CountGameCategoryAssocByCategoryId(
            string category_id
        )  {            
            return data.CountGameCategoryAssocByCategoryId(
                category_id
            );
        }       
        public virtual int CountGameCategoryAssocByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {            
            return data.CountGameCategoryAssocByGameIdByCategoryId(
                game_id
                , category_id
            );
        }       
        public virtual GameCategoryAssocResult BrowseGameCategoryAssocListByFilter(SearchFilter obj)  {
            GameCategoryAssocResult result = new GameCategoryAssocResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryAssocListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        result.data.Add(game_category_assoc);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameCategoryAssocByUuid(string set_type, GameCategoryAssoc obj)  {            
            return data.SetGameCategoryAssocByUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryAssocByUuid(
            string uuid
        )  {
            return data.DelGameCategoryAssocByUuid(
                uuid
            );
        }                     
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocList(
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByUuid(
            string uuid
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByGameId(
            string game_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByCategoryId(
            string category_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByGameIdByCategoryId(
                game_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameType FillGameType(DataRow dr) {
            GameType obj = new GameType();

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
        
        public virtual int CountGameType(
        )  {            
            return data.CountGameType(
            );
        }       
        public virtual int CountGameTypeByUuid(
            string uuid
        )  {            
            return data.CountGameTypeByUuid(
                uuid
            );
        }       
        public virtual int CountGameTypeByCode(
            string code
        )  {            
            return data.CountGameTypeByCode(
                code
            );
        }       
        public virtual int CountGameTypeByName(
            string name
        )  {            
            return data.CountGameTypeByName(
                name
            );
        }       
        public virtual GameTypeResult BrowseGameTypeListByFilter(SearchFilter obj)  {
            GameTypeResult result = new GameTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameTypeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        result.data.Add(game_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameTypeByUuid(string set_type, GameType obj)  {            
            return data.SetGameTypeByUuid(set_type, obj);
        }    
        public virtual bool DelGameTypeByUuid(
            string uuid
        )  {
            return data.DelGameTypeByUuid(
                uuid
            );
        }                     
        public virtual List<GameType> GetGameTypeList(
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameType> GetGameTypeListByUuid(
            string uuid
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameType> GetGameTypeListByCode(
            string code
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameType> GetGameTypeListByName(
            string name
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileGame FillProfileGame(DataRow dr) {
            ProfileGame obj = new ProfileGame();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["game_profile"] != null)                    
                    obj.game_profile = dataType.FillDataString(dr, "game_profile");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["profile_version"] != null)                    
                    obj.profile_version = dataType.FillDataString(dr, "profile_version");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileGame(
        )  {            
            return data.CountProfileGame(
            );
        }       
        public virtual int CountProfileGameByUuid(
            string uuid
        )  {            
            return data.CountProfileGameByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameByGameId(
            string game_id
        )  {            
            return data.CountProfileGameByGameId(
                game_id
            );
        }       
        public virtual int CountProfileGameByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual ProfileGameResult BrowseProfileGameListByFilter(SearchFilter obj)  {
            ProfileGameResult result = new ProfileGameResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        result.data.Add(profile_game);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameByUuid(string set_type, ProfileGame obj)  {            
            return data.SetProfileGameByUuid(set_type, obj);
        }    
        public virtual bool DelProfileGameByUuid(
            string uuid
        )  {
            return data.DelProfileGameByUuid(
                uuid
            );
        }                     
        public virtual List<ProfileGame> GetProfileGameList(
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByUuid(
            string uuid
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByGameId(
            string game_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByProfileId(
            string profile_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileGameNetwork FillProfileGameNetwork(DataRow dr) {
            ProfileGameNetwork obj = new ProfileGameNetwork();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["game_network_id"] != null)                    
                    obj.game_network_id = dataType.FillDataString(dr, "game_network_id");                
            if (dr["network_username"] != null)                    
                    obj.network_username = dataType.FillDataString(dr, "network_username");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["secret"] != null)                    
                    obj.secret = dataType.FillDataString(dr, "secret");                
            if (dr["token"] != null)                    
                    obj.token = dataType.FillDataString(dr, "token");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileGameNetwork(
        )  {            
            return data.CountProfileGameNetwork(
            );
        }       
        public virtual int CountProfileGameNetworkByUuid(
            string uuid
        )  {            
            return data.CountProfileGameNetworkByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameNetworkByGameId(
            string game_id
        )  {            
            return data.CountProfileGameNetworkByGameId(
                game_id
            );
        }       
        public virtual int CountProfileGameNetworkByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameNetworkByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameNetworkByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual ProfileGameNetworkResult BrowseProfileGameNetworkListByFilter(SearchFilter obj)  {
            ProfileGameNetworkResult result = new ProfileGameNetworkResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameNetworkListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        result.data.Add(profile_game_network);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameNetworkByUuid(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkByUuid(set_type, obj);
        }    
        public virtual bool DelProfileGameNetworkByUuid(
            string uuid
        )  {
            return data.DelProfileGameNetworkByUuid(
                uuid
            );
        }                     
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkList(
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByUuid(
            string uuid
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByGameId(
            string game_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileId(
            string profile_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileGameDataAttribute FillProfileGameDataAttribute(DataRow dr) {
            ProfileGameDataAttribute obj = new ProfileGameDataAttribute();

            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["val"] != null)                    
                    obj.val = dataType.FillDataString(dr, "val");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["otype"] != null)                    
                    obj.otype = dataType.FillDataString(dr, "otype");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                

            return obj;
        }
        
        public virtual int CountProfileGameDataAttribute(
        )  {            
            return data.CountProfileGameDataAttribute(
            );
        }       
        public virtual int CountProfileGameDataAttributeByUuid(
            string uuid
        )  {            
            return data.CountProfileGameDataAttributeByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameDataAttributeByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameDataAttributeByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {            
            return data.CountProfileGameDataAttributeByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            );
        }       
        public virtual ProfileGameDataAttributeResult BrowseProfileGameDataAttributeListByFilter(SearchFilter obj)  {
            ProfileGameDataAttributeResult result = new ProfileGameDataAttributeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameDataAttributeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        result.data.Add(profile_game_data_attribute);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameDataAttributeByUuid(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeByUuid(set_type, obj);
        }    
        public virtual bool SetProfileGameDataAttributeByProfileId(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileGameDataAttributeByProfileIdByGameIdByCode(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeByProfileIdByGameIdByCode(set_type, obj);
        }    
        public virtual bool DelProfileGameDataAttributeByUuid(
            string uuid
        )  {
            return data.DelProfileGameDataAttributeByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileGameDataAttributeByProfileId(
            string profile_id
        )  {
            return data.DelProfileGameDataAttributeByProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            return data.DelProfileGameDataAttributeByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            );
        }                     
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByUuid(
            string uuid
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        list.Add(profile_game_data_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByProfileId(
            string profile_id
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        list.Add(profile_game_data_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        list.Add(profile_game_data_attribute);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameSession FillGameSession(DataRow dr) {
            GameSession obj = new GameSession();

            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["network_uuid"] != null)                    
                    obj.network_uuid = dataType.FillDataString(dr, "network_uuid");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["game_area"] != null)                    
                    obj.game_area = dataType.FillDataString(dr, "game_area");                
            if (dr["profile_network"] != null)                    
                    obj.profile_network = dataType.FillDataString(dr, "profile_network");                
            if (dr["profile_device"] != null)                    
                    obj.profile_device = dataType.FillDataString(dr, "profile_device");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["network_external_port"] != null)                    
                    obj.network_external_port = dataType.FillDataInt(dr, "network_external_port");                
            if (dr["game_players_connected"] != null)                    
                    obj.game_players_connected = dataType.FillDataInt(dr, "game_players_connected");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["game_state"] != null)                    
                    obj.game_state = dataType.FillDataString(dr, "game_state");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["network_external_ip"] != null)                    
                    obj.network_external_ip = dataType.FillDataString(dr, "network_external_ip");                
            if (dr["game_level"] != null)                    
                    obj.game_level = dataType.FillDataString(dr, "game_level");                
            if (dr["profile_username"] != null)                    
                    obj.profile_username = dataType.FillDataString(dr, "profile_username");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["game_code"] != null)                    
                    obj.game_code = dataType.FillDataString(dr, "game_code");                
            if (dr["game_player_z"] != null)                    
                    obj.game_player_z = dataType.FillDataFloat(dr, "game_player_z");                
            if (dr["game_player_x"] != null)                    
                    obj.game_player_x = dataType.FillDataFloat(dr, "game_player_x");                
            if (dr["network_port"] != null)                    
                    obj.network_port = dataType.FillDataInt(dr, "network_port");                
            if (dr["game_players_allowed"] != null)                    
                    obj.game_players_allowed = dataType.FillDataInt(dr, "game_players_allowed");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["game_type"] != null)                    
                    obj.game_type = dataType.FillDataString(dr, "game_type");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["network_ip"] != null)                    
                    obj.network_ip = dataType.FillDataString(dr, "network_ip");                
            if (dr["network_use_nat"] != null)                    
                    obj.network_use_nat = dataType.FillDataBool(dr, "network_use_nat");                

            return obj;
        }
        
        public virtual int CountGameSession(
        )  {            
            return data.CountGameSession(
            );
        }       
        public virtual int CountGameSessionByUuid(
            string uuid
        )  {            
            return data.CountGameSessionByUuid(
                uuid
            );
        }       
        public virtual int CountGameSessionByGameId(
            string game_id
        )  {            
            return data.CountGameSessionByGameId(
                game_id
            );
        }       
        public virtual int CountGameSessionByProfileId(
            string profile_id
        )  {            
            return data.CountGameSessionByProfileId(
                profile_id
            );
        }       
        public virtual int CountGameSessionByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameSessionByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameSessionResult BrowseGameSessionListByFilter(SearchFilter obj)  {
            GameSessionResult result = new GameSessionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameSessionListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        result.data.Add(game_session);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameSessionByUuid(string set_type, GameSession obj)  {            
            return data.SetGameSessionByUuid(set_type, obj);
        }    
        public virtual bool DelGameSessionByUuid(
            string uuid
        )  {
            return data.DelGameSessionByUuid(
                uuid
            );
        }                     
        public virtual List<GameSession> GetGameSessionList(
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByUuid(
            string uuid
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByGameId(
            string game_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByProfileId(
            string profile_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameSessionData FillGameSessionData(DataRow dr) {
            GameSessionData obj = new GameSessionData();

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
            if (dr["data_results"] != null)                    
                    obj.data_results = dataType.FillDataString(dr, "data_results");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["data_layer_projectile"] != null)                    
                    obj.data_layer_projectile = dataType.FillDataString(dr, "data_layer_projectile");                
            if (dr["data_layer_actors"] != null)                    
                    obj.data_layer_actors = dataType.FillDataString(dr, "data_layer_actors");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["data_layer_enemy"] != null)                    
                    obj.data_layer_enemy = dataType.FillDataString(dr, "data_layer_enemy");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameSessionData(
        )  {            
            return data.CountGameSessionData(
            );
        }       
        public virtual int CountGameSessionDataByUuid(
            string uuid
        )  {            
            return data.CountGameSessionDataByUuid(
                uuid
            );
        }       
        public virtual GameSessionDataResult BrowseGameSessionDataListByFilter(SearchFilter obj)  {
            GameSessionDataResult result = new GameSessionDataResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameSessionDataListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSessionData game_session_data  = FillGameSessionData(dr);
                        result.data.Add(game_session_data);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameSessionDataByUuid(string set_type, GameSessionData obj)  {            
            return data.SetGameSessionDataByUuid(set_type, obj);
        }    
        public virtual bool DelGameSessionDataByUuid(
            string uuid
        )  {
            return data.DelGameSessionDataByUuid(
                uuid
            );
        }                     
        public virtual List<GameSessionData> GetGameSessionDataList(
        )  {
            List<GameSessionData> list = new List<GameSessionData>();
            DataSet ds = data.GetGameSessionDataList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSessionData game_session_data  = FillGameSessionData(dr);
                        list.Add(game_session_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSessionData> GetGameSessionDataListByUuid(
            string uuid
        )  {
            List<GameSessionData> list = new List<GameSessionData>();
            DataSet ds = data.GetGameSessionDataListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSessionData game_session_data  = FillGameSessionData(dr);
                        list.Add(game_session_data);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameContent FillGameContent(DataRow dr) {
            GameContent obj = new GameContent();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["extension"] != null)                    
                    obj.extension = dataType.FillDataString(dr, "extension");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["filename"] != null)                    
                    obj.filename = dataType.FillDataString(dr, "filename");                
            if (dr["source"] != null)                    
                    obj.source = dataType.FillDataString(dr, "source");                
            if (dr["version"] != null)                    
                    obj.version = dataType.FillDataString(dr, "version");                
            if (dr["platform"] != null)                    
                    obj.platform = dataType.FillDataString(dr, "platform");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["path"] != null)                    
                    obj.path = dataType.FillDataString(dr, "path");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["increment"] != null)                    
                    obj.increment = dataType.FillDataInt(dr, "increment");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameContent(
        )  {            
            return data.CountGameContent(
            );
        }       
        public virtual int CountGameContentByUuid(
            string uuid
        )  {            
            return data.CountGameContentByUuid(
                uuid
            );
        }       
        public virtual int CountGameContentByGameId(
            string game_id
        )  {            
            return data.CountGameContentByGameId(
                game_id
            );
        }       
        public virtual int CountGameContentByGameIdByPath(
            string game_id
            , string path
        )  {            
            return data.CountGameContentByGameIdByPath(
                game_id
                , path
            );
        }       
        public virtual int CountGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {            
            return data.CountGameContentByGameIdByPathByVersion(
                game_id
                , path
                , version
            );
        }       
        public virtual int CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual GameContentResult BrowseGameContentListByFilter(SearchFilter obj)  {
            GameContentResult result = new GameContentResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameContentListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        result.data.Add(game_content);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameContentByUuid(string set_type, GameContent obj)  {            
            return data.SetGameContentByUuid(set_type, obj);
        }    
        public virtual bool SetGameContentByGameId(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameId(set_type, obj);
        }    
        public virtual bool SetGameContentByGameIdByPath(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameIdByPath(set_type, obj);
        }    
        public virtual bool SetGameContentByGameIdByPathByVersion(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameIdByPathByVersion(set_type, obj);
        }    
        public virtual bool SetGameContentByGameIdByPathByVersionByPlatformByIncrement(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(set_type, obj);
        }    
        public virtual bool DelGameContentByUuid(
            string uuid
        )  {
            return data.DelGameContentByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameContentByGameId(
            string game_id
        )  {
            return data.DelGameContentByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameContentByGameIdByPath(
            string game_id
            , string path
        )  {
            return data.DelGameContentByGameIdByPath(
                game_id
                , path
            );
        }                     
        public virtual bool DelGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            return data.DelGameContentByGameIdByPathByVersion(
                game_id
                , path
                , version
            );
        }                     
        public virtual bool DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
        }                     
        public virtual List<GameContent> GetGameContentList(
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByUuid(
            string uuid
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameId(
            string game_id
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameIdByPath(
            string game_id
            , string path
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameIdByPath(
                game_id
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameIdByPathByVersion(
                game_id
                , path
                , version
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileContent FillGameProfileContent(DataRow dr) {
            GameProfileContent obj = new GameProfileContent();

            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["increment"] != null)                    
                    obj.increment = dataType.FillDataInt(dr, "increment");                
            if (dr["path"] != null)                    
                    obj.path = dataType.FillDataString(dr, "path");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["platform"] != null)                    
                    obj.platform = dataType.FillDataString(dr, "platform");                
            if (dr["filename"] != null)                    
                    obj.filename = dataType.FillDataString(dr, "filename");                
            if (dr["source"] != null)                    
                    obj.source = dataType.FillDataString(dr, "source");                
            if (dr["version"] != null)                    
                    obj.version = dataType.FillDataString(dr, "version");                
            if (dr["game_network"] != null)                    
                    obj.game_network = dataType.FillDataString(dr, "game_network");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["extension"] != null)                    
                    obj.extension = dataType.FillDataString(dr, "extension");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                

            return obj;
        }
        
        public virtual int CountGameProfileContent(
        )  {            
            return data.CountGameProfileContent(
            );
        }       
        public virtual int CountGameProfileContentByUuid(
            string uuid
        )  {            
            return data.CountGameProfileContentByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {            
            return data.CountGameProfileContentByGameIdByProfileId(
                game_id
                , profile_id
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {            
            return data.CountGameProfileContentByGameIdByUsername(
                game_id
                , username
            );
        }       
        public virtual int CountGameProfileContentByUsername(
            string username
        )  {            
            return data.CountGameProfileContentByUsername(
                username
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {            
            return data.CountGameProfileContentByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {            
            return data.CountGameProfileContentByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {            
            return data.CountGameProfileContentByGameIdByUsernameByPath(
                game_id
                , username
                , path
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {            
            return data.CountGameProfileContentByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual GameProfileContentResult BrowseGameProfileContentListByFilter(SearchFilter obj)  {
            GameProfileContentResult result = new GameProfileContentResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileContentListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        result.data.Add(game_profile_content);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileContentByUuid(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileId(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsername(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsername(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByUsername(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByUsername(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPath(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileIdByPath(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersion(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileIdByPathByVersion(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPath(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsernameByPath(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersion(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsernameByPathByVersion(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(set_type, obj);
        }    
        public virtual bool DelGameProfileContentByUuid(
            string uuid
        )  {
            return data.DelGameProfileContentByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            return data.DelGameProfileContentByGameIdByProfileId(
                game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {
            return data.DelGameProfileContentByGameIdByUsername(
                game_id
                , username
            );
        }                     
        public virtual bool DelGameProfileContentByUsername(
            string username
        )  {
            return data.DelGameProfileContentByUsername(
                username
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            return data.DelGameProfileContentByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            return data.DelGameProfileContentByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {
            return data.DelGameProfileContentByGameIdByUsernameByPath(
                game_id
                , username
                , path
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            return data.DelGameProfileContentByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
        }                     
        public virtual List<GameProfileContent> GetGameProfileContentList(
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByUuid(
            string uuid
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileId(
                game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsername(
            string game_id
            , string username
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsername(
                game_id
                , username
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByUsername(
            string username
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByUsername(
                username
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsernameByPath(
                game_id
                , username
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameApp FillGameApp(DataRow dr) {
            GameApp obj = new GameApp();

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
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                

            return obj;
        }
        
        public virtual int CountGameApp(
        )  {            
            return data.CountGameApp(
            );
        }       
        public virtual int CountGameAppByUuid(
            string uuid
        )  {            
            return data.CountGameAppByUuid(
                uuid
            );
        }       
        public virtual int CountGameAppByGameId(
            string game_id
        )  {            
            return data.CountGameAppByGameId(
                game_id
            );
        }       
        public virtual int CountGameAppByAppId(
            string app_id
        )  {            
            return data.CountGameAppByAppId(
                app_id
            );
        }       
        public virtual int CountGameAppByGameIdByAppId(
            string game_id
            , string app_id
        )  {            
            return data.CountGameAppByGameIdByAppId(
                game_id
                , app_id
            );
        }       
        public virtual GameAppResult BrowseGameAppListByFilter(SearchFilter obj)  {
            GameAppResult result = new GameAppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAppListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        result.data.Add(game_app);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAppByUuid(string set_type, GameApp obj)  {            
            return data.SetGameAppByUuid(set_type, obj);
        }    
        public virtual bool DelGameAppByUuid(
            string uuid
        )  {
            return data.DelGameAppByUuid(
                uuid
            );
        }                     
        public virtual List<GameApp> GetGameAppList(
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByUuid(
            string uuid
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByGameId(
            string game_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByAppId(
            string app_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByAppId(
                app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByGameIdByAppId(
            string game_id
            , string app_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByGameIdByAppId(
                game_id
                , app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
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
        
        
        
        public virtual ProfileGameLocation FillProfileGameLocation(DataRow dr) {
            ProfileGameLocation obj = new ProfileGameLocation();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["game_location_id"] != null)                    
                    obj.game_location_id = dataType.FillDataString(dr, "game_location_id");                
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

            return obj;
        }
        
        public virtual int CountProfileGameLocation(
        )  {            
            return data.CountProfileGameLocation(
            );
        }       
        public virtual int CountProfileGameLocationByUuid(
            string uuid
        )  {            
            return data.CountProfileGameLocationByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameLocationByGameLocationId(
            string game_location_id
        )  {            
            return data.CountProfileGameLocationByGameLocationId(
                game_location_id
            );
        }       
        public virtual int CountProfileGameLocationByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameLocationByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameLocationByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {            
            return data.CountProfileGameLocationByProfileIdByGameLocationId(
                profile_id
                , game_location_id
            );
        }       
        public virtual ProfileGameLocationResult BrowseProfileGameLocationListByFilter(SearchFilter obj)  {
            ProfileGameLocationResult result = new ProfileGameLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameLocationListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        result.data.Add(profile_game_location);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameLocationByUuid(string set_type, ProfileGameLocation obj)  {            
            return data.SetProfileGameLocationByUuid(set_type, obj);
        }    
        public virtual bool DelProfileGameLocationByUuid(
            string uuid
        )  {
            return data.DelProfileGameLocationByUuid(
                uuid
            );
        }                     
        public virtual List<ProfileGameLocation> GetProfileGameLocationList(
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByUuid(
            string uuid
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByGameLocationId(
            string game_location_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByGameLocationId(
                game_location_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByProfileId(
            string profile_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByProfileIdByGameLocationId(
                profile_id
                , game_location_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
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
        
        
        
        public virtual GameRpgItemWeapon FillGameRpgItemWeapon(DataRow dr) {
            GameRpgItemWeapon obj = new GameRpgItemWeapon();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["game_defense"] != null)                    
                    obj.game_defense = dataType.FillDataFloat(dr, "game_defense");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["game_attack"] != null)                    
                    obj.game_attack = dataType.FillDataFloat(dr, "game_attack");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
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
            if (dr["game_price"] != null)                    
                    obj.game_price = dataType.FillDataFloat(dr, "game_price");                
            if (dr["game_type"] != null)                    
                    obj.game_type = dataType.FillDataFloat(dr, "game_type");                
            if (dr["game_skill"] != null)                    
                    obj.game_skill = dataType.FillDataFloat(dr, "game_skill");                
            if (dr["game_health"] != null)                    
                    obj.game_health = dataType.FillDataFloat(dr, "game_health");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_energy"] != null)                    
                    obj.game_energy = dataType.FillDataFloat(dr, "game_energy");                
            if (dr["game_data"] != null)                    
                    obj.game_data = dataType.FillDataString(dr, "game_data");                

            return obj;
        }
        
        public virtual int CountGameRpgItemWeapon(
        )  {            
            return data.CountGameRpgItemWeapon(
            );
        }       
        public virtual int CountGameRpgItemWeaponByUuid(
            string uuid
        )  {            
            return data.CountGameRpgItemWeaponByUuid(
                uuid
            );
        }       
        public virtual int CountGameRpgItemWeaponByGameId(
            string game_id
        )  {            
            return data.CountGameRpgItemWeaponByGameId(
                game_id
            );
        }       
        public virtual int CountGameRpgItemWeaponByUrl(
            string url
        )  {            
            return data.CountGameRpgItemWeaponByUrl(
                url
            );
        }       
        public virtual int CountGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameRpgItemWeaponByUrlByGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameRpgItemWeaponByUuidByGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameRpgItemWeaponResult BrowseGameRpgItemWeaponListByFilter(SearchFilter obj)  {
            GameRpgItemWeaponResult result = new GameRpgItemWeaponResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameRpgItemWeaponListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        result.data.Add(game_rpg_item_weapon);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameRpgItemWeaponByUuid(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUuid(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByUrl(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUrl(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByUrlByGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUrlByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByUuidByGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUuidByGameId(set_type, obj);
        }    
        public virtual bool DelGameRpgItemWeaponByUuid(
            string uuid
        )  {
            return data.DelGameRpgItemWeaponByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByGameId(
            string game_id
        )  {
            return data.DelGameRpgItemWeaponByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByUrl(
            string url
        )  {
            return data.DelGameRpgItemWeaponByUrl(
                url
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {
            return data.DelGameRpgItemWeaponByUrlByGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameRpgItemWeaponByUuidByGameId(
                uuid
                , game_id
            );
        }                     
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponList(
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUuid(
            string uuid
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByGameId(
            string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUrl(
            string url
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUrlByGameId(
                url
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUuidByGameId(
                uuid
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameRpgItemSkill FillGameRpgItemSkill(DataRow dr) {
            GameRpgItemSkill obj = new GameRpgItemSkill();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["game_defense"] != null)                    
                    obj.game_defense = dataType.FillDataFloat(dr, "game_defense");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["game_attack"] != null)                    
                    obj.game_attack = dataType.FillDataFloat(dr, "game_attack");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
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
            if (dr["game_price"] != null)                    
                    obj.game_price = dataType.FillDataFloat(dr, "game_price");                
            if (dr["game_type"] != null)                    
                    obj.game_type = dataType.FillDataFloat(dr, "game_type");                
            if (dr["game_skill"] != null)                    
                    obj.game_skill = dataType.FillDataFloat(dr, "game_skill");                
            if (dr["game_health"] != null)                    
                    obj.game_health = dataType.FillDataFloat(dr, "game_health");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_energy"] != null)                    
                    obj.game_energy = dataType.FillDataFloat(dr, "game_energy");                
            if (dr["game_data"] != null)                    
                    obj.game_data = dataType.FillDataString(dr, "game_data");                

            return obj;
        }
        
        public virtual int CountGameRpgItemSkill(
        )  {            
            return data.CountGameRpgItemSkill(
            );
        }       
        public virtual int CountGameRpgItemSkillByUuid(
            string uuid
        )  {            
            return data.CountGameRpgItemSkillByUuid(
                uuid
            );
        }       
        public virtual int CountGameRpgItemSkillByGameId(
            string game_id
        )  {            
            return data.CountGameRpgItemSkillByGameId(
                game_id
            );
        }       
        public virtual int CountGameRpgItemSkillByUrl(
            string url
        )  {            
            return data.CountGameRpgItemSkillByUrl(
                url
            );
        }       
        public virtual int CountGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameRpgItemSkillByUrlByGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameRpgItemSkillByUuidByGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameRpgItemSkillResult BrowseGameRpgItemSkillListByFilter(SearchFilter obj)  {
            GameRpgItemSkillResult result = new GameRpgItemSkillResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameRpgItemSkillListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        result.data.Add(game_rpg_item_skill);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameRpgItemSkillByUuid(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUuid(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByUrl(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUrl(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByUrlByGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUrlByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByUuidByGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUuidByGameId(set_type, obj);
        }    
        public virtual bool DelGameRpgItemSkillByUuid(
            string uuid
        )  {
            return data.DelGameRpgItemSkillByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameRpgItemSkillByGameId(
            string game_id
        )  {
            return data.DelGameRpgItemSkillByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameRpgItemSkillByUrl(
            string url
        )  {
            return data.DelGameRpgItemSkillByUrl(
                url
            );
        }                     
        public virtual bool DelGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {
            return data.DelGameRpgItemSkillByUrlByGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameRpgItemSkillByUuidByGameId(
                uuid
                , game_id
            );
        }                     
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillList(
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUuid(
            string uuid
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByGameId(
            string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUrl(
            string url
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUrlByGameId(
                url
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUuidByGameId(
                uuid
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProduct FillGameProduct(DataRow dr) {
            GameProduct obj = new GameProduct();

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
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
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
        
        public virtual int CountGameProduct(
        )  {            
            return data.CountGameProduct(
            );
        }       
        public virtual int CountGameProductByUuid(
            string uuid
        )  {            
            return data.CountGameProductByUuid(
                uuid
            );
        }       
        public virtual int CountGameProductByGameId(
            string game_id
        )  {            
            return data.CountGameProductByGameId(
                game_id
            );
        }       
        public virtual int CountGameProductByUrl(
            string url
        )  {            
            return data.CountGameProductByUrl(
                url
            );
        }       
        public virtual int CountGameProductByUrlByGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameProductByUrlByGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameProductByUuidByGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameProductResult BrowseGameProductListByFilter(SearchFilter obj)  {
            GameProductResult result = new GameProductResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProductListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        result.data.Add(game_product);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProductByUuid(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUuid(set_type, obj);
        }    
        public virtual bool SetGameProductByGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductByGameId(set_type, obj);
        }    
        public virtual bool SetGameProductByUrl(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUrl(set_type, obj);
        }    
        public virtual bool SetGameProductByUrlByGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUrlByGameId(set_type, obj);
        }    
        public virtual bool SetGameProductByUuidByGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUuidByGameId(set_type, obj);
        }    
        public virtual bool DelGameProductByUuid(
            string uuid
        )  {
            return data.DelGameProductByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProductByGameId(
            string game_id
        )  {
            return data.DelGameProductByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameProductByUrl(
            string url
        )  {
            return data.DelGameProductByUrl(
                url
            );
        }                     
        public virtual bool DelGameProductByUrlByGameId(
            string url
            , string game_id
        )  {
            return data.DelGameProductByUrlByGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameProductByUuidByGameId(
                uuid
                , game_id
            );
        }                     
        public virtual List<GameProduct> GetGameProductList(
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUuid(
            string uuid
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByGameId(
            string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUrl(
            string url
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUrlByGameId(
                url
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUuidByGameId(
                uuid
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameStatisticLeaderboard FillGameStatisticLeaderboard(DataRow dr) {
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["stat_value_formatted"] != null)                    
                    obj.stat_value_formatted = dataType.FillDataString(dr, "stat_value_formatted");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["rank"] != null)                    
                    obj.rank = dataType.FillDataInt(dr, "rank");                
            if (dr["rank_change"] != null)                    
                    obj.rank_change = dataType.FillDataInt(dr, "rank_change");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["rank_total_count"] != null)                    
                    obj.rank_total_count = dataType.FillDataInt(dr, "rank_total_count");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["stat_value"] != null)                    
                    obj.stat_value = dataType.FillDataFloat(dr, "stat_value");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameStatisticLeaderboard(
        )  {            
            return data.CountGameStatisticLeaderboard(
            );
        }       
        public virtual int CountGameStatisticLeaderboardByUuid(
            string uuid
        )  {            
            return data.CountGameStatisticLeaderboardByUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticLeaderboardByKey(
            string key
        )  {            
            return data.CountGameStatisticLeaderboardByKey(
                key
            );
        }       
        public virtual int CountGameStatisticLeaderboardByGameId(
            string game_id
        )  {            
            return data.CountGameStatisticLeaderboardByGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardByKeyByGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardByKeyByGameId(
                key
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameStatisticLeaderboardResult BrowseGameStatisticLeaderboardListByFilter(SearchFilter obj)  {
            GameStatisticLeaderboardResult result = new GameStatisticLeaderboardResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticLeaderboardListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        result.data.Add(game_statistic_leaderboard);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticLeaderboardByUuid(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKey(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByProfileIdByKey(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByGameIdByKey(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByProfileIdByGameIdByKey(set_type, obj);
        }    
        public virtual bool DelGameStatisticLeaderboardByUuid(
            string uuid
        )  {
            return data.DelGameStatisticLeaderboardByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByKeyByGameId(
            string key
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardByKeyByGameId(
                key
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
        }                     
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardList(
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByUuid(
            string uuid
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKey(
            string key
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByGameId(
            string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLiveQueue FillGameLiveQueue(DataRow dr) {
            GameLiveQueue obj = new GameLiveQueue();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["data_stat"] != null)                    
                    obj.data_stat = dataType.FillDataString(dr, "data_stat");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["data_ad"] != null)                    
                    obj.data_ad = dataType.FillDataString(dr, "data_ad");                

            return obj;
        }
        
        public virtual int CountGameLiveQueue(
        )  {            
            return data.CountGameLiveQueue(
            );
        }       
        public virtual int CountGameLiveQueueByUuid(
            string uuid
        )  {            
            return data.CountGameLiveQueueByUuid(
                uuid
            );
        }       
        public virtual int CountGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLiveQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLiveQueueResult BrowseGameLiveQueueListByFilter(SearchFilter obj)  {
            GameLiveQueueResult result = new GameLiveQueueResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLiveQueueListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        result.data.Add(game_live_queue);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLiveQueueByUuid(string set_type, GameLiveQueue obj)  {            
            return data.SetGameLiveQueueByUuid(set_type, obj);
        }    
        public virtual bool SetGameLiveQueueByProfileIdByGameId(string set_type, GameLiveQueue obj)  {            
            return data.SetGameLiveQueueByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool DelGameLiveQueueByUuid(
            string uuid
        )  {
            return data.DelGameLiveQueueByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLiveQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameLiveQueue> GetGameLiveQueueList(
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListByUuid(
            string uuid
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListByGameId(
            string game_id
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLiveRecentQueue FillGameLiveRecentQueue(DataRow dr) {
            GameLiveRecentQueue obj = new GameLiveRecentQueue();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
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
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["game"] != null)                    
                    obj.game = dataType.FillDataString(dr, "game");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
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
        
        public virtual int CountGameLiveRecentQueue(
        )  {            
            return data.CountGameLiveRecentQueue(
            );
        }       
        public virtual int CountGameLiveRecentQueueByUuid(
            string uuid
        )  {            
            return data.CountGameLiveRecentQueueByUuid(
                uuid
            );
        }       
        public virtual int CountGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLiveRecentQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLiveRecentQueueResult BrowseGameLiveRecentQueueListByFilter(SearchFilter obj)  {
            GameLiveRecentQueueResult result = new GameLiveRecentQueueResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLiveRecentQueueListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        result.data.Add(game_live_recent_queue);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLiveRecentQueueByUuid(string set_type, GameLiveRecentQueue obj)  {            
            return data.SetGameLiveRecentQueueByUuid(set_type, obj);
        }    
        public virtual bool SetGameLiveRecentQueueByProfileIdByGameId(string set_type, GameLiveRecentQueue obj)  {            
            return data.SetGameLiveRecentQueueByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool DelGameLiveRecentQueueByUuid(
            string uuid
        )  {
            return data.DelGameLiveRecentQueueByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLiveRecentQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueList(
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByUuid(
            string uuid
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByGameId(
            string game_id
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameStatistic FillGameStatistic(DataRow dr) {
            GameStatistic obj = new GameStatistic();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["stat_value"] != null)                    
                    obj.stat_value = dataType.FillDataFloat(dr, "stat_value");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameStatistic(
        )  {            
            return data.CountGameStatistic(
            );
        }       
        public virtual int CountGameStatisticByUuid(
            string uuid
        )  {            
            return data.CountGameStatisticByUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticByKey(
            string key
        )  {            
            return data.CountGameStatisticByKey(
                key
            );
        }       
        public virtual int CountGameStatisticByGameId(
            string game_id
        )  {            
            return data.CountGameStatisticByGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticByKeyByGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameStatisticByKeyByGameId(
                key
                , game_id
            );
        }       
        public virtual int CountGameStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountGameStatisticByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameStatisticResult BrowseGameStatisticListByFilter(SearchFilter obj)  {
            GameStatisticResult result = new GameStatisticResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        result.data.Add(game_statistic);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticByUuid(string set_type, GameStatistic obj)  {            
            return data.SetGameStatisticByUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatistic obj)  {            
            return data.SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticByProfileIdByKey(string set_type, GameStatistic obj)  {            
            return data.SetGameStatisticByProfileIdByKey(set_type, obj);
        }    
        public virtual bool SetGameStatisticByProfileIdByKeyByTimestamp(string set_type, GameStatistic obj)  {            
            return data.SetGameStatisticByProfileIdByKeyByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatistic obj)  {            
            return data.SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticByProfileIdByGameIdByKey(string set_type, GameStatistic obj)  {            
            return data.SetGameStatisticByProfileIdByGameIdByKey(set_type, obj);
        }    
        public virtual bool DelGameStatisticByUuid(
            string uuid
        )  {
            return data.DelGameStatisticByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticByKeyByGameId(
            string key
            , string game_id
        )  {
            return data.DelGameStatisticByKeyByGameId(
                key
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
        }                     
        public virtual List<GameStatistic> GetGameStatisticListByUuid(
            string uuid
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatistic> GetGameStatisticListByKey(
            string key
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatistic> GetGameStatisticListByGameId(
            string game_id
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatistic> GetGameStatisticListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatistic> GetGameStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatistic> GetGameStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatistic> GetGameStatisticListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatistic> GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatistic> list = new List<GameStatistic>();
            DataSet ds = data.GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatistic game_statistic  = FillGameStatistic(dr);
                        list.Add(game_statistic);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameStatisticMeta FillGameStatisticMeta(DataRow dr) {
            GameStatisticMeta obj = new GameStatisticMeta();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
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
            if (dr["store_count"] != null)                    
                    obj.store_count = dataType.FillDataInt(dr, "store_count");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataString(dr, "order");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameStatisticMeta(
        )  {            
            return data.CountGameStatisticMeta(
            );
        }       
        public virtual int CountGameStatisticMetaByUuid(
            string uuid
        )  {            
            return data.CountGameStatisticMetaByUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticMetaByCode(
            string code
        )  {            
            return data.CountGameStatisticMetaByCode(
                code
            );
        }       
        public virtual int CountGameStatisticMetaByName(
            string name
        )  {            
            return data.CountGameStatisticMetaByName(
                name
            );
        }       
        public virtual int CountGameStatisticMetaByKey(
            string key
        )  {            
            return data.CountGameStatisticMetaByKey(
                key
            );
        }       
        public virtual int CountGameStatisticMetaByGameId(
            string game_id
        )  {            
            return data.CountGameStatisticMetaByGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameStatisticMetaByKeyByGameId(
                key
                , game_id
            );
        }       
        public virtual GameStatisticMetaResult BrowseGameStatisticMetaListByFilter(SearchFilter obj)  {
            GameStatisticMetaResult result = new GameStatisticMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticMetaListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        result.data.Add(game_statistic_meta);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticMetaByUuid(string set_type, GameStatisticMeta obj)  {            
            return data.SetGameStatisticMetaByUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticMetaByKeyByGameId(string set_type, GameStatisticMeta obj)  {            
            return data.SetGameStatisticMetaByKeyByGameId(set_type, obj);
        }    
        public virtual bool DelGameStatisticMetaByUuid(
            string uuid
        )  {
            return data.DelGameStatisticMetaByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            return data.DelGameStatisticMetaByKeyByGameId(
                key
                , game_id
            );
        }                     
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByUuid(
            string uuid
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByCode(
            string code
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByName(
            string name
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByKey(
            string key
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByGameId(
            string game_id
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameStatisticTimestamp FillGameStatisticTimestamp(DataRow dr) {
            GameStatisticTimestamp obj = new GameStatisticTimestamp();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataDateTime(dr, "timestamp");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameStatisticTimestamp(
        )  {            
            return data.CountGameStatisticTimestamp(
            );
        }       
        public virtual int CountGameStatisticTimestampByUuid(
            string uuid
        )  {            
            return data.CountGameStatisticTimestampByUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {            
            return data.CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameStatisticTimestampResult BrowseGameStatisticTimestampListByFilter(SearchFilter obj)  {
            GameStatisticTimestampResult result = new GameStatisticTimestampResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticTimestampListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticTimestamp game_statistic_timestamp  = FillGameStatisticTimestamp(dr);
                        result.data.Add(game_statistic_timestamp);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticTimestampByUuid(string set_type, GameStatisticTimestamp obj)  {            
            return data.SetGameStatisticTimestampByUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatisticTimestamp obj)  {            
            return data.SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameStatisticTimestampByUuid(
            string uuid
        )  {
            return data.DelGameStatisticTimestampByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            return data.DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
        }                     
        public virtual List<GameStatisticTimestamp> GetGameStatisticTimestampListByUuid(
            string uuid
        )  {
            List<GameStatisticTimestamp> list = new List<GameStatisticTimestamp>();
            DataSet ds = data.GetGameStatisticTimestampListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticTimestamp game_statistic_timestamp  = FillGameStatisticTimestamp(dr);
                        list.Add(game_statistic_timestamp);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticTimestamp> GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            List<GameStatisticTimestamp> list = new List<GameStatisticTimestamp>();
            DataSet ds = data.GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticTimestamp game_statistic_timestamp  = FillGameStatisticTimestamp(dr);
                        list.Add(game_statistic_timestamp);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameKeyMeta FillGameKeyMeta(DataRow dr) {
            GameKeyMeta obj = new GameKeyMeta();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
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
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["key_level"] != null)                    
                    obj.key_level = dataType.FillDataString(dr, "key_level");                
            if (dr["store_count"] != null)                    
                    obj.store_count = dataType.FillDataInt(dr, "store_count");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataString(dr, "order");                
            if (dr["key_stat"] != null)                    
                    obj.key_stat = dataType.FillDataString(dr, "key_stat");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameKeyMeta(
        )  {            
            return data.CountGameKeyMeta(
            );
        }       
        public virtual int CountGameKeyMetaByUuid(
            string uuid
        )  {            
            return data.CountGameKeyMetaByUuid(
                uuid
            );
        }       
        public virtual int CountGameKeyMetaByCode(
            string code
        )  {            
            return data.CountGameKeyMetaByCode(
                code
            );
        }       
        public virtual int CountGameKeyMetaByName(
            string name
        )  {            
            return data.CountGameKeyMetaByName(
                name
            );
        }       
        public virtual int CountGameKeyMetaByKey(
            string key
        )  {            
            return data.CountGameKeyMetaByKey(
                key
            );
        }       
        public virtual int CountGameKeyMetaByGameId(
            string game_id
        )  {            
            return data.CountGameKeyMetaByGameId(
                game_id
            );
        }       
        public virtual int CountGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameKeyMetaByKeyByGameId(
                key
                , game_id
            );
        }       
        public virtual GameKeyMetaResult BrowseGameKeyMetaListByFilter(SearchFilter obj)  {
            GameKeyMetaResult result = new GameKeyMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameKeyMetaListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        result.data.Add(game_key_meta);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameKeyMetaByUuid(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaByUuid(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaByKeyByGameId(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaByKeyByGameId(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaByKeyByGameIdByLevel(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaByKeyByGameIdByLevel(set_type, obj);
        }    
        public virtual bool DelGameKeyMetaByUuid(
            string uuid
        )  {
            return data.DelGameKeyMetaByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            return data.DelGameKeyMetaByKeyByGameId(
                key
                , game_id
            );
        }                     
        public virtual List<GameKeyMeta> GetGameKeyMetaListByUuid(
            string uuid
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCode(
            string code
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByName(
            string name
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByKey(
            string key
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByGameId(
            string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCodeByLevel(
            string code
            , string level
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByCodeByLevel(
                code
                , level
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLevel FillGameLevel(DataRow dr) {
            GameLevel obj = new GameLevel();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
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
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataString(dr, "order");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameLevel(
        )  {            
            return data.CountGameLevel(
            );
        }       
        public virtual int CountGameLevelByUuid(
            string uuid
        )  {            
            return data.CountGameLevelByUuid(
                uuid
            );
        }       
        public virtual int CountGameLevelByCode(
            string code
        )  {            
            return data.CountGameLevelByCode(
                code
            );
        }       
        public virtual int CountGameLevelByName(
            string name
        )  {            
            return data.CountGameLevelByName(
                name
            );
        }       
        public virtual int CountGameLevelByKey(
            string key
        )  {            
            return data.CountGameLevelByKey(
                key
            );
        }       
        public virtual int CountGameLevelByGameId(
            string game_id
        )  {            
            return data.CountGameLevelByGameId(
                game_id
            );
        }       
        public virtual int CountGameLevelByKeyByGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameLevelByKeyByGameId(
                key
                , game_id
            );
        }       
        public virtual GameLevelResult BrowseGameLevelListByFilter(SearchFilter obj)  {
            GameLevelResult result = new GameLevelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLevelListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        result.data.Add(game_level);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLevelByUuid(string set_type, GameLevel obj)  {            
            return data.SetGameLevelByUuid(set_type, obj);
        }    
        public virtual bool SetGameLevelByKeyByGameId(string set_type, GameLevel obj)  {            
            return data.SetGameLevelByKeyByGameId(set_type, obj);
        }    
        public virtual bool DelGameLevelByUuid(
            string uuid
        )  {
            return data.DelGameLevelByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLevelByKeyByGameId(
            string key
            , string game_id
        )  {
            return data.DelGameLevelByKeyByGameId(
                key
                , game_id
            );
        }                     
        public virtual List<GameLevel> GetGameLevelListByUuid(
            string uuid
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByCode(
            string code
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByName(
            string name
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByKey(
            string key
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByGameId(
            string game_id
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameAchievement FillGameAchievement(DataRow dr) {
            GameAchievement obj = new GameAchievement();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["completed"] != null)                    
                    obj.completed = dataType.FillDataBool(dr, "completed");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["achievement_value"] != null)                    
                    obj.achievement_value = dataType.FillDataFloat(dr, "achievement_value");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameAchievement(
        )  {            
            return data.CountGameAchievement(
            );
        }       
        public virtual int CountGameAchievementByUuid(
            string uuid
        )  {            
            return data.CountGameAchievementByUuid(
                uuid
            );
        }       
        public virtual int CountGameAchievementByProfileIdByKey(
            string profile_id
            , string key
        )  {            
            return data.CountGameAchievementByProfileIdByKey(
                profile_id
                , key
            );
        }       
        public virtual int CountGameAchievementByUsername(
            string username
        )  {            
            return data.CountGameAchievementByUsername(
                username
            );
        }       
        public virtual int CountGameAchievementByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameAchievementByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameAchievementResult BrowseGameAchievementListByFilter(SearchFilter obj)  {
            GameAchievementResult result = new GameAchievementResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAchievementListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        result.data.Add(game_achievement);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAchievementByUuid(string set_type, GameAchievement obj)  {            
            return data.SetGameAchievementByUuid(set_type, obj);
        }    
        public virtual bool SetGameAchievementByUuidByKey(string set_type, GameAchievement obj)  {            
            return data.SetGameAchievementByUuidByKey(set_type, obj);
        }    
        public virtual bool SetGameAchievementByProfileIdByKey(string set_type, GameAchievement obj)  {            
            return data.SetGameAchievementByProfileIdByKey(set_type, obj);
        }    
        public virtual bool SetGameAchievementByKeyByProfileIdByGameId(string set_type, GameAchievement obj)  {            
            return data.SetGameAchievementByKeyByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(string set_type, GameAchievement obj)  {            
            return data.SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameAchievementByUuid(
            string uuid
        )  {
            return data.DelGameAchievementByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameAchievementByProfileIdByKey(
            string profile_id
            , string key
        )  {
            return data.DelGameAchievementByProfileIdByKey(
                profile_id
                , key
            );
        }                     
        public virtual bool DelGameAchievementByUuidByKey(
            string uuid
            , string key
        )  {
            return data.DelGameAchievementByUuidByKey(
                uuid
                , key
            );
        }                     
        public virtual List<GameAchievement> GetGameAchievementListByUuid(
            string uuid
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByProfileIdByKey(
            string profile_id
            , string key
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByProfileIdByKey(
                profile_id
                , key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByUsername(
            string username
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByUsername(
                username
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByKey(
            string key
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByGameId(
            string game_id
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievement> GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameAchievement> list = new List<GameAchievement>();
            DataSet ds = data.GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievement game_achievement  = FillGameAchievement(dr);
                        list.Add(game_achievement);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameAchievementMeta FillGameAchievementMeta(DataRow dr) {
            GameAchievementMeta obj = new GameAchievementMeta();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["game_stat"] != null)                    
                    obj.game_stat = dataType.FillDataBool(dr, "game_stat");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["points"] != null)                    
                    obj.points = dataType.FillDataInt(dr, "points");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["leaderboard"] != null)                    
                    obj.leaderboard = dataType.FillDataBool(dr, "leaderboard");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameAchievementMeta(
        )  {            
            return data.CountGameAchievementMeta(
            );
        }       
        public virtual int CountGameAchievementMetaByUuid(
            string uuid
        )  {            
            return data.CountGameAchievementMetaByUuid(
                uuid
            );
        }       
        public virtual int CountGameAchievementMetaByCode(
            string code
        )  {            
            return data.CountGameAchievementMetaByCode(
                code
            );
        }       
        public virtual int CountGameAchievementMetaByName(
            string name
        )  {            
            return data.CountGameAchievementMetaByName(
                name
            );
        }       
        public virtual int CountGameAchievementMetaByKey(
            string key
        )  {            
            return data.CountGameAchievementMetaByKey(
                key
            );
        }       
        public virtual int CountGameAchievementMetaByGameId(
            string game_id
        )  {            
            return data.CountGameAchievementMetaByGameId(
                game_id
            );
        }       
        public virtual int CountGameAchievementMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameAchievementMetaByKeyByGameId(
                key
                , game_id
            );
        }       
        public virtual GameAchievementMetaResult BrowseGameAchievementMetaListByFilter(SearchFilter obj)  {
            GameAchievementMetaResult result = new GameAchievementMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAchievementMetaListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        result.data.Add(game_achievement_meta);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAchievementMetaByUuid(string set_type, GameAchievementMeta obj)  {            
            return data.SetGameAchievementMetaByUuid(set_type, obj);
        }    
        public virtual bool SetGameAchievementMetaByKeyByGameId(string set_type, GameAchievementMeta obj)  {            
            return data.SetGameAchievementMetaByKeyByGameId(set_type, obj);
        }    
        public virtual bool DelGameAchievementMetaByUuid(
            string uuid
        )  {
            return data.DelGameAchievementMetaByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameAchievementMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            return data.DelGameAchievementMetaByKeyByGameId(
                key
                , game_id
            );
        }                     
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByUuid(
            string uuid
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByCode(
            string code
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByName(
            string name
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByKey(
            string key
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByGameId(
            string game_id
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
    }
}






