// Client side form validation 
// -----------------------------
// title : Length < 255
// year : doit être un nombre // inferieur a l'année en cours. 
// Genre : Length < 255
// Label : Length < 255
// Price : decimal 6.

let form = document.querySelector('#form')
let priceRegex = /^\d{1,6}(\.\d{1,2})?$/
let today = new Date()


form.addEventListener('submit', function(e) {

    if (document.querySelector('#title').value.length < 255) {
        document.querySelector('#err_title').innerHTML = ''
    } else {
        e.preventDefault()
        document.querySelector('#err_title').innerHTML = 'Valeur incorrecte'
    }

    if (parseInt(document.querySelector('#Year').value) > today.getFullYear()) {
        e.preventDefault()
        document.querySelector('#err_year').innerHTML = 'Valeur incorrecte'
    } else {
        document.querySelector('#err_year').innerHTML = ''
    }

    if (document.querySelector('#Genre').value.length < 255) {
        document.querySelector('#err_genre').innerHTML = ''
    } else {
        e.preventDefault()
        document.querySelector('#err_genre').innerHTML = 'Valeur incorrecte'
    }

    if (document.querySelector('#Label').value.length < 255) {
        document.querySelector('#err_label').innerHTML = ''
    } else {
        e.preventDefault()
        document.querySelector('#err_label').innerHTML = 'Valeur incorrecte'
    }

    if (priceRegex.test(parseFloat(document.querySelector('#Price').value))) {
        document.querySelector('#err_price').innerHTML = ''
    } else {
        e.preventDefault()
        document.querySelector('#err_price').innerHTML = 'Valeur incorrecte'
    }

})