const form = document.querySelector(".login form");
const loginBtn = form.querySelector(".button input");
const inputPass = form.querySelector(".field input[type='password']");
const errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

loginBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href = "index.php";
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                    inputPass.value = '';
                    inputPass.focus();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}