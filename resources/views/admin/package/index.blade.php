@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW PACKAGES | ADVERT FOXX</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Package Table</h5>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="width:auto;">Package Name</th>
                    <th style="width:auto;">Package Price</th>
                    <th style="width:auto;">Total Earning</th>
                    <th style="width:auto;">Earning Per Day</th>
                    <th style="width:auto;">Referral Click</th>
                    <th style="width:auto;">Daily Ads</th>
                    <th style="width:auto;">Package Validity in Days</th>
                    <th style="width:auto;">Package Discount</th>
                    <th style="width:auto;">Package Withdraw Day</th>
                    <th style="width:auto;">Action</th>
                    <th style="width:auto;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Package::all() as $key => $package)
                <tr> 
                    <td>{{$package->name}}</td>
                    <td>{{$package->price}}</td>
                    <td>{{$package->t_earning}}</td>
                    <td>{{$package->day}}</td>
                    <td>{{$package->click}}</td>
                    <td>{{$package->ads}}</td>
                    <td>{{$package->package_validity}}</td>
                    <td>{{$package->discount}}</td>
                    <td>{{$package->w_day}}</td>
                    <td class="table-action">
                        <a href="{{route('admin.package.edit',$package->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                    </td>
                    <td class="table-action">
                        {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                        <form action="{{route('admin.package.destroy',$package->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection