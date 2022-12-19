'use strict'
document.addEventListener("DOMContentLoaded", () => {
  let rmbtns = document.querySelectorAll(".fa-trash")
  rmbtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      let cartid = e.target.dataset.itemid
      let itemprice = e.target.dataset.itemprice;

      let req = new XMLHttpRequest()

      req.open('POST', '../actions/menuAction.php')
      req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          
          if (this.responseText == 1) {
            let item=document.getElementById(`div-${cartid}`)
            item.classList.add('hide-item')
            item.addEventListener("animationend",(e)=>{
              e.target.remove()
              let i = document.getElementById('cart-count')
              // console.log(i.innerHTML)
              i.innerHTML = parseInt(i.innerHTML) - 1
              let total = document.querySelector('.total-price')
              
              // console.log(parseFloat(total.innerHTML))
              // console.log(itemprice)
              
              let newprice = parseFloat(total.innerHTML) - itemprice
              // console.log(newprice)
              total.innerHTML=newprice.toFixed(2)
              
            })
          } else {
            console.log(this.responseText)
          }

        }
      };
      req.send(`cart_id=${cartid}&removeFromCart=true`)

    })
  })
})