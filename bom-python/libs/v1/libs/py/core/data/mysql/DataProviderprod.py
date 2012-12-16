#
# PostgreSQL library for python psycopg2 DataProvider for baseplane/data layer
#

import psycopg2
import psycopg2.extras

def enum(**enums):
    return type('Enum', (), enums)
    
CommandType = enum(Text='text', StoredProcedure='stored-proc')

class DataProvider(object):
    
    def about(self):
        return "DataProvider provides baseplane signatures for data connections"

    def __init__(self) :
        self.connection_string = "dbname=platform user=platform password=platform port=5234"
        self.connection_string_name = ""
        self.conn = None
        self.cur = None
        
    def connect(self) :
        self.conn = psycopg2.connect(self.connection_string)
        #self.conn.autocommit(True)
        if self.conn is not None :
            self.cur = self.conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            
    def commit(self) :
        if self.conn is not None :
            self.conn.commit()
            
    def close(self):
        if self.cur is not None :
            self.cur.close()
        
        if self.conn is not None :
            self.conn.close()
        
    def execute_results(self
        , connection_string
        , command_type
        , sql
        , params) :
                
        results = None
        
        try:
            self.connect()
            if self.cur is not None :
                if(command_type == CommandType.Text) :
                    self.cur.execute(sql, params)        
                else :
                    self.cur.callproc(sql, params)
        except Exception as err: 
            print err
        finally :
            if self.cur is not None :
                results = self.cur.fetchall()
            self.commit()
            self.close()
        
        return results
    
    def execute_scalar(self
        , connection_string
        , command_type
        , sql
        , params) :
                
                
        print 'sql: %s' % sql
        print 'params: %s' % params
                
        results = None
        first_val = 0
        
        try:
            self.connect()
            if self.cur is not None :
                if(command_type == CommandType.Text) :
                    self.cur.execute(sql, params)        
                else :
                    print 'mogrify:' + self.cur.mogrify(sql, params)
                    self.cur.callproc(sql, params)
        except Exception as err: 
            print err
        finally :
            if self.cur is not None :
                results = self.cur.fetchone()
                if(results != None) :
                    if(results[0] != None) :
                        first_val = results[0]
            self.commit()
            self.close()
        
        return first_val
    
    def execute_scalar_commit(self
        , connection_string
        , command_type
        , sql
        , params) :
                
        #print 'sql: %s' % sql
        #print 'params: %s' % params
                
        results = None
        first_val = 0
        
        try:
            self.connect()
            if self.cur is not None :
                if(command_type == CommandType.Text) :
                    self.cur.execute(sql, params)        
                else :
                    self.cur.callproc(sql, params)
        except Exception as err: 
            print err
        finally :
            if self.cur is not None :
                results = self.cur.fetchone()
                if(results != None) :
                    if(results[0] != None) :
                        first_val = results[0]
            self.commit()
            self.close()
        
        return first_val
    
    def execute_no_results(self
        , connection_string
        , command_type
        , sql
        , params) :

        try:
            self.connect()
            if self.cur is not None :
                if(command_type == CommandType.Text) :
                    self.cur.execute(sql, params)        
                else :
                    self.cur.callproc(sql, params)
        except Exception as err: 
            print err
        finally :
            self.commit()
            self.close()

if __name__ == '__main__':
    pass
    #obj = DataProvider()
    #obj.execute_results("", CommandType.StoredProcedure, "SELECT * FROM h", None)
    #print obj.about()