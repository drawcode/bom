import ent
from ent import *

import BaseGamingAPI
from BaseGamingAPI import *

import GamingACT
from GamingACT import *

class GamingAPI(BaseGamingAPI) :

    def __init__(self):
        super(GamingAPI, self).__init__()
        self.act = GamingACT()
        
    # CUSTOM API CODE GOES HERE
    
    