
// // recupere dans tout les .quantite l'input de type number 
// // met sur l'input un listner qui regarde les changement number


// document.addEventListener('DOMContentLoaded', function() {
//     document.querySelectorAll('.quantite input[type="number"]').forEach(input => {
//         input.addEventListener('change', function() {
//             checkQuantity(this);
//             updateTotal();
//         });
//     });
//     updateTotal();
// });

// // fonction regarde si input == O si 0 suprime produit
// function checkQuantity(input) {
//     if (input.value == 0){
//         const produit = input.closest('.produit');
//         produit.remove()
//         updateTotal();
//     }
// }
// //fonction qui calcule et met a jours le total

// function updateTotal() {
//     let total = 0;
//     document.querySelectorAll('.produit').forEach(produit =>{
//         const prix = parseFloat(produit.querySelector('.prix p').textContent.replace('€', ''));
//         const quantite = parseFloat(produit.querySelector('.quantite input[type="number"]').value);
//         total += prix *quantite;
//     });
//     document.querySelector('.total p:last-child').textContent = total + '€';
// }
// updateTotal();

// Dans assets/js/scripts.js
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne tous les inputs de quantité et les boutons de suppression
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const totalAmount = document.querySelector('.total-amount');

    // Fonction pour recalculer le total
    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.produit').forEach(product => {
            const priceText = product.querySelector('.item-price').textContent;
            const price = parseFloat(priceText.replace(' €', '')); // Extrait le nombre
            const quantity = parseInt(product.querySelector('.quantity-input').value) || 0;
            total += price * quantity;
        });
        totalAmount.textContent = `${total.toFixed(2)} €`;
    }

    // Écoute les changements de quantité
    quantityInputs.forEach(input => {
        input.addEventListener('change', function () {
            const quantity = parseInt(this.value);
            const max = parseInt(this.max);
            const min = parseInt(this.min);

            // Limite la quantité entre min et max
            if (quantity > max) this.value = max;
            if (quantity < min) this.value = min;

            updateTotal();

            // Optionnel : si quantité = 0, supprimer l'article (côté client seulement)
            if (quantity === 0) {
                this.closest('.produit').remove();
                updateTotal();
            }
        });
    });

    // Écoute les clics sur les boutons de suppression
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            this.closest('.produit').remove();
            updateTotal();
        });
    });

    // Calcul initial du total au chargement
    updateTotal();
});