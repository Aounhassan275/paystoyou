@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Pin | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Pin</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('user.pin.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control text-violet" name="amount" required>
                        </div>
                    </div>   
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Your Pin </h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pin</th>
                    <th>Pin Amount</th>
                    <th>Used By</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->pins as $key => $pin)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$pin->name}}</td>
                    <td>{{$pin->amount}}</td>
                    <td class="table-action">
                        <a href="{{route('user.pin.show',$pin->id)}}" class="btn btn-info" style="color:White;">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection