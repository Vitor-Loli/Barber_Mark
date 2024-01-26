let btn = document.getElementById("hamburguer")
let menu = document.getElementById("menu-mobile")
let main = document.getElementById("main")

btn.addEventListener("click", ()=>{
    menu.classList.add('abrir-menu')
})

menu.addEventListener("click", ()=>{
    menu.classList.remove('abrir-menu')
})

main.addEventListener("click", ()=>{
    menu.classList.remove('abrir-menu')
})
