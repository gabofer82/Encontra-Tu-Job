/**
 * @author Administrador
 */
function ponerAnho(){
    var anho = document.getElementById("anhoNac");//tomamos el elemento anhoNac.
    fechaActual = new Date();//fecha actual
    anhoActual = fechaActual.getYear();//año de la fecha actual
    anhoActual+=1900;//debido a que nos arroja los años transcurridos entre 1900 (en este caso 109) le debemos sumar 1900 para que nos de 2009)
    var anhosTotal = anho.options.length-1;//tomamos los años que hay en el select y los borramos en el for
    for(var i=anhosTotal;i>=0;i--){
        anho.options[i]=null;
    }
    var i=0;//creamos esta variable para las posiciones en el select
    for(var a=anhoActual-5;a>=anhoActual-80;a--){
        op = document.createElement("OPTION");//pasamos a crear el option
        op.value = a;
        op.text = a;
        anho.options[i] = op;//en la posicion i creamos ese option
        i++;//aumentamos i
    }
}

function ponerMes(){
    var mes = document.getElementById("mesNac");//tomamos el elemento
    var nombreMes;//creamos la variable que va a contener los nombres de los meses
    for(var m=0;m<=11;m++){//aca escojemos el mes segun el ciclo
        if(m==0){
            nombreMes="Enero";
        }
        if(m==1){
            nombreMes="Febrero";
        }
        if(m==2){
            nombreMes="Marzo";
        }
        if(m==3){
            nombreMes="Abril";
        }
        if(m==4){
            nombreMes="Mayo";
        }
        if(m==5){
            nombreMes="Junio";
        }
        if(m==6){
            nombreMes="Julio";
        }
        if(m==7){
            nombreMes="Agosto";
        }
        if(m==8){
            nombreMes="Septiembre";
        }
        if(m==9){
            nombreMes="Octubre";
        }
        if(m==10){
            nombreMes="Noviembre";
        }
        if(m==11){
            nombreMes="Diciembre";
        }
        op = document.createElement("OPTION");//creamos la opcion
        var valorMes="";
        var aux=0;
        if(m+1>0 && m+1<10){//dado que el día trabaja con el mes en dos digitos entonces le agregamos un cero (0) al inicio si es menor que 10
            aux=m+1;
            valorMes="0"+aux;
        }
        else{//si no pues no XD
            valorMes=m+1;
        }
        op.value = valorMes;
        op.text = nombreMes;
        mes.options[m] = op;
 
    }
}

function ponerDias(){
    var anho = document.getElementById("anhoNac");//tomamos el elemento año
    var mes = document.getElementById("mesNac");//el mes
    var dias = document.getElementById("diaNac");//y el dia
    var diasTotal = dias.options.length-1;//tomamos cuantos elementos hay en el select
    for(var i=diasTotal;i>=0;i--){//y los borramos
        dias.options[i]=null;
    }
    var diasMes = 0;//esta variable creo que ya no la uso XD
    //si es enero, marzo, mayo, etc, le asigno 31 dias, recuerden lo de que empieza en 0 y termina en 30 para hacer 31 dias, aqui tambien 
    //sumo 1 a la variable
    if(mes.value=="01" || mes.value=="03" || mes.value=="05" || mes.value=="07" || mes.value=="08" || mes.value=="10" || mes.value=="12"){
        //dias.options.length=30;
        for(var o=0;o<=30;o++){
            op = document.createElement("OPTION");
            if (o < 10) {
            	valor = o+1;
                op.value ="0"+valor;
                op.text = o+1;
                	
                } else {
                op.value =o+1;
                op.text = o+1;
                }
            dias.options[o] = op;
            //document.body.appendChild(dias);
        }
    }
    //si el mes es de 30 dias entonces solo le pongo 30 dias
    if(mes.value=="04" || mes.value=="06" || mes.value=="09" || mes.value=="11"){
        //dias.options.length=30;
        for(var o=00;o<=29;o++){
            op = document.createElement("OPTION");
            if (o < 10) {
                op.value ="0"+o+1;
                op.text = "0"+o+1;
                	
                } else {
                op.value =o+1;
                op.text = o+1;
                }
            dias.options[o] = op;
            //document.body.appendChild(dias);
        }
    }
    //pero si el mes es el desgraciado de febrero, (desgraciado por que tiene mas poquitos :S)
    if(mes.value=="02"){
        //si es bisiesto
        if((anho.value % 4 == 0) && ((anho.value % 100 != 0) || (anho.value % 400 == 0))){
            for(var o=00;o<=28;o++){
                op = document.createElement("OPTION");
                if (o < 10) {
                op.value ="0"+o+1;
                op.text = "0"+o+1;
                	
                } else {
                op.value =o+1;
                op.text = o+1;
                }
                dias.options[o] = op;
                //document.body.appendChild(dias);
            }
        }
        else{//o si no lo es
            for(var o=00;o<=27;o++){
                op = document.createElement("OPTION");
                if (o < 10) {
                op.value ="0"+o+1;
                op.text = "0"+o+1;
                	
                } else {
                op.value =o+1;
                op.text = o+1;
                }
                dias.options[o] = op;
                //document.body.appendChild(dias);
            }
        }
    }
}
//http://www.desarrolloweb.com/manuales/22/     y     http://www.forosdelweb.com/wiki/Javascript/%C2%BFC%C3%B3mo_hacer_escoger_fecha_de_nacimiento%3F


/*									esto va en el formulario	
										<label for="fecNac"> Fecha Nacimiento </label>
										<select id="anhoNac" onchange="ponerDias()">
										 <script>ponerAnho();</script>
										</select>
										<select id="mesNac" onchange="ponerDias()">
										 <script>ponerMes();</script>
										</select>
										<select id="diaNac">
										 <script>ponerDias();</script>
										</select>
										*/