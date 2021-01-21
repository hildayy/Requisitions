@extends('layouts.app')

@section('content')
<div class="container">
{{--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body"> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                            <div class="panel-body">

                                You are logged in! as <strong>{{ strtoupper(Auth::user()->type) }}</strong>
                                
                        Admin Page: <a href="{{ url('/') }}/adminOnlyPage">{{ url('/') }}/adminOnlyPage</a>
                                
                        Super Admin Page: <a href="{{ url('/') }}/superAdminOnlyPage">{{ url('/') }}/super_adminOnlyPage</a>
                                
                        Member Page: <a href="{{ url('/') }}/memberOnlyPage">{{ url('/') }}/memberOnlyPage</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection


	

