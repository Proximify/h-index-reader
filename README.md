-   [Table of contents](docs/toc.md)
 
# h-index-reader

h-index-reader is a module that allows you to retrieve author's h-index information from different sources including Google Scholar.

h-index-reader is a module that allows you to retrieve author's h-index information from different sources including Google Scholar.

# What is h-index?

According to Wikipedia, "The h-index is an author-level metric that measures both the productivity and citation impact of the publications of a scientist or scholar. The h-index correlates with obvious success indicators such as winning the Nobel Prize, being accepted for research fellowships and holding positions at top universities."

# Problem

Accessing h-index information of an author programmatically is not convenient since there is no API to fetch that information from scholarly databases such as Google Scholar and SCOPUS. There have been some attempts to overcome this problem by scraping author's web profiles (e.g. Google Scholar profile). However, this is not always a guaranteed way getting indicies (e.g. h-index, h-index5y, i-10index etc.) since Google and other providers block the access of web crawlers.

# Solution

h-index-reader provides a reliable way of accessing h-index information of an author by using multiple different information sources and libraries.

# Getting Started

h-index-reader both offers an API and a CLI to fetch indices of author(s). 


## Requirements 

h-index-reader requires both Python 3 or later and pip3 in your system.

## Installation
<pre>
    composer require proximify/h-index-reader
</pre>

# API 

h-index-reader provides an API to provide indices of an author from different sources.  The reader uses Google Scholar by default as the data source.

<pre>
    $hindexReader = new HIndexReader();
</pre>

The h-index of authors can be fetched by providing name and/or affiliation of a person as well as Google Scholar profile URL. Name field is mandatory, however affiliation and profile URL are optional.

<pre>
$people = [
    [
        'name' => 'Diego Macrini',
        'affiliation' => 'Research Fellow, Proximify',
        'profile_url' => 'https://scholar.google.com/citations?user=avUYKIgAAAAJ'
    ],
    [
        'name' => 'Sven Dickinson',
        'affiliation' => 'University of Toronto'
    ]
];

$result = $hindexReader->queryHIndex($people);
</pre>

Output:

<pre>
[
  {
    "id": "avUYKIgAAAAJ",
    "name": "Diego Macrini",
    "affiliation": "Research Fellow, Proximify",
    "hindex": 11,
    "hindex5y": 9,
    "i10index": 12,
    "i10index5y": 9
  },
  {
    "id": "6TGwETYAAAAJ",
    "name": "Sven Dickinson",
    "affiliation": "Professor of Computer Science, University of Toronto",
    "hindex": 43,
    "hindex5y": 23,
    "i10index": 91,
    "i10index5y": 44
  }
]
</pre>

# Settings
h-index-reader provides a [settings file](settings/HIndexReader.json) where you can configure advanced options. Here's the list settings supported in the current version:

| Setting        | Description           |
| ------------- |:-------------:|
| people      | List of people to fetch h-indices. A sample can be found [here](dev/dummyData.json). |


