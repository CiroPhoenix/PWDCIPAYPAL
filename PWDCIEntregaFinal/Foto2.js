





document.getElementById('Foto_Usuario2').onchange=function(e){

    let reader=new FileReader();
    reader.readAsDataURL(e.target.files[0]);
  reader.onload=function(){
      let preview = document.getElementById('preview2');
      imagen = document.createElement('img');
      imagen.src = reader.result;
      imagen.style.width="360px";
      imagen.style.height="360px";
      imagen.style.border="50px";
      imagen.style.margin= "15px";
      
  
  
      preview.append(imagen);
  
  }
  
  }




/*const usuario = document.getElementById("Nombre_Usuario")
const usuario_paterno = document.getElementById("NomPatr_Usuario")
const usuario_materno= document.getElementById("NomMatr_Usuario")
const genero= document.getElementById("Genero_Usuario")
const rol= document.getElementById("Rol_Usuario")
const email = document.getElementById("Correo_Usuario")
const pass = document.getElementById("Contrasena_Usuario")
const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")


form.addEventListener("submit", e=>{
     e.preventDefault()
     let warnings = ""
     let entrar = false
     let RegexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
     let RegexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#])[A-Za-z\d$@$!%*?&#]{8}/ 
     parrafo.innerHTML = ""
   
     if(usuario.value.length <6){
     warnings += `El nombre de usuario no es valido <br>`
     entrar = true
    }



    if(usuario_paterno.value.length <6){
        warnings += `El nombre paterno del usuario no es valido <br>`
        entrar = true
       }


       if(genero.value == 0 || genero.value==""){
        warnings += `Selecciona su genero <br>`
        entrar = true
       }
       

       if(rol.value == 0 || rol.value==""){
        warnings += `Selecciona su rol <br>`
        entrar = true
       }

       if(usuario_materno.value.length <6){
        warnings += `El nombre materno del usuarios no es valido <br>`
        entrar = true
       }
   



    console.log(RegexEmail.test(email.value))
    if(!RegexEmail.test(email.value)){
        warnings += `El email no es valido <br>`
        entrar = true
    }

    if(!RegexPassword.test(pass.value)){
        warnings += `La contraseña no es valida debe tener 8 caracteres, al menos una letra mayuscula y minuscula,un digito y un caracter especial <br>`
        entrar = true
    }

   if(entrar){
    parrafo.innerHTML = warnings
   }






})*/


