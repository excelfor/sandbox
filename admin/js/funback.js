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
/* on/off switch */
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

/* *
/* Prepara listagens por escolha múltipla (selectbox)
/* parametros: origem do pedido e # de linhas por página
/* seldest: identifica seletor q recebe a injeção de dados
/* * */
var opt,par,seldest;
function paginator(elem,num){  
	
	var e = document.getElementById(elem.id);
	opt = e.options[e.selectedIndex].value;
	var linha,finald;
	seldest="listcontainer";

	 if (elem.id=='selista'){
	 	 if(opt==1){
	 	 	par ="?f=establ&ln="+num;
	 	 } else if(opt==2){
	 	 	par ="?f=team&ln="+num;
	 	 }
	 }

	var Parent = document.getElementById(seldest);
		while(Parent.hasChildNodes())
		{
			Parent.removeChild(Parent.firstChild);
		}
     pajax();
}

/* a função invoca listagens sem selectbox 
/* elem = identifica na base de dados o query
/* flag = qual o contrutor da View na função pajax()
/* num = número de linhas por cada página de listagem
/* na função voidrec usar como id do seletor o nome da table seguido de _ (underscore)
*/
function paginator2(elem,flag,num){
	par ="?f="+elem+"&ln="+num;
	seldest="listcontainer";
	opt=flag;
	pajax();
}

