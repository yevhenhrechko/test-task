function handleData() {
    let data = JSON.parse(this.response);

    if (this.status !== 200) {
        handleError(data);

        return;
    }

    handleSuccess(data)
}

function handleSuccess(data) {
    alert('Equal: ' + data.message.success);
}

function handleError(data) {
    alert(data.errors.toString());
}

function sendRequest(type, url, data, callback = function() {}) {
    let request = new XMLHttpRequest();
    request.onload = callback;
    request.open(type, url);
    request.send(data);
}

function formSubmit(e) {
    e.preventDefault();
    e.stopImmediatePropagation();

    let data = new FormData(this);
    sendRequest('POST', this.getAttribute('action'), data, handleData);
}

function validateForm() {
    let form = document.getElementById('validation-form');

    form.addEventListener('submit', formSubmit);
}

document.addEventListener('DOMContentLoaded', function () {
    validateForm();
})
