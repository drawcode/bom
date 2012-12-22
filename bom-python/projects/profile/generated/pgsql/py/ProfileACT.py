import ent
from ent import *

import BaseProfileACT
from BaseProfileACT import *

import ProfileData
from ProfileData import *

class ProfileACT(BaseProfileACT) :

  def __init__(self):
    super(ProfileACT, self).__init__()
    self.data = ProfileData()
      
  # CUSTOM ACT CODE GOES HERE
    
    