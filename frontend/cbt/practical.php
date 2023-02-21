
    <!-- ======= Hero Section ======= -->
    <main id="hero">
        <div class="container col-xxl-10 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="cbt/src/functionkey.png" height="500px"     >
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">ข้อตกลงการใช้งาน</h1>
                    <p class="lead" style="font: size 30px;">
                        <!-- <li>สามารถเลือกรูปแบบการวิเคราะห์ภาพได้ทั้งแบบ <button class="btn btn-outline-info text-dark">Dual View</button> และ <button class="btn btn-outline-info text-dark">Single View </button></li> -->
                        <li>มีเวลา 20 นาทีในการใช้งานวิเคราะห์ภาพในแต่ละรอบ</li>
                        <li>สามารถออกจากการวิเคราะห์ภาพก่อน 20 นาทีได้ทุกเมื่อ ระบบจะบันทึกเวลาล่าสุดให้</li>
                        <li>หากไม่โต้ตอบใดๆกับระบบในระยะเวลาที่กำหนด ระบบจะออกจากการใช้งานอัตโนมัติ <br><strong><u>โดยไม่บันทึกเวลา</u></strong></li>
                        <li>สามารถใช้ Keyboard แทนการ Click ปุ่มฟังก์ชันได้ ตามภาพ</li>
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                         <button onclick="goto_cbt()" type="button" id="startbtn" class="btn btn-primary btn-lg px-4 me-md-2">Start</button>
                        <!-- <button type="button" class="btn btn-outline-primary btn-lg px-4">Single View</button> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <script>
        $('doucument').ready(()=>{
            let inuse = localStorage.getItem('inuse')
                    if(inuse){
                        alert('คุณกำลังพยายามใช้งานซ้ำซ้อน')
                        localStorage.clear()
                     // document.getElementById('startbtn').disabled = true
                    }else{
                        localStorage.clear()
                    }
        })
       
        function goto_cbt(){
            localStorage.setItem("uid","<?php echo $_SESSION['UID'] ?>")
            
            window.location.replace('cbt/cbt.html')
        }

        
    </script>