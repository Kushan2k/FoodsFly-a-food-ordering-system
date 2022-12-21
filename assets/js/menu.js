document.addEventListener('DOMContentLoaded',()=>{
  let menu_items=document.querySelectorAll('.menu_item')
  let types = document.querySelectorAll('.list-group-item');
  
  let cartBTNS=document.querySelectorAll('.fa-cart-shopping')

  cartBTNS.forEach(btn=>{
    btn.addEventListener('click',(e)=>{
      let itemid=parseInt(e.target.dataset.itemid)

      let req=new XMLHttpRequest()
      
      req.open('POST','../actions/menuAction.php')
      req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      req.onreadystatechange = function () {
        
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.getAllResponseHeaders())
          
          
          let popup = document.querySelector('.msg-suc')
          let erro=document.querySelector('.error-msg')
          

          let res=JSON.parse(this.responseText)
          let newcount = res.newCount
          
          if (!res.status) {
            if (res?.msg) {
              erro.classList.remove('d-none')

              setTimeout(() => {
                erro.classList.add('d-none')
              }, 2000);
              return
            }
          }
          popup.classList.remove('d-none')
          document.querySelector('.cart-count').innerHTML = newcount
          
          setTimeout(() => {
            popup.classList.add('d-none')
            
          }, 2000);
          

        }
      };
      req.send(`item_id=${itemid}&addToCart=true`)


    })  
  })
  
  types.forEach((item)=>{
    item.addEventListener('click',(e)=>{
      
      switch(e.target.parentElement.dataset.parent){
        case 'category':
          
          sortMenuItems(menu_items,'category',cat=e.target.innerHTML,range=0)
          break;
        case 'price':
          
          sortMenuItems(menu_items,'price',cat=e.target.innerHTML,range=e.target.innerHTML.split('-').map(i=>parseInt(i)))
          break;
        case 'something': 
          console.log('you selected something');
          break;
        default:
          console.log('not a option')
      }
    })
  })

})

function sortMenuItems(items,sortType,cat,range){
  switch(sortType){
    case 'category':
      items.forEach(item=>{
        if(cat=='All'){
          displayItems(item)
          return
        }
        if(item.dataset.cat!=cat){
          
          item.classList.add('d-none')
        }else{
          displayItems(item)
        }
      })

      break;

    case 'price':
      items.forEach(item=>{
        let min=range[0]
        let max=range[1]
        
        console.log(max)
        
        if(max===0){
          if(item.dataset.price>= min){
          
            displayItems(item)
          }else{
            
            item.classList.add('d-none')
          }
        }else{
          if(item.dataset.price>= min && item.dataset.price<= max){
          
            displayItems(item)
          }else{
            
            item.classList.add('d-none')
          }
        }
      })
      break

  }

}

function displayItems(item){
  if(item.classList.contains('d-none')){
    item.classList.remove('d-none')
  }
}

function displayAllItems(items){
  items.forEach(item=>{
    if(item.classList.contains('d-none')){
      item.classList.remove('d-none')
    }
  })
}