bom
===

Baseplane object model generator for code or templates. The idea is common looking api across platforms but mainly defining apps and models in json or very basic format, then building all templated code and output from that.  Base level code can be customized inherited in API, ACT (action) or Data layers. 

This is used mainly due to lots of the same systems built that clients need in python, php, .NET (c#) or others and data layers use stored procedures mainly for PostgreSQL, MySQL and MSSQL. Also, front end clients in flash, javascript, unity and others that need to be made quickly and customized but again be similar across platforms (i.e. possibly python on the server and C# on the client).  So in this case generation is a decent option and the common across many projects and platforms.  When a system is needed for only one platform a decent ORM or MVC/MVVM platform will do most of this.

  `python bom-platform.py`
  
Models and projects defined in `templates` and `projects` folder. 

TODO
 - Add ability to pass in config or create at command
 - Provide web hook in flask or other to put into WSGI app