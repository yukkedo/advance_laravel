@extends('layouts.default')
<style>
    th {
        background-color: #289ADC;
        color: white;
        padding: 5px 40px;
    }

    tr:nth-child(odd) td {
        background-color: #FFFFFF;
    }

    td {
        padding: 25px 40px;
        background-color: #EEEEEE;
        text-align: center;
    }

    button {
        padding: 10px 20px;
        background-color: #289ADC;
        border: none;
        color: white;
    }
</style>
@section('title', 'add.blade.php')

@section('content')
@if (count($errors) > 0)
<p>入力に問題があります</p>
@endif
<form action="/add" method="post">
    <table>
        @csrf
        @if ($errors->has('name'))
        <tr>
            <th style="background-color: red">ERROR</th>
            <td>
                {{$errors->first('name')}}
            </td>
        </tr>
        @endif
        <tr>
            <th>name</th>
            <td><input type="text" name="name"></td>
        </tr>
        @if ($errors->has('age'))
        <tr>
            <th style="background-color: red">ERROR</th>
            <td>
                {{$errors->first('age')}}
            </td>
        </tr>
        @endif
        <tr>
            <th>age</th>
            <td><input type="text" name="age"></td>
        </tr>
        @if ($errors->has('nationality'))
        <tr>
            <th style="background-color: red">ERROR</th>
            <td>
                {{$errors->first('nationality')}}
            </td>
        </tr>
        @endif
        <tr>
            <th>nationality</th>
            <td><input type="text" name="nationality"></td>
        </tr>
        <tr>
            <th></th>
            <td><button>送信</button></td>
        </tr>
    </table>
</form>
@endsection