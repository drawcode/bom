#!/usr/bin/env python
import os

class FindReplace():
    
    def find_replace_text_in_file(self, file, searchExp, replaceExp):
        f=open(file, 'r')
        lines=f.readlines()
        f.close()
        f=open(file, 'w')
        for line in lines:
            newline=line.replace(search_expression, replace_text)
            f.write(newline)
        f.close()
            
    def find_replace_text_in_directory(self, dir, search_expression, replace_text):
        for subdir, dirs, files in os.walk(dir):
            for file in files:
                find_replace_text_in_file(file, search_expression, replace_text)
