<div class="footer" >
    <div>
        <center><strong>Copyright</strong> ERP &copy; 2018</center>
    </div>
</div>
</div>
</div>
@yield('footer_scripts')
<script>
    $(document).ready(function(){

        Dropzone.options.myAwesomeDropzone = {

            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,

            // Dropzone settings
            init: function() {
                var myDropzone = this;

                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("sendingmultiple", function() {
                });
                this.on("successmultiple", function(files, response) {
                });
                this.on("errormultiple", function(files, response) {
                });
            }

        }

    });
    



        $(document).ready(function(){
            $('.dataTables-example').DataTable({                
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>

<script src="{{ asset('packages/erp/js/plugins/toastr/toastr.min.js') }}"></script>
<link href="{{ asset('packages/erp/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
<!-- Active Inactive -->
<link href="{{asset('packages/erp/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<script src="{{asset('packages/erp/js/bootstrap-toggle.min.js')}}"></script>
<!-- END active inactive -->
<script src="{{ asset('packages/erp/js/plugins/dataTables/datatables.min.js') }}"></script>



</body>

</html>
