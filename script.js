table = document.getElementById("display");
iframe = document.getElementById("response");
window.addEventListener('scroll',scrolling);
iframe.onload = fullyload;
var topy = document.getElementsByClassName("topbar")[0].style["margin-top"]

function scrolling(){
  logo = document.getElementsByClassName("BasesPlayMusic-container")[0].style
  menu = document.getElementsByClassName("topbar")[0].style
  sidebar = document.getElementById("lateral-menu").style
  if (window.pageYOffset <= 56){
    logo.display = "inherit";
    logo.top = "0";
    menu["margin-top"] = topy;
    sidebar["margin-top"] = topy;
  } else if (window.pageYOffset > 56){
    logo.display = "none";
    logo.top = "inherit";
    menu["margin-top"] = "0";
    sidebar["margin-top"] = "0";
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
  var viewArea = document.getElementsByClassName("table")[0];
  console.log(textArea);
  if (textArea){
    var array = JSON.parse(textArea.innerHTML);
    console.log(array);
    if (array.length > 0){
        printTable(table,array);
        viewArea.style.display = "table"
    }else{
      viewArea.style.display = "none"
    }
  }
}

function deleteTable(tabla){
  var largo = tabla.rows.length;
  for (i=0; i < largo; i++){
    tabla.deleteRow(largo-1-i);
  }
}

function example_condition(tuple){
  var param = "id";
  if (tuple[param] == 1){
    return true
  }else{
    return false
  }
}

function select(input, condition){
  /*condition must be a function*/
  var output = new Array();
  for (var i=0; i < input.length; i++){
    var aux = new Object();
    if (condition(input[i])){
      for (key in input[i]){
          aux[key] =  output[i][key];
      }
    }
    output[i] = aux;
  }
  return output;
}

function join(js1, js2, join_parameter, atributes) {
  /*join_parameters must be an a array of length 2*/
  var help = new Object();
  for (var i = 0; i < atributes.length; i++){
    help[atributes[i]] = i
  }
  var result = new Array();
  cursor = 0;
  for (var i = 0; i < js1.length; i++){
    for (var j=0; j < js2.length; j++){
      if (js1[i][join_parameter[0]] == js2[j][join_parameter[1]]){
        var aux = new Object();
        for (var key in js1[i]){
          if (atributes.length > 0){
            if (key in help){
              aux[key] = js1[i][key];
            }
          } else {
            aux[key] = js1[i][key];
          }
        }
        for (var key in js2[j]){
          if (atributes.length > 0){
            if (key in help){
              aux[key] = js2[j][key];
            }
          } else {
            aux[key] = js2[j][key];
          }
        }
        result[cursor] = aux;
        cursor++;
      }
    }
  }
  return result
}
