
function pretty(obj,htmlElement){

	for (var key in obj){
			var child = document.createElement('DIV');
			child.className  = "container"
			var text = document.createTextNode(key+ ": ");
			var inner = document.createElement('SPAN');
			inner.className  = "light"
			inner.appendChild(document.createTextNode(obj[key]))
			child.appendChild(text);
			child.appendChild(inner);
			htmlElement.appendChild(child);
	}
}
