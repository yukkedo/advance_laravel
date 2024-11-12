@extends('layouts.default')
<style>
    th {
        background-color: #289ADC;
        color: white;
        padding: 5px 40px;
    }

    tr:nth-child(ood) td {
        background-color: #FFFFFF;
    }

    td {
        padding: 25px 40px;
        background-color: #EEEEEE;
        text-align: center;
    }

    /* 追加分 */
    td table tbody tr td {
        background-color: #EEEEEE !important;
    }
</style>
@section('title', 'author.index.blade.php')

@section('content')
<table>
    <tr>
        <th>Author</th>
        <th>Book</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>
            {{$item->getDetail()}}
        </td>
        <td>
            @if ($item->books != null)
            <table width="100%">
                @foreach{{ $item->books as $obj}} <!-- 1つ以上のリレーションを確認　-->
                <tr>
                    <td>{{ $obj->getTitle() }}</td> <!-- 1つずつ本のタイトルを表示-->
                </tr>
                @endforeach
            </table>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection