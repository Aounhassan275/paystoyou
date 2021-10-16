@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3> EDIT PACKAGE | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Package</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.package.update',$package->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Package Name" value="{{$package->name}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price" value="{{$package->price}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Total Earning</label>
                            <input type="number" class="form-control" name="t_earning"  placeholder="Total Earning" value="{{$package->t_earning}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Earning Per Day</label>
                            <input type="number" step="0.00001" class="form-control" name="day"  placeholder="Earning Per Day" value="{{$package->day}}">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Referral Click</label>
                            <input type="number" step="0.00001" class="form-control" name="click"  placeholder="Referral Click" value="{{$package->click}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Daily Ads</label>
                            <input type="number" class="form-control" name="ads"  placeholder="Daily Ads" value="{{$package->ads}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Validity in Days</label>
                            <input type="number" class="form-control" name="package_validity"  placeholder="Package Validity in Days" value="{{$package->package_validity}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Discount</label>
                            <input type="number" class="form-control" name="discount"  placeholder="Package Discount" value="{{$package->discount}}">
                        </div>
                   </div> 
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Maximum </label>
                            <input type="number" class="form-control" name="max" value="{{$package->max}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Minimum</label>
                            <input type="number" class="form-control" name="min" value="{{$package->min}}">
                        </div>
                   </div>
                    <div class="form-group">
                        <label class="form-label">Package Withdraw Day</label>
                        <select name="w_day" id="" class="form-control">
                            <option selected disabled>Select</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>                        
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection