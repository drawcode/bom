##
## $Release: 0.3.3 $
## copyright(c) 2009-2010
## Ryan Christensen - drawk llc-> drawcode and drawlabs
##
## Permission is hereby granted, free of charge, to any person obtaining
## a copy of this software and associated documentation files (the
## "Software"), to deal in the Software without restriction, including
## without limitation the rights to use, copy, modify, merge, publish,
## distribute, sublicense, and/or sell copies of the Software, and to
## permit persons to whom the Software is furnished to do so, subject to
## the following conditions:
##
## The above copyright notice and this permission notice shall be
## included in all copies or substantial portions of the Software.
##
## THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
## EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
## MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
## NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
## LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
## OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
## WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
##

"""BOM the baseplane object model
   code generation from a plane of code
   http://bom.baseplane.com
"""

__release__  = "0.3.3"
__license__  = "MIT License"
__all__      = ['Bom', 'BomType', 'BomTemplate', 'BomApp', ]

import sys
import os
try:
  import json
except ImportError:
  import simplejson as json
import time
import re

import getopt
import bom_template
from bom_template.helpers import *

import platform
path_divider = os.sep

def _normalize_newlines(string):
  return re.sub(r'(\r\n|\r\n)', '\n', string)

#-------------------------------------------------------------------------------
class Usage(Exception):
		def __init__(self, msg):
				self.msg = msg

#-------------------------------------------------------------------------------
class BomPlatformEnum():
  CODE = 'code'
  DATA = 'data'
    
#-------------------------------------------------------------------------------    
class BomTypeEnum():
		INT = 'int'
		STRING = 'string'
		UUID = 'uuid'
		NTEXT = 'ntext'
		BOOL = 'bool'
		CHAR = 'char'
		DATETIME = 'datetime'
		BINARY = 'bin'
		BASE64COMPRESSED = 'base64compressed'
		BASE64 = 'base64'

#-------------------------------------------------------------------------------    
class BomCodeTypeEnum():
		CODE_CSHARP = 'cs'
		CODE_PYTHON = 'py'
		CODE_JAVA = 'java'
		CODE_PHP = 'php'
		CODE_ACTIONSCRIPT = 'as'
		CODE_JAVASCRIPT = 'cs'

#-------------------------------------------------------------------------------    
class BomDataTypeEnum():
		DATA_ORACLE = 'oracle'
		DATA_MSSQL = 'mssql'
		DATA_MYSQL = 'mysql'
		DATA_POSTGRES = 'pgsql'
		DATA_MONGODB = 'mongodb'
		DATA_COUCHDB = 'couchdb'
		DATA_REDIS = 'redis'
		
#-------------------------------------------------------------------------------    
class BomType():
		
		def __init__(self):
				self.types_filename = os.getcwd()
				self.types_filename += os.sep + 'bom' + os.sep + 'types' + os.sep + 'bomtypes.json'
				self.bom_types = {}
				self.parse_types()
						
		def parse_types(self):
				f = open(self.types_filename,'r')
				self.bom_types = json.loads(f.read())
				f.close()
						
		def is_text_type(self, type):
				if(type == 'string'
						or type == 'data'
						or type == 'char'):
						return True
				return False
				
		"""
		def custom_type_from_bom_type(self, bom_type, type, code):
				for n in self.bom_types["types"][bom_type][type]:
						for k, v in n.iteritems():
								if k == code :
										return v
		"""
				
		def bom_type_from_custom_type(self, custom_type, type, code):
				for n in self.bom_types["types"][custom_type][type]:
						for k, v in n.iteritems():
								if k == code :
										return v

