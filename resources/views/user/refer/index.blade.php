@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>REFERRALS | ADVERT FOXX</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> Referrals</h5>
            </div>
            <div class="card-body">
                <form >
                   <div class="row">
                       
                        <div class="form-group col-12">
                            <label class="form-label">Copy Link</label>
                            <input type="text" class="form-control" name="" value="{{url('user/register',$user->code)}}" readonly>                       
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Referral</h5>
        </div>
        <table id="datatables-buttons" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Status</th>
                    <th>User Earning</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->mrefers as $key => $user)
                <tr> 
                    <td>{{$key + 1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
					@if ($user->checkstatus() =='old')
                        <span class="badge badge-success">Active</span>                            
                        @elseif($user->checkstatus() =='expired')
                        <span class="badge badge-primary">Expired</span>  
                        @else
                                                <span class="badge badge-danger">Pending</span>                                                      
                        @endif</td>
                    <td>{{$user->balance}}</td>
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
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            responsive: true,
            lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection