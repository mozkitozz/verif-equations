var num_paragraph = 1


function copyPara(){
    num_paragraph = num_paragraph + 1;
    var string_para = "paragraph-" + num_paragraph;
    var para_prec = (num_paragraph-1)
    var string_para_prec = "paragraph-" + para_prec;
    var query_para = "row row-master-contenu-cours fadein paragraph-" + num_paragraph;
    var para = document.getElementById(string_para_prec).cloneNode(true);
    para.id = string_para;
    para.className = query_para;
    document.getElementById("main").appendChild(para);
    modifButton(string_para_prec, para_prec);
    
}
function replaceInput(para_prec){
    var sous_titre = document.querySelector(".paragraph-" + para_prec + " input").value;
    var contenue = document.querySelector(".paragraph-" + para_prec + " textarea").value;

    document.querySelector(".paragraph-" + para_prec + " .div-input-sous-titre").style.display = "none";
    document.querySelector(".paragraph-" + para_prec + " textarea").style.display = "none";

    var h3 = document.createElement("h3");
    h3.innerHTML = sous_titre;
    h3.style.width = "100%";
    h3.style.color = "#2bbbad";
    h3.style.textDecoration = "underline";
    h3.style.wordBreak = "break-word";

    var p = document.createElement("p");
    p.innerHTML = contenue;
    p.style.width = "100%";
    p.style.border = "1px solid #2bbbad"
    p.style.padding = "10px";
    p.style.wordBreak = "break-word";

    document.querySelector(".paragraph-" + para_prec + " .cours-text-area").appendChild(p);
    document.querySelector(".paragraph-" + para_prec + " .div-sous-titre").appendChild(h3);


}

function disable(){
    alert('fonctionnalité non implémenté !')
}


function modifButton(string_para_prec, para_prec){
    document.querySelector("."+ string_para_prec + " .add").id = "modif-" + string_para_prec;
    document.querySelector("."+ string_para_prec + " .add").setAttribute('onclick', 'modifPara(this.id)');
    document.querySelector("."+ string_para_prec + " .add i").innerHTML = "edit";
    document.querySelector("."+ string_para_prec + " .add").className ="btn-floating btn-large waves-effect waves-light blue modif";
    document.querySelector("."+ string_para_prec + " .add-div-" + para_prec).className = "col s6 modif-div-" + para_prec;
    document.querySelector(".paragraph-"+ num_paragraph + " .add-div-" + para_prec).className = "col s6 add-div-" + num_paragraph;
    document.getElementById("add-paragraph-"+ para_prec).id = "add-paragraph-"+ num_paragraph; 
    var div = document.querySelector(".paragraph-"+ num_paragraph + " .add .waves-ripple");
    div.parentNode.removeChild(div);
    document.querySelector(".paragraph-" + num_paragraph + " .input-sous-titre-" + para_prec).id = "input-sous-titre-" + num_paragraph;
    document.querySelector(".paragraph-" + num_paragraph + " .input-sous-titre-" + para_prec).value = "";
    document.querySelector(".paragraph-" + num_paragraph + " .input-sous-titre-" + para_prec).className = "validate input-sous-titre-" + num_paragraph;
    document.querySelector(".paragraph-" + num_paragraph + " textarea").value = "Entrez votre courss...";
    document.querySelector(".paragraph-" + num_paragraph + " label").setAttribute('for', "input-sous-titre-" + num_paragraph);
    document.querySelector(".paragraph-"+ num_paragraph + " .delete").id = "delete-paragraph-" + num_paragraph;

    document.querySelector(".paragraph-" + para_prec + " .div-sous-titre span").innerHTML = "Sous titre :"
    replaceInput(para_prec);

}
function recupPara(id){
    var tab = id.split('-');
    var para = tab[2];
    return para;
}

function deletePara(id){
    var para = recupPara(id);
    
    var div = document.querySelector(".paragraph-" + para);
    div.parentNode.removeChild(div);
}

function modifPara(id){
    var para = recupPara(id);

    document.querySelector(".paragraph-" + para + " .div-input-sous-titre").style.display = "block";
    document.querySelector(".paragraph-" + para + " h3").style.display = "none";
    document.querySelector(".paragraph-" + para + " p").style.display = "none";
    document.querySelector(".paragraph-" + para + " textarea").style.display = "block";

    document.querySelector(".paragraph-" + para + "  .modif-div-" + para).className = "col s6 valid-modif-div-" + para;
    document.querySelector(".paragraph-" + para + " .valid-modif-div-" + para + " a").className = "btn-floating btn-large waves-effect waves-light yellow valid-modif";
    document.querySelector(".paragraph-" + para + " .valid-modif-div-" + para + " a").id = "valid-modif-paragraph-" + para;
    document.querySelector(".paragraph-" + para + " .valid-modif-div-" + para + " a").setAttribute("onclick", "validModif(this.id)");
    document.querySelector(".paragraph-" + para + " .valid-modif-div-" + para + " i").innerHTML = "verified_user";

}

function validModif(id){
    var tab = id.split('-');
    var para = tab[3];

    document.querySelector(".paragraph-" + para + " .div-input-sous-titre").style.display = "none";
    document.querySelector(".paragraph-" + para + " h3").innerHTML = document.querySelector(".paragraph-" + para + " .div-input-sous-titre input").value;
    document.querySelector(".paragraph-" + para + " h3").style.display = "block";
    document.querySelector(".paragraph-" + para + " p").style.display = "block";
    document.querySelector(".paragraph-" + para + " p").innerHTML = document.querySelector(".paragraph-" + para + " textarea").value;
    document.querySelector(".paragraph-" + para + " textarea").style.display = "none";

    document.querySelector(".paragraph-" + para + "  .valid-modif-div-" + para).className = "col s6 modif-div-" + para;
    document.querySelector(".paragraph-" + para + " .modif-div-" + para + " a").className = "btn-floating btn-large waves-effect waves-light blue modif";
    document.querySelector(".paragraph-" + para + " .modif-div-" + para + " a").id = "modif-paragraph-" + para;
    document.querySelector(".paragraph-" + para + " .modif-div-" + para + " a").setAttribute("onclick", "modifPara(this.id)");
    document.querySelector(".paragraph-" + para + " .modif-div-" + para + " i").innerHTML = "edit";

}