import ent
from ent import *

import BasePlatformAPI
from BasePlatformAPI import *

import PlatformACT
from PlatformACT import *

class PlatformAPI(BasePlatformAPI) :

  def __init__(self):
    super(PlatformAPI, self).__init__()
    self.act = PlatformACT()
      
  # CUSTOM API CODE GOES HERE
    
    