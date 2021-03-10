var number = 1
function addinput(number, ligne){

    var select = "." + ligne;

    var div = document.createElement("div");
    div.className="container_chevron col s1";
    div.style = "height: 100%";
    div.style.paddingTop = "20px";
    document.querySelector(select).appendChild(div);

    var i = document.createElement("i");
    i.className = "material-icons";
    i.innerHTML = "chevron_right";
    i.style.height = "100%";
    document.querySelector(select + " .container_chevron").appendChild(i);


    var div = document.createElement("div");
    div.className = "container_input col s8";
    document.querySelector(select).appendChild(div)

    var input = document.createElement("input");
    input.type = "text";
    input.name = number;
    switch(number){
        case 1:
            input.placeholder = "Entrez votre " + number + "ere ligne";
            break;
        default:
            input.placeholder = "Entrez votre " + number + "eme ligne";
    }

    document.querySelector(select + " .container_input").appendChild(input);

    var num_ligne_prec = number - 1;
    var a = num_ligne_prec.toString();
    var ligne_prec = ".ligne" + a;
    
    if(num_ligne_prec >= 1){
        var span = document.createElement("span");
        span.innerHTML = document.querySelector(ligne_prec + " .container_input input").value;

        document.querySelector(ligne_prec + " .container_chevron").style.paddingTop = "0";
        document.querySelector(ligne_prec + " .container_input input").style.display = "none";
        document.querySelector(ligne_prec + " .container_input").appendChild(span);


        /*var div = document.createElement("div");
        div.className = "row container_titre";
        document.querySelector("entree").appendChild(div);

        var span = document.createElement("span");
        span.innerHTML = "ligne " + a + ":"
        document.querySelector(ligne_prec + " .container_titre").appendChild(span);*/
        
    }
    
    
}

function addrow(number){
    var div = document.createElement("div");
    var a = number.toString();
    ligne = "ligne" + a;
    div.className = "row fadein " + ligne;
    document.querySelector(".entree").appendChild(div);
    addinput(number, ligne)
}

document.getElementById("add").addEventListener("click", function() {
    addrow(number);
    number++;
});

document.getElementById("submit").addEventListener("click", function() {
    document.querySelector(".add_line").style.opacity = "0";
    var equation = document.getElementById("equation").value;
    document.querySelector(".main_box").className = "col s6 main_box";
    document.querySelector(".solution").style.display = "block";
    document.getElementById('value_equa').innerHTML = "Ton equation est : " + equation;
    var valeurs = split_equation(equation);
    var result = calc_sol(valeurs);
    var propos = propositionconvert();
    
    if(verif(result, propos)){
        document.querySelector(".gif").style.height = "300px";
        document.querySelector(".gif").style.width = "300px";
        document.querySelector(".gif").style.backgroundImage = "url(\"/assets/img/win.gif\")";
        document.querySelector(".text_result").innerHTML = "Bravo, vous avez trouvé la bonne réponse !";
    }
    else{
        document.querySelector(".text_result").innerHTML = "Mince tu t'es trompé réessaye !";
        document.querySelector(".gif").style.backgroundImage = "url(\"/assets/img/lose.gif\")";
    }
    return(false);
});

function verif(result, propos){
    if(result == propos){
        return true;
    }
    else{
        return false;
    }
}


function propositionconvert(){
    var values = document.querySelector("." + ligne + " .container_input input").value;
    values = values.toLowerCase().split('=');

    if(values[0].search('x') == -1){
        result = eval(values[0]);
        return (result);
    }
    else{
        result = eval(values[1]);
        return (result);
    }
    
}


