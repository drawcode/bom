bom
===

The bom is the Baseplane Object Model generator for code or templates. It is a code generator, there are good and bad points to these. 

Why?
Ultimately code generation is used when systems need to be similar across different platforms i.e. a gaming system that might be python or C# but then PHP for web, or products that need to run on multiple platforms in multiple languages but keep a similar api and footprint.

In short, creating a baseplane.

The idea is a common looking api across platforms and languages.  But mainly defining apps and models in json or very basic formats, then building all templated code and output from that and using the same database procedures, class objects, methods and more. This allows fast development starts and quick switching among platforms/languages/databases.  

Base level code can be customized inherited in API, ACT (action) or Data layers preventing the common problem of regeneration breaking custom code.  Baseplane generators have a base layer of structure that can be regened at any time and then the custom layer updated as needed for usage i.e. adding a field to a database, adding common code among all libraries for utility or service level changes for caching or other custom adjustments.

bom was build mainly due to lots of the same systems built that clients need in python, php, .NET (c#) or others and data layers use stored procedures mainly for PostgreSQL, MySQL and MSSQL. Also, front end clients in flash, javascript, unity and others that need to be made quickly and customized but again be similar across platforms (i.e. possibly python on the server and C# on the client).  So in this case generation is a decent option and the common across many projects and platforms.  When a system is needed for only one platform a decent ORM or MVC/MVVM platform will do most of this.

  `python bom_platform.py`
  
Models and projects defined in `templates` and `projects` folder. 

TODO
 - Add ability to pass in config or create at command
 - Provide web hook in flask or other to put into WSGI app
