window.onload = ()=> {
    const fileInput = document.querySelector('#file')
    let outImage = document.querySelector('#imagePreview')
    let srcImage = outImage.getAttribute('src')

    //carregar arquivo de preview
    file.addEventListener('change',(event)=>{
        const file = event.target.files[0]

        let reader = new FileReader()

        reader.onload = function(){
            let dataUrl = reader.result
            outImage.src = dataUrl
        }
        reader.readAsDataURL(file)
    }) 

    const selecetImage = document.querySelector('#selectImage')
    const removeImage = document.querySelector('#removeImage')

    selecetImage.addEventListener('click',(event)=>{
        event.preventDefault()

        fileInput.click()
    })

    removeImage.addEventListener('click',(event)=>{
        event.preventDefault()

        outImage.src = srcImage
    })
}
//Função criada pra formatar preço do input de preço
function moeda(a, e, r, t) {
    let n = ""
    let h = 0
    let j = 0
    let u = 0
    let tamanho2 = 0
    let l = ""
    let ajd2 = ""
    let o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}