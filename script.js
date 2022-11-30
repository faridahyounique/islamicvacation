const name=document.getElementById('name')
const password=document.getElementById('password')
const form=document.getElementById('form')
form.addEventListener('submit',(e)=>{ 
    let messages=[]
    if(name.value===' '|| name.value==null){
        messages.push('Name is required')
    }
if (password.value.length<=8){
    messages.push('password must be longer than 8 characters')
}

if (password.value==='password'){
    messages.push('password cannot be password')
}
    if (messages.length>0){
        e.preventDefault()
        errorElement.innerText=messages.join(',')
    }
})