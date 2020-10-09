import argparse
from scholarly import scholarly, ProxyGenerator

# pg = ProxyGen erator()
# pg.FreeProxies()
# scholarly.use_proxy(pg)

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
    print(author)
elif args.id:
    _id = args.id
    author = scholarly.search_author_id(_id)
    author = author.fill(sections=['indices'])
    print(author)