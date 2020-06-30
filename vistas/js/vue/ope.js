'use strict'
var NuevoArrray=[];
export function dat(){
  return NuevoArrray;
  
}
import {ClsPersona} from './persona.js';

export class ClsEmpleado{
    constructor(){
      this.Nombre;
      this.Apellido;
      this.Edad
      this.conta=0;
      this.ArrayPersona=[];
    }
    validar(){
      this.Nombre=document.getElementById('nombre').value;
      this.Apellido=document.getElementById('apellido').value;
      this.Edad=document.getElementById('edad').value;
      if(this.Nombre==='' || this.Apellido==='' || this.Edad===''){
        alert("Campos Vacio");
      }else{
        this.registrar();
      }
    }
    saludo1(){
      alert("saludo");
    }
    registrar(){
      let ObjPersona=new ClsPersona();
      if(this.conta==0){
        this.conta=ObjPersona.getId;
      }
      ObjPersona.setNombre=this.Nombre;
      ObjPersona.setApellido=this.Apellido;
      ObjPersona.setEdad=this.Edad;
      this.conta=this.conta+1;
      ObjPersona.setId=this.conta;
      this.ArrayPersona.push(ObjPersona);
      NuevoArrray=this.ArrayPersona;
    }
    CalcularEdad(){
      var edad=this.ArrayPersona[0].getEdad;
      let Item;
      for(let i=0;i<this.ArrayPersona.length;i++){

        if(this.ArrayPersona[i].getEdad>edad){
          edad=this.ArrayPersona[i].getEdad;
          Item=i;
        }
      }
      alert("Nombre "+this.ArrayPersona[Item].getNombre+" Edad es "+edad);
    }
}
let ObjEmpleado=new ClsEmpleado();
var boton1=document.querySelector('#ope');
var btnCal=document.getElementById('cal');
boton1.addEventListener("click",(event)=>{
event.preventDefault();
    ObjEmpleado.validar();
});
btnCal.addEventListener("click",(event)=>{
  event.preventDefault();
      ObjEmpleado.CalcularEdad();
  });
  

