function switch_navbar_active(name) {
    const navbar_index = document.getElementById('navbar-home');
    const navbar_travel = document.getElementById('navbar-travel');
    const navbar_contact = document.getElementById('navbar-contact');
    const navbar_information = document.getElementById('navbar-information');

    for (let x of ['index', 'travel', 'contact', 'information']) {
        (eval("navbar_" + x)).classList.remove('active');
        // console.log(eval("navbar" + x));

        if (x === name) {
            eval("navbar_" + x).classList.add('active');
        }
    }
}

// Get file name
var path = window.location.pathname;

var fileName = path.split('/').pop();
fileName = fileName.split('.')[0];

// If file name equal to any main field in Navbar -> make if active
if (['index', 'travel', 'contact', 'information'].includes(fileName)) {
    switch_navbar_active(fileName);
}
