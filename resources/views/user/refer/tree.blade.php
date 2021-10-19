@extends('user.layout.index')
@section('contents')
<div class="row">
    <div class="col-4 "></div>
    <div class="col-4 ">
        <div class="text-center">

            <div class="card flex-fill">

                <div class="card-body py-4">

                    <div class="media">

                        <div class="d-inline-block mt-2 mr-3">

                            <i class="feather-lg text-warning" data-feather="user"></i>

                        </div>

                        <div class="media-body">

                            <h3 class="mb-2">{{$user->name}}</h3>

                            {{-- <div class="mb-0">{{$user->name}}</div> --}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-4 "></div>
</div>
<div class="row">
    <div class="col-6 ">
        <div class="text-center">

            <div class="card flex-fill">

                <div class="card-body py-4">

                    <div class="media">

                        <div class="d-inline-block mt-2 mr-3">

                            <i class="feather-lg text-warning" data-feather="user"></i>

                        </div>

                        <div class="media-body">

                            <h3 class="mb-2">
                                @if($user->left_refferal)
                                <a href="{{route('user.tree.show',$user->left_refferal)}}"> 
                                    {{@$user->refer_by_name(@$user->left_refferal)}}
                                </a>
                                <br>
                                $ {{$user->left_amount}}
                                @endif
                            </h3>

                            {{-- <div class="mb-0">{{$user->name}}</div> --}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-6 ">
        <div class="text-center">

            <div class="card flex-fill">

                <div class="card-body py-4">

                    <div class="media">

                        <div class="d-inline-block mt-2 mr-3">

                            <i class="feather-lg text-warning" data-feather="user"></i>

                        </div>

                        <div class="media-body">

                            <h3 class="mb-2">
                                @if($user->right_refferal != null)
                                <a href="{{route('user.tree.show',$user->right_refferal)}}"> 
                                    {{@$user->refer_by_name(@$user->right_refferal)}}
                                </a>
                                <br>
                                $ {{$user->right_amount}}
                                @endif
                            </h3>

                            {{-- <div class="mb-0">{{$user->name}}</div> --}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3 ">
        <div class="text-center">

            <div class="card flex-fill">

                <div class="card-body py-4">

                    <div class="media">

                        <div class="d-inline-block mt-2 mr-3">

                            <i class="feather-lg text-warning" data-feather="user"></i>

                        </div>

                        <div class="media-body">
                            @if(@$left && $left->left_refferal != null)
                            <h3 class="mb-2">
                                <a href="{{route('user.tree.show',$left->left_refferal)}}"> 
                                    {{@$left->refer_by_name(@$left->left_refferal)}}
                                </a>
                                <br>
                                $ {{$left->left_amount}}
                            </h3>
                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-3 ">
        <div class="text-center">

            <div class="card flex-fill">

                <div class="card-body py-4">

                    <div class="media">

                        <div class="d-inline-block mt-2 mr-3">

                            <i class="feather-lg text-warning" data-feather="user"></i>

                        </div>

                        <div class="media-body">
                            @if(@$left && $left->right_refferal != null)
                                <h3 class="mb-2">
                                    <a href="{{route('user.tree.show',$left->right_refferal)}}"> 
                                        {{@$left->refer_by_name(@$left->right_refferal)}}
                                    </a>
                                </h3>
                                <br>
                                $ {{$left->right_amount}}
                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-3 ">
        <div class="text-center">

            <div class="card flex-fill">

                <div class="card-body py-4">

                    <div class="media">

                        <div class="d-inline-block mt-2 mr-3">

                            <i class="feather-lg text-warning" data-feather="user"></i>

                        </div>

                        <div class="media-body">
                            @if(@$right && @$right->left_refferal != null)
                            <h3 class="mb-2">
                                <a href="{{route('user.tree.show',$right->left_refferal)}}"> 
                                    {{@$right->refer_by_name(@$right->left_refferal)}}
                                </a>
                                <br>
                                $ {{$right->left_amount}}
                            </h3>
                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-3 ">
        <div class="text-center">

            <div class="card flex-fill">

                <div class="card-body py-4">

                    <div class="media">

                        <div class="d-inline-block mt-2 mr-3">

                            <i class="feather-lg text-warning" data-feather="user"></i>

                        </div>

                        <div class="media-body">
                            @if(@$right && @$right->right_refferal != null)
                            <h3 class="mb-2">
                                <a href="{{route('user.tree.show',$right->right_refferal)}}"> 
                                    {{$right->refer_by_name(@$right->right_refferal)}}
                                </a>
                                <br>
                                $ {{$right->right_amount}}
                            </h3>
                            @endif

                        </div>

                    </div>

                </div>

            </div>
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