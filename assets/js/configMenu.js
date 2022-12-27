document.addEventListener("DOMContentLoaded",()=>{
        
  setTimeout(() => {
    let error=document.querySelector('.error-div');
    if(error){
      error.remove()
    }
  }, 2000);



  let btns=document.querySelectorAll('.fa-solid')

  btns.forEach(btn=>{
    btn.addEventListener('click',(e)=>{
      const TYPES={
        EDIT:'edit',
        DELETE:'delete'
      }
      
      switch(e.target.dataset.action){
        case TYPES.EDIT:
          console.log(e.target.dataset.id)
          break
        case TYPES.DELETE:  
          
          let itemid=parseInt(e.target.dataset.id)

          let req=new XMLHttpRequest()
          
          req.open('POST','../actions/menuAction.php')
          req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

          req.onreadystatechange = function () {
            
            if (this.readyState == 4 && this.status == 200) {
              
              document.getElementById(`row-${itemid}`).remove()
            
            }
          };
          req.send(`item_id=${itemid}&deleteMenuItem=true`)


          break  
      }
    })
  }) 
})