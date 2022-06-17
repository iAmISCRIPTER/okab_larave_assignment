@extends('admin_manage.layouts.layout')
@section('title',"List Users Mod")
@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Users</h4>
<div class="card">    
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Locality</th>
            <th>Purpose</th>
            <th>Rent Amt.</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @if(isset($users))
                @foreach($users as $u)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$u->name}}</strong></td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->address}}</td>
                    <td>{{$u->locality}}</td>
                    <td><span class="badge bg-label-primary me-1">{{$u->purpose}}</span></td>
                    <td>{{$u->rent_amt}}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item"  href="{{ url('users/update') ."/". $u->id  }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              @if(Auth::user()['role']==='admin')
                              <a class="dropdown-item" href="{{ url('users/delete') ."/". $u->id  }}"><i class="bx bx-trash me-1"></i> Delete</a>
                              @endif
                            </div>
                          </div>
                    </td>
                  </tr>
                @endforeach
            @endif 
        </tbody>
      </table>
    </div>
  </div>

@endsection