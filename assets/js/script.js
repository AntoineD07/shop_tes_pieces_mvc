// ---------------------------acceuil-------------------------------//
const navSlide = ()=>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');


    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active')

        navLinks.forEach((link, index)=>{
            // link.style.animation = `navLinkFade 0.5s ease forwards ${index/7+1.5}s `
           if(link.style.animation){
            link.style.animation = ''
           }else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${index/7+0.5}s `
    
           }
            
    
        })
        burger.classList.toggle('toggle')
    });
   
    
}
navSlide()

// ---------------------------panier-------------------------------//
// const menuSlide = () => {
//     const panier = document.querySelector('.panier')
//     const menu = document.querySelector('.menu-panier')
//     const panierMenu = document.querySelectorAll('.menu-panier li')
//     panier.addEventListener('click', () => {
//         menu.classList.toggle('menu-active')
//         console.log('menu-active');
        

//         panierMenu.forEach((link, index) => {
//             if (link.style.animation) {
//                 link.style.animation = ''
//             } else {
//                 link.style.animation = `menuFade 0.5s ease forwards ${index / 7 + 0.5}s`

//             }
//         })
//         panier.classList.toggle('toggle')
//     })
// }
// menuSlide()