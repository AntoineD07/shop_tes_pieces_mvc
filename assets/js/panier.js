
// recupere dans tout les .quantite l'input de type number 
// met sur l'input un listner qui regarde les changement number


document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.quantite input[type="number"]').forEach(input => {
        input.addEventListener('change', function() {
            checkQuantity(this);
            updateTotal();
        });
    });
    updateTotal();
});

// fonction regarde si input == O si 0 suprime produit
function checkQuantity(input) {
    if (input.value == 0){
        const produit = input.closest('.produit');
        produit.remove()
        updateTotal();
    }
}
//fonction qui calcule et met a jours le total

function updateTotal() {
    let total = 0;
    document.querySelectorAll('.produit').forEach(produit =>{
        const prix = parseFloat(produit.querySelector('.prix p').textContent.replace('€', ''));
        const quantite = parseFloat(produit.querySelector('.quantite input[type="number"]').value);
        total += prix *quantite;
    });
    document.querySelector('.total p:last-child').textContent = total + '€';
}
updateTotal();

