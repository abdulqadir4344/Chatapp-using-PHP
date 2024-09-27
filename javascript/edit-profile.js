const form = document.querySelector(".edit-profile form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");


document.getElementById('fileInput').addEventListener('change', function() {
  const fileName = this.files.length > 0 ? this.files[0].name : 'No file selected';
  document.getElementById('fileName').textContent = fileName;
});

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/edit-profile.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="login.php";
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


