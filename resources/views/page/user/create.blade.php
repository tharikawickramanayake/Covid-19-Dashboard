@extends('layouts.admin')

@section('content')
<new-user-component :user_id="{{Auth::user()->id}}" />
@endsection