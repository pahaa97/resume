
const login_form = document.querySelector('form.login_form');
if(login_form) {
    login_form.addEventListener('submit', function (e) {
        e.preventDefault();

        let username = login_form.querySelector('input[name="username"]').value;
        let password = login_form.querySelector('input[name="password"]').value;

        const url = "/";
        var params = new URLSearchParams();
        params.set('login', 'login');
        params.set('username', username);
        params.set('password', password);

        fetch(url, {
            body: params,
            method: 'POST'
        }).then(
            response => {
                return response.json();
            }
        ).then(
            text => {
                if (text.success) {
                    location = "/";
                } if (text.errors) {
                    nothificationError(text.errors);
                }
            }
        );
    });
}

const register_form = document.querySelector('form.register_form');
if(register_form) {
    register_form.addEventListener('submit', function (e) {
        e.preventDefault();

        let email = register_form.querySelector('input[name="email"]').value;
        let username = register_form.querySelector('input[name="username"]').value;
        let password = register_form.querySelector('input[name="password"]').value;
        let repeat_password = register_form.querySelector('input[name="repeat_password"]').value;

        const url = "/";
        var params = new URLSearchParams();
        params.set('register', 'register');
        params.set('email', email);
        params.set('username', username);
        params.set('password', password);
        params.set('repeat_password', repeat_password);

        fetch(url, {
            body: params,
            method: 'POST'
        }).then(
            response => {
                return response.json();
            }
        ).then(
            text => {
                if (text.success) {
                    location = "/";
                } if (text.errors) {
                    nothificationError(text.errors);
                }
            }
        );
    });
}

const edit_form = document.querySelector('form.edit_form');
if(edit_form) {
    edit_form.addEventListener('submit', function (e) {
        e.preventDefault();

        let phone = edit_form.querySelector('input[name="phone"]').value;
        let email = edit_form.querySelector('input[name="email"]').value;
        let address = edit_form.querySelector('input[name="address"]').value;
        let linkedin = edit_form.querySelector('input[name="linkedin"]').value;
        let education = edit_form.querySelector('textarea[name="education"]').value;
        let skills = edit_form.querySelector('input[name="skills"]').value;
        let name = edit_form.querySelector('input[name="name"]').value;
        let profile = edit_form.querySelector('textarea[name="profile"]').value;
        let experience = edit_form.querySelector('textarea[name="experience"]').value;
        let image = edit_form.querySelector('input[name="userfile"]').files[0];

        const url = "/";
        var params = new FormData();
        params.set('edit', 'edit');
        params.set('phone', phone);
        params.set('email', email);
        params.set('address', address);
        params.set('linkedin', linkedin);
        params.set('education', education);
        params.set('skills', skills);
        params.set('name', name);
        params.set('profile', profile);
        params.set('experience', experience);
        params.append('userfile', image);

        fetch(url, {
            body: params,
            method: 'POST'
        }).then(
            response => {
                return response.json();
            }
        ).then(
            text => {
                if (text.success) {
                    location = "/";
                } if (text.errors) {
                    nothificationError(text.errors);
                }
            }
        );
    });
}



function nothificationError(errors) {
    const popup = document.querySelector('.notifications');
    // console.log(errors);
    popup.style.display = 'block';
    let html = '<div class="errors">';
    html = html + '<button type="button" style="font-size: 18px;" class="close_popup">x</button>';
    html = html + '<h2>Error!</h2>'
    html = html + '</div>';
    popup.innerHTML = html;
    if (Array.isArray(errors)) {
        errors.forEach( // перебор элементов
            function (error) {
                let p_error = document.createElement("p");
                p_error.textContent = error;
                popup.querySelector(".errors").append(p_error);
            }
        );
    } else {
        popup.querySelector(".errors").append(errors);
    }
}

function nothificationSuccess(success) {
    // console.log(success);
    const popup = document.querySelector('.notifications');
    popup.style.display = 'block';
    let html = '<div class="success">';
    html = html + '<button type="button" style="font-size: 18px;" class="close_popup">x</button>';
    html = html + '<h2>Success!</h2>'
    // html = html + success.innerText;
    html = html + '</div>';
    popup.innerHTML = html;
    if (Array.isArray(success)) {
        success.forEach( // перебор элементов
            function ( succ ) {
                let p_success = document.createElement("p");
                p_success.textContent = succ;
                popup.querySelector(".success").append(p_success);
            }
        );
    } else {
        popup.querySelector(".success").append(success);
    }
}



const popup = document.querySelector('.notifications');
const success = popup.querySelector(".success p");
const errors = popup.querySelector(".errors p");
if (popup) {
    if (success) {
        nothificationSuccess(success);
    }
    if (errors) {
        nothificationError(errors);
    }
    popup.onclick = function (e) {
        if (e.target.classList == 'notifications' || e.target.classList == 'close_popup') {
            popup.style.display = 'none';
        }
    };
}


