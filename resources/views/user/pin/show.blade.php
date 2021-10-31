@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Pin | PAYS TO YOU</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Pin  Used By You</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pin Amount</th>
                    <th>Pin Used At</th>
                    <th>Pin Used By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pins as $key => $pin)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>$ {{$pin->pin->amount}}</td>
                    <td>{{$pin->user->name}}</td>
                    <td>{{$pin->created_at->format('M d,Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection