var letra = 'a';
var divs = '';
var barco = '';


/*
//funcion que te da la letra siguiente
function nextChar(c) {
    return String.fromCharCode(c.charCodeAt(0) + 1);
}
// var a = 'a';
// a = nextChar(a);
*/

function tablero() {
    for (var i = 0; i < 10; i++) {
        for (var j = 0; j < 10; j++) {
            divs = divs + "<div onmouseover='checkPositionBarcu(this)' id='t" + i +"t"+ j + "' ocupado='no' class='divTablero' "
                    +"ondrop='drop(event)' ondragover='allowDrop(event)'></div>";
        }
        //letra = nextChar(letra);
        divs = divs + "<br />";
    }
    // Se mostrara el tablero de juego
    document.getElementById("tablero").innerHTML = divs;
}

function checkPositionBarcu(elem){
    elem.id;
}
//ondrop='drop(event)' ondragover='allowDrop(event)'

function barcos() {
    barco = barco + "<br><br><br><br>";
    barco = barco + "<fieldset>";
    barco = barco + "<legend><span> Barquitos para colocar <span></legend>";
    barco = barco + "<table border='0'>";
    barco = barco + "<tr>";
    barco = barco + "<td><div id='divBarco1'> <img id='barco1' long='1' ori='h' bdisp='4' draggable='true' ondragstart='drag(event)' src='imagenes/barco1.png' width='50px' height='50px'> </div></td>";
    barco = barco + "<td><div id='divBarco2'> <img id='barco2' long='2' ori='h' bdisp='3' draggable='true' ondragstart='drag(event)' onclick='orientacion(this);' src='imagenes/barcobarcoh.png'  width='100px' height='50px'> </div></td>";
    barco = barco + "<td><div id='divBarco3'> <img id='barco3' long='3' ori='h' bdisp='2' draggable='true' ondragstart='drag(event)' onclick='orientacion2(this);' src='imagenes/bbh.png'  width='150px' height='50px'> </div></td>";
    barco = barco + "<td><div id='papelera'><img src='imagenes/papelera.png' width='100px' heigth='50px'></td>";
    barco = barco + '<td><div id="papelera" ondrop="return eliminar(event)" ondragleave="return leave(event)" ondragover="return over(event)" ondragenter="return enter(event)">Papelera</div>';
    barco = barco + "</tr>";
    barco = barco + "</table>";
    barco = barco + "</fieldset>";
    document.getElementById("barcos").innerHTML = barco;
}

//cambiar orientacion de la imagen
function orientacion(ev){
    // cambio de orientación para barcos de 2 posiciones
    var asd= document.getElementById('barco2');
   // var v = "<img src='imagenes/barcobarcov.png' width='50px' height='100px' ori='v'  long='2'  draggable='true' ondragstart='drag(event)' onclick='orientacion(this);' >";
    //var h = "<img src='imagenes/barcobarcoh.png' width='100px' height='50px' ori='h'  long='2'  draggable='true' ondragstart='drag(event)' onclick='orientacion(this);' >";
    if(asd.getAttribute('ori')==='h'){
        //document.getElementById('divBarco2').innerHTML = v;
        asd.setAttribute('ori','v');
        asd.src='imagenes/barcobarcov.png';
        asd.style.width='50px';
        asd.style.height='100px';
    }
    else{ 
        if(asd.getAttribute('ori')==='v'){
            //document.getElementById('divBarco2').innerHTML = h;
            asd.setAttribute('ori','h'); 
            asd.src='imagenes/barcobarcoh.png';
            asd.style.width='100px';
            asd.style.height='50px';
        }
    }
}
function orientacion2(ev){
 // cambio de orientacion para barcos de 3 posiciones
    var barco3 = document.getElementById('barco3');
    if(barco3.getAttribute('ori')==='h'){
        barco3.setAttribute('ori','v');
        barco3.src='imagenes/bbv.png';
        barco3.style.width='50px';
        barco3.style.height='150px';
    }
    else{ 
        if(barco3.getAttribute('ori')==='v'){
            barco3.setAttribute('ori','h'); 
            barco3.src='imagenes/bbh.png';
            barco3.style.width='150px';
            barco3.style.height='50px';
        }
    }
 }

//funciones para drag
function allowDrop(ev) {
    ev.preventDefault();
    /*
    var id = ev.dataTransfer.getData("text");
    var barco = document.getElementById(id);
    
    var long = barco.getAttribute('long');
    var ori = barco.getAttribute('ori');
    
    console.log("id"+long+":"+"ori");*/
}
var idBarcos = 0;
var orientacionBarco;
var longitudBarco;

function drag(ev) {
    var imagen = ev.target.id;
    ev.dataTransfer.setData("text", imagen);
    
}