#-------------------------------------------------------------------------------                
class BomTemplate():
		
		def __init__(self):
				self.output = ''
				self.init()
				self.template_path = os.getcwd() + path_divider + 'templates' + path_divider
				self.platform = None
				self.file = ''
				self.context = {}
						
		def init(self):
				self.template_engine = bom_template.Engine(cache=None)
				self.output = ""
						
		def load(self, platform, file, context):
				self.platform = platform
				self.file = file
				self.context = context
						
		def render_single_template(self, platform, key, value, file):
				self.context = {
						'bom':platform,
						'app':platform.app,
						'app_name':platform.app_name,
						'namespace': platform.namespace_root,
						'model':key,
						'model_name':bom.to_camel_cap(model,'_'),
						'model_data':value
				}
				
				self.output = self.template_engine.render(file, self.context)
				return self.output
								
		def render_full_template(self, platform, file):
				self.template = self.template_path + file
				self.context = {
						'bom':platform,
						'app':platform.app,
						'app_name':platform.app_name,
						'namespace': platform.namespace_root
				}
				self.output = self.template_engine.render(self.template, self.context)
				return self.output

		#def get_code_type_path(self, bom):
		#    return "code" + path_divider + self.get_code_type(bom) + path_divider
						
		#def get_data_type_path(self, bom):
		#    return "data" + path_divider + self.get_data_type(bom) + path_divider       
						
		#def get_code_type(self, bom):#TODO figure cycle
		#    return bom.bom_json["code_type"][0]
						
		#def get_data_type(self, bom):#TODO figure cycle
		#    return bom.bom_json["data_type"][0]

#-------------------------------------------------------------------------------    
class BomApp():
		
		def __init__(self):
				self.platform_sep = ''
				self.project_root = ''
				self.project_ext= ''
				self.project_path = ''
				self.bom_path = ''
				self.output_path = ''
				self.output_name = ''
				self.project_context = ''
				self.project_name = ''
				self.set_project_defaults(os.sep, 'projects', 'bom', 'bom', 'output')        
				self.bom = Bom()
				self.bomtypes = BomType()
				self.bomtemplate = BomTemplate()
				
		def set_project_defaults(self, sep, project_folder_name, project_bom_name, project_ext,
																											output_name):
				self.platform_sep = sep
				self.output_name = output_name
				self.project_root = project_folder_name + self.platform_sep
				self.project_ext= '.' + project_ext
				self.project_path = self.project_root
				self.project_path += self.project_name + self.platform_sep
				self.output_path = self.project_root + self.project_name
				self.output_path += self.platform_sep + output_name + self.platform_sep
				self.project_context = self.project_root
				self.project_context += self.project_name + self.project_ext
		
		def create_project(self, project_name):
				self.project_name = project_name
				
				self.project_path = self.project_root + self.project_name
				self.project_path += self.platform_sep
				self.output_path = self.project_root + self.project_name
				self.output_path += self.platform_sep + self.output_name
				self.output_path += self.platform_sep
				self.project_context = self.project_root + self.project_name
				self.project_context += self.project_ext

				# parse schema
				self.bom.load(self.project_context)
				# make sure paths are available before generation
				self.bom.util_makepath(self.output_path)
						
		# MAKE MODELS
		def create_models(self):
				for model in self.bom.bom_models():
						#print 'model'
						#print model
						#print 'should'
						#print self.bom.should_generate_code(model['id'])
						if self.bom.should_generate_code(model['id']):
								key = model['id']
								output = self.bomtemplate.render_model(self.bom, key, model)
								model_name = self.bom.to_camel_cap(key,'_')
								path = self.get_full_file_path("ent", "", model_name, "", self.bom.bom_json['code_type'][0])
								self.create_file(path, output)

