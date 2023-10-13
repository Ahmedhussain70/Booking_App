const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
const wrapper = document.createElement('div')
wrapper.innerHTML = [
`<div class="alert alert-${type} alert-dismissible" role="alert">`,
`   <div>${message}</div>`,
'   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
'</div>'
].join('')

alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')


alertTrigger.addEventListener('click', () => {
  const x = document.querySelectorAll('input').value;
  const email = document.getElementById('email').value;
const otherd = document.getElementById('otherd').value;
const day = document.getElementById('day').value;
const from = document.getElementById('from').value;
const to = document.getElementById('to').value;
  // if ( email == ""  ){
  if (x == "" || email == "" || otherd == "" || day == "" || from == "" || to == ""){
    alert ("Please Enter The Data");
  }else{
    appendAlert('Saved Successfully' , 'success');
    setTimeout(() => {
        alertPlaceholder.classList.add("d-none");
    alertPlaceholder.remove();
  }, 1000);
  }
})

