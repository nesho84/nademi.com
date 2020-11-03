// ***** Projects Page ********** //
function searchActions(inputID, action, appurl) {
    const userFilter = document.getElementById(inputID).value;
    const searchResults = document.getElementById('searchResults');
    searchResults.innerHTML = '';

    const xhr = new XMLHttpRequest();
    xhr.open('POST', action, true);
    xhr.setRequestHeader(
        'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'
    );
    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 400) {
            const data = JSON.parse(xhr.responseText);

            // console.log(data);

            if (data.length > 0) {
                data.forEach((el) => {

                    // Format the MySQL date from (2017-10-01) to (01/10/2017)
                    var date = el.projektCompletionDate.slice(0, 10);
                    el.projektCompletionDate = date.slice(8, 10) + '/'
                        + date.slice(5, 7) + '/'
                        + date.slice(0, 4);

                    searchResults.innerHTML += `
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow text-muted">
                            <img src="${appurl}/public/uploads/${el.projektImage}" class="card-img-top" alt="...">
                            <div class="card-body text-center border-top card-details">
                                <h5 class="card-title mb-0">${el.projektTitle}</h5>
                                <div class="card-text text-black-50">${el.projektCompletionDate}</div>
                                <div class="card-text text-black-50">${el.categoryName}</div>
                                <a href="${appurl}/projects/detail/${el.projektID}" class="stretched-link btn btn-block btn-light mt-3" id="project-detail">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>`;
                });
            } else {
                searchResults.innerHTML = `
                <div class="col mb-4">
                    <div class="card border-0 shadow text-muted">
                        <div class="card-body text-center border-top">
                            <h5 class="card-title mb-0"></h5>
                            <div class="card-text text-black-50 mt-5"><h2><i class="fas fa-info-circle fa-2x"></i><br/><br/>No Data Available</h2></div>
                        </div>
                    </div>
                </div>`;
            }

        } else {
            // Failed
            console.log('error: ', xhr.response);
        }
    };
    xhr.send(`${inputID}=${userFilter}`);
}