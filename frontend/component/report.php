
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Practical
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Test
              </a>
            </li> -->
           
          </ul>

       
        </div>
      </nav>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        <div class="row bg-info rounded-3 p-2 text-white">
          <h3>เก็บชั่วโมงวิเคราะห์ภาพประจำปี <?php echo date('Y')?></h3>
        </div>
      <div class="row justify-content-between">
          <div class="col m-2 card rounded-3 shadow">
				<div class="row">
					<div class="col">
					<h1><i class="fa fa-clock-o" aria-hidden="true"></i> <br>เวลาสะสม</h1>
				</div>
					<div class="col justify-content-end text-end">
						<h1><p id="rectime"></p></h1>
						<p>ชั่วโมง</p>
					</div>
				</div>
          </div>
          <div class="col m-2 card rounded-3 shadow">
		  <div class="row">
					<div class="col">
					<h1><i class="fa fa-image" aria-hidden="true"></i><br> จำนวนภาพ</h1>
				</div>
					<div class="col justify-content-end text-end">
						<h1><p id="imgcout"></p></h1>
						<p>ภาพ</p>
					</div>
				</div>
          </div>
		  <div class="col m-2 card rounded-3 shadow">
		  <div class="row">
					<div class="col">
					<h1><i class="fa fa-check-circle" aria-hidden="true"></i><br> ตอบถูก</h1>
				</div>
					<div class="col justify-content-end text-end">
						<h1><p id="score"></p></h1>
						<p>ภาพ</p>
					</div>
				</div>
          </div>
      </div>

	  <div class="row">
		<div class="table-responsive-lg card">
			<table class="table table-striped table-hover table-light align-middle caption-top text-center">
				<thead class="table-light">
					<caption><h3>การใช้งาน 10 ครั้งล่าสุด</h3></caption>
					<tr style="font-size: large;">
						<th style="width: 20%;"><i class="fa fa-calendar" aria-hidden="true"></i></th>
						<th><i class="fa fa-clock-o" aria-hidden="true"></i></th>
						<th><i class="fa fa-image" aria-hidden="true"></i></th>
						<th><i class="fa fa-check-square" aria-hidden="true"></i></th>
					</tr>
					</thead>
					<tbody class="table-group-divider" id="tbody">
					
					</tbody>
					<tfoot>
						
					</tfoot>
			</table>
		</div>
		
	  </div>
      </main>

	  <script>
		$('document').ready(async ()=>{
			let uid = '<?PHP echo $_SESSION['UID'] ?>'
			let obj = await fetch('../api/user_report.php?user_report=1&uid='+uid)
			let txt =await obj.text()
			let res = JSON.parse(txt)
			document.getElementById('rectime').innerHTML = res['rectime']
			document.getElementById('imgcout').innerHTML = res['imgcout']
			document.getElementById('score').innerHTML = res['score']
			
			let lastestobj = await fetch('../api/user_report.php?lastest=1&uid='+uid)
			let lasttxt =await lastestobj.text()
			
			document.getElementById('tbody').innerHTML = lasttxt
			
		
		})
	  </script>