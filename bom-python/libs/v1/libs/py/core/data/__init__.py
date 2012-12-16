
class SearchFilter(object) :
    
    def __init__(self):
        self.page = 1
        self.page_size = 10
        self.sort = 'date_modified'
        self.filter = ''