function drop(ev) {
    ev.preventDefault();
    var id = ev.dataTransfer.getData("text");
    var barco = document.getElementById(id);
    
    var long = barco.getAttribute('long');
    var ori = barco.getAttribute('ori');
    var objetivo = ev.target;
    var idObjetivo = objetivo.id;
    var res = idObjetivo.split("t");
    
    var bdisp = barco.getAttribute('ori');
   
    console.log("id: "+id+" long: "+long+" ori: "+ori+" obj:"+idObjetivo);
    console.log(res[1] +":"+ res[2]);
    var fila = parseInt(res[1]);
    var columna = parseInt(res[2]);
    
    var ocupado = objetivo.getAttribute('ocupado');
    if(ocupado == "no"){
        
        if(barco.getAttribute('long')==1){
            objetivo.style.backgroundImage = "url('"+barco.src+"')";
            objetivo.setAttribute('ocupado',"si");
            
            var bdisp = barco.getAttribute('bdisp');
            bdisp--; 
            barco.setAttribute('bdisp',bdisp);
        }
        else if(barco.getAttribute('long')==2){
            if(barco.getAttribute('ori')=="h"){
                
                var id2 = "t"+fila+"t"+(columna+1); 
                var objetivo2 = document.getElementById(id2);
                var ocupado2 = objetivo2.getAttribute('ocupado');
                if(ocupado2 == "no"){
                    objetivo.style.backgroundImage = "url(imagenes/b1.png)";
                    objetivo2.style.backgroundImage = "url(imagenes/b2.png)";
                    objetivo.setAttribute('ocupado',"si");
                    objetivo2.setAttribute('ocupado',"si");
                }
                
            }
            if(barco.getAttribute('ori')=="v"){
                var id2 = "t"+(fila+1)+"t"+columna; 
                var objetivo2 = document.getElementById(id2);
                var ocupado2 = objetivo2.getAttribute('ocupado');
                if(ocupado2 == "no"){
                    objetivo.style.backgroundImage = "url(imagenes/b3.png)";
                    objetivo2.style.backgroundImage = "url(imagenes/b4.png)";
                    objetivo.setAttribute('ocupado',"si");
                    objetivo2.setAttribute('ocupado',"si");
                }
            }
            
            var bdisp = barco.getAttribute('bdisp');
            bdisp--; 
            barco.setAttribute('bdisp',bdisp);
        }
        else if(barco.getAttribute('long')==3){
            
            if(barco.getAttribute('ori')=="h"){
                
                var id2 = "t"+fila+"t"+(columna+1);
                var id3 = "t"+fila+"t"+(columna+2); 
                var objetivo2 = document.getElementById(id2);
                var objetivo3 = document.getElementById(id3);
                var ocupado2 = objetivo2.getAttribute('ocupado');
                var ocupado3 = objetivo3.getAttribute('ocupado');
                if(ocupado2 == "no" && ocupado3 == "no"){
                    objetivo.style.backgroundImage = "url(imagenes/bb1.png)";
                    objetivo2.style.backgroundImage = "url(imagenes/bb2.png)";
                    objetivo3.style.backgroundImage = "url(imagenes/bb3.png)";
                    objetivo.setAttribute('ocupado',"si");
                    objetivo2.setAttribute('ocupado',"si");
                    objetivo3.setAttribute('ocupado',"si");
                }
                
            }
            if(barco.getAttribute('ori')=="v"){
                var id2 = "t"+(fila+1)+"t"+columna;
                var id3 = "t"+(fila+2)+"t"+columna;
                var objetivo2 = document.getElementById(id2);
                var objetivo3 = document.getElementById(id3);
                var ocupado2 = objetivo2.getAttribute('ocupado');
                var ocupado3 = objetivo3.getAttribute('ocupado');
                if(ocupado2 == "no" && ocupado3 == "no"){
                    objetivo.style.backgroundImage = "url(imagenes/bb4.png)";
                    objetivo2.style.backgroundImage = "url(imagenes/bb5.png)";
                    objetivo3.style.backgroundImage = "url(imagenes/bb6.png)";
                    objetivo.setAttribute('ocupado',"si");
                    objetivo2.setAttribute('ocupado',"si");
                    objetivo3.setAttribute('ocupado',"si");
                }
            }

            var bdisp = barco.getAttribute('bdisp');
            bdisp--; 
            barco.setAttribute('bdisp',bdisp);
        }
      // hacer que los barcos desaparecan cuando se haya colocado un numero determinado de veces  
      if(barco.getAttribute('bdisp')==0 && barco.getAttribute('long')==1){
          document.getElementById("divBarco1").style.visibility = "hidden";
      }
      else if(barco.getAttribute('bdisp')==0 && barco.getAttribute('long')==2){
          document.getElementById("divBarco2").style.visibility = "hidden";
      }
      else if(barco.getAttribute('bdisp')==0 && barco.getAttribute('long')==3){
          document.getElementById("divBarco3").style.visibility = "hidden";
      }
        
    }
    
    //idBarcos++;
}
/*
function eliminar(ev){
            var elementoArrastrado = document.getElementById(ev.dataTransfer.getData("Data")); // Elemento arrastrado
            elementoArrastrado.parentNode.removeChild(elementoArrastrado); // Elimina el elemento
            //   http://programandoointentandolo.com/2013/02/arrastrar-y-soltar-en-html5-drag-drop-html5.html
 }*/

