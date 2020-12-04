const container = document.querySelector('.container')

const sign_in_form = document.querySelector('#sign-in-form')

sign_in_form.addEventListener('submit',(e)=>{
    e.preventDefault()

    let user = e.target[0].value
    let password = e.target[1].value

    if(user == '' && password == ''){
        alert('Por favor Preencha todos os campos')
        return
    }

    var formData = new FormData()
    formData.append("user",user)
    formData.append("password",password)

    let btn = document.querySelector('.btn')
    btn.style.display = "none"

    let load = document.querySelector('.gif-load')
    load.style.display= "block"


    fetch('login/verify',{
        method:'POST',
        body:formData,
    })
    .then(response=>response.json())
    .then(result=>{
        if(result.error){
            btn.style.display = "block"
            load.style.display= "none"

            alert(result.message)
        }else{
            setTimeout(()=>{
                document.querySelector('.form-container').style.display="none"
                container.classList.add("sign-in-mode")
                setTimeout(()=>{
                    window.location.href='/Mercearia/admin'
                },2000)
            },2000)
        }
    })
})