'use strict';

/**
 * Contact FORM
 */
//------------------------------------------------------------
function contactFormAction() {
    //------------------------------------------------------------

    const contactForm = document.getElementById('contactForm');
    const subjectInput = document.getElementById('subject');
    const subjectSpanError = document.getElementById('subject_error');
    const nameInput = document.getElementById('name');
    const nameSpanError = document.getElementById('name_error');
    const userEmailInput = document.getElementById('userEmail');
    const userEmailSpanError = document.getElementById('userEmail_error');
    const messageInput = document.getElementById('message');
    const messageSpanError = document.getElementById('message_error');
    // const recaptchaInput = document.getElementById('recaptcha');
    const recaptchaSpanError = document.getElementById('recaptcha_error');
    const contact_spinner = document.getElementById("contact_spinner");

    const contactFormData = new FormData(contactForm);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', contactForm.action, true);
    xhr.onload = () => {
        // Process return data
        if (xhr.status >= 200 && xhr.status < 400) {

            const data = JSON.parse(xhr.responseText);

            // console.log(data);

            // Request Completed
            xhr.addEventListener('loadend', () => {
                // Validation
                if (!data.subject_error && !data.name_error && !data.userEmail_error && !data.message_error && !data.recaptcha_error) {
                    // Success
                    document.getElementById('success').innerHTML = `
                    <div class="mt-5">
                    <h3 class="text-success text-center py-3">Thank You for Contacting Me!</h3>
                    <p class="text-muted text-center">Your email has been successfully submitted and I will get in touch with you soon.</p>
                    </div>`;
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                }
                else {
                    if (data.subject_error) {
                        subjectInput.classList.add('is-invalid');
                        subjectSpanError.innerHTML = data.subject_error;
                    } else {
                        subjectInput.classList.remove('is-invalid');
                    }
                    if (data.name_error) {
                        nameInput.classList.add('is-invalid');
                        nameSpanError.innerHTML = data.name_error;
                    } else {
                        nameInput.classList.remove('is-invalid');
                    }
                    if (data.userEmail_error) {
                        userEmailInput.classList.add('is-invalid');
                        userEmailSpanError.innerHTML = data.userEmail_error;
                    } else {
                        userEmailInput.classList.remove('is-invalid');
                    }
                    if (data.message_error) {
                        messageInput.classList.add('is-invalid');
                        messageSpanError.innerHTML = data.message_error;
                    } else {
                        messageInput.classList.remove('is-invalid');
                    }
                    if (data.recaptcha_error) {
                        // recaptchaInput.classList.add('is-invalid');
                        recaptchaSpanError.innerHTML = data.recaptcha_error;
                    } else {
                        // recaptchaInput.classList.remove('is-invalid');
                    }
                }
            });
        } else {
            // Failed
            console.log('error: ', xhr.response);
        }
    };
    xhr.send(contactFormData);
}