function inici() {
//Funcion para refrescar la lista de usuarios
    refrescar();
}
function inicio2(){
//Funcion para refrescar la lista de usuarios
    refrescar2();
}

//tiempo del que se autorefrescará la lista
function refrescar() {
        consultaUsuarios();
        
        window.setInterval(
                function () {
                    //lista();
                    consultaUsuarios();
                    
                }
        , 10000);
}

function refrescar2() {
        consultaUsuarios2();
        window.setInterval(
                function () {
                    
                    consultaUsuarios2();
                }
        , 10000);
}

// consulta 
function lista() {
   //crear consulta ajax a php que retorne una estructura json con los usuarios conectados
   //indicar la funcion encargada de recibir la respuesta
   
   
}



//envia consulta para obtener la lista de usuarios conectados (( Lista 1 ))
function consultaUsuarios(){
    var urlDestino = "llistatUsuaris.php";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", urlDestino, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            listaUsuarios(xmlHttp);
        }
    };
    xmlHttp.send();
}

var array = [];

function listaUsuarios(xmlHttp){
    if (xmlHttp.status == 200) {
        var resp = xmlHttp.responseText;
        var respJSON = JSON.parse(resp);
        
        var num_usuarios = respJSON.i;
        var text = "";
        
        document.getElementById("listalista").innerHTML ="";
        for(var i=1; i<=num_usuarios; i++){
            //var troll = "nombre"+i;
            var nombre = respJSON["nombre"+i];
            document.getElementById("listalista").innerHTML += nombre+"<br />";
            //document.getElementById("listalista2").innerHTML += nombre+"<br />";
            array.push(nombre);
        }
        
        // codigo js para mostrar los nombre
        //document.getElementById("listalista").innerHTML = nombre;
    }
    
}

function consultaUsuarios2(){
    var urlDestino = "llistatUsuaris2.php";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", urlDestino, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            listaUsuarios2(xmlHttp);
        }
    };
    xmlHttp.send();
}

function listaUsuarios2(xmlHttp){
    if (xmlHttp.status == 200) {
        var resp = xmlHttp.responseText;
        var respJSON = JSON.parse(resp);
        
        var num_usuarios = respJSON.i;
        var text = "";
        
        document.getElementById("listalista2").innerHTML ="";
        for(var i=1; i<=num_usuarios; i++){
            var nombre = respJSON["nombre"+i].nombre;
            var id = respJSON["nombre"+i].id;
            var peticion = respJSON["nombre"+i].peticion;
            document.getElementById("listalista2").innerHTML += nombre+"<br />";
            array.push(nombre);
            
            if(myId == peticion){
                window.location="principal.php";
            }
        }
    }
}

//pidejugar enviara un ajax que pregunte contra quien quiere jugar 

function pidejugar(){
    // consulta para 
    var jugador = window.prompt("Escribe el nombre del jugador al que quieres retar");
    
    var urlDestino = "pidejugar.php";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", urlDestino, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            resppidejuagar(xmlHttp);
        }
    };
    xmlHttp.send("nombre="+jugador);
}

function resppidejuagar(xmlHttp){
    if (xmlHttp.status == 200) {
        var resp = xmlHttp.responseText;
        var respJSON = JSON.parse(resp);
        
        var ok = respJSON.disponible;
        if(ok == false){
            alert("Este jugador no existe, prueba con otro");
        }
        else if(ok == true){
            alert("Empieza el juego en 3, 2, 1...");
        }
    }
}


// consulta para empezar partidas si se tiene un id en el campo peticion

function peticion(){
    var urlDestino = "peticion.php";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", urlDestino, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            respuestapeticion(xmlHttp);
        }
    };
    xmlHttp.send();
}

function respuestapeticion(xmlHttp){
    if (xmlHttp.status == 200) {
        var resp = xmlHttp.responseText;
        var respJSON = JSON.parse(resp);
        
        var ok = respJSON.peticion;
        
        if(ok == "ok"){
            //location.href='www.paginaredireccionada.com';
            window.location="http://localhost/Barquitos/principal.php";
        }
    }  
}