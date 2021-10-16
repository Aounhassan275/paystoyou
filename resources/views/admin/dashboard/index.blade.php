@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>DASHBOARD | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-primary float-right">All</span>
                            <h5 class="card-title mb-0">Total Packages</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Package::count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-info float-right">All</span>
                            <h5 class="card-title mb-0">Total Messages</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Message::count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-warning float-right">All</span>
                            <h5 class="card-title mb-0">Total User</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\User::count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-success float-right">All</span>
                            <h5 class="card-title mb-0">Total Pending User</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\User::pending()->count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-primary float-right">All</span>
                            <h5 class="card-title mb-0">Active User</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\User::active()->count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-info float-right">All</span>
                            <h5 class="card-title mb-0">Total Earning</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        <h3 class="mb-0">{{App\Models\Deposit::sum('amount')}}</h3>
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-warning float-right">All</span>
                            <h5 class="card-title mb-0">Total Withdraw</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Withdraw::all()->sum('payment')}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-success float-right">All</span>
                            <h5 class="card-title mb-0">Total OnHold Withdraw</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Withdraw::hold()->sum('payment')}}

                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-primary float-right">All</span>
                            <h5 class="card-title mb-0">Total Ad</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Ad::all()->count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-info float-right">All</span>
                            <h5 class="card-title mb-0">Video Ad</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Ad::video()->count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-warning float-right">All</span>
                            <h5 class="card-title mb-0">Total Employee</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Admin::employee()->count()}}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <span class="badge badge-success float-right">All</span>
                            <h5 class="card-title mb-0">Total OnHold Withdraw</h5>
                        </div>
                        <div class="card-body my-2">
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0 font-weight-light">
                                        {{App\Models\Withdraw::hold()->sum('payment')}}

                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-sm shadow-sm mb-1">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection