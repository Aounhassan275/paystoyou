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
                <h5 class="card-title">Add Pin Balance</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('user.pin_used.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Enter Pin</label>
                            <input type="text" class="form-control text-violet" name="name" required>
                        </div>
                    </div>   
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Enter Pin</button>
                    </div>
                </form>
            </div>
        </div>
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
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->pin_used as $key => $pinused)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>$ {{$pinused->pin->amount}}</td>
                    <td>{{$pinused->created_at->format('M d,Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection