#/usr/bin/python
import json, sys
from scholarly import scholarly

q = sys.argv[1]
search_query = scholarly.search_author(q)
author = next(search_query).fill(sections=['indices'])

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