function split_equation(equation){
    var tab_equa = equation.split(' ');
    equation = tab_equa.join("").toLowerCase();
    
    

    var tab = equation.split('=');

    var gauche = tab[0];
    var droite = tab[1];
    
    tab_gauche = gauche.split('');
    tab_droite = droite.split('');

    
    for(var i = 0; i < tab_gauche.length; i++){
        if(tab_gauche[i] != 'x' && tab_gauche[i] != '*' && tab_gauche[i] != '/' && tab_gauche[i] != '+' && tab_gauche[i] != '-'){
            if(tab_gauche[i-1] == "-"){
                tab_gauche[i] = (-1) * parseInt(tab_gauche[i]); 
            }
            else if(tab_gauche[i-1] == "+"){
                tab_gauche[i] = parseInt(tab_gauche[i]); 
            }  
            else{
                tab_gauche[i] = parseInt(tab_gauche[i]); 
            }    
        }  
    }
    
    for(var i = 0; i < tab_droite.length; i++){
        if(tab_droite[i] != 'x' && tab_droite[i] != '*' && tab_droite[i] != '/' && tab_droite[i] != '+' && tab_droite[i] != '-'){
            
            if(tab_gauche[i-1] == "-"){
                tab_droite[i] = (-1) * parseInt(tab_droite[i]); 
            }
            else if(tab_gauche[i-1] == "+"){
                tab_droite[i] = parseInt(tab_droite[i]);
            }  
            else{
                tab_droite[i] = parseInt(tab_droite[i]);
            }       
        }  
    }
    

    var tab_nbr_gauche = [];
    var tab_coef_gauche = [];
    

    for(var i = 0; i < tab_gauche.length; i++){
        if(typeof tab_gauche[i] == 'number'){
            if(tab_gauche[i-1] == 'x' || tab_gauche[i+1] == 'x'){
                tab_coef_gauche.push(tab_gauche[i]); 
            }
            else{
                if(typeof tab_gauche[i+1] == 'number'){
                    nombre = tab_gauche[i];
                    while(typeof tab_gauche[i+1] == 'number'){
                        nombre = parseInt(nombre.toString() + tab_gauche[i+1].toString());
                        i++;
                    }
                    if(tab_gauche[i+1] == 'x'){
                        tab_coef_gauche.push(nombre);
                    }
                    else{
                        tab_nbr_gauche.push(nombre);
                    }
                    
                    
                }
                else{
                    tab_nbr_gauche.push(tab_gauche[i]);
                }
            }   
        }
    }
    
    var tab_nbr_droite = [];
    var tab_coef_droite = [];

    for(var i = 0; i < tab_droite.length; i++){
        if(typeof tab_droite[i] == 'number'){
            if(tab_droite[i-1] == 'x' || tab_droite[i+1] == 'x'){
                tab_coef_droite.push(tab_droite[i]); 
            }
            else{
                if(typeof tab_droite[i+1] == 'number'){
                    nombre = tab_droite[i];
                    while(typeof tab_droite[i+1] == 'number'){
                        nombre = parseInt(nombre.toString() + tab_droite[i+1].toString());
                        i++;
                    }
                    if(tab_droite[i+1] == 'x'){
                        tab_coef_droite.push(nombre);
                    }
                    else{
                        tab_nbr_droite.push(nombre);
                    }
                    
                    
                }
                else{
                    tab_nbr_droite.push(tab_droite[i]);
                }
            }   
        }
    }
    
    return [tab_nbr_gauche, tab_nbr_droite, tab_coef_gauche, tab_coef_droite];
    
}

function calc_sol(tab){
    var sum_nbr_gauche = 0;
    var sum_nbr_droite = 0;

    var sum_coef_gauche = 0;
    var sum_coef_droite = 0;
    
    for(var i = 0; i < tab[0].length; i++){
        sum_nbr_gauche = sum_nbr_gauche + tab[0][i];    
    }
    for(var i = 0; i < tab[2].length; i++){
        sum_coef_gauche = sum_coef_gauche + tab[2][i];
    }
    for(var i = 0; i < tab[1].length; i++){
        sum_nbr_droite = sum_nbr_droite + tab[1][i];
    }
    for(var i = 0; i < tab[3].length; i++){
        sum_coef_droite = sum_coef_droite + tab[3][i];
    }

    var result = (sum_nbr_droite - sum_nbr_gauche)/(sum_coef_gauche - sum_coef_droite);
    return (result);
}

document.getElementById("new").addEventListener("click", function() {
    document.location.reload(true);
});
document.getElementById("retry").addEventListener("click", function() {
    alert('button disabled');
});


