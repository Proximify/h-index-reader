# h-index-reader

h-index-reader is a module that allows you to retrieve author's h-index information from different sources including Google Scholar.

-   [Table of contents](docs/toc.md)
 
## What is h-index?

According to Wikipedia, "The h-index is an author-level metric that measures both the productivity and citation impact of the publications of a scientist or scholar. The h-index correlates with obvious success indicators such as winning the Nobel Prize, being accepted for research fellowships and holding positions at top universities."

## Problem

Accessing h-index information of an author programmatically is not convenient since there is no API to fetch that information from scholarly databases such as Google Scholar and SCOPUS. There have been some attempts to overcome this problem by scraping author's web profiles (e.g. Google Scholar profile). However, this is not always a guaranteed way getting indicies (e.g. h-index, h-index5y, i-10index etc.) since Google and other providers block the access of web crawlers.

## Solution

h-index-reader provides a reliable way of accessing h-index information of an author by using multiple different information sources and libraries.

## Getting Started

h-index-reader both offers an API and a CLI to fetch indices of author(s). 


### Requirements 

h-index-reader requires both Python 3 or later and pip3 in your system.

### Installation

You can both use composer require and composer create-project to install h-index-reader, but the requirements are different for the first option.

h-index-reader creates an isolated environment for its Python packages so it doesn't mess up with the other packages in your system. When you create a project with following option, the scripts creates an isolated virtual environment automatically:

<pre>
    composer require proximify/h-index-reader
</pre>

However, if you add h-index-reader as a requirement for your project (i.e. using composer require), you have to create the virtual environment manually inside of the package, activate it and then install all the required Python packages:

- Create the virtual environment:

<pre>
python3 -m venv src/python3/_scholarly
</pre>

- Activate it:
<pre>
source src/python3/_scholarly/bin/activate
</pre>

- Install the package:

<pre>
pip3 install scholarly
</pre>

- Deactivate venv:

<pre>
deactivate
</pre>

## API 

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

## Settings
h-index-reader provides a [settings file](settings/HIndexReader.json) where you can configure advanced options. Here's the list settings supported in the current version:

| Setting        | Description           |
| ------------- |:-------------:|
| people      | List of people to fetch h-indices. A sample can be found [here](docs/dummyData.json). |


## Testing
h-index-reader both offers a CLI and a web interface for testing.

CLI:

<pre>
composer query-h-index
</pre>

You can also use the web interface for testing under the dev folder:

<pre>
cd h-index-reader/dev/www && php -S localhost:8000
</pre>

**Note:** Please set the correct path for the autoloader.php under the dev/www/api/index.php. Otherwise, 
the test script will fail.

## Future Work
We are planning to add more sources (Scopus, WebofScience) to fetch h-indices in the near future.

## Contributing

This project welcomes contributions and suggestions. Most contributions require you to agree to a Contributor License Agreement (CLA) declaring that you have the right to and actually do, grant us the rights to use your contribution. For details, visit our [Contributor License Agreement](https://github.com/Proximify/community/blob/master/docs/proximify-contribution-license-agreement.pdf).

When you submit a pull request, we will determine whether you need to provide a CLA and decorate the PR appropriately (e.g., label, comment). Simply follow the instructions provided. You will only need to do this once across all repos using our CLA.

This project has adopted the [Proximify Open Source Code of Conduct](https://github.com/Proximify/community/blob/master/docs/code_of_conduct.md). For more information see the Code of Conduct FAQ or contact support@proximify.com with any additional questions or comments.

## License

Copyright (c) Proximify Inc. All rights reserved.

Licensed under the [MIT](https://opensource.org/licenses/MIT) license.

**h-index-reader** is made by [Proximify](https://proximify.com). We invite the community to participate.