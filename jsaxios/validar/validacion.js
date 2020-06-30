let Datos={};
let DatosConsulta={};
let elementos;
export function datos(frm,opc){
    elementos =frm.getElementsByTagName("input");
    return  Validar(elementos,opc);
}
export function ValidaFrm1(frm){
    elementos =frm.getElementsByTagName("input");
    var check=false;
    var a=0;
    var e=0;
    var tipo=0;
    var conta=elementos.length;
    while(a<conta){
    let valor= elementos[a].value.trim();
    if(elementos[a].value=="" || valor.length<=0){
        e=a;
        tipo=1;
        check=true;
        break; 
        }
    a++;
    }
    if(tipo==1 && check==true){
        $.notify("Campo vacio ");
        elementos[e].focus();
    }
    if(check==false){
        return true;
    }
}
function Validar(elementos,opc){
    var check=false;
    var a=0;
    var e=0;
    var tipo=0;
    var conta=elementos.length;
    while(a<conta){
    let valor= elementos[a].value.trim();
    if(elementos[a].value.length==0 || valor.length<=0){
        if(elementos[a].type=="file" ){
        alert("imagen "+elementos[a].value);
        if(elementos[a].value.length==0 || valor.length<=0){
            check=true;
            tipo=2;
            e=a;
            break;
            }
            
        }
        e=a;
        check=true;
        tipo=1;
        break; 
        }
        a++;
    }
    if(tipo==1 && check==true){
        $.notify("Campo vacio ");
        elementos[e].focus();
    }
    else if(tipo==2 && check==true){
        $.notify("Seleccione Imagen");
    }
    else if(opc==0){
        check=true;
        $.notify("Seleccione Categoria");
    }
    if(check==false){
        return true;
    }
}
function ValidarTipo3(elementos,opc){
    var check=false;
    var a=0;
    var e=0;
    var tipo=0;
    var conta=elementos.length;
    while(a<conta){
    let valor= elementos[a].value.trim();
    if(elementos[a].value.length==0 || valor.length<=0){
        if(elementos[a].type=="file" ){
        alert("imagen "+elementos[a].value);
        if(elementos[a].value.length==0 || valor.length<=0){
            check=true;
            tipo=2;
            e=a;
            break;
            }
            
        }
        e=a;
        check=true;
        tipo=1;
        break; 
        }
        a++;
    }
    if(tipo==1 && check==true){
        $.notify("Campo vacio ");
        elementos[e].focus();
    }
    else if(tipo==2 && check==true){
        $.notify("Seleccione Imagen");
    }
    else if(opc==0){
        check=true;
        $.notify("Seleccione Categoria");
    }
    if(check==false){
        return true;
    }
}
export function ValidaNumeros(dato){

}