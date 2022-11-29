document.addEventListener('DOMContentLoaded',()=>{
  let navbarIconBtns=document.querySelectorAll('.icon-btn')
  window.onresize=()=>{
    if(window.screen.width>576){
      let popup=document.querySelector('.navbar_popup')
      if(popup){
        popup.classList.remove('navbar_popup')
        popup.classList.remove('float-box')
        popup.classList.add('d-none')
        popup.classList.add('navbar')
        document.querySelector('.hide').classList.add('d-none')
        document.querySelector('.popup').classList.remove('d-none')
        return 
      }
    }
  }

  navbarIconBtns.forEach(btn=>{
    btn.addEventListener('click',e=>{
      let navbox=document.querySelector('#navbar')
      if(e.target.classList.contains("popup")){
        navbox.classList.remove('d-none')
        navbox.classList.remove('navbar')
        navbox.classList.add('float-box')
        navbox.classList.add('navbar_popup')
        e.target.classList.add('d-none')
        document.querySelector('.hide').classList.remove('d-none')

      }else if(e.target.classList.contains('hide')){
        navbox.classList.remove('navbar_popup')
        e.target.classList.add('d-none')
        document.querySelector('.popup').classList.remove('d-none')
        navbox.classList.remove('float-box')
        navbox.classList.add('d-none')
        navbox.classList.add('navbar')
      }
      })
  })
})