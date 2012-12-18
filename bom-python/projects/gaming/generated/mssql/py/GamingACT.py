import ent
from ent import *

import BaseGamingACT
from BaseGamingACT import *

import GamingData
from GamingData import *

class GamingACT(BaseGamingACT) :

    def __init__(self):
        super(GamingACT, self).__init__()
        self.data = GamingData()
        
    # CUSTOM ACT CODE GOES HERE
    
    