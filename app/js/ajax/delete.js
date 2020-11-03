'use strict';

// Self-Invoking Function which helps protect the scope of variables
(function submitDelete() {
    const deleteBtn = document.querySelectorAll('.deleteBtn');

    deleteBtn.forEach(link => {
        const actionUrl = link.href;

        link.addEventListener('click', (e) => {
            e.preventDefault();

            // Show Confirm Dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                console.log(result)
                if (result.value) {
                    // Proccess delete
                    proccessDelete(actionUrl, link);
                }
            })
        });
    });
})();

// Process Delete
function proccessDelete(actionUrl, link) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', actionUrl, true);
    xhr.onload = () => {
        // Process our return data
        if (xhr.status >= 200 && xhr.status < 400) {
            const data = JSON.parse(xhr.responseText);

            console.log(data);

            if (data.msg.trim() == 'success') {
                // Remove element from the DOM
                link.parentElement.parentNode.remove();

                // Show alert
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: "Item deleted successfully.."
                }).then((result) => {
                    // console.log(result);
                    // Refresh page
                    window.location.reload();
                });
            }
        } else {
            // Failed
            console.log('error: ', xhr);
        }
    }
    xhr.send();

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

// Delete Single Image
(function deleteSingleImage() {
    const deleteSingleImage = document.querySelectorAll('.delete-single-img');

    deleteSingleImage.forEach(link => {
        const dataAttr = link.getAttribute('data-single');
        const actionUrl = link.href;

        link.addEventListener('click', (e) => {
            e.preventDefault();

            // Show Confirm Dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                console.log(result)
                if (result.value) {
                    // Proccess delete
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', actionUrl, true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onload = () => {
                        // Process our return data
                        if (xhr.status >= 200 && xhr.status < 400) {
                            const data = JSON.parse(xhr.responseText);

                            console.log(data);

                            if (data.msg.trim() == 'success') {
                                // Remove element from the DOM
                                link.parentElement.remove();
                            }
                        } else {
                            // Failed
                            console.log('error: ', xhr);
                        }
                    }
                    xhr.send("img=" + dataAttr);
                }
            })
        });
    });
})();