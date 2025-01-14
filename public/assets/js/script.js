const imgFile = document.querySelector("#imgFile");
const imgPreview = document.querySelector(".imgPreview");
const imgText = document.querySelector(".imgText");

const arrayExtension = ['image/jpeg', 'image/png', 'image/webp'];
const maxSize = 500 * 1024;

imgFile.addEventListener('change', (e) =>{
    let file = e.target.files[0];

    const textMsg = document.querySelector('#textMsg');
    const errorMsg = document.querySelector('#errorMsg');

    if(!arrayExtension.includes(file.type)){
        textMsg.textContent = "Invalid file type! Please upload a JPEG or PNG.";
        errorMsg.style.color = 'var(--orange500)';
        file = null;

    }else if(file.size > maxSize){
        textMsg.textContent = "File too large! Please upload a photo under 500KB.";
        errorMsg.style.color = 'var(--orange500)'; 
        file = null;

    }else{
        textMsg.textContent = "Upload success";
        errorMsg.style.color = '';

        imgPreview.src = URL.createObjectURL(file);
    }

})

// addEventListener('load', (e) =>{
//     const img = document.createElement('img');
//     img.src = e.target.result;
//     img.classList.add('')

//     imgPreview.innerHTML = "";
//     imgPreview.appendChild(img);

//     reader.readAsDataURL(file);