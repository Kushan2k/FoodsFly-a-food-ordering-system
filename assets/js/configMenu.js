document.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    let error = document.querySelector(".error-div")
    if (error) {
      error.remove()
    }
  }, 2000)
})
