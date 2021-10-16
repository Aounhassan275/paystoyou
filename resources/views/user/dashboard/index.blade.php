@extends('user.layout.index')

@section('meta')

    
<title>USER PANEL | ADVERT FOXX</title>

<meta name="description" content="Multipurpose HTML template.">

@endsection



@section('contents')




@if (Auth::user()->checkstatus() =='old')



<div class="row">

    <div class="col-sm-12">

        <div class="card flex-fill">

            <div class="card-header">



                <h5 class="card-title mb-0 blink_me">

 
                    @foreach (App\Models\Ticker::all() as $ticker)



                {{$ticker->message}} .

                    @endforeach



                </h5>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-12 col-sm-6 col-xl  d-xxl-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-info" data-feather="dollar-sign"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR {{number_format(Auth::user()->balance, 2)}}</h3>

                        <div class="mb-0">Available Balance</div>

                    </div>

                </div>

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

                        <i class="feather-lg text-primary" data-feather="activity"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->package->name}}</h3>

                        <div class="mb-0">Package Subcription</div>

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

                        <i class="feather-lg text-warning" data-feather="calendar"></i>



                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->packageExpires()->format('d M,Y')}}</h3>

                        <div class="mb-0">Package Expire</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-sm-6 col-xl  d-xxl-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-info" data-feather="aperture"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Carbon\Carbon::today()->diffInDays(Auth::user()->a_date)}}</h3>

                        <div class="mb-0">Packages Days</div>

                    </div>

                </div>

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

                        <h3 class="mb-2">{{Auth::user()->totalAds()}}</h3>

                        <div class="mb-0">Total Ads</div>

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

                        <h3 class="mb-2">{{Auth::user()->remainingViews()}}</h3>

                        <div class="mb-0">Available Ads</div>

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

                        <i class="feather-lg text-danger" data-feather="shopping-bag"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR {{Auth::user()->totalEarning()}}</h3>

                        <div class="mb-0">Total Ad Earning</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@if(Auth::user()->withdraws)
<div class="row">

    <div class="col-12 col-sm-6 col-xl d-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-success" data-feather="credit-card"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR {{Auth::user()->totalWithdraw()}}</h3>

                        <div class="mb-0">Total Withdraw</div>

                    </div>

                </div>

            </div>

        </div>

    </div>


</div>
@else
<div class="row">

    <div class="col-12 col-sm-6 col-xl  d-xxl-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-info" data-feather="dollar-sign"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR {{number_format(Auth::user()->balance, 2)}}</h3>

                        <div class="mb-0">Available Balance</div>

                    </div>

                </div>

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

                        <i class="feather-lg text-success" data-feather="credit-card"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR 0</h3>

                        <div class="mb-0">Total Withdraw</div>

                    </div>

                </div>

            </div>

        </div>

    </div>


</div>
@endif
<div class="row">

    <div class="col-12 col-sm-6 col-xl d-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-success" data-feather="dollar-sign"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR {{Auth::user()->r_earning}}</h3>

                        <div class="mb-0">Total Referal Earning</div>

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

                        <i class="feather-lg text-danger" data-feather="user-plus"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->refers->count()}}</h3>

                        <div class="mb-0">Total Referal</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="row">  

    <div class="col-md-12 text-center">

    <a href="{{route('user.ad.index')}}">

            <div class="card bg-primary py-2 py-md-3 border">

                <div class="card-body blink_me">

                    <h1 style="color:white">   

                        <i class="align-middle mr-2 fas fa-fw fa-eye"></i>

                        View Ads

                    </h1>

                </div>

            </div>

        </a>

    </div>

</div>
@else

<div class="row">

    <div class="col-md-12 text-center">

        <div class="card bg-danger py-2 py-md-3 border">

            <div class="card-body blink_me">

                <h1 style="color:white"> 

                    Your Package Subscription is Pending.Purchase Package to Earn Money

                    </h1>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-sm-12">

        <div class="card flex-fill">

            <div class="card-header">

                <h5 class="card-title mb-0">


                    @foreach (App\Models\Ticker::all() as $ticker)

                {{$ticker->message}} .

                    @endforeach
				</h5>

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

                        <i class="feather-lg text-primary" data-feather="shopping-cart"></i>

                    </div>

                    <div class="media-body">

                    <h3 class="mb-2">{{Auth::user()->name}}</h3>

                        <div class="mb-0">My Name</div>

                    </div>

                </div>

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

                        <i class="feather-lg text-success" data-feather="credit-card"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR {{Auth::user()->totalWithdraw()}}</h3>

                        <div class="mb-0">Total Withdraw</div>

                    </div>

                </div>

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

                        <i class="feather-lg text-success" data-feather="dollar-sign"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">PKR {{Auth::user()->r_earning}}</h3>

                        <div class="mb-0">Total Referal Earning</div>

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

                        <i class="feather-lg text-danger" data-feather="user-plus"></i>

                    </div>

                    <div class="media-body">

                        <h3 class="mb-2">{{Auth::user()->refers->count()}}</h3>

                        <div class="mb-0">Total Referal</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


@endif

@endsection

