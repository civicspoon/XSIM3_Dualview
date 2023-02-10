<div class="row p-2" id="category">
        
    </div>
</div>
<script>
    $(document).ready(async()=>{
        const response = await fetch('../api/category.php');
  
  response.ok;     // => false
  response.status; // => 404
  const text = await response.text();
            document.getElementById('category').innerHTML = text
        }
    )
</script>
