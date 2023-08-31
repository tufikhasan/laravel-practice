<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input readonly id="email" placeholder="User Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Your Name</label>
                                <input id="name" placeholder="Your Name" class="form-control" type="text"/>
                            </div>
                            
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="phone" placeholder="Mobile" class="form-control" type="mobile"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label class="form-label">Select Role</label>
                                <select type="text" class="form-control form-select" id="role">
                                    <option value=""></option>
                                    <option value="">manager</option>
                                    <option value="">employee</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  btn-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    getUserProfile();

    async function getUserProfile(){
        showLoader();
        let response = await axios.get('/user-profile-info');
        hideLoader();

        if(response.status == 200 && response.data['status'] == 'Success'){
            let data = response.data['data'];

            document.getElementById('email').value = data['email'];
            document.getElementById('name').value = data['name'];
            document.getElementById('phone').value = data['phone'];
            document.getElementById('password').value = data['password'];

            let roleText = data['role'];
            let select = document.getElementById('role');
            select.options[select.selectedIndex].textContent = roleText;
            
            
            
        }
    }


    async function onRegistration(){
        let email = document.getElementById('email').value;
        let name = document.getElementById('name').value;
        let phone = document.getElementById('phone').value;
        let password = document.getElementById('password').value;

        let select = document.getElementById('role');
        let role = select.options[select.selectedIndex].textContent;

        if(email.length === 0){
            errorToast('Email Address is required');
        }else if(name.length === 0){
            errorToast('Name is required');
        }else if(phone.length === 0){
            errorToast('Phone number is required');
        }else if(password.length === 0){
            errorToast('Password is required');
        }else{
            showLoader();
            let respone = await axios.post('/user-profile-info-update', {
                name:name,
                phone:phone,
                password:password,
                role:role
            });
            hideLoader();

            if(respone.status === 200 && respone.data['status'] === 'success'){
                successToast(respone.data['message']);
                await getUserProfile();

            }else{
                errorToast(respone.data['message']);
            }
        }
    }


</script>