<script src="{{ mix('js/app.js') }}" defer></script>
<script src="{{ asset('materialize/js/materialize.js') }}" ></script>

@livewireScripts

<script>$(document).ready(function(){
        $('select').formSelect();
    });;
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let sidenav = document.querySelectorAll('.sidenav');
        let instancia_sidenav = M.Sidenav.init(sidenav,{});
        let dropdowns = document.querySelectorAll('.dropdown-trigger');
        let instancia_dropwdown = M.Dropdown.init(dropdowns, {
            hover:false});
    });
</script>
