function consultarProductos() {
  //   fetch("https://fakestoreapi.com/products")
  //     .then((response) => {
  //       console.log(response);
  //       return response.json();
  //     })
  //     .then((data) => {
  //       console.log(data);
  //     })
  //     .catch(error=>{
  //         alert('Error al consumir el servicio');
  //     })
  //     .finally(()=>{
  //         console.log('Servicio consumido!!!!');
  //     });

  const servicio = fetch("https://fakestoreapi.com/products");
  const resp = servicio.then((response) => {
    console.log(response);
    return response.json();
  });
  resp.then((data) => {
    console.log(data);
  });
  resp.catch((error) => {
    alert("Error al consumir el servicio");
  });
  resp.finally(() => {
    console.log("Servicio consumido!!!!");
  });
}

async function consultarProductosDos() {
  const response = await fetch("https://fakestoreapi.com/products");
  const data = await response.json();
  console.log("Productos: ", data);
}
consultarProductos();
consultarProductosDos();

function listarContactos() {
  fetch("http://127.0.0.1:8000/api/contactos")
    .then((resp) => resp.json())
    .then((body) => {
      console.log(body.data);
    })
    .catch((error) => {
      console.error("Error al consultar la lista de productos");
    });

  fetch("http://127.0.0.1:8000/api/contactos", {
    method: "post",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      nombre: "Pepe Perez",
      email: "testPepe@perez.com",
      telefono: "126999",
    }),
  })
    .then((response) => alert("Contacto guardado"))
    .catch((error) => alert("No se pudo registrar el contacto"));

  fetch("http://127.0.0.1:8000/api/contactos/6", {
    method: "put",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      nombre: "Pepe Perez G",
      email: "testPepe@perez.com",
      telefono: "126999",
    }),
  })
    .then((response) => alert("Contacto actualizado"))
    .catch((error) => alert("No se pudo actualizar el contacto"));
}
listarContactos();
