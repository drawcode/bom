import math
import BaseEntity
from BaseEntity import *

class GameStatisticLeaderboardResult(object):
  
  def __init__(self):
    self.page = 1
    self.page_size = 10
    self.total_rows = 0
    self.total_pages = int(math.ceil(self.total_rows / self.page_size))
    self.data = []
        
  def to_dict_obj(self):
    return self.to_dict(self)
      
  def to_dict(self, obj, classkey=None):
    if isinstance(obj, dict):
      for k in obj.keys():
        obj[k] = self.to_dict(obj[k], classkey)
      return obj
    elif hasattr(obj, "__iter__"):
      return [self.to_dict(v, classkey) for v in obj]
    elif hasattr(obj, "__dict__"):
      data = dict([(key, self.to_dict(value, classkey)) 
        for key, value in obj.__dict__.iteritems() 
        if not callable(value) and not key.startswith('_')])
      if classkey is not None and hasattr(obj, "__class__"):
        data[classkey] = obj.__class__.__name__
      return data
    else:
      return obj
            
  def from_dict(self, d):
    if isinstance(d, dict):
      n = {}
      for item in d:
        if isinstance(d[item], dict):
          n[item] = self.to_obj(d[item])
        elif isinstance(d[item], (list, tuple)):
          n[item] = [self.to_obj(elem) for elem in d[item]]
        else:
          n[item] = d[item]
      return type('obj_from_dict', (object,), n)
    else:
      return d
            
  def dict_to_obj(self, d):
    if isinstance(d, list):
      d = [self.dict_to_obj(x) for x in d]
    if not isinstance(d, dict):
      return d
    class C(object):
       pass
    o = C()
    for k in d:
      o.__dict__[k] = self.dict_to_obj(d[k])
    return o    
        
class GameStatisticLeaderboard(BaseEntity):

  def __init__(self):
    super(GameStatisticLeaderboard, self).__init__()
    #self.__dict__.update(entries)
    self.username = None
    self.rank_change = None
    self.network = None
    self.timestamp = None
    self.level = None
    self.stat_value_formatted = None
    self.profile_id = None
    self.rank_total_count = None
    self.rank = None
    self.key = None
    self.type = None
    self.game_id = None
    self.data = None
    self.stat_value = None
        
  def to_dict_obj(self):
    return self.to_dict(self)
      
  def to_dict(self, obj, classkey=None):
    if isinstance(obj, dict):
      for k in obj.keys():
        obj[k] = self.to_dict(obj[k], classkey)
      return obj
    elif hasattr(obj, "__iter__"):
      return [self.to_dict(v, classkey) for v in obj]
    elif hasattr(obj, "__dict__"):
      data = dict([(key, self.to_dict(value, classkey)) 
        for key, value in obj.__dict__.iteritems() 
        if not callable(value) and not key.startswith('_')])
      if classkey is not None and hasattr(obj, "__class__"):
        data[classkey] = obj.__class__.__name__
      return data
    else:
      return obj
            
  def from_dict(self, d):
    if isinstance(d, dict):
      n = {}
      for item in d:
        if isinstance(d[item], dict):
          n[item] = self.to_obj(d[item])
        elif isinstance(d[item], (list, tuple)):
          n[item] = [self.to_obj(elem) for elem in d[item]]
        else:
          n[item] = d[item]
      return type('obj_from_dict', (object,), n)
    else:
      return d
            
  def dict_to_obj(self, d):
    if isinstance(d, list):
      d = [self.dict_to_obj(x) for x in d]
    if not isinstance(d, dict):
      return d
    class C(object):
       pass
    o = C()
    for k in d:
      o.__dict__[k] = self.dict_to_obj(d[k])
    return o







