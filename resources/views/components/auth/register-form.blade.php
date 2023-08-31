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
                                <input id="email" placeholder="User Email" class="form-control" type="email"/>
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
                                    <option value="">Manager</option>
                                    <option value="">Employee</option>
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

async function onRegistration(){
    let email = document.getElementById('email').value;
    let name = document.getElementById('name').value;
    let phone = document.getElementById('phone').value;
    let password = document.getElementById('password').value;

    let select = document.getElementById('role');
    let role = select.options[select.selectedIndex].textContent;

    if(email.length === 0){
        errorToast('Email address is required');
    }else if(name.length === 0){
        errorToast('Name is required');
    }else if(phone.length === 0){
        errorToast('Phone number is required');
    }else if(password.length === 0){
        errorToast('Password is required');
    }else{
        showLoader();
        let response = await axios.post('/user-register', {
            "email":email,
            "name":name,
            "phone":phone,
            "password":password,
            "role":role
        });
        hideLoader();

        if(response.status == 200 && response.data['status'] == 'success'){
                successToast(response.data['message']);
                setTimeout(function (){
                    window.location.href='/userLogin'
                },2000)

            }else{
                errorToast(response.data['message']);
            }

    }
}


</script>
