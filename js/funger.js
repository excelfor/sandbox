/* data location URL */
var loc = window.location.pathname;
var dir = loc.substring(0, loc.lastIndexOf('/'));

/* inicializa variáveis temporais */
var agora = new Date();
var dd = agora.getDate();
var mm = agora.getMonth()+1;
var hh = agora.getHours();
var ss = agora.getSeconds(); 
var mt = agora.getMinutes();
var caclean=mt+"z"+ss


/* * Função que carrega blocos de código HTML estáticos
/*   e injeta no selector identificado (ID);
/*   usar o parâmetro caclean para obrigar a limpar a cache do browser
/* * */

function loadblock(file,id) {
	var file="./includes/"+file+".htm?="+caclean;
	var ajaxFile = new XMLHttpRequest();
	ajaxFile.open("GET", file, false);
	ajaxFile.onreadystatechange = function (){  
		if(ajaxFile.readyState === 4) {
				  if(ajaxFile.status === 200 || ajaxFile.status == 0) {
					var textos = ajaxFile.responseText;
					var supr=document.getElementById(id);
					supr.innerHTML=textos;
				  }
			}
		 }
		ajaxFile.send(null);
}

/* countdown */

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

/* * Função de escolha múltipla
/*   valores colocados nos forms segundo convenções de identificação dos seletores (de 1 a 5)
/* * */

function select(event,elem){
	var parentelem=elem.id;
	var paizinho=document.getElementById(parentelem);
	var x=event.target;
	var childelem=x.id;
	var domcls=document.getElementById(childelem);
	var nodes = paizinho.childNodes;
	
	for(var i=0; i<nodes.length; i++) {
      if (typeof(nodes[i].id)!='undefined'){
         	nodes[i].style.backgroundColor='rgba(0,0,0,0.5)';
  		}
     }
	domcls.style.backgroundColor='red';
	var valopt= childelem.slice(-1); // até 9 hipóteses por pergunta
	document.getElementById('F'+parentelem).value=valopt;
}
 
/** Função de escolha S / N
/* valores 0 ou 1 / true or false
/* * * */

function mudaCheck(elem){
var pai = document.getElementById(elem.id);
var filho= pai.children;
var botaoV=filho[0].id
var botaoS=filho[1].id;
var elemS=document.getElementById(botaoS);
var elemV=document.getElementById(botaoV);
var valor=elemV.value;

	if(valor !='' && valor != 0){
			elemS.className = 'switch desligado';
			elemV.value='0';
		
		} else {
			elemS.className += ' ligado';
			elemV.value='1';
	}
}

/** Função de escolha de Select box
/*  apanha valor de ordem e envia para o input field do formulário seguindo convenções do ID
/* * * */

function veselect(elem){  
	var e = document.getElementById(elem.id);
	var opt = e.options[e.selectedIndex].text;
	document.getElementById('F'+elem.id).value=opt;
}

/** Funções de arrastamento de imagens 
/* guarda hierarquia de acordo com o ID de destino
/* as ids das imagens devem respeitar ordem 1,2,3 etc. no último carater
/* *  * */
var result=[];
var datafinal='';
function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}
function drop(ev,elem) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var id_destino = ev.target.id;
    var pos = id_destino.slice(-1); // para onde vai
    var imgor = data.slice(-1); // de onde vem 
    ev.target.appendChild(document.getElementById(data));
    
    // remove duplicado se a mesma imagem for movida outra vez
    var i, value;
    var matchV = imgor+':';
	
	for (i= 0; i<result.length; ++i) {
	    value = result[i];
	    if (value.substring(0, 2) === matchV) {
	    	  var a = result.indexOf(value);
	    	  result.splice(a, 1);
	    	  break;
	    }
	}
    result.push(imgor+':'+pos);
    datafinal= result.toString();
    document.getElementById(elem).value=datafinal;
}

/** Funções grava os dados 
/* dos formulários
/* de acordo com cada bloco de respostas
/* 
/* *  * */

function post_data(elem,end){
	var mess=document.getElementById('mess');
	var warn=document.getElementById('aviso');
	mess.innerHTML="Aguarde...";
	warn.style.visibility='visible';
	var fase=elem.id;
	fase=fase.slice(-3);
  
	if(fase=='001'){
		var data='fase=1';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
	} else if (fase=='002'){
		var data='fase=2';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
	}
	else if (fase=='003'){
		var data='fase=3';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='004'){
		var data='fase=4';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	}  else if (fase=='005'){
		var data='fase=5';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='006'){
		var data='fase=6';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='007'){
		var data='fase=7';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='008'){
		var data='fase=8';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='009'){
		var data='fase=9';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='010'){
		var data='fase=10';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='011'){
		var data='fase=11';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='012'){
		var data='fase=12';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='013'){
		var data='fase=13';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				+'&fg3='+document.getElementById('Fgroup3').value
				+'&fg4='+document.getElementById('Fgroup4').value
				+'&fg5='+document.getElementById('Fgroup5').value
				+'&fg6='+document.getElementById('Fgroup6').value
				+'&fg7='+document.getElementById('Fgroup7').value
				+'&fg8='+document.getElementById('Fgroup8').value
				+'&fg9='+document.getElementById('Fgroup9').value
	} else if (fase=='014'){
		var data='fase=14';
		   data+='&fg1='+document.getElementById('Fgroup1').value
				+'&fg2='+document.getElementById('Fgroup2').value
				
	}

   var url = dir+"/din/gereresp.php?";
   		try{ 
   		  var ajax = new XMLHttpRequest(); 
		} catch(e) {
		alert("Browser incompatível");
		return false;
		}
		ajax.open("POST", url, true);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4 && ajax.status == 200) {
				  resp = ajax.responseText;
				  if (resp==='OK'){
				  		warn.style.visibility='hidden';
					  	/* incrementa o ID  que recebe o novo bloco
					  	e esvazia o anterior */
					  	if (end !=true){
							  	var father=document.getElementById('qr'+fase);
							  	father.parentNode.removeChild(father);
								var incr = parseInt(fase)+1;
								incr= ("00" + incr).slice(-3);
							  	loadblock('bloco'+incr,'qr'+incr);
						}  else {
							  	window.location.href='answers.php';
						}
				  } else if(resp==='ERR') {
				  		mess.innerHTML="Preencha as respostas!";
				  		warn.style.visibility='visible';
				  }
			
			} else {
					// não pode acontecer...
			}
	}
	ajax.send(data);
}

function esconde(elem){
	elem.style.visibility='hidden';
}