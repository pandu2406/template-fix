@extends('admin.template-base', ['searchNavbar' => false])

@section('page-title', 'Master SHPB')

{{-- MAIN CONTENT PART --}}
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

    
        {{-- FOR BREADCRUMBS --}}

        @include('admin.components.breadcrumb.simple', $breadcrumbs)

        {{-- MAIN PARTS --}}
        <div class="card">
            <h2 class="card-header">Master SHPB</h2>
        </div>


    </div>

@endsection

@section('footer-code')



@endsection
