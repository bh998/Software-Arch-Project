function Tradier_API(){
    quotes_api_key = "Bearer tWdm17yrcbQKaPQzrLQ5iqcKnxda";
}

Tradier_API.prototype = {
    getStock: function(stock){
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "https://sandbox.tradier.com/v1/markets/quotes?symbols=" + stock, false);
        xhr.setRequestHeader("Authorization", quotes_api_key);
        xhr.setRequestHeader("Accept", "application/json");
        xhr.send();

        var obj = JSON.parse(xhr.responseText);
        return obj;
    }
}
