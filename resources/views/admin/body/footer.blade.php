<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Devland.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Towfik Hasan
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->
<!-- JAVASCRIPT -->
<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>


<!-- apexcharts -->
<script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
</script>
<script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}">
</script>

<!-- Required datatable js -->
<script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>

<script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>

{{-- Toastr cdn --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- Toastr script  --}}
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
<!--tinymce js-->
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
<!-- init js -->
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
<!-- Required datatable js -->
<script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>
<!-- Sweetalert added --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code.js') }}"></script>
{{-- TagInput cdn  --}}
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
{{-- Jquery validation --}}
<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

</body>

</html>
