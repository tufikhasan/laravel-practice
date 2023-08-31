<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Add Leave Request</h4>
                    <hr/>
                    <form id="leave-form">
                        <div class="container-fluid m-0 p-0">
                            <div class="row m-0 p-0">
                                <div class="col-12 p-1">

                                    <label class="form-label">Leave Category</label>
                                    <select type="text" class="form-control form-select" id="leaveCategory">
                                        <option value="">Select Category</option>
                                    </select>

                                    <label class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="startDate">

                                    <label class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="endDate">
                                    
                                    <label class="form-label">Reason of Leave</label>
                                    <input type="text" class="form-control" id="leaveReason" placeholder="Explain the reason for the leave">

                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-md-4 p-2">
                                    <button onclick="addNewLeaveRequest()" class="btn mt-3 w-100  btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

    fillUpLeaveCategory()

    async function fillUpLeaveCategory(){
        showLoader();
        let allCat = await axios.get('/leave-category-list');
        hideLoader();

        allCat.data.forEach(function(item){
            let option = `<option value="${item['id']}">${item['name']}</option>`

            $("#leaveCategory").append(option);
        });
    }

    async function addNewLeaveRequest(){
        let category = document.getElementById('leaveCategory').value;
        let start_date = document.getElementById('startDate').value;
        let end_date = document.getElementById('endDate').value;
        let reason = document.getElementById('leaveReason').value;

        if(category.length === 0){
            errorToast('Leave Category is required');
        }else if(start_date.length === 0){
            errorToast('Leave stating date is required');
        }else if(end_date.length === 0){
            errorToast('Leave ending date is required');
        }else if(reason.length === 0){
            errorToast('Leave ending date is required');
        }else{
            showLoader();
            let  response = await axios.post('/leave-create', {
                start_date:start_date,
                end_date:end_date,
                reason:reason,
                leave_category_id:category

            });
            hideLoader();

            if(response.status===200 && response.data['status'] === 'success'){
                successToast(response.data['message']);
                document.getElementById("leave-form").reset();
            
                setTimeout(function () {
                    window.location.href="http://127.0.0.1:8000/allLeaveRequest";
                },1000);
                await  getAllLeaveRequest();

            }
            else{
                errorToast("Something Wron9")
            }
        }


    }

</script>