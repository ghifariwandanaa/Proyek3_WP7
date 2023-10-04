/*!
* Start Bootstrap - Resume v7.0.6 (https://startbootstrap.com/theme/resume)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-resume/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Activate Bootstrap scrollspy on the main nav element
    const sideNav = document.body.querySelector('#sideNav');
    if (sideNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#sideNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleButton');
    const aboutDetails = document.getElementById('about-details');

    toggleButton.addEventListener('click', function () {
        if (aboutDetails.style.display === 'none' || aboutDetails.style.display === '') {
            aboutDetails.style.display = 'block';
            toggleButton.innerText = 'Hide Data'; // Mengubah teks tombol menjadi "Hide Data"
        } else {
            aboutDetails.style.display = 'none';
            toggleButton.innerText = 'Show Data'; // Mengubah teks tombol menjadi "Show Data" kembali
        }
    });
});

// document.querySelector("nav-item").addEventListener("click", function (event) {
//     event.preventDefault();
//     // window.location.href = ""; // Ganti dengan URL halaman dashboard Anda
// });

