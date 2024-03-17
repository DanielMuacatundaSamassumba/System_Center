const input_password= document.querySelector(".Password");
const show = document.querySelector(".show_passsword #show");
const Password_2 = document.querySelector(".Password_2");
const caracteres = document.querySelector("#caracteres")
 const email_1 = document.querySelector(".email_1")
 const email_2 = document.querySelector(".email_2")
const form = document.querySelector(".form");
function show_password(){
    Password_2.type=="password" ? Password_2.type ="text":Password_2.type ="password"
    input_password.type=="password" ? input_password.type ="text":input_password.type ="password"
}
function password_validetion(){
 if(   input_password.value.length<8){
    input_password.style.border="1px solid red" 
    caracteres.innerHTML="Introduza pelomenos 8 Caracteres"
    caracteres.style.color="red"
    e.preventDefault()
 }else{
    input_password.style.border="1px solid #000" 
    caracteres.innerHTML=" "
 }
}
 form.addEventListener("submit", (e)=>{
// input_password.value==Password_2.value && email_1.value==email_2?
//  alert("deu"):alert("Não deu!")

 if(input_password.value != Password_2.value ){
 alert("password não são iguais")
 e.preventDefault()

 }else if(email_1.value != email_2.value){
      alert("email não são iguais")
      e.preventDefault()
   }else  if(input_password.value.length<8 && Password_2.value.length<8){
      alert("introduza pelo menos 8 caracteres")
      e.preventDefault()
     }else{
      e.target.submit()
   }

  

 })
