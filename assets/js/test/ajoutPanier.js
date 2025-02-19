document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.ajt-panier').forEach(button => {
        button.addEventListener('click', function() {
            const product = this.getAttribute('data-product');
            const price = this.getAttribute('data-price');

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            const existingProduct = cart.find(item => item.product === product);
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ product, price, quantity: 1 });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Produit ajouté au panier');
        });
    });
});