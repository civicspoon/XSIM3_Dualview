 <div class="row">
        <div class="col-6">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newimage">
               <i class="fa fa-file-photo-o" aria-hidden="true"></i> Add new image
            </button>
        </div>
        <div class="col-6">

        </div>
 </div>
<div class="row">
<?php include_once '../api/xrayimgcategory.php'; ?>
                    
    <div class="col-12" id='category'></div>
</div>
 <!-- Modal -->

 
 
 <!-- Modal -->
 <div class="modal fade" id="newimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <form action="" id="xrayimgform" method="post"> <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-image-o" aria-hidden="true"></i> Add new image</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                
                    <div class="mb-3">
                        <label for="" class="form-label"><h4>Item Category</h4></label>
                        <select onchange="list_type()" class="form-select form-select-lg" name="" id="category_list">
                            
                        </select>
                    </div> 
                    <div class="mt-3" id="div_type">
                        <label for="" class="form-label"><h4>Item Type</h4></label>
                        <select class="form-select form-select-lg" name="" id="type_list" >
                        <option selected disabled>-- Select Item Type --</option>
                        </select>
                    </div>

                    <div class="row text-md-center mt-2">
                        <div class="col-6">
                           <h3> Top view</h3>
                           <div class="row">
                                <div class="mb-3">
                                  <label for="" class="form-label">Choose file</label>
                                  <input type="file" class="form-control" name="" id="tv" placeholder="" aria-describedby="fileHelpId">
                                 
                                  <div><img src="../src/xsim_logo.png" alt="" srcset="" id="topview" width="90%"></div>
                                </div>
                           </div>
                        </div>
                        <div class="col-6">
                        <h3>Side View</h3>
                            <div class="row">
                            <div class="mb-3">
                                  <label for="" class="form-label">Choose file</label>
                                  <input type="file" class="form-control" name="" id="sv" placeholder="" aria-describedby="fileHelpId">
                                  
                                  <div><img src="../src/xsim_logo.png" alt="" srcset="" id="sideview" width="90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save</button>
             </div>
         </div>
     </div> </form>
 </div>

 <script>
    $('document').ready(async ()=>{
       $.get('../api/dropdownlist.php',{
        cat:1
       },(data)=>{
        document.getElementById('category_list').innerHTML=data
       })
        
       let uploadform = document.getElementById('xrayimgform')
       
       uploadform.addEventListener('submit',(e)=>{
        e.preventDefault()

            let fd = new FormData();
            let topview = document.getElementById('tv')

            
       })


    })

    function list_type(){
            let cat_id = document.getElementById('category_list').value
            $.get('../api/dropdownlist.php',{
                cat_id:cat_id
       },(type)=>{
        
        document.getElementById('type_list').innerHTML=type
       })
        
        }

tv.onchange = evt => {
  const [file] = tv.files
  if (file) {
    topview.src = URL.createObjectURL(file)
  }
}
sv.onchange = evt => {
  const [file] = sv.files
  if (file) {
    sideview.src = URL.createObjectURL(file)
  }
}


 </script>