/* produz as listagens propriamente ditas */
function pajax(){
    var link =  dir+"/din/paginate"+par;

 	try {
		var ajax = new XMLHttpRequest(); 
		} catch(e) {
		 alert("Tente outro browser");
		 return false;
		}

 	ajax.onreadystatechange=function() {

	  		if (ajax.readyState==4 && ajax.status==200) {
				var responseData = eval('(' + ajax.responseText + ')');
				var tamn=responseData.length;
				// TODO -> Quando a resposta vem vazia avisar e evitar erro
				var npag = responseData[0]['pages'];
				var lins = responseData[0]['lines'];
					for (var i = 1; i < tamn; i++) {
							var created = responseData[i]['created'];
							created = created.split(' ');
							created = created[0];
						/* acrescentar aqui o layout de cada listagem */

						switch(opt){
							case '1':
								if (i==1){
									/* lista entidades */
									/* coloca o cabeçalho no início */
									header=
									 "<div class='l_name'>"+'Nome'+"</div>"
									 +"<div class='l_local'>"+'Local'+"</div>"
									 +"<div class='l_created'>"+'Data&nbsp;&nbsp;'+"</div>"
									 +"<div class='l_del'>"+'Apaga'+"</div>"
									  +"<div class='l_edt'>"+'Edita'+"</div>";
									 var row0= document.createElement('div');
									 row0.className="headerline";
									 document.getElementById(seldest).appendChild(row0);
									 row0.innerHTML = header;
								}
								/* o conteúdo */
								linha=
									"<div class='l_name'>"+responseData[i]['name']+"</div>"
									+"<div class='l_local'>"+responseData[i]['local']+"</div>"
									+"<div class='l_created'>"+created+"</div>"
									+"<div class='l_del lined' id='entities_"+i+"' onclick='voidrec(this,"+responseData[i]['id']+",3)'></div>"
									+"<div class='l_edt linev'></div>";
							break;
							case '2':
							/* lista departamentos e equipas */
								if (i==1){
									header=
									 "<div class='l_name'>"+'Nome'+"</div>"
									 +"<div class='l_local'>"+'Estabelecimento'+"</div>"
									 +"<div class='l_created'>"+'Data&nbsp;&nbsp;'+"</div>"
									 +"<div class='l_del'>"+'Apaga'+"</div>"
									 +"<div class='l_edt'>"+'Edita'+"</div>";

									 var row0= document.createElement('div');
									 row0.className="headerline";
									 document.getElementById(seldest).appendChild(row0);
									 row0.innerHTML = header;
								}
								  linha=
									"<div class='l_name'>"+responseData[i]['name']+"</div>"
									+"<div class='l_local'>"+responseData[i]['boss']+"</div>"
									+"<div class='l_created'>"+created+"</div>"
									+"<div class='l_del lined' id='departments_"+i+"' onclick='voidrec(this,"+responseData[i]['id']+",3)'></div>"
									+"<div class='l_edt linev'></div>";
							break;
							case '60':
							/* lista user types */
								if (i==1){
									header=
									 "<div class='l_name'>"+'Nome'+"</div>"
									 +"<div class='l_local'>"+'Nível'+"</div>"
									 +"<div class='l_created'>"+'Criado&nbsp;&nbsp;'+"</div>"
									 +"<div class='l_del'>"+'Apaga'+"</div>"
									 +"<div class='l_edt'>"+'Edita'+"</div>";

									 var row0= document.createElement('div');
									 row0.className="headerline";
									 document.getElementById(seldest).appendChild(row0);
									 row0.innerHTML = header;
								}
								  linha=
									"<div class='l_name'>"+responseData[i]['name']+"</div>"
									+"<div class='l_local'>"+responseData[i]['user_level']+"</div>"
									+"<div class='l_created'>"+created+"</div>"
									+"<div class='l_del lined' id='user_types_"+i+"' onclick='voidrec(this,"+responseData[i]['id']+",2)'></div>"
									+"<div class='l_edt linev'></div>";
							break;
							case '25':
							/* lista users */
								if (i==1){
									header=
									 "<div class='l_name'>"+'Nome'+"</div>"
									 +"<div class='l_name' style='width:245px'>"+'Equipa'+"</div>"
									 +"<div class='l_local tiny'>"+'Nível'+"</div>"
									 +"<div class='l_created'>"+'Criado&nbsp;&nbsp;'+"</div>"
									 +"<div class='l_del'>"+'Apaga'+"</div>"
									 +"<div class='l_edt' style='width:56px'>"+'Edita'+"</div>";

									 var row0= document.createElement('div');
									 row0.className="headerline";
									 document.getElementById(seldest).appendChild(row0);
									 row0.innerHTML = header;
								}
								  
								  var nivelop = responseData[i]['nivel'];
								  	if(nivelop===null)(nivelop='99');
								  linha=
									"<div class='l_name'>"+responseData[i]['name']+"</div>"
									+"<div  class='l_name' style='width:245px'>"+responseData[i]['departn']+"</div>"
									+"<div class='l_local tiny'>"+nivelop+"</div>"
									+"<div class='l_created'>"+created+"</div>"
									+"<div class='l_del lined' id='users_"+i+"' onclick='voidrec(this,"+responseData[i]['id']+",2)'></div>"
									+"<div class='l_edt linev' id='users_"+i+"ed' onclick='editrec(this,"+responseData[i]['id']+",1)'></div>";
							break;
						}
						/* injeta os dados no local apropriado */
						var row1= document.createElement('div');
						var id_row='line_n'+i;
						row1.className="dataline";
						row1.setAttribute('id', id_row);
						document.getElementById(seldest).appendChild(row1);
						//row0.className +=" not";
						//document.querySelector(row1).id = id_row;
						row1.innerHTML = linha;
					}
				var finald = "Total de páginas: "+npag+" Linhas: <span id='count_l'>"+lins+"</span>";
				var rowf= document.createElement('div');
				rowf.className="infopaginator";
				document.getElementById(seldest).appendChild(rowf);
				rowf.innerHTML=finald;
				document.getElementById(seldest).style.display='block';
			}
	}
	ajax.open("GET",link,true);
	ajax.send();

}


function esconde(elem){
	elem.style.visibility='hidden';
}

/* opções do menu inicial do back office */
function opt(val){
	if (val==9){
		window.location.href='../admin/reslog';
	} else if(val==1){
		window.location.href='../admin/set_establ';
	} else if(val==2){
		window.location.href='../admin/set_levels';
	}
	 else if(val==3){
		window.location.href='../admin/set_users';
	} else if(val==8){
		document.getElementById('reset').innerHTML='Aguarde: BD a ser reinicializada...';
		window.location.href='../admin/din/reset';
	}

}

/* verfica se registo
/* existe na base de dados
/* e produz respetivos avisos
/* */

