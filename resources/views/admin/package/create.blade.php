@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>ADD PACKAGE | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Package</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.package.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Package Name">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Total Earning</label>
                            <input type="number" class="form-control" name="t_earning"  placeholder="Total Earning" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Earning Per Day</label>
                            <input type="number" step="0.00001" class="form-control" name="day"  placeholder="Earning Per Day" value="">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Referral Click</label>
                            <input type="number" step="0.00001" class="form-control" name="click"  placeholder="Referral Click" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Daily Ads</label>
                            <input type="number" class="form-control" name="ads"  placeholder="Daily Ads" value="">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Validity in Days</label>
                            <input type="number" class="form-control" name="package_validity"  placeholder="Package Validity in Days" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Discount</label>
                            <input type="number" class="form-control" name="discount"  placeholder="Package Discount" value="">
                        </div>
                   </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Maximum </label>
                            <input type="number" class="form-control" name="max"  placeholder="Package Max" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Minimum</label>
                            <input type="number" class="form-control" name="min"  placeholder="Package Min" value="">
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