
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('css/listPagecss.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/dropDownCreatecss.css') }}" rel="stylesheet" type="text/css" >
    @yield('addcss')
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
-->
    <title>@yield('title')</title>

</head>
<body>
    <div class="dropdown">
        <button onclick="showForm()" class="dropbtn">@yield('form_type')</button>
        <div id="myDropdown" class="dropdown-content">
            @yield('form_content')
        </div>
    </div>
    <button onclick="logout()" class="logout_link">Log out</button>
    @yield('add_button')
    @yield('content')


    <script>
        function logout(){
            window.location.replace("/logged/logout");
        }
        function showForm() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
    @yield('add_js')

</body>
</html>