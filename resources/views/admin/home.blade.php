@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check())
                        @if(Auth::user()->roles[0]['pivot']['role_id']==1)
                        <div>
                            @can('canAuthenAdmin')
                            <p> This is Admin</p>
                            <a href="{{route('admin.main')}}">Admin</a>
                            @endcan
                        @elseif(Auth::user()->roles[0]['pivot']['role_id']==2)
                            @can('canAuthenAdmin')
                            <p> This is Mod</p>
                            @endcan
                        @elseif(Auth::user()->roles[0]['pivot']['role_id']==3)
                        {{"This is user"}}
                        @else
                            {{"Who are you?"}}
                        @endif
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
