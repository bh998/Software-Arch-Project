function Financial_API(){
    //the sources array contains the list of related news sites that can be used
    sources = ["the-wall-street-journal", "financial-times", "business-insider", "fortune"]
    source = sources[1];
    api_key = "b8bd0d5fcb8941b9b528a71f83f8302f";
}

Financial_API.prototype = {

    getNews: function(){
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "https://newsapi.org/v1/articles?apiKey=" + api_key + "&source=" + source, false);
        xhr.send();
        return JSON.parse(xhr.responseText);
    }
}
