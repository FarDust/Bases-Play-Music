function fullyload(){
  var ia = document.getElementById('integrantes-a');
  var ir = document.getElementById('integrates-r');
  var disc = document.getElementById('discs');
  var textArea = iframe.contentDocument.getElementById("result");
  console.log(textArea);
  if (textArea){
    var array = JSON.parse(textArea.innerHTML);
    console.log(array);

    for (key in array['r_members']){
      var t = document.createTextNode(array[key]);
      var node = document.createElement("li");
      node.appendChild(t);
      ir.appendChild(node);
    }
  }
}
