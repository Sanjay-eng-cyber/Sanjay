<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="backend/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="backend/bootstrap/js/popper.min.js"></script>
<script src="backend/bootstrap/js/bootstrap.min.js"></script>
<script src="backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="backend/assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="backend/assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
{{-- <script src="backend/plugins/apex/apexcharts.min.js"></script> --}}
<script src="backend/assets/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

{{-- <script src="{{asset('assets/js/components/notification/custom-snackbar.js')}}"></script> --}}
<script src="{{ asset('backend/assets/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script>
    @if (Session::get('alert-type') == 'success')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#1abc9c'
            });
        @endif
    @elseif (Session::get('alert-type') == 'info')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#2196f3'
            });
        @endif
    @elseif (Session::get('alert-type') == 'error')
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a'
            });
        @endif
    @else
        @if (Session::has('message'))
            Snackbar.show({
                text: "{{ Session::get('message') }}",
                pos: 'top-right',
                actionTextColor: '#fff',
                backgroundColor: '#3b3f5c'
            });
        @endif
    @endif
</script>
