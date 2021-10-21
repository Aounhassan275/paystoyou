@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW TRANSCATIONS | PAYS TO YOU</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Transcations </h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Receiver Name</th>
                    <th>Amount</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->transcations as $key => $transcation)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$transcation->receiver->name}}</td>
                    <td>{{$transcation->amount}}</td>
                    <td>{{$transcation->detail}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
@endsection