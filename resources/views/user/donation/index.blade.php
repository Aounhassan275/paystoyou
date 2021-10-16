@extends('user.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Deposit | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Deposit Information For Package</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('user.donation.store')}}" >
                   @csrf
                        <div class="form-group col-12">
                            <label class="form-label">Donation Amount</label>
                            <input type="number" name="amount" class="form-control text-violet" placeholder="Enter Donation Amount" required>
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