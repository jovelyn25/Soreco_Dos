<!DOCTYPE html>
<html>

<head>
    @include('layouts.includes.head')
</head>

<body>
    <div class="wrapper">

        @include('layouts.includes.sidebar')

        @yield('content')

    </div>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="{{ asset('js/ijaboCropTool-master/ijaboCropTool.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

    {{-- <script src="{{ asset('js/general.js') }}"></script> --}}
    <script src="{{ asset('js/general.js') }}"></script>
    <script src="{{ asset('js/psischedule.js') }}"></script>
    <script src="{{ asset('js/PsiScheduleNoticePrint.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    {{-- <script src="{{ asset('js/bhw.js') }}"></script> --}}

    @include('sweetalert::alert')

    @yield('scripts')

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
                localStorage.setItem("showMenu", arrowParent.classList.contains("showMenu"));
            });
        }

        let sidebar = document.querySelector(".sidebar");
        let content = document.querySelector("#content");
        let sidebarBtn = document.querySelector(".fa-bars");

        if (localStorage.getItem("close") == "true") {
            sidebar.classList.add("close");
            content.classList.add("close");
        }
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            content.classList.toggle("close");
            localStorage.setItem("close", sidebar.classList.contains("close"));

        });
    </script>

    <script>
        $("ul li").click(function() {
            $('li').removeClass("active");
            $(this).addClass("active");
        });
    </script>

    <script>
        $(document).on('click', '#change_picture_btn', function() {
            $('#admin_image').click();
        });

        $('#admin_image').ijaboCropTool({
            preview: '.admin_picture',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '{{ route('PictureUpdate') }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                alert(message);
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>
</body>

</html>
