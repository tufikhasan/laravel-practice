<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Leave Request</h5>
                </div>
                <div class="modal-body">
                    <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Leave Category</label>
                                    <select type="text" class="form-control form-select" id="leaveCategoryUpdate">
                                        <option value="">Select Category</option>
                                    </select>

                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDateUpdate">

                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDateUpdate">
                                
                                <label class="form-label">Reason of Leave</label>
                                <input type="text" class="form-control" id="leaveReasonUpdate">


                                {{-- <label class="form-label">Status</label>
                                <input type="text" class="form-control" id="statusUpdate">
 --}}

                                <label class="form-label">Leave Status</label>
                                    <select type="text" class="form-control form-select" id="statusUpdate">
                                        <option value=""></option>
                                        <option value="">pending</option>
                                        <option value="">approved</option>
                                        <option value="">rejected</option>
                                    </select>

                                <input type="text" class="" id="updateID" placeholder="ID">
                                <input type="text" class="" id="userEmailUpdate" placeholder="Email Address">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="UpdateLeave()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    fillUpLeaveCategory();
    async function fillUpLeaveCategory(){
        showLoader();
        let leave_category = await axios.get('/leave-category-list');
        hideLoader();

        leave_category.data.forEach(function(item){
            let option =`<option value="${item['id']}">${item['name']}</option>`

            $("#leaveCategoryUpdate").append(option)
        });

    }

    async function fillUpLeaveForm(id){
        document.getElementById('updateID').value = id;

        showLoader();
        let fillInfo = await axios.post('/leave-by-id',{id:id});
        hideLoader();

        document.getElementById('leaveCategoryUpdate').value = fillInfo.data['leave_category_id']
        document.getElementById('startDateUpdate').value = fillInfo.data['start_date']
        document.getElementById('endDateUpdate').value = fillInfo.data['end_date']
        document.getElementById('leaveReasonUpdate').value = fillInfo.data['reason']

        document.getElementById('userEmailUpdate').value = fillInfo.data['user']['email']

        let statusText =fillInfo.data['status'];
        let select = document.getElementById('statusUpdate');
        select.options[select.selectedIndex].textContent = statusText;

    
    }


    async function UpdateLeave(){
        let leave_category = document.getElementById('leaveCategoryUpdate').value;
        let leave_startTime = document.getElementById('startDateUpdate').value;
        let leave_endTime = document.getElementById('endDateUpdate').value;
        let leave_reason = document.getElementById('leaveReasonUpdate').value;

        let select = document.getElementById('statusUpdate');
        let status = select.options[select.selectedIndex].textContent;

        let leave_id = document.getElementById('updateID').value;

        if(leave_category.length === 0){
            errorToast("Leave category is Required !")
        }else if(leave_startTime.length === 0){
            errorToast("Leave start time is Required !")
        }else if(leave_endTime.length === 0){
            errorToast("Leave end time is Required !")
        }else if(leave_reason.length === 0){
            errorToast("Leave reason is Required !")
        }else{
            document.getElementById('update-modal-close').click();
            let dataInfo = {
                "id":leave_id,
                "start_date":leave_startTime,
                "end_date":leave_endTime,
                "reason":leave_reason,
                "status":status,
                "leave_category_id":leave_category
            }
            showLoader();
            let response = await axios.post('/leave-update', dataInfo);
            hideLoader();

            if(response.status===200 && response.data['status'] === 'succes'){
                successToast(response.data['message']);
                document.getElementById("update-form").reset();
                await gellLeaveRequestForManager();  
            }
            else{
                errorToast("Request fail and not to update the leave !")
            }
        }

    }

</script>