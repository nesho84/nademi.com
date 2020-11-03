'use strict';

/**
 * CHECK LOGIN
 */
//------------------------------------------------------------
function submitLogin() {
    //------------------------------------------------------------

    const formLogin = document.getElementById('formLogin');
    const redirectTo = document.querySelector('[data-redirect]').getAttribute('data-redirect');
    const emailInput = document.getElementById('email');
    const emailSpanError = document.getElementById('email_error');
    const passwordInput = document.getElementById('password');
    const passwordSpanError = document.getElementById('password_error');
    const login_spinner = document.getElementById("login_spinner");

    formLogin.addEventListener("submit", (e) => {
        e.preventDefault();

        const formLoginData = new FormData(formLogin);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', formLogin.action, true);
        xhr.onload = () => {
            // Process returned data
            if (xhr.status >= 200 && xhr.status < 400) {

                const data = JSON.parse(xhr.responseText);

                // console.log(data);

                // Validation
                if (!data.email_error && !data.password_error) {
                    emailInput.classList.remove('is-invalid');
                    passwordInput.classList.remove('is-invalid');

                    // Showing Spinner
                    login_spinner.innerHTML = `<div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                    </div>`;

                    setTimeout(() => {
                        window.location.replace(redirectTo);
                    }, 1000);
                } else {
                    if (data.email_error) {
                        emailInput.classList.add('is-invalid');
                        emailSpanError.innerHTML = data.email_error;
                    } else {
                        emailInput.classList.remove('is-invalid');
                    }
                    if (data.password_error) {
                        passwordInput.classList.add('is-invalid');
                        passwordSpanError.innerHTML = data.password_error;
                    } else {
                        passwordInput.classList.remove('is-invalid');
                    }
                }
            } else {
                // Failed
                console.log('error: ', xhr);
            }
        };
        xhr.send(formLoginData);
    });
}