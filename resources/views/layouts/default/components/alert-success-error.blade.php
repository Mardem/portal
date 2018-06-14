<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
@if(Session::has('success'))
    <script>
        swal({
            title: "Tudo certo",
            text: "{{ Session::get('success') }}",
            button: "OK!",
            icon: "success"
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        swal({
            title: "Ops!",
            text: "{{ Session::get('error') }}",
            button: "OK!",
            icon: "error"
        });
    </script>
@endif