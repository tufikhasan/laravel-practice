<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h6>Employee Leave Report</h6>
                    </div>
                   
                </div>

                <hr class="bg-secondary"/>
                <div class="table-responsive">
                    <table class="table  table-flush" id="tableData">
                        <thead>
                            <tr class="bg-light">
                                
                                <th>Total Leave Days</th> 
                                <th>Available Leave Days</th>
                                
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

    showEmployeereport();

    async function showEmployeereport(){
        showLoader();
        let response = await axios.get('/available-leave-days');
        hideLoader();

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        
            let row = `
            <tr class='report'>              
               
               <td>${response.data['totalLeaveDays']}</td>
               <td>${response.data['result']}</td>
              
           </tr>
            `
            tableList.append(row);
        



    }

</script>