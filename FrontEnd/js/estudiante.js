const urlEstudiantes = "http://127.0.0.1:3000/api/ingresos";

document.getElementById('formEstu').addEventListener('submit',(e)=>{
  e.preventDefault();
  registrarestudiante();
  formEstu.reset();

});

function registrarestudiante() {
  let form = document.forms["formEstu"];
  const estudiante = {
    codigoEstudiante: form["codigoEstudiante"].value,
    nombreEstudiante: form["nombreEstudiante"].value,
    idPrograma: form["idPrograma"].value,
    fechaIngreso: form["fechaIngreso"].value,
    horaIngreso: form["horaIngreso"].value,
    horaSalida: form["horaSalida"].value,
    idResponsable: form["idResponsable"].value,
    idSala: form["idSala"].value
  };

  fetch(urlEstudiantes, {
    method: "post",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(estudiante),
  })
    .then((resp) => resp.json())
    .then((body) => {
      const newEstudiante = body.data;
      ingresos.push(newEstudiante);
    });
    alert("Datos Guardados");
}
