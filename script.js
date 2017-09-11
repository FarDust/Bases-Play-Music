table = document.getElementById("display");
iframe = document.getElementById("response");
window.addEventListener('scroll',scrolling);
iframe.onload = fullyload;
var topy = document.getElementsByClassName("topbar")[0].style["margin-top"]

function scrolling(){
  logo = document.getElementsByClassName("BasesPlayMusic-container")[0].style
  menu = document.getElementsByClassName("topbar")[0].style
  if (window.pageYOffset <= 56){
    logo.display = "inherit";
    logo.top = "0";
    menu["margin-top"] = topy;
  } else if (window.pageYOffset > 56){
    logo.display = "none";
    logo.top = "inherit";
    menu["margin-top"] = "0";
  }
}


function printTable(tabla,printable){
  for (i=0; i < printable.length ; i++){
    tabla.insertRow();
    if (i==0){
      tabla.insertRow();
    }
    var j = 0;
    for(var key in printable[i]) {
        if (i == 0){
          var t = document.createTextNode(key);
          var node = document.createElement("TH");
          node.appendChild(t);
          tabla.rows[i].appendChild(node);
        }
        var t = document.createTextNode(printable[i][key]);
        tabla.rows[i+1].insertCell();
        tabla.rows[i+1].cells[j].appendChild(t);
        j +=1;
    }
  }
}

function fullyload(){
  deleteTable(table);
  var textArea = iframe.contentDocument.getElementById("result");
  console.log(textArea);
  if (textArea){
    var array = JSON.parse(textArea.innerHTML);
    console.log(array);
    if (array.length > 0){
        printTable(table,array);
    }
  }
}

function deleteTable(tabla){
  var largo = tabla.rows.length;
  for (i=0; i < largo; i++){
    tabla.deleteRow(largo-1-i);
  }
}
