<html>
<head>

<link rel="stylesheet" href="../../Libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../../Libraries/jquery-3.1.1.js"></script>
<script src="../../Libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../../JS/Classes/Financial_API.js"></script>

</head>

<body>
<?php
require_once("../Controllers/print_menu.php");
print_menu();
?>

<h3>Financial News!</h3>
<h4>*news from The Wall Street Journal*</h4><br>
<p id="articles"></p>

<script>
    //call to the financial api class that gets the news info
    var financial = new Financial_API();
    var obj = financial.getNews();
    var article_num = 5; //specifies the number of articles to grab
    var pic_height = "300px";
    var pic_width = "500px";

    //formatting, needs to be updated
    var x = 0;
    while(x < article_num){
        var para = document.createElement("p");
        var link = document.createElement("a");
        var image = document.createElement("img");
        image.src = obj.articles[x].urlToImage;
        image.style = "width:" + pic_width + ";height:" + pic_height;
        link.href = obj.articles[x].url;
        link.appendChild(image);
        para.appendChild(document.createTextNode("Author: " + obj.articles[x].author));
        para.appendChild(document.createElement("br"));
	para.appendChild(document.createTextNode("Title: " + obj.articles[x].title));
        para.appendChild(document.createElement("br"));
        para.appendChild(document.createTextNode("Description: " + obj.articles[x].description));
        para.appendChild(document.createElement("br"));
        para.appendChild(document.createTextNode("Published: " + obj.articles[x].publishedAt));
        para.appendChild(document.createElement("br"));
        para.appendChild(link);
        para.appendChild(document.createElement("br"));
        para.appendChild(document.createTextNode("*click picture to go to full article*"));
	document.getElementById("articles").appendChild(para);
        para.appendChild(document.createElement("br"));
        para.appendChild(document.createElement("br"));
        x++;
    }
</script>

</body>

</html>
