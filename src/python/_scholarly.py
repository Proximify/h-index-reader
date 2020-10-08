import sys
from scholarly import scholarly

argv = sys.argv

if len(argv) == 0:
    print('Invalid argument. Name required.')

name = argv[1]

# Retrieve the author's data, fill-in, and print
search_query = scholarly.search_author(name)
author = next(search_query).fill()
indices = author.fill(sections=['indices'])

print(indices.hindex)