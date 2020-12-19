//////////////////////////
// IMPORT CSS
//////////////////////////
import '../sass/app.scss';

//////////////////////////
// IMPORT LIBRARIES JS
//////////////////////////

document.querySelectorAll('.action-dots').forEach(item => {
    item.addEventListener('click', event => {
        item.nextElementSibling.classList.toggle('show')
    })
})