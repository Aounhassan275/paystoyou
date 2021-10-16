@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>MESSAGES | PAYS TO YOU</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Messages</h5>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="width:auto;">Sender Name</th>
                    <th style="width:auto;">Sender Email</th>
                    <th style="width:auto;">Subject</th>
                    <th style="width:auto;">Message</th>
                    <th style="width:auto;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Message::all() as $key => $message)
                <tr> 
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td class="table-action">
                        {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                        <form action="{{route('admin.message.destroy',$message->id)}}" method="POST">
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