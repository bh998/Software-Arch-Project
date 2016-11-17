function Mailbox_Layer(){
    api_key = "a0ff63e9b87c14ed19ce2aa1617c077d";
}

Mailbox_Layer.prototype =
{
    checkEmail: function(email){
           
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "https://apilayer.net/api/check?access_key=" + api_key + "&email=" + email,   false);
	xhr.send();
	var obj = JSON.parse(xhr.responseText);
	 
	return obj.format_valid;
    }
};
    
