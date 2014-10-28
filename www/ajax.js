function createRequestObject() {
var req;
if(window.XMLHttpRequest){
req = new XMLHttpRequest();
} else if(window.ActiveXObject) {
req = new ActiveXObject("Microsoft.XMLHTTP");
} else {
alert('Problem creating the XMLHttpRequest object');
}
return req;
}
var http = createRequestObject();
function getpoll(pid) {
http.open('post', 'poll/fetch.php?action=showpoll&id='+pid);
document.getElementById("text").innerHTML = "Please wait";
http.onreadystatechange = handleResponse;
http.send(null);
}
  
function begen(j){
window.self.document.getElementById("option").value=j;
}

function fetch(pid){
var op=encodeURI(document.getElementById("option").value);
http.open('post', 'poll/fetch.php?action=post_result&id='+pid+'&option='+op);
http.onreadystatechange = handleResponse;
http.send(null);
}


function result(pid){
http.open('post', 'poll/fetch.php?action=see_result&id='+pid);
http.onreadystatechange = handleResponse;
http.send(null);
}


function handleResponse() {
if(http.readyState == 4 && http.status == 200){
var response = http.responseText;
if(response) {
document.getElementById("text").innerHTML = response;
}
}
}
