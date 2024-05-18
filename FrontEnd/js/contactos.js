const urlContactos = "http://127.0.0.1:8000/api/contactos";
let contactos = [];

function consultarContactos() {
  fetch(urlContactos)
    .then((res) => res.json())
    .then((body) => {
      contactos = body.data;
      console.log(contactos);
      cargarTablaContactos();
    });
}

function cargarTablaContactos() {
  const tbody = document
    .getElementById("contactosTable")
    .getElementsByTagName("tbody")[0];
  tbody.innerHTML = contactos
    .map((item) => {
      let html = "<tr>";
      html += "   <td>" + item.nombre + "</td>";
      html += "   <td>" + item.email + "</td>";
      html += "   <td>" + item.telefono + "</td>";
      html += "   <td>";
      html += "       <button>Modificar</button>";
      html +=
        '       <button onClick="eliminarContacto(' +
        item.id +
        ')">Eliminar</button>';
      html += "   </td>";
      html += "</tr>";
      return html;
    })
    .join("");
}

consultarContactos();

function registrarContacto() {
  const form = document.forms["contactoForm"];
  const contacto = {
    nombre: form["nombre"].value,
    email: form["email"].value,
    telefono: form["telefono"].value,
  };
  fetch(urlContactos, {
    method: "post",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(contacto),
  })
    .then((resp) => resp.json())
    .then((body) => {
      const newContacto = body.data;
      contactos.push(newContacto);
      cargarTablaContactos();
      //consultarContactos();
    });
}

function eliminarContacto(id) {
  fetch(urlContactos + "/" + id, { method: "delete" })
  .then(resp=>resp.json())
  .then(body=>{
    const msg = body.data;
    alert(msg);
    consultarContactos();
  });
}

document.getElementById("contactoForm").addEventListener("submit", (e) => {
  e.preventDefault();
  registrarContacto();
});
