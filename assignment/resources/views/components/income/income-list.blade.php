<div class="container-fluid">
 <div class="row">
  <div class="col-md-12 col-sm-12 col-lg-12">
   <div class="card px-5 py-5">
    <div class="row justify-content-between ">
     <div class="align-items-center col">
      <h6>Income List</h6>
     </div>
     <div class="align-items-center col">
      <button data-bs-toggle="modal" data-bs-target="#create-modal"
       class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
     </div>
    </div>
    <hr class="bg-secondary" />
    <div class="table-responsive">
     <table class="table  table-flush " id="tableData">
      <thead>
       <tr class="bg-light">
        <th>No</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Description</th>
        <th>Date</th>
        <th>Action</th>
       </tr>
      </thead>
      <tbody id="tableList">

      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>
</div>

<script>
 getList();

 async function getList() {
  showLoader();

  let res = await axios.get('/income-list');

  hideLoader();

  let tableList = $('#tableList');
  let tableData = $('#tableData');

  tableData.DataTable().destroy();
  tableList.empty();

  res.data.forEach(function(item, index) {
   let row = `<tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    <td>${item['amount']}</td>
                    <td>${item['desc']}</td>
                    <td>${item['date']}</td>
                  
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>`

   tableList.append(row)

  })





  $('.editBtn').on('click', async function() {
   let id = $(this).data('id');
   await FillUpUpdateForm(id)
   $("#update-modal").modal('show');


  })

  $('.deleteBtn').on('click', function() {

   let id = $(this).data('id');
   // await FillUpUpdateForm
   $("#delete-modal").modal('show');
   $("#deleteID").val(id);

  });



  new DataTable('#tableData', {
   order: [
    [0, 'asc']
   ],
   lengthMenu: [5, 10, 15, 20, 30]
  });

 }

</script>
