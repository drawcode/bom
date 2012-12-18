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

    public class PlatformRequestHandler : BasePlatformRequestHandler, IBaseHandler  {
    
        public string cookieNameUser = "bb-user";
        public string cookieNameUserName = "bb-user-name";
        public string cookieNameLoggedIn = "bb-user-state";
        public string cookieNameAdminUser = "bb-admin-user";
        public string cookieNameAdminUserName = "bb-admin-user-name";
        public string cookieNameAdminLoggedIn = "bb-admin-user-state";
        
        public PlatformRequestHandler(){
        
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
            wrapper.data = "Hi! I am platform service, and I am reporting for service...";
            
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
"""





