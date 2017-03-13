var title = document.getElementById("title").innerHTML;
var para = document.getElementById("para").innerHTML;

var btn = document.getElementById("post").onclick = function(){
	console.log(title,para);
	post('post_data.php', {t: title,p : para});
}
console.log("end");
function post(path, params) {
    method = "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
	form.setAttribute("target", "_blank");

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);
			
            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}

