var form = document.querySelector('#contact-form');
console.log(form);

form.addEventListener('submit', function(event) {
    event.preventDefault();
    Swal.fire(
        'Enviado correctamente!',
        'Gracias por escribirnos, nos pondremos en contacto con el la brevedad!',
        'success'
    )
    let formData = new FormData(form);
    form.reset();
    fetch("contact.php",
    {
        body: formData,
        method: "post"
    });
    
});