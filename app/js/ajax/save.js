'use strict';

function save(submitBtn) {
    // Get form by className
    const frm = submitBtn.form;
    // Get form elements
    const elements = frm.elements;
    // init errors
    let errors = false;

    // Prevent the default
    frm.addEventListener('submit', (e) => {
        e.preventDefault();
    });

    // Ajax Request
    const formData = new FormData(frm);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', frm.action, true);
    xhr.onload = () => {
        // Process our return data
        if (xhr.status >= 200 && xhr.status < 400) {
            const data = JSON.parse(xhr.responseText);

            console.log(data);

            for (let i = 0; i < elements.length; i++) {
                // Clear fields errors
                if (elements[i].type != 'submit') {
                    elements[i].classList.remove('is-invalid');
                    elements[i].nextElementSibling.innerHTML = "";
                }

                // Get span id
                let spanId = elements[i].nextElementSibling.getAttribute('id');

                // Search for errors in response object
                for (let [key, value] of Object.entries(data)) {
                    // Show errors
                    // object key = 'field_error' and spanid = 'field_error'
                    if (key == spanId) {
                        // add class invalid to input
                        elements[i].classList.add('is-invalid');
                        // add error text to span tag or small tag
                        elements[i].nextElementSibling.innerHTML = value;
                    }

                    // set 'errors' to true or false
                    errors = key.includes("error");
                }

                // If object does not return any string with error
                if (!errors) {
                    // Remove element invalid feedback
                    elements[i].classList.remove('is-invalid');
                    // Show dialog
                    Swal.fire({
                        icon: 'success',
                        title: 'Saved!',
                        text: "Saved successfully."
                    }).then((result) => {
                        // console.log(result);
                        // Go back to parent Page
                        window.history.back();
                    });
                }
            }
        } else {
            // Failed
            console.log('error: ', xhr);
        }
    };
    xhr.send(formData);

    // Show other errors
    xhr.onerror = () => {
        // Show alert
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: 'Please try again later.'
        });
    }
}