<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-md">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
   </div>
   <div class="modal-body">
    <form id="update-form">
     <div class="container">
      <div class="row">

    

       </div>
       {{-- Item 2 --}}
       <div class="col-12 p-1">
        <label class="form-label">Category Name *</label>
        <input type="text" class="form-control" id="categoryNameUpdate">

        <input class="d-none" id="updateID">
       </div>

       

      </div>
     </div>
    </form>
   </div>

   <div class="modal-footer">
    <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
     aria-label="Close">Close</button>
    <button onclick="Update()" id="update-btn" class="btn btn-sm  btn-success">Update</button>
   </div>
  </div>
 </div>
</div>

<script>
 async function FillUpUpdateForm(id) {


  document.getElementById('updateID').value = id;


  showLoader();
  let res = await axios.post("/update-expense-cat-by-id", {
   id: id
  })

  hideLoader();
  document.getElementById('categoryNameUpdate').value = res.data['name'];

 


 }

 async function Update() {
  let categoryName = document.getElementById('categoryNameUpdate').value;



  let updateID = document.getElementById('updateID').value;

  if (categoryName.length === 0) {
   errorToast("Category Name is Required");
  } else {
   document.getElementById('update-modal-close').click();
   showLoader();

   let res = await axios.post("/update-expense-cat", {
    name: categoryName,

    id: updateID
   })
   hideLoader();

   if (res.status === 200) {
    document.getElementById("update-form").reset();
    successToast("Request success !")
    await getList();
   } else {
    errorToast("Something Went Wrong")
   }
  }
 }
</script>
