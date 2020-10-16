#/usr/bin/python
import json, sys
from scholarly import scholarly

_id = sys.argv[1]
author = scholarly.search_author_id(_id)
author = author.fill(sections=['indices'])

if author:
    _dict = {
        'id': author.id, 
        'name': author.name,
        'affiliation': author.affiliation,
        'hindex': author.hindex,
        'hindex5y': author.hindex5y,
        'i10index': author.i10index,
        'i10index5y': author.i10index5y,
    }
    print(json.dumps(_dict))