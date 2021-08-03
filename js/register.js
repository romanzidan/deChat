const form = document.querySelector(".register form");
const regisBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

regisBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/register.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href = "index.php";
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}