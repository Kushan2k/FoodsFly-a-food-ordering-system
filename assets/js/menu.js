document.addEventListener('DOMContentLoaded',()=>{
  let menu_items=document.querySelectorAll('.menu_item')
  let types=document.querySelectorAll('.list-group-item');
  
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