import ent
from ent import *

import BaseProfileAPI
from BaseProfileAPI import *

import ProfileACT
from ProfileACT import *

class ProfileAPI(BaseProfileAPI) :

  def __init__(self):
    super(ProfileAPI, self).__init__()
    self.act = ProfileACT()
      
  # CUSTOM API CODE GOES HERE
    
    