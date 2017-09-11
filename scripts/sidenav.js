function openNav(){
  if($(window).width() > 600){
    document.getElementById("lateral-menu").style.width = "170px";
    //document.getElementById("right-arrow").style["margin-left"] = "25%";
    document.getElementById("main").style["margin-left"] = "170px";
  }else{
    document.getElementById("lateral-menu").style.width = "75%";
    //document.getElementById("right-arrow").style["margin-left"] = "75%";
    document.getElementById("main").style["margin-left"] = "75%";
  }
  console.log(document.getElementById("lateral-menu").clientWidth);
}

function closeNav(){
  document.getElementById("lateral-menu").style.width = "0%";
  document.getElementById("right-arrow").style["margin-left"] = "0";
  document.getElementById("main").style["margin-left"] = "0";
}
