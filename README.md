# h-index-reader

h-index-reader is a module that allows you to retrieve author's h-index information from different sources including Google Scholar.

# What is h-index?

According to Wikipedia, "The h-index is an author-level metric that measures both the productivity and citation impact of the publications of a scientist or scholar. The h-index correlates with obvious success indicators such as winning the Nobel Prize, being accepted for research fellowships and holding positions at top universities."

# Problem

Accessing h-index information of an author programmatically is not convenient since there is no API to fetch that information from scholarly databases such as Google Scholar and SCOPUS. There have been some attempts to overcome this problem by scraping author's web profiles (e.g. Google Scholar profile). However, this is not always a guaranteed way getting indicies (e.g. h-index, h-index5y, i-10index etc.) since Google and other providers block the access of web crawlers.

# Solution

h-index-reader provides a reliable way of accessing h-index information of an author by using multiple different information sources and libraries. Besides, it offers an option to use proxies so that information providers cannot block the bots.

# Getting Started

h-index-reader both offers an API and a CLI to fetch indices of author(s). 

## Installation
<pre>
    composer require proximify/h-index-reader
</pre>

# API 

h-index-reader provides an API to provide indices of an author from different sources.  The reader uses Google Scholar by default as the data source.

<pre>
    $hindexReader = new HIndexReader();
</pre>

The h-index of an author can be fetched in two ways (i) by providing name and affiliation of a person (ii) author ID (i.e. Google Scholar ID).

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