<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Income Details</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">


                        {{-- item 0 --}}
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label"> Income Category</label>

                                <select id="expense_cat_id">
                                    @foreach ($expense_cat as $inc)
                                        <option value="{{ $inc->id }}">{{ $inc->name }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>

                        {{-- item 1 --}}
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Income Name *</label>
                                <input type="text" class="form-control" id="expenseName">
                            </div>
                        </div>

                        {{-- item 2 --}}
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label"> Amount *</label>
                                <input type="text" class="form-control" id="amount">
                            </div>
                        </div>

                        {{-- item 3 --}}
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label"> Description *</label>
                                <input type="text" class="form-control" id="desc">
                            </div>
                        </div>

                        {{-- item 4 --}}
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label"> Date *</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    Close
                </button>
                <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function Save() {
        let expenseName = document.getElementById('expenseName').value;
        let amount = document.getElementById('amount').value;
        let desc = document.getElementById('desc').value;
        let date = document.getElementById('date').value;
        let expense_cat_id = document.getElementById('expense_cat_id').value;


        if (expenseName.length === 0) {
            errorToast("Category Name is required")
        } else {

            document.getElementById('modal-close').click();
            //    showLoader();

            let res = await axios.post('/create-expense', {
                name: expenseName,
                amount: amount,
                desc: desc,
                date: date,
                expense_cat_id: expense_cat_id
            })
            console.log(res.data);
            //    hideLoader();

            if (res.status == 201) {
                successToast("Category created");
                document.getElementById("save-form").reset();
                await getList();
            } else {
                errorToast("Request fail !")
            }

        }
    }
</script>
