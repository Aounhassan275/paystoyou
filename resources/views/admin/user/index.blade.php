@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW USER | PAYS TO YOU</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View User Table</h5>
        </div>
        <table id="datatables-buttons" class="table table-striped">
            <thead>
                <tr>
                    <th style="width:auto;">User Name</th>
                    <th style="width:auto;">User Email </th>
                    <th style="width:auto;">User Package </th>
                    <th style="width:auto;">Package Date</th>
                    <th style="width:auto;">Package Expire Date</th>
                    <th style="width:auto;">Status</th>
                    <th style="width:auto;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\User::all() as $key => $user)
                <tr> 
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->package)
                    <td>{{$user->package->name}}</td>    
                    <td>{{$user->a_date->format('d M,Y')}}</td>
                    <td>{{$user->packageExpires()->format('d M,Y')}}</td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                       <td>
					@if ($user->checkstatus() =='old')
                        <span class="badge badge-success">Active</span>                            
                        @elseif($user->checkstatus() =='expired')
                        <span class="badge badge-primary">Expired</span>  
                        @else
                                                <span class="badge badge-danger">Pending</span>                                                      
                        @endif
                        </td>
                  

                        <td> <a href="{{route('admin.user.detail',$user->id)}}" class="button"><button class="btn btn-primary"> Detail</button></a></td>
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