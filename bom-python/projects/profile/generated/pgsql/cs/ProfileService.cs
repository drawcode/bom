using System;
using System.Collections.Generic;
using System.Linq;
using System.IO;
using System.Web;
using System.Web.Compilation;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;

using ah.core;
using ah.core.data;
using ah.core.handlers;
using ah.core.util;

using profile;
using profile.ent;

namespace profile {

    public class ProfileService : BaseProfileService, IBaseHandler  {
    
        public string cookieNameUser = "a-user";
        public string cookieNameUserName = "a-user-name";
        public string cookieNameLoggedIn = "a-user-state";
        public string cookieNameAdminUser = "a-admin-user";
        public string cookieNameAdminUserName = "a-admin-user-name";
        public string cookieNameAdminLoggedIn = "a-admin-user-state";
        
        public ProfileService() {
        
        }
        
        public override void Render(HttpContext context) {
        
            base.Render(context);

            _context = context;
            
            ProcessRequest();

            //StringWriter writer = new StringWriter();
            //HttpContext.Current.Server.Execute("~/main.aspx", writer);
            //string html = writer.ToString();
            //writer.Close();
            //writer.Dispose();
            // Emit the rendered HTML
            //context.Response.Write(html);
        }
           
        public void ProcessRequest() {
            if(IsContext("service/about")) {
                    ServiceAbout("service/about");
            }
            else if(IsContext("service/dict")) {
                    ServiceList("service/dict");
            }
        }
        
        public void ServiceAbout(string service) {
            
            ResponseString wrapper = new ResponseString();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = service;
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            // get data
            wrapper.data = "Hi! I am profile service, and I am reporting for service...";
            
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
        
        public void ServiceList(string service) {
            
            ResponseDict wrapper = new ResponseDict();
            wrapper.message = "Success";
            wrapper.error = 0;
            wrapper.action = service;
            wrapper.info.Add("path", path);
            wrapper.info.Add("path_info", path_info);
            wrapper.info.Add("qstring", qstring);
            wrapper.info.Add("action", action);
            wrapper.info.Add("action_params", action_params);
            
            // get data
            wrapper.data.Add("service/about", "");
            
            util.SerializeTypeJSONToResponse(_context, wrapper);
        }
        
        
    }
}






