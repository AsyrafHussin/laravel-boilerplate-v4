@if (checkRole('admin'))
    @include('layouts.navbar.admin')
@endif

@if (checkRole('user'))
    @include('layouts.navbar.user')
@endif
