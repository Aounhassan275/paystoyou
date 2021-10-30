@extends('admin.layout.index')

@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>View User Donations | PAYS TO YOU</h3>
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
                    <th style="width:auto;">Sr#</th>
                    <th style="width:auto;">Client Name</th>
                    <th style="width:auto;">Client Email</th>
                    <th style="width:auto;">Message</th>
                    <th style="width:auto;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Email::all() as $key => $email)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$email->name}}</td>
                <td>{{$email->email}}</td>
                <td>{{$email->message}}</td>
                <td>
                    <span >Send</span> </button>
                </td>
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