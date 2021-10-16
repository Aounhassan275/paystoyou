@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>View User Donations | ADVERT FOXX</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Donations</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th style="width:auto;">User Name</th>
                    <th style="width:auto;">User Email</th>
                    <th style="width:auto;">Donation Amount</th>
                    <th style="width:auto;">Donation Date </th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Donation::all() as $key => $donation)
                <tr> 
                <td>{{$donation->user->name}}</td>
                <td>{{$donation->user->email}}</td>
                <td>{{$donation->amount}}</td>
                <td>{{Carbon\Carbon::parse($donation->created_at)->format('d/m/Y')}}</td>
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