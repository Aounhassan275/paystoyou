@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>REFERRALS | PAYS TO YOU</h3>
       
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> Referrals</h5>
                <div class="text-right">
                    <a href="{{route('user.tree.show',Auth::user()->id)}}" class="btn btn-primary" >Binary Tree</a>
                </div>
            </div>
            <div class="card-body">
                <form >
                   <div class="row">
                       
                        <div class="form-group col-6">
                            <label class="form-label">Copy Link For Left Pair</label>
                            <input type="text" class="form-control" name="" value="{{url('user/register',$user->left)}}" readonly>                       
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Copy Link For Right Pair</label>
                            <input type="text" class="form-control" name="" value="{{url('user/register',$user->right)}}" readonly>                       
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-12 col-sm-6 col-xl d-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-warning" data-feather="package"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->active_refer()->where('refer_type','Left')->where('status','active')->count()}}</h3>

                        <div class="mb-0">Active Left Referrals</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-sm-6 col-xl d-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-success" data-feather="airplay"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->active_refer()->where('status','active')->where('refer_type','Right')->count()}}</h3>

                        <div class="mb-0">Active Right Referrals</div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="col-12 col-sm-6 col-xl d-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-warning" data-feather="package"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->pending_refer()->where('status','pending')->where('refer_type','Left')->count()}}</h3>

                        <div class="mb-0">Left Referrals Pending</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-sm-6 col-xl d-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-success" data-feather="airplay"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->pending_refer()->where('status','pending')->where('refer_type','Right')->count()}}</h3>

                        <div class="mb-0">Right Referrals Pending</div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
<div class="row">

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
                        <th>User Refer By</th>
                        <th>User Type</th>
                        <th>User Status</th>
                        <th>User Earning</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->all_refer() as $key => $user)
                    <tr> 
                        <td>{{$key + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->refer_by_name($user->refer_by)}}</td>
                        <td>{{$user->refer_type}}</td>
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
</div>
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Referral Direct Earning</h5>
            </div>
            <table id="datatables-buttons" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Earn Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->earnings()->where('type','direct_income')->get() as $key => $earning)
                    <tr> 
                        <td class="text-center">{{$key + 1}}</td>
                        <td class="text-center">$ {{$earning->price}}</td>
                    </tr>
                    @endforeach
                    <tr> 
                        <td class="text-center">Total Direct Income:</td>
                        <td class="text-center">$ {{Auth::user()->earnings()->where('type','direct_income')->sum('price')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View Referral Matching Earning</h5>
            </div>
            <table id="datatables-buttons" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Earn Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->earnings()->where('type','matching_income')->get() as $key => $earning)
                    <tr> 
                        <td class="text-center">{{$key + 1}}</td>
                        <td class="text-center">$ {{$earning->price}}</td>
                    </tr>
                    @endforeach
                    <tr> 
                        <td class="text-center">Total Matching Income:</td>
                        <td class="text-center">$ {{Auth::user()->earnings()->where('type','matching_income')->sum('price')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
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