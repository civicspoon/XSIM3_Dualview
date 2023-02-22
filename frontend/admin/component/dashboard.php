<div class="row justify-content-between">
<div class="col card shadow m-2">
    <div class="row bg-info p-2">
        <div class="col-7"><h2><i class="fa fa-users" aria-hidden="true"></i> ผู้ใช้ในฝ่าย </h2></div>
        <div class="col-5 text-end mt-2 text-light"><h4><span id="alluser"></span> Users</h4></div>
        <div class="row bg-light">

        </div>
    </div>
 <ul class="list-group p-2">
   <li class="list-group-item d-flex justify-content-between align-items-center">
     ลงชื่อเข้าใช้วันนี้
     <span class="badge bg-primary rounded-pill" id="todaylogin"></span>
   </li>
   <li class="list-group-item d-flex justify-content-between align-items-center">
     ไม่เคยเข้าใช้
     <span class="badge bg-primary rounded-pill" id="neverlogin"></span>
   </li>
  
 </ul>   
    
</div>

    <div class="col card shadow m-2">
        <div class="row bg-info p-2">
        <div class="col-7"><h2><i class="fa fa-hourglass-start" aria-hidden="true"></i> Practical CBT </h2></div>
        <div class="col-5 text-end mt-2 text-light"><h4>Used hours </h4></div>
        
    </div>
 <ul class="list-group p-2">
   <li class="list-group-item d-flex justify-content-between align-items-center">
     More than 10 hours
     <span class="badge bg-primary rounded-pill">14</span>
   </li>
   <li class="list-group-item d-flex justify-content-between align-items-center">
    More than 5 hours
     <span class="badge bg-primary rounded-pill">2</span>
   </li>
  
 </ul>
</div>
<div class="row justify-content-between">
    
</div>

<script>
  $('document').ready(async ()=>{
    let alluser = await fetch('../api/user_report.php?alluser=1')
    let resalluser = await alluser.text()
    let obj = JSON.parse(resalluser)
    console.log(obj)
    document.getElementById('alluser').innerHTML = obj['alluser']
    document.getElementById('todaylogin').innerHTML = obj['todaylogin']
    document.getElementById('neverlogin').innerHTML = obj['neverlogin']
    
  })
</script>