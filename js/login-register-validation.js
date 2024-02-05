// Get the full URL as a string
const fullUrl = window.location.href;
// Create a URL object
const url = new URL(fullUrl);

// Get the query parameters
const queryParams = url.search.substring(1); // Removing the leading '?'

// Split the query parameters into key-value pairs
const queryParamsArray = queryParams.split('&');

// Create an object to store key-value pairs
const queryParamsObject = {};

// Iterate through the array and populate the object
queryParamsArray.forEach(param => {
    const [key, value] = param.split('=');
    queryParamsObject[key] = value;
});


//// ################## Password visibility  ################# ////

const visiblePasswordIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                        </svg>`;

const invisiblePasswordIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                            </svg>`;

function changePasswordVisibility(element){
    if(element.classList.contains('invisible-password')){

        element.classList.remove('invisible-password');
        element.classList.add('visible-password');

        element.innerHTML = visiblePasswordIcon;

        document.getElementById(queryParamsObject['case'] + "-" + element.id.replace("-eye", '')).type = "text";
    }
    else{
        
        element.classList.remove('visible-password');
        element.classList.add('invisible-password');
    
        element.innerHTML = invisiblePasswordIcon;

        document.getElementById(queryParamsObject['case'] + "-" + element.id.replace("-eye", '')).type = "password";
    }
}


if(queryParamsObject['case'] == 'login'){
    const login_form = document.getElementById('login-form');
    const login_error = document.getElementById('login-error');

    login_form.addEventListener('keydown', function(){
        login_error.style.display='none';
    });

}




// #############################################################################################################

