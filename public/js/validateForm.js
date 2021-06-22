// Client side form validation 
// -----------------------------


let form = document.querySelector('#form')
let today = new Date()
const priceRegex = /^\d{1,6}(\.\d{1,2})?$/
const textRegex = /^[\d\w\s]+$/

let yearVal = parseInt(document.querySelector('#year').value)
const errorYear = document.querySelector('#err_year')



form.addEventListener('submit', function(e) {

    if (document.querySelector('#title').value == null || document.querySelector('#title').value == "") {
        e.preventDefault()
        document.querySelector('#err_title').innerHTML = 'Veuillez entrer un titre'
    } else if (!textRegex.test(document.querySelector('#title').value)) {
        e.preventDefault()
        document.querySelector('#err_title').innerHTML = 'Charactères spéciaux non autorisés'
    } else if (document.querySelector('#title').value.length > 100) {
        e.preventDefault()
        document.querySelector('#err_title').innerHTML = 'Titre trop long : doit être < 100 charactères'
    } else {
        document.querySelector('#err_title').innerHTML = ''
    }

    if (document.querySelector('#year').value.length == 0) {
        e.preventDefault()
        errorYear.innerHTML = 'Veuillez entrer une date'
    } else if (yearVal > today.getFullYear()) {
        e.preventDefault()
        errorYear.innerHTML = 'la date doit être inférieure à l\'année courante'
    } else if (yearVal <= 0) {
        e.preventDefault()
        errorYear.innerHTML = 'la date doit être supérieur à 0'
    } else {
        errorYear.innerHTML = ''
    }

    if (!textRegex.test(document.querySelector('#genre').value)) {
        e.preventDefault()
        document.querySelector('#err_genre').innerHTML = 'Charactères spéciaux non autorisés'
    } else if (document.querySelector('#genre').value.length > 100) {
        e.preventDefault()
        document.querySelector('#err_genre').innerHTML = 'Genre trop long : doit être < 100 charactères'
    } else {
        document.querySelector('#err_genre').innerHTML = ''
    }

    if (!textRegex.test(document.querySelector('#label').value)) {
        e.preventDefault()
        document.querySelector('#err_label').innerHTML = 'Charactères spéciaux non autorisés'
    } else if (document.querySelector('#label').value.length > 10) {
        e.preventDefault()
        document.querySelector('#err_label').innerHTML = 'Label trop long : doit être < à 100 charactères'
    } else {
        document.querySelector('#err_label').innerHTML = ''
    }

    // if (!priceRegex.test(parseFloat(document.querySelector('#price').value))) {
    //     e.preventDefault()
    //     document.querySelector('#err_price').innerHTML = 'Prix maximal : 999999,99 €'
    // } else if (parseFloat(document.querySelector('#price').value) <= 0){
    //     document.querySelector('#err_price').innerHTML = 'Prix doit être positif'
    // }

})