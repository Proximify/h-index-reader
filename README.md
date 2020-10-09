# h-index-reader

h-index-reader is a module that allows you to retrieve author's h-index information from different sources including Google Scholar.

# What is h-index?

According to Wikipedia, "The h-index is an author-level metric that measures both the productivity and citation impact of the publications of a scientist or scholar. The h-index correlates with obvious success indicators such as winning the Nobel Prize, being accepted for research fellowships and holding positions at top universities."

# Problem

Accessing h-index information of an author programmatically is not convenient since there is no API to fetch that information from scholarly databases such as Google Scholar and SCOPUS. There have been some attempts to overcome this problem by scraping author's web profiles (e.g. Google Scholar profile). However, this is not always a guaranteed way getting indicies (e.g. h-index, h-index5y, i-10index etc.) since Google and other providers block the access of web crawlers.

# Solution

h-index-reader provides a reliable way of accessing h-index information of an author by using multiple different information sources and libraries. Besides, it offers an option to use proxies so that information providers cannot block the bots.

# Get Started

h-index-reader both offers an API and a CLI to fetch indices of author(s). 

## Installation
<pre>
    composer require proximify/h-index-reader
</pre>

# API 

h-index-reader provides an API to provide indices of an author from different sources.  The reader uses Google Scholar by default as the data source.

<pre>
    $hindexReader = new HindexReader();
</pre>


The h-index of an author can be fetched in two ways (i) by providing name and affiliation of a persion (ii) author ID (i.e. Google Scholar ID).

Fetching an author's indices with his name and affiliation:

<pre>
    $hindexReader->queryHIndex('Marty Banks, Berkeley');
</pre>

Result:

<pre>
    {
        'affiliation': 'Professor of Vision Science, UC Berkeley',
        'citedby': 20953,
        'citedby5y': 8126,
        'filled': False,
        'hindex': 67,
        'hindex5y': 40,
        'i10index': 153,
        'i10index5y': 106,
        'id': 'Smr99uEAAAAJ',
        'interests': ['vision science', 'psychology', 'human factors', 'neuroscience'],
        'name': 'Martin Banks'
    }
</pre>

It is also possible to use author's profile ID to get his indices: 

<pre>
    $hindexReader->getHIndexByAuthorId('avUYKIgAAAAJ');
</pre>

<pre>
    {   
        'affiliation': 'Research Fellow, Proximify',
        'citedby': 968,
        'citedby5y': 328,
        'filled': False,
        'hindex': 11,
        'hindex5y': 9,
        'i10index': 12,
        'i10index5y': 9,
        'id': 'avUYKIgAAAAJ',
        'interests': ['computer vision',
               'social networking',
               'ehealth',
               'video surveillance',
               'shape matching'],
         'name': 'Diego Macrini'
    }
</pre>

It is also possible to fetch in a batch. To do that, you must set the batchFilePath in config.json under the settings as well as the output batchOutputFilePath. An example input batch file is shown below:

<pre>
[
    {
        "affiliation": "Research Fellow, Proximify",
        "name": "Diego Macrini",
        "id": "avUYKIgAAAAJ"
    },
    {
        "affiliation": "Mannheim University",
        "name": "Martin Weber",
        "id": "SDlCXgwAAAAJ"
    },
    {
        "affiliation": "Software Developer - Researcher",
        "name": "Seyed M. Mirtaheri",
        "id": "fw9tblsAAAAJ"
    },
    {
        "affiliation": "University of Ottawa (Computer Science)",
        "name": "Diana Inkpen",
        "id": "66pwIBcAAAAJ"
    }
]
</pre>

ID and affiliation fields are optional and name is field is mandory. An example output is shown below:

<pre>
[
   {
      "affiliation":"Research Fellow, Proximify",
      "citedby":968,
      "citedby5y":328,
      "email":"@proximify.ca",
      "filled":"False",
      "hindex":11,
      "hindex5y":9,
      "i10index":12,
      "i10index5y":9,
      "id":"avUYKIgAAAAJ",
      "interests":[
         "computer vision",
         "social networking",
         "ehealth",
         "video surveillance",
         "shape matching"
      ],
      "name":"Diego Macrini",
      "url_picture":"https://scholar.google.com/citations?view_op=medium_photo&user=avUYKIgAAAAJ"
   },
   {
      "affiliation":"Mannheim University",
      "citedby":23158,
      "citedby5y":8851,
      "email":"@bank.bwl.uni-mannheim.de",
      "filled":"False",
      "hindex":68,
      "hindex5y":48,
      "i10index":170,
      "i10index5y":104,
      "id":"SDlCXgwAAAAJ",
      "interests":[
         "Martin Weber"
      ],
      "name":"Martin Weber",
      "url_picture":"https://scholar.google.com/citations?view_op=medium_photo&user=SDlCXgwAAAAJ"
   },
   {
      "affiliation":"Software Developer - Researcher",
      "citedby":193,
      "citedby5y":123,
      "email":"@uottawa.ca",
      "filled":"False",
      "hindex":6,
      "hindex5y":6,
      "i10index":5,
      "i10index5y":4,
      "id":"fw9tblsAAAAJ",
      "interests":[
         "Parallel Processing",
         "Message Passing",
         "Distributed Systems",
         "Web Crawling",
         "Rich Internet Applications"
      ],
      "name":"Seyed M. Mirtaheri",
      "url_picture":"https://scholar.google.com/citations?view_op=medium_photo&user=fw9tblsAAAAJ"
   },
   {
      "affiliation":"University of Ottawa (Computer Science)",
      "citedby":5802,
      "citedby5y":3756,
      "email":"@site.uottawa.ca",
      "filled":"False",
      "hindex":35,
      "hindex5y":28,
      "i10index":91,
      "i10index5y":67,
      "id":"66pwIBcAAAAJ",
      "interests":[
         "Natural Language Processing",
         "Computational Linguistics",
         "Information Retrieval"
      ],
      "name":"Diana Inkpen",
      "url_picture":"https://scholar.google.com/citations?view_op=medium_photo&user=66pwIBcAAAAJ"
   }
]
</pre>