if (queryParamsObject['case'] === "register") {

    // Register Variables
    const register_form = document.getElementById('register-form');
    
    const register_firstName = document.getElementById('register-firstName');
    const register_secondName = document.getElementById('register-secondName');

    const register_email = document.getElementById('register-email');
    const register_age = document.getElementById('register-age');
    
    const register_password = document.getElementById('register-password');
    const register_confirmPassword = document.getElementById('register-confirmPassword');
    
    const register_submit = document.getElementById('register-submit');
    const register_error = document.getElementById('register-error');

    let check_valids = {
        firstName: false,
        secondName: false,
        email: false,
        age: false,
        password: false,
        confirmPassword: false
    };

    const check_all_validations = function () {

        if (Object.values(check_valids).includes(false)) {
            register_submit.classList.add("submit-disabled");
            register_submit.disabled = true;
        }
        else {
            register_submit.classList.remove("submit-disabled");
            register_submit.disabled = false;
        }
    }


    let timer;
    const delay = 1000;

    // Register First Name Check
    register_firstName.addEventListener('input', function (e) {
        // Remove any previous input feedback and any validation check
        e.target.classList.remove('is-valid', 'is-invalid');
        check_valids[(e.target.id).replace('register-', '')] = false;

        clearTimeout(timer);
        timer = setTimeout(() => {
            let error;
            const inputValue = e.target.value.trim();

            // Regular expression to match only characters from 'a' to 'z'
            const regex = /^[a-z]*$/i; // 'i' flag makes it case-insensitive

            // Check if the input doesn't have any characters or contains only 'a' to 'z'
            if (inputValue.length === 0 || regex.test(inputValue)) {
                if (inputValue.length < 3) {
                    error = "Please enter a valid name at least 3 characters";
                }
            } else {
                error = "Please enter a valid name contains only English letters";
            }

            // Check if there any errors and if there are any appear errors message and appear feedback
            if (error) {
                e.target.classList.add('is-invalid');
                document.getElementById(e.target.id + "-wrong").innerHTML = error;
            }
            else {
                e.target.classList.add('is-valid');
                check_valids[(e.target.id).replace('register-', '')] = true;
            }
        }, delay);

    });


    // Register Second Name Check
    register_secondName.addEventListener('input', function (e) {
        // Remove any previous input feedback and any validation check
        e.target.classList.remove('is-valid', 'is-invalid');
        check_valids[(e.target.id).replace('register-', '')] = false;

        clearTimeout(timer);
        timer = setTimeout(() => {
            let error;
            const inputValue = e.target.value.trim();
            
            // Regular expression to match only characters from 'a' to 'z'
            const regex = /^[a-z]*$/i; // 'i' flag makes it case-insensitive

            // Check if the input doesn't have any characters or contains only 'a' to 'z'
            if (inputValue.length === 0 || regex.test(inputValue)) {
                if (inputValue.length < 3) {
                    error = "Please enter a valid name at least 3 characters";
                }
            } else {
                error = "Please enter a valid name contains only English letters";
            }

            // Check if there any errors and if there are any appear errors message and appear feedback
            if (error) {
                e.target.classList.add('is-invalid');
                document.getElementById(e.target.id + "-wrong").innerHTML = error;
            }
            else {
                e.target.classList.add('is-valid');
                check_valids[(e.target.id).replace('register-', '')] = true;

            }
        }, delay);
    });

    
    // Register Email Check
    register_email.addEventListener('input', function (e) {
        // Remove any previous input feedback and any validation check
        e.target.classList.remove('is-valid', 'is-invalid');
        check_valids[(e.target.id).replace('register-', '')] = false;

        clearTimeout(timer);
        timer = setTimeout(() => {
            let error;
            const inputValue = e.target.value.trim();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(inputValue)) {
                error = "Please Enter Valid Email";
            }

            // Check if there any errors and if there are any appear errors message and appear feedback}
            if (error) {
                e.target.classList.add('is-invalid');
                document.getElementById(e.target.id + "-wrong").innerHTML = error;
            }
            else {
                e.target.classList.add('is-valid');
                check_valids[(e.target.id).replace('register-', '')] = true;
            }
        }, delay);
    });

    // Register Age Check
    register_age.addEventListener('input', function (e) {
        // Remove any previous input feedback and any validation check
        e.target.classList.remove('is-valid', 'is-invalid');
        check_valids[(e.target.id).replace('register-', '')] = false;

        clearTimeout(timer);
        timer = setTimeout(() => {
            let error;
            const inputValue = new Date(e.target.value);

            const today = new Date();
            const yesterday = new Date(today);
            yesterday.setDate(today.getDate() - 1);


            // Calculate the difference in milliseconds
            const timeDifference = yesterday - inputValue;

            // Calculate the difference in days
            const daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            if (daysDifference < 1) {
                const formattedYesterday = yesterday.toISOString().split('T')[0].split('-');

                error = "Please enter a Date earlier than<br>" + parseInt(formattedYesterday[2]) + '-' + parseFloat(formattedYesterday[1]) + '-' + formattedYesterday[0];
            }


            // Check if there any errors and if there are any appear errors message and appear feedback
            if (error) {
                e.target.classList.add('is-invalid');
                document.getElementById(e.target.id + "-wrong").innerHTML = error;
            }
            else {
                e.target.classList.add('is-valid');
                check_valids[(e.target.id).replace('register-', '')] = true;
            }

        }, delay);


    });

    // Register Password Check
    register_password.addEventListener('input', function (e) {
        // Remove any previous input feedback and any validation check
        e.target.classList.remove('is-valid', 'is-invalid');
        check_valids[(e.target.id).replace('register-', '')] = false;

        clearTimeout(timer);
        timer = setTimeout(() => {
            let error;
            let inputValue = e.target.value;

            let lowercase = false, uppercase = false, number = false;
            for(const element of inputValue){
                if(/[a-z]/.test(element)) lowercase = true;
                if(/[A-Z]/.test(element)) uppercase = true;
                if(/[0-9]/.test(element)) number = true;
            }

            if(inputValue.length < 8){
                error = "Password must be at least 8 characters long";
            }
            else if(inputValue.length > 64){
                error = "Password must be at most 64 characters long";
            }
            else if(!lowercase || !uppercase || !number){
                error = "Password must contain at least one digit of <br> [uppercase, lowercase, number]"
            }


            // Check if there any errors and if there are any appear errors message and appear feedback
            if (error) {
                e.target.classList.add('is-invalid');
                document.getElementById(e.target.id + "-wrong").innerHTML = error;
            }
            else {
                e.target.classList.add('is-valid');
                check_valids[(e.target.id).replace('register-', '')] = true;
            }
        }, delay);
    });

    // Register Confirm Password Check
    register_confirmPassword.addEventListener('input', function (e) {
        // Remove any previous input feedback and any validation check
        e.target.classList.remove('is-valid', 'is-invalid');
        check_valids[(e.target.id).replace('register-', '')] = false;


        clearTimeout(timer);
        timer = setTimeout(() => {
            let error;

            if(!check_valids['password']){
                error = "Enter valid Password";
            }
            else if (e.target.value != register_password.value) {
                error = "Not Matcehd Password";
            }

            // Check if there any errors and if there are any appear errors message and appear feedback
            if (error) {
                e.target.classList.add('is-invalid');
                document.getElementById(e.target.id + "-wrong").innerHTML = error;
            }
            else {
                e.target.classList.add('is-valid');
                check_valids[(e.target.id).replace('register-', '')] = true;
            }
        }, delay);
    });

    register_form.addEventListener('submit', function(e){
        if(Object.values(check_valids).includes(false)){
            e.preventDefault();
        }
    });

    let error_disappear = !register_error;

    // Register form Keydown
    register_form.addEventListener('keydown', function (e) {
        setTimeout(() => {
            check_all_validations();

        }, delay + 500);

        if (e.key === 'Enter') {
            e.preventDefault();
        }
        else if(!error_disappear){
            register_error.style.display = "none";
            error_disappear = false;
        }
    });
}

// #############################################################################################################