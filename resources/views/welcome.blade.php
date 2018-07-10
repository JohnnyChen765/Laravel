@extends('layouts.app')
@section('content')
welcome<br>
<a href='login'> go login </a><br>
{{Auth::user()->email}}<br>
{{Auth::user()->password}}<br>
{{Auth::user()->id}}











