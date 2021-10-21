@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Ads | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Ads</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.ad.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Ad Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Ad Name" required>
                        </div>
                        
                    </div>   
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Ad Link</label>
                            <textarea name="link" cols="100" rows="2" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Ad Page</label>
                            <select name="page" class="form-control" id="">
                                <option value="">Select</option>
                                <option value="Daily Ad">Daily Ad</option>
                                <option value="Referral Ad">Referral Ad</option>
                                <option value="Video">Video</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Accounts Detail</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th style="width:auto;">Sr No.</th>
                    <th style="width:auto;">Ad Name</th>
                    <th style="width:auto;">Ad Link</th>
                    <th style="width:auto;">Ad Page</th>
                    <th style="width:auto;">Action</th>
                    <th style="width:auto;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Ad::all() as $key => $ad)
                <tr> 
                    <td>{{$key+1}}</td>
                    <td>{{$ad->name}}</td>
                    <td>{{$ad->link}}</td>
                    <td>{{$ad->page}}</td>
                    <td class="table-action">
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$ad->name}}" 
                            link="{{$ad->link}}"  id="{{$ad->id}}" class="edit-btn btn"><i class="align-middle" data-feather="edit-2"></i></button>
                    </td>
                    <td class="table-action">
                        {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                        <form action="{{route('admin.ad.destroy',$ad->id)}}" method="POST">
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
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Ad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Ad Name</label>
                        <input class="form-control" type="text" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label>Ad Link</label>
                        <textarea name="link" cols="100" rows="2" id="link" class="form-control"></textarea>
                    </div> 
                    <div class="form-group">
                        <label class="form-label">Ad Page</label>
                        <select name="page" id="page" class="form-control" id="">
                            <option value="">Select</option>
                            <option value="Daily Ad">Daily Ad</option>
                            <option value="Referral Ad">Referral Ad</option>
                            <option value="Video">Video</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            let name = $(this).attr('name');
            let link = $(this).attr('link');
            let page = $(this).attr('page');
            $('#name').val(name);
            $('#link').val(link);
            $('#page').val(page);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.ad.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
@endsection