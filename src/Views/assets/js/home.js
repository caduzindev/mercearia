window.onload = ()=>{
    document.querySelector('#send').addEventListener('click',e=>{
        e.preventDefault()
        let formData = new FormData()

        let form = document.querySelector('#formUser')

        for(let data of form){
            if(data.value == ''){
                alert('Por favor preencha todos os campos')
                return
            }
            formData.append(data.name,data.value)
        }

        fetch('registerUsers',{
            method:'POST',
            body:formData,
        })
        .then(response=>response.json())
        .then(result=>{
           for(let data of form){
               data.value = ''
           }
           alert(`Dados enviados, Muito obrigado :)`)
        })
    })
    const menuItems = document.querySelectorAll('.menu-item a[href^="#"]')
    
    menuItems.forEach(item=>{
        item.addEventListener('click',scrollToIdClick);
    })

    //scroll
    function scrollToIdClick(e){
        e.preventDefault()

        const element = e.target
        const id = element.getAttribute('href')
        const section = document.querySelector(id);

        smoothScrollTo(0,section.offsetTop,600)
    }

    function smoothScrollTo(endX, endY, duration) {
        const startX = window.scrollX || window.pageXOffset;
        const startY = window.scrollY || window.pageYOffset;
        const distanceX = endX - startX;
        const distanceY = endY - startY;
        const startTime = new Date().getTime();
      
        duration = typeof duration !== 'undefined' ? duration : 400;
      
        const easeInOutQuart = (time, from, distance, duration) => {
          if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
          return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
        };
      
        const timer = setInterval(() => {
          const time = new Date().getTime() - startTime;
          const newX = easeInOutQuart(time, startX, distanceX, duration);
          const newY = easeInOutQuart(time, startY, distanceY, duration);
          if (time >= duration) {
            clearInterval(timer);
          }
          window.scroll(newX, newY);
        }, 1000 / 60);
      };
      //end scroll

      //animated elements
      const target = document.querySelectorAll('[data-anime]')
      
      function animeScroll(){
        const windowTop = window.pageYOffset + ((window.innerHeight*3) / 4)

        target.forEach(item=>{
            if((windowTop)>item.offsetTop){
                item.style.opacity = '1'
                item.classList.add('animate__animated')
                item.classList.add(item.getAttribute('data-anime'))
            }
        })
      }

      window.addEventListener('scroll',function(){
        animeScroll();
      })
      //animated end
      
      const btnMenu = document.querySelector('#menu')

      let count = 0;
      btnMenu.addEventListener('click',()=>{
        let menuMobile = document.querySelector('.menu-mobile')
        if(count == 0){
          menuMobile.style.display='block'
        }else{
          menuMobile.style.display = 'none'
          count = 0
          return
        }
        menuMobile.childNodes.forEach(item=>{
          if(item.nodeName == 'LI'){

            item.addEventListener('click',()=>{
              const element = item.childNodes[0]

              if(element.getAttribute('href')!='promotions'){
                btnMenu.click()
                const id = element.getAttribute('href')
                const section = document.querySelector(id);

                smoothScrollTo(0,section.offsetTop,600)
              }else{
                element.click()
              }
            })

            item.classList.add('animate__animated')
            item.classList.add('animate__lightSpeedInLeft')
          }
        })
        count = 1
      })
}