@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>PACKAGE SUBSRIPTION | PAYS TO YOU</h3>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="monthly">
        <div class="row py-4">
            @foreach (App\Models\Package::orderBy('price', 'ASC')->get()->all() as $package)
            <div class="col-sm-4 mb-3 mb-md-0">
                <div class="card text-center h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-4">
                            <h5>{{$package->name}}</h5>
                            @if ($package->discount == 0)
                            <span class="display-4">$ {{$package->price}} /-</span><br>
                            @else
                            <span class="display-4">$ <strike>{{$package->price}}</strike> /-</span>
                            <h1>$ {{$package->price - $package->discount}} /-</h1>
                            @endif
                            <span>FOR {{$package->package_validity }} /Days</span>
                        </div>
                        <h6>Includes:</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                Total Earning : $ {{$package->t_earning}} /-
                            </li>
                            <li class="mb-2">
                                Earning Per Day : $ {{$package->day}} /-
                            </li>
                            {{-- <li class="mb-2">
                                Referral Click Earning : {{$package->click}} %
                            </li> --}}
                            <li class="mb-2">
                                Daily Ads : {{$package->ads}}
                            </li>
                            <li class="mb-2">
                                Valid For: {{$package->package_validity}} Days
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <a href="{{route('user.package.payment',$package->id)}}" class="btn btn-lg btn-primary">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection