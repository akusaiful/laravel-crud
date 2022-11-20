@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ __('contact.title') }}</h5>
                        <div class="ml-auto">
                            <a href="" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form action="">
                                @include('contact._filter_form')
                            </form>
                        </div>
                    </div>

                    <div class="mt-2 mb-3">
                        <img src="{{ asset('assets/img/analysis.png') }}" alt="" width="20px"> <b>Total records : {{ $contacts->total() }}</b> |
                        Showing record {{ $contacts->firstItem() }} from {{ $contacts->lastItem() }}
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
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
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td class="text-center"><img src="{{ $contact->getActiveIcon() }}" width="18px">
                                        </td>
                                        <td class="text-center"><img src="{{ $contact->getTrashIcon() }}" width="18px">
                                        </td>
                                        <td width="150">
                                            <form action="{{ route('contact.destroy', $contact) }}" method="POST"
                                                onsubmit=" return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')


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

                                                <button class="btn btn-sm btn-circle btn-outline-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>


                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No record found</td>
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
