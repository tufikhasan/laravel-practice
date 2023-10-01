<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Product</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal"
                        class="float-end btn m-0  bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark " />
            <table class="table" id="tableData">
                <thead>
                    <tr class="bg-light">
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableList">
                    <tr>
                        <td><img width="40" class="h-auto" alt="" src="{{ asset('images/user.webp') }}">
                        </td>
                        <td>Redmi Note 9 Pro</td>
                        <td>26000</td>
                        <td>Mobile</td>
                        <td>
                            <button data-path="url" data-id="1" data-bs-toggle="modal" data-bs-target="#update_modal"
                                class="btn editBtn btn-sm btn-outline-success">Edit</button>
                            <button data-path="url" data-id="1" data-bs-toggle="modal" data-bs-target="#delete_modal"
                                class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
