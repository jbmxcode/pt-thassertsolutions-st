//////////////////////////
// IMPORT CSS
//////////////////////////
import '../sass/app.scss';

//////////////////////////
// IMPORT LIBRARIES JS
//////////////////////////

// Dots
document.querySelectorAll('.action-dots').forEach(item => {
    item.addEventListener('click', event => {
        item.nextElementSibling.classList.toggle('show')
    })
})

// Alert
document.querySelectorAll('.alert').forEach(item => {
    setTimeout(function(){
        item.style.display = 'none'
    }, 3000)
})

// Login
function login() {
    let xhr = new XMLHttpRequest()
    let data = new FormData(document.querySelector('.form-login'))

    xhr.open('POST', '../php/includes/login.php', true)
    xhr.addEventListener('readystatechange', function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText)
        }
    })
    xhr.send(data)
}
