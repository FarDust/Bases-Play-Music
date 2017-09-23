var doc= document.querySelector('link[id="sql"]').import;
var table = document.getElementById("tables");
var tables = doc.body.innerHTML.split("SELECT * FROM ").slice(1);

for (var i = 0; i < tables.length; i++){
  current = tables[i].replace(/(\r\n|\n|\r)/gm,"").replace(";","");
  option = document.createElement("OPTION");
  option.value = i;
  option.innerHTML = current;
  table.appendChild(option);
}