function checkfordup(elem,tab){
	var wardiv=document.getElementById('fieldwarning');
    var data=elem.value;
	if(data.length>4){
		var link = dir+"/din/truelife?f="+tab+'&v='+data;
		
	   	try {
			var ajax = new XMLHttpRequest(); 
			} catch(e) {
			 alert("Tente outro browser");
			 return false;
			}

			ajax.onreadystatechange=function() {

		  		if (ajax.readyState==4 && ajax.status==200) {
					var responseData = eval('(' + ajax.responseText + ')');
					
						if(responseData['resp']!='niltch'){
							if(responseData['resp']!=2){
								wardiv.innerHTML=responseData['field']+' já existe na BD';
							} else {
								wardiv.innerHTML=responseData['field'];
							}	
							wardiv.style.display='block';
						 } else {
						 	wardiv.style.display='none';
						 }
				}
		}
		ajax.open("GET",link,true);
		ajax.send();
	}
}

/* * */
/* Elimina registos na BD
/* tb -> table, id -> # do registo, 
/* fun -> valor que a função showblock invoca (depende da página) depois de executar a ordem
/* usar fun apenas se pretender forçar ida para outra view
/* * */

function voidrec(tab,id,fun){
  var elem=tab.id;
  
  var tab_data=elem.split('_');
  var tab_id=tab_data[0];
  var par_id='line_n'+tab_data[1];

  /* abre excepção por causa de underscore */
  if(elem.indexOf("user_types")==0){
	   tab_id='user_types';
	   par_id='line_n'+tab_data[2];
  }
  
  var clin = document.getElementById('count_l');
  var nlin = clin.innerHTML;
  nlin =nlin-1;
  
  var link = dir+"/din/managerecords?tp=d&tb="+tab_id+'&rc='+id+'&fn='+fun;
  var ajax = new XMLHttpRequest(); 
  ajax.onreadystatechange=function() {
		  		if (ajax.readyState==4 && ajax.status==200) {
					var responseData = eval('(' + ajax.responseText + ')');
					 if(responseData['resp']=='OK'){
					 	document.getElementById(par_id).style.display='none';
					 	clin.innerHTML=nlin;
					 }
				}
		}
		ajax.open("GET",link,true);
		ajax.send();
}

/* * */
/* Edição de registos
/*
/* * */

function editrec(tab,id,fun){
 	var elem=tab.id;
 	var tab_id = elem.replace('ed',''); 
 	var tab_data=tab_id.split('_');
  	var tab_id=tab_data[0];
  	var link = dir+"/din/managerecords?tp=e&tb="+tab_id+'&rc='+id+'&fn='+fun;
  	var ajax = new XMLHttpRequest(); 
  	ajax.onreadystatechange=function() {
		  		if (ajax.readyState==4 && ajax.status==200) {
					var responseData = eval('(' + ajax.responseText + ')');
					  if(responseData[0]['resp']=='OK'){
					  	 var page = responseData[0]['tb'];

					  	 switch(true){
							case (page=='users'):
								  //var dest="set_users?f=1"; not used mas pode...
							  	  var block=parseInt(responseData[0]['bk'],10);  
							  	  document.getElementById('usern').value=responseData[1]['name'];
							  	  document.getElementById('mail').value=responseData[1]['email'];
							  	  document.getElementById('telef').value=responseData[1]['telef'];
							  	  document.getElementById('loginid').value=responseData[1]['loginid'];
							  	  document.getElementById('pass').value=responseData[1]['pass'];
							  	  document.getElementById('team').selectedIndex=responseData[1]['department_id'];
							  	  document.getElementById('establec').selectedIndex=responseData[1]['entity_id'];
							  	  document.getElementById('userlev').selectedIndex=responseData[1]['user_type']; 
			
							  	  if (responseData[1]['status']=='1'){
							  	  	var status='S';
							  	  } else {
							  	  	var status='N';
							  	  }
							  	  document.getElementById('status').value=status;
							  	  break;
					  	 }
					  	  document.getElementById('rec_id').value=responseData[1]['id'];
					  	   //window.location.href=dest+'&z';
					  	   document.getElementById('listagens').style.display='none';
					  	   showblock(block);
					  }
				}
		}
		ajax.open("GET",link,true);
		ajax.send();
}