#-------------------------------------------------------------------------------                
class BomPlatform():
		
		def __init__(self):
				self.path_root = os.getcwd() + path_divider
				self.path_divider = path_divider
				self.template_path = self.path_root + 'templates' + path_divider
				self.project_path = self.path_root + 'projects' + path_divider
				self.template_set = ''
				self.template_set_name = ''
				self.project_name = ''
				self.source_template_set = ''
				self.source_project = ''
				self.ext_project = '.bom'
				self.ext_template_set = '.json'
				self.current_code_type = ''
				self.current_data_type = ''
				self.template_engine = None
				self.output = ''
				self.bom_type = BomType()
				self.bom_template = BomTemplate()
				self.bom_json = None
				self.init_template_engine()
						
		def parse_templates(self, template_set_name):
				path = self.template_path + template_set_name + self.path_divider
				path += 'templates' + self.ext_template_set
				data = self.get_file_contents(path)
				self.source_template_set = self.data_to_object(data)
						
		def parse_project(self, project_name):
				path = self.project_path + project_name + self.path_divider
				path += 'project' + self.ext_project
				data = self.get_file_contents(path)
				self.source_project = self.data_to_object(data)
						
		def data_to_object(self, data):
				return json.loads(data)

		def get_file_contents(self, path):
				f = open(path,'r')
				data = f.read()
				f.close()
				return data
				
		def filter_tags_obj(self, data_obj, code_type, data_type):
				data = json.dumps(data_obj)
				data = self.filter_tags(data, code_type, data_type)
				data_obj = json.loads(data)
				return data_obj

		def filter_tags(self, data, code_type, data_type):
						data = data.replace('{{ app_name }}', self.app_name)
						data = data.replace('{{ app_name_formatted }}', self.to_camel_cap(self.app_name, '_'))
						data = data.replace('{{ app_name_lower }}', self.app_name.lower())
						data = data.replace('{{ code_type }}', code_type)
						data = data.replace('{{ data_type }}', data_type)
						return data
		
		def generate_full_file(self, gen_type, type, full_file):
				#print 'full_file:'
				#print full_file
				#  {"code":"init","pattern":"", "path":"__init__", "file":"init", "ext":"{{ code_type }}", "filter":["py"]},
				code = ''
				pattern = ''
				path = ''
				file = ''
				filter = ['']
				
				obj = full_file
						
				if obj.has_key('path'):
						path = obj['path']
								
				if obj.has_key('pattern'):
						pattern = obj['pattern']
								
				if obj.has_key('ext'):
						ext = obj['ext']
								
				if obj.has_key('code'):
						code = obj['code']
								
				if obj.has_key('file'):
						file = obj['file']
						#file = path + self.path_divider + file
								
				if obj.has_key('filter'):
						filter = obj['filter']
						
				self.create_full_file(gen_type, type, file, obj)
						
		def generate_item_file(self, gen_type, type, item_file, model):
				#print 'item_file:'
				#print item_file
				#  {"code":"init","pattern":"", "path":"__init__", "file":"init", "ext":"{{ code_type }}", "filter":["py"]},
				code = ''
				pattern = ''
				path = ''
				file = ''
				filter = ['']
				
				obj = item_file
				
				if obj.has_key('path'):
						path = obj['path']
								
				if obj.has_key('pattern'):
						pattern = obj['pattern']
								
				if obj.has_key('ext'):
						ext = obj['ext']
								
				if obj.has_key('code'):
						code = obj['code']
								
				if obj.has_key('file'):
						file = obj['file']
						#file = path + self.path_divider + file
						
				if obj.has_key('filter'):
						filter = obj['filter']
				
				self.create_item_file(gen_type, type, file, obj, model)
						
		def generate(self, template_set_name, project_name):
				self.parse_templates(template_set_name)
				self.parse_project(project_name)
				self.template_set_name = template_set_name
				self.project_name = project_name
				self.bom_json = self.source_project
				
				print '#----------------------------------------------------'
				print 'template_set_name:' + template_set_name
				print 'project_name:' + project_name
				print 'code_types:'
				print self.source_template_set['code_type']
				print 'data_types:'
				print self.source_template_set['data_type']
				
				self.app_name = self.source_project['app']
				self.namespace_root = self.source_project['namespace_root']

				for data_type in self.source_project['data_type']:
						"""    
						print '#----------------------------------------------------'
						print 'data_type:' + data_type
						"""
						for code_type in self.source_project['code_type']:
								
								"""
								print '#----------------------------------------------------'
								print 'code_type:'
								print code_type
								"""
								
								self.current_code_type = code_type
								self.current_data_type = data_type
								
								for full_file in self.source_template_set['files']['data']['full']:
										full_file = self.filter_tags_obj(full_file, code_type, data_type)
										self.generate_full_file('data', data_type, full_file)
												
								"""
								for item_file in self.source_template_set['files']['data']['item']:
												for model in self.bom_models():
																item_file = self.filter_tags_obj(item_file, code_type, data_type)
																pattern = str(item_file['pattern'])
																pattern = pattern.replace('{{ model_name_formatted }}', self.to_camel_cap(model['id'], '_'))
																item_file['pattern'] = pattern
																self.generate_item_file('data', data_type, item_file, model)
								"""
								
								for full_file in self.source_template_set['files']['code']['full']:
										full_file = self.filter_tags_obj(full_file, code_type, data_type)
										self.generate_full_file('code', code_type, full_file)
												
								for item_file in self.source_template_set['files']['code']['item']:
										for model in self.bom_models():
												item_file = self.filter_tags_obj(item_file, code_type, data_type)
												pattern = str(item_file['pattern'])
												item_file['pattern'] = pattern
												self.generate_item_file('code', code_type, item_file, model)

		def init_template_engine(self):
				self.template_engine = bom_template.Engine(cache=None)
				self.output = ''
				
		def render_item_template(self, type, file, obj, model):        
				#self.context = {'bom':self, 'model':model['id'], 'model_data':model}
				self.context = {
						'bom':self,
						'app':self.app_name,
						'app_name':self.to_camel_cap(self.app_name, '_'),
						'namespace': self.namespace_root,
						'model':model['id'],
						'model_name':self.to_camel_cap(model['id'],'_'),
						'model_data':model
				}
				self.output = self.template_engine.render(file, self.context)
				return self.output

		def render_full_template(self, type, file, obj):
				#self.context = {'bom': self, 'app':self.app_name, 'app_name':self.to_camel_cap(self.app_name, '_'), 'namespace':self.namespace_root}
				self.context = {
						'bom':self,
						'app':self.app_name,
						'app_name':self.to_camel_cap(self.app_name, '_'),
						'namespace': self.namespace_root
				}
				self.output = self.template_engine.render(file, self.context)
				return self.output

		def create_full_file(self, gen_type, type, file_add, obj):
				file = self.template_path + self.template_set_name + self.path_divider
				file += gen_type + self.path_divider + type + self.path_divider + 'full' + self.path_divider + file_add + '.html'
				if os.path.exists(file):
						output = self.render_full_template(type, file, obj)
						path = self.get_full_file_path(type, obj['path'], obj['pattern'], obj['ext'])
						self.create_file(path, output)
						
		def create_item_file(self, gen_type, type, file_add, obj, model):
				#print 'obj:'
				#print obj
				file = self.template_path + self.template_set_name + self.path_divider
				file += gen_type + self.path_divider + type + self.path_divider + 'item' + self.path_divider + file_add + '.html'
				#if os.path.exists(file):
				model_id = self.to_camel_cap(model['id'], '_')
				pattern_item = obj['pattern'].replace('{{ model_name_formatted }}', model_id)
				output = self.render_item_template(type, file, obj, model)
				"""
				print 'obj:'
				print obj
				print 'obj:path:'
				print obj['path']
				print 'obj:pattern:'
				print obj['pattern']
				print 'obj:ext:'
				print obj['ext']
				"""
				path = self.get_full_file_path(type, obj['path'], pattern_item, obj['ext'])
				self.create_file(path, output)


		def create_file(self, path, data):
				f = open(path,'w')
				f.write(data)
				f.close()
						
		def get_full_file_path(self, type, folder_name, file, file_ext):
				dir = self.project_path
				dir_output = dir + self.project_name + self.path_divider + 'generated' + self.path_divider
				self.util_makepath(dir_output)
				dir_output += self.current_data_type + self.path_divider
				#if type == 'code':
				dir_output += self.current_code_type + self.path_divider
				self.util_makepath(dir_output)
				"""
				print 'dir_output: ' + dir_output
				print 'file: ' + file
				print 'file_ext: ' + file_ext
				"""
				path = ''
				if folder_name != '':
						self.util_makepath(dir_output + folder_name + self.path_divider)
						path += folder_name + self.path_divider
				path += file
				path += "." + file_ext
				
				print 'creating: ' + path
				return dir_output + path

		def bom_data(self):
				return self.source_project
						
		def bom_models(self):
				return self.bom_data()['models']
						
		def bom_model(self, name):
				for model_data in self.bom_models():
								if model_data['id'] == name:
												return model_data
				
		def bom_model_properties(self, name):
				return self.bom_model(name)['properties']
						
		#def bom_model_properties(self, name):
		#    return self.bom_model(name)['properties']
		
		def bom_model_methods(self, name):
				return self.bom_model(name)['methods']
						
		def bom_model_info(self, name):
				return self.bom_model(name)['info']
		
		def bom_model_relation(self, name):
				return self.bom_model(name)['relation']

		def bom_model_properties_recursive(self, obj, model, name, count):
				new_model = model
				if model.has_key('extends') and new_model != name and count < 10:
						inherited_model = self.bom_model(model['extends'])
						if inherited_model != None and inherited_model != '':
								obj.update(inherited_model['properties'])
								self.bom_model_properties_recursive(obj, inherited_model, name, count + 1)
				return obj
						
		def bom_model_properties_extended(self, name):
				merged_properties = {}
				for key, value in self.bom_model_properties_recursive(merged_properties, self.bom_model(name), '', 0).iteritems():
						merged_properties[key] = value
				for key, value in self.bom_model_properties(name).iteritems():
						merged_properties[key] = value
				#print 'merged_properties'
				#print merged_properties
				return merged_properties    
		
		def bom_model_property(self, name, property):
				return self.bom_model_properties(name)[property]
						
		def bom_model_property_extended(self, name, property):
				return self.bom_model_properties_extended(name)[property]
						
		def bom_model_property_extended_type(self, name, property):
				#print 'name'
				#print name
				#print 'property'
				#print property
				return self.bom_model_properties_extended(name)[property]['type']
		
		def bom_model_properties_type(self, name, property):
				return self.bom_model_properties_extended(name)[property]['type']
						
		def bom_model_properties_extended_item(self, name, method, type):
				if method.has_key('inherited'):
						name = method['inherited']
				return self.bom_model_properties_type(name, type)
		
		def bom_model_index_name(self, index, model):
				name = 'IX_' + model
				for s in index['fields']:
						name += '_' + s
				return name
		
		def bom_model_method_data_params(self, method):
				name = ''        
				if method.has_key('params'):
						for s in method['params']:
														
								if self.current_data_type == BomDataTypeEnum.DATA_POSTGRES:
										name += '_' + s
								elif self.current_data_type == BomDataTypeEnum.DATA_MYSQL:
										name += '_' + s
								else :
										name += '_' + s
				return name
		
		def bom_model_index_fields(self, model, index):
				fields = {}
				if index.has_key('inherited'):
						model = index['inherited']
				#model = self.bom_model_properties_extended(model)
				for s in index['fields']:
						#try:
						fields[s] = self.bom_type.bom_type_from_custom_type(
								self.bom_model_properties_type(model, s), "data", self.current_data_type)
						#except Exception as err:
						#		pass
						#+= bom_model_properties_type(model, s) + ' ' + s + ', '
				return fields
		
		def bom_model_code_typed_fields(self, model, index):
				fields = ''
				for s in index['fields']:
						fields += bom_model_properties_type(model, s) + ' ' + s + ', '
				return fields.rstrip(', ')
						
		def bom_method_proc_name(self, model, item, method_data):
				proc_name = 'usp_' + model + '_' + item + self.bom_model_method_data_params(method_data)
				if self.current_data_type == BomDataTypeEnum.DATA_POSTGRES:
						if(len(proc_name) > 63):
										proc_name = proc_name[0:63]
				if self.current_data_type == BomDataTypeEnum.DATA_MYSQL:
						if(len(proc_name) > 63):
								proc_name = proc_name[0:63]
				return proc_name
						
		def bom_method_code_name(self, model, item, method_data):
				method_name = self.to_camel_cap(item, '_')
				method_name += self.to_camel_cap(model, '_')
				if item == 'get' or item == 'browse':
						method_name += 'List'
				if method_data.has_key('params'):
						for param in method_data['params']:
								method_name += '' + self.to_camel_cap(param, '_')
				return method_name
		
		def bom_method_code_name_item(self, model, item, method_data):
				method_name = self.to_camel_cap(item, '_')
				method_name += self.to_camel_cap(model, '_')
				if item == 'browse':
						method_name += 'List'
				if method_data.has_key('params'):
						for param in method_data['params']:
								method_name += self.to_camel_cap(param, '_')
				return method_name   
		
		def bom_method_script_name(self, model, item, method_data):
				method_name = item
				method_name += '_' + model        
				if method_data.has_key('params'):
						for param in method_data['params']:
								if item == 'get' or item == 'browse':        
										if self.current_data_type == BomDataTypeEnum.DATA_POSTGRES:
												method_name += '_' + param      
										elif self.current_data_type == BomDataTypeEnum.DATA_MYSQL:
												method_name += '_' + param       
										else :
												method_name += '_list_' + param 
								else:                
										if self.current_data_type == BomDataTypeEnum.DATA_POSTGRES:
												method_name += '_' + param
										elif self.current_data_type == BomDataTypeEnum.DATA_MYSQL:
												method_name += '_' + param    
										else :
												method_name += '_' + param
				return method_name
		
		def bom_method_service_name(self, model, item, method_data):
				method_name = ''
				if method_data.has_key('params'):
						for param in method_data['params']:
								if item == 'get' or item == 'browse':
										method_name += '/' + param.replace('_','-')
								else:                
										method_name += '/' + param.replace('_','-')
				return method_name
					
		def bom_data_type_proc(self, name, property, method):
				date_type = self.current_data_type
				item = self.bom_model_property_extended(name, property)
				converted_type = self.bom_type.bom_type_from_custom_type(item['type'], "data", date_type)
				return converted_type
						
		def bom_data_type_proc_formatted(self, name, property, method):
				date_type = self.current_data_type
				item = self.bom_model_property_extended(name, property)
				converted_type = self.bom_type.bom_type_from_custom_type(item['type'], "data", date_type)
				if date_type == BomDataTypeEnum.DATA_MSSQL:
						if item['type'] == 'string':
								has_max = item.has_key('maximum')
								max = 50
								if has_max:
												max = item['maximum']
								converted_type += ' (' + str(max) + ')'
		
						if item.has_key('required'):
								if item['required'] == True:
										converted_type += ' '
								else:
										if item['type'] == 'datetime':
												converted_type += ' = GETDATE'
										elif item['type'] == 'bool':
												converted_type += ' = 1'
										else:
												converted_type += ' = NULL'
						else:
								converted_type += ' = NULL'
														
				elif date_type == BomDataTypeEnum.DATA_POSTGRES:
						if item['type'] == 'string':
								has_max = item.has_key('maximum')
								max = 50
								if has_max:
										max = item['maximum']
								converted_type += ' (' + str(max) + ')'
				
						if item.has_key('required'):
								if item['required'] == True: 
										if item['type'] == 'datetime':
												converted_type += ' = now()'
										elif item['type'] == 'bool':
												converted_type += ' = 1'
										else:
												converted_type += ' = NULL'
								else:
										if item['type'] == 'datetime':
												converted_type += ' = now()'
										elif item['type'] == 'bool':
												converted_type += ' = true'
										else:
												converted_type += ' = NULL'
						else:
								converted_type += ' = NULL'
												
				elif date_type == BomDataTypeEnum.DATA_MYSQL:
						if item['type'] == 'string':
								has_max = item.has_key('maximum')
								max = 50
								if has_max:
										max = item['maximum']
								converted_type += ' (' + str(max) + ')'
		
						if item.has_key('required'):
								if item['required'] == True: 
										if item['type'] == 'datetime':
												converted_type += ' '
										elif item['type'] == 'bool':
												converted_type += ' '
										else:
												converted_type += ' '
								else:
										if item['type'] == 'datetime':
												converted_type += ' '
										elif item['type'] == 'bool':
												converted_type += ' '
										else:
												converted_type += ' '
						else:
								converted_type += ' '

				# TODO add in others or switch to template    
				return converted_type
		
																		
		def bom_data_type_table_formatted(self, item):
				converted_type = self.bom_type.bom_type_from_custom_type(item['type'], "data", self.current_data_type)
				if self.current_data_type == BomDataTypeEnum.DATA_MSSQL:
						if item['type'] == 'string':
								has_max = item.has_key('maximum')
								max = 50
								if has_max:
										max = item['maximum']
								converted_type += ' (' + str(max) + ')'
						if item.has_key('required'):
								if item['required'] == True:
										converted_type += ' NOT NULL'
				elif self.current_data_type == BomDataTypeEnum.DATA_POSTGRES:
						if item['type'] == 'string':
								has_max = item.has_key('maximum')
								max = 50
								if has_max:
										max = item['maximum']
								converted_type += ' (' + str(max) + ')'
						if item.has_key('required'):
								if item['required'] == True:
										converted_type += ' NOT NULL'
				elif self.current_data_type == BomDataTypeEnum.DATA_MYSQL:
						if item['type'] == 'string':
								has_max = item.has_key('maximum')
								max = 50
								if has_max:
										max = item['maximum']
								converted_type += ' (' + str(max) + ')'
						if item.has_key('required'):
								if item['required'] == True:
										converted_type += ' '
				# TODO add in others or switch to template    
				return converted_type
		
		def bom_data_type_type_formatted(self, item):
				converted_type = self.bom_type.bom_type_from_custom_type(item['type'], "data", self.current_data_type)
				return converted_type
		
		def should_generate_data(self, name):
				return self.should_generate("data", name)
		
		def should_generate_code(self, name):
				return self.should_generate("code", name)
		
		def should_generate(self, type, name):
				for s in self.bom_model(name)['generate']:
						if s == type:
								return True
				return False
		
		def to_camel_cap(self, str, sep):
				if(str != None):
						arrstr = str.split(sep)
						i = 0
						for s in arrstr:
								s = s[0].upper() + s[1:len(s)]
								arrstr[i] = s
								i=i+1
						return "".join(arrstr)
				else :
						return str
		
		def util_makepath(self, path):

				""" creates missing directories for the given path and
								returns a normalized absolute version of the path.

				- if the given path already exists in the filesystem
						the filesystem is not modified.

				- otherwise makepath creates directories along the given path
						using the dirname() of the path. You may append
						a '/' to the path if you want it to be a directory path.
				"""
		
				from os import makedirs
				from os.path import normpath,dirname,exists,abspath

				dpath = normpath(dirname(path))
				if not exists(dpath): makedirs(dpath)
				return normpath(abspath(path))
						
		def util_project_makedirs(self, path):
				for s in self.source_project['dirs']:
						self.util_makepath(path + s)   

#-------------------------------------------------------------------------------
def init():
		
		bomplatform = BomPlatform()
		
		bomplatform.generate("templates-full-api", "profile")
		bomplatform.generate("templates-full-api", "platform")
		bomplatform.generate("templates-full-api", "gaming")
		
		# after full project completed simply regen the base layers and entities
		# on changes so you can just drop into the project

   

#-------------------------------------------------------------------------------
if __name__ == "__main__":
    init()