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

    /* 追加 */
    td table{
        margin: 0 auto;
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
    <!-- @foreach ($items as $item)
    <tr> -->
        <!-- hasOne (1対1) -->
        <!-- <td>
            {{$item->getDetail()}}
        </td>
        <td>
            @if ($item->book !=null)
            {{ $item->book->getTitle() }}
            @endif
        </td> -->

        <!-- hasMany (1対多) -->
        <!-- <td>
            {{$item->getDetail()}}
        </td>
        <td>
            @if ($item->books != null)
            <table width="100%">
                @foreach ($item->books as $obj)
                <tr>
                    <td>{{ $obj->getTitle() }}</td>
                </tr>
                @endforeach
            </table>
            @endif
        </td>
    </tr> -->
    <!-- @endforeach -->

    @foreach ($hasItems as $item)
    <tr>
        <td>
            {{$item->getDetail()}}
        </td>
        <td>
            <table>
                @foreach ($item->books as $obj)
                <tr>
                    <td>{{ $obj->getTitle() }}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
    @endforeach
</table>
<table>
    <tr>
        <th>Author</th>
    </tr>
    @foreach ($noItems as $item)
    <tr>
        <td>{{ $item->getDetail() }}</td>
    </tr>
    @endforeach
</table>
@endsection