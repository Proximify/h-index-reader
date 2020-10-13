#/usr/bin/python
import argparse
from scholarly import scholarly
import json

parser = argparse.ArgumentParser()
parser.add_argument("--q", help="Searches for an author by given query and returns his h-index")
parser.add_argument("--id", help="Finds h-index of an author by his Google Scholar ID")
# parser.add_argument("--proxy", help="Finds h-index of an author by his Google Scholar ID")
args = parser.parse_args()

if args.q:
    #Retrieve the author's data, fill-in, and print
    q = args.q
    search_query = scholarly.search_author(q)
    author = next(search_query).fill(sections=['indices'])
elif args.id:
    _id = args.id
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