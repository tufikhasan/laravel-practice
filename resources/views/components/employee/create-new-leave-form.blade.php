<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Leave Request</h5>
                </div>
                <div class="modal-body">
                    <form id="leave-form">
                    <div class="container">
                        <div class="row">
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
                                    <input type="text" class="form-control" id="leaveReason" placeholder="Leave's reason">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="addNewLeaveRequest()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>

                    
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
            document.getElementById('modal-close').click();
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
            
                await  getAllLeaveRequest();

            }
            else{
                errorToast(response.data['message'])
            }
        }


    }

</script>