const imgFile = document.querySelector("#imgFile");
const imgPreview = document.querySelector(".imgPreview");
const imgText = document.querySelector(".imgText");
const divButton = document.querySelector(".divButton");
const formButton = document.querySelector(".formButton");

const textMsg = document.querySelector('#textMsg');
const errorMsg = document.querySelector('#errorMsg');

const arrayExtension = ['image/jpeg', 'image/png', 'image/webp'];
const maxSize = 500 * 1024;


imgFile.addEventListener('change', (e) =>{
    e.preventDefault();
    let file = e.target.files[0];
    
    createAvatar(file);
})
imgFile.addEventListener('drop', (e) => {
})
imgFile.addEventListener('dragover', (e) => {
})
imgFile.addEventListener('dragleave', (e) => {
})
document.querySelector(".changeAvatar").addEventListener("click",(e) => {
    e.preventDefault();
    removeAvatar();
    imgFile.click();
})
document.querySelector(".removeAvatar").addEventListener("click",(e) => {
    e.preventDefault();
    removeAvatar();
})
function createAvatar(file){

    if(!arrayExtension.includes(file.type)){
        textMsg.textContent = "Invalid file type! Please upload a JPEG or PNG.";
        errorMsg.style.color = 'var(--orange500)';

    }else if(file.size > maxSize){
        textMsg.textContent = "File too large! Please upload a photo under 500KB.";
        errorMsg.style.color = 'var(--orange500)';

    }else{
        textMsg.textContent = "Upload success";
        errorMsg.style.color = '';

        imgPreview.src = URL.createObjectURL(file);

        imgPreview.style.padding = '0px';
        imgPreview.style.width = '80px';

        document.querySelector(".uploadInfo").style.zIndex = 1;

        imgText.style.display = "none";
        divButton.style.display = "block";
    }
}
function removeAvatar(){

    textMsg.textContent = "Upload your photo (JPG or PNG, max size: 500KB).";
    errorMsg.style.color = ''; 
    
    imgPreview.src = "/assets/images/icon-upload.svg";
    
    imgPreview.style.padding = '14px';
    imgPreview.style.width = '60px';
    
    document.querySelector(".uploadInfo").style.zIndex = -1;
    
    imgText.style.display = "block";
    divButton.style.display = "none";
}
