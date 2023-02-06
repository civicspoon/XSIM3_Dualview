const loginform = document.getElementById('login')
$(document).ready(function(){
    loginform.addEventListener('submit',(e)=>{
        let uid = document.getElementById('uid').value
        let password = document.getElementById('password').value
        e.preventDefault()
        //wrongpassword.show()
     $.post('api/login.php',
     {
        uid:uid,
        password:password
     },(data)=>{
      console.log(data)
     if(data!=0){                
                location.replace('frontend/index.php?session='+data)
     }else{
        wrongpassword.show()
     }
     })
})
})


