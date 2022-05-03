function send(){
    danhsachchon.innerHTML = document.getElementById("hoten").value;
    var p = document.getElementsByName("phai");
    for(var i = 0; i < p.length; i++){
        if(p[i].checked){
            danhsachchon.innerHTML += "("+ p[i].value + ")";
            break;
        }
    }
    danhsachchon.innerHTML += "<br> - TP yeu thich: ";
    var yt = document.getElementsByName("cacdiadiem");
    for(i=0; i < yt.length; i++){
        if(yt[i].checked){
            danhsachchon.innerHTML += yt[i].value + "| ";
        }
    }

    var best = document.getElementById("thichnhat").value;
    danhsachchon.innerHTML += "<br>" + "TP thich nhat: " + best;
}

function reset(){
    document.getElementsByName("formbinhchon").reset();
    var txt = "";
    danhsachchon.innerHTML= txt;
}

function themtp(){

    //lay ten tp muon them
    var tentp = prompt("Nhập tên thành phố muốn thêm: ");


    //them ten tp vao div checkbox
    //tim den div checkbox tp
    var checkbox = document.getElementById("checkbox");

    //tao element checkbox_tp cho div
    var checkbox_tp = document.createElement("input");
    checkbox_tp.class = "checkbox"; 
    checkbox_tp.type = "checkbox";
    checkbox_tp.name = "cacdiadiem";
    checkbox_tp.id = tentp;
    checkbox_tp.value = tentp;

    //tao element label cho checkbox trong div
    var label = document.createElement("label");
    //gan id tp vao label
    label.htmlFor = "tentp";

    //gan noi dung cho label vua tao
    label.appendChild(document.createTextNode(tentp));

    //gan checkbox va label vao div
    checkbox.appendChild(checkbox_tp);
    checkbox.appendChild(label);


    //them ten tp vao option
    var option = document.getElementById("thichnhat");
    var option_tp = document.createElement("option");
    option_tp.text = tentp;
    option.add(option_tp);


}