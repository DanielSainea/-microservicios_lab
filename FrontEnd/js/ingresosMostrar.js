const urlIngreso = "http://127.0.0.1:3000/api/ingresos";
let ingresos = [];

function consultarIngresos(fechaMin,fechaMax) {
  fetch(urlIngreso)
    .then((res) => res.json())
    .then((body) => {
      ingresos = body.data;
      console.log(ingresos);
      cargarTablaIngresos(fechaMin,fechaMax);
    });
}

let conteoInicio = 1;
fechaRango();

document.getElementById('idfecha').addEventListener('submit', (event) => {
  event.preventDefault();
  let min = new Date(document.getElementById('fechaMin').value); 
  let max = new Date(document.getElementById('fechaMax').value); 

  let fechaMin = ordenFecha(min);
  let fechaMax = ordenFecha(max);

  fechaRango(fechaMin,fechaMax);
});

function ordenFecha(fecha){
  const anio = fecha.getFullYear();
  const mes = (fecha.getMonth()+1).toString().padStart(2,'0');
  const dia = fecha.getDate().toString().padStart(2,'0');
  let orden = anio+"-"+mes+"-"+dia;
  return orden;
}

function fechaRango(min,max){
  if(min==undefined && max==undefined && conteoInicio==1){
    const hoy = new Date();
    const anio = hoy.getFullYear();
    const mes = (hoy.getMonth()+1).toString().padStart(2,'0');
    const dia = hoy.getDate().toString().padStart(2,'0');
    conteoInicio++;
    let fechaHoy = anio+"-"+mes+"-"+dia;
    consultarIngresos(fechaHoy,fechaHoy);
  }else{
    let fechaMin = min;
    let fechaMax = max;
    consultarIngresos(fechaMin,fechaMax);
  }
}

function cargarTablaIngresos(fechaMin,fechaMax) {
  const tbody = document.getElementById("ingresosTable").getElementsByTagName("tbody")[0];
  tbody.innerHTML = ingresos.map((item) => {
      if(item.fechaIngreso==fechaMin && item.fechaIngreso==fechaMax){
        let html = "<tr>";
        html += "   <td>" + item.codigoEstudiante + "</td>";
        html += "   <td>" + item.nombreEstudiante + "</td>";
        programa=validarPrograma(item.idPrograma);
        html += "   <td>" + programa + "</td>";
        html += "   <td>" + item.fechaIngreso + "</td>";
        html += "   <td>" + item.horaIngreso + "</td>";
        html += "   <td>" + item.horaSalida + "</td>";
        responsable=validarResponsable(item.idResponsable);
        html += "   <td>" + responsable + "</td>";
        sala=validarSala(item.idSala);
        html += "   <td>" + sala + "</td>";
        html += "</tr>";
        return html;
      }else if(item.fechaIngreso>=fechaMin && item.fechaIngreso<=fechaMax){
          let html = "<tr>";
          html += "   <td>" + item.codigoEstudiante + "</td>";
          html += "   <td>" + item.nombreEstudiante + "</td>";
          programa=validarPrograma(item.idPrograma);
          html += "   <td>" + programa + "</td>";
          html += "   <td>" + item.fechaIngreso + "</td>";
          html += "   <td>" + item.horaIngreso + "</td>";
          html += "   <td>" + item.horaSalida + "</td>";
          responsable=validarResponsable(item.idResponsable);
          html += "   <td>" + responsable + "</td>";
          sala=validarSala(item.idSala);
          html += "   <td>" + sala + "</td>";
          html += "</tr>";
          return html;
        }
    })
    .join("");
}

function validarPrograma(id){
  if(id==1){
    programa="Ing. Sistemas";
  }if(id==2){
    programa="Ing. Multimedia";
  }if(id==3){
    programa="Arquitectura";
  }if(id==4){
    programa="Contabilidad";
  }
  return programa
}

function validarResponsable(id){
  if(id==1){
    responsable="Juan Perez";
  }if(id==2){
    responsable="Ana Lopeez";
  }
  return responsable
}

function validarSala(id){
  if(id==1){
    sala="201G";
  }if(id==2){
    sala="202H";
  }if(id==3){
    sala="203I";
  }if(id==4){
    sala="301G";
  }if(id==5){
    sala="302H";
  }if(id==6){
    sala="303I";
  }
  return sala
}