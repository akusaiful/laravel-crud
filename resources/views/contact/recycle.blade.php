@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title-recycle">
                    <div class="d-flex align-items-center">
                        All Contacts | RECYCLE BIN
                        <div class="ml-auto">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form action="">
                                <input type="hidden" name="recycle" value="bin">
                                @include('contact._filter_form')
                            </form>
                        </div>
                    </div>

                    <div class="mt-2 mb-2">
                        Total records <b>{{ $contacts->total() }}</b> |
                        Showing record {{ $contacts->firstItem() }} from {{ $contacts->lastItem() }}
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Active</th>
                                <th scope="col">Bin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($contacts->total())
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <th scope="row">{{ $index + $contacts->firstItem() }}</th>
                                        <td>{{ $contact->name }} <br />
                                            <i>Delete by : {{ $contact->deleteBy->name  }} on {{ $contact->delete_timestamp->format('d-m-Y G:i:s') }}</i>
                                        
                                        </td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td class="text-center"><img src="{{ $contact->getActiveIcon() }}" width="18px">
                                        </td>
                                        <td class="text-center"><img src="{{ $contact->getTrashIcon() }}" width="18px">
                                        </td>
                                        <td width="150">
                                            <form action="{{ route('contact.restore', $contact) }}" method="POST"
                                                onsubmit=" return confirm('Are you sure?')">
                                                @csrf                                                


                                                <a href="{{ route('contact.show', $contact) }}"
                                                    class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('contact.edit', $contact) }}"
                                                    class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                                                        class="fa fa-edit"></i></a>

                                                <!-- Tidak boleh guna utk delete
                                                                                                <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                                                                                onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                                                                            -->

                                                <button class="btn btn-sm btn-circle btn-outline-success">
                                                    <i class="fa fa-recycle"></i>
                                                </button>


                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No record found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    {{ $contacts->appends(request()->all())->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
