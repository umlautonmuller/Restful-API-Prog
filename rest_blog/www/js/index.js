(async () => {
    let fete = await fetch("../api/post/read.php")
    let data = await fete.json()
    data.forEach(post => {
        let element = document.createElement('div')
        let titulo = document.createElement('div')
        let texto = document.createElement('div')
        element.className = 'post'

        titulo.innerText = post.titulo
        texto.innerText = post.texto

        document.querySelector('section').appendChild(element)
        element.appendChild(titulo)
        element.appendChild(texto)
        
    }) 
})()