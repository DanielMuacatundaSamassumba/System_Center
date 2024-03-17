const curso = document.querySelector(".Curso");
 const Show_curso = document.querySelector(".inputs_second ul")
 const img_perfil= document.querySelector(" .container .content-second .content-form  form .inputs_second .input_file img")
 const file = document.querySelector(" .container .content-second .content-form  form .inputs_second .input_file input")
 curso.addEventListener("click", ()=>{
Show_curso.classList.add("Show")

 })
  function Add_input(Curso_element){
    curso.value = Curso_element
    Show_curso.classList.remove("Show")
  }
function show_prev(){

const file_new = file.value.split('\\').pop()
img_perfil.src=file_new
}
