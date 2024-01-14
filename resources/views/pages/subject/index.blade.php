@extends('layouts.app')

@section('title', 'Subjects')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Users</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('subject.index') }}">subject</a></div>
                    <div class="breadcrumb-item">All Subjects</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <h2 class="section-title">Posts</h2>
                <p class="section-lead">
                    You can manage all subjects, such as editing, deleting and more.
                </p> --}}
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Subjects</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('subject.create') }}" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('subject.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="title"
                                                value="{{ request('title') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Lecturer</th>
                                            <th>Semester</th>
                                            <th>Academic Year</th>
                                            <th>SKS</th>
                                            {{-- <th>Code</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($subjects as $index => $subject)
                                            <tr>
                                                <td>
                                                    {{ $subjects->firstItem() + $index }}
                                                </td>
                                                <td>{{ $subject->title }}</td>
                                                <td>{{ $subject->lecture->name }}</td>
                                                <td>{{ $subject->semester }}</td>
                                                <td>{{ $subject->academic_year }}</td>
                                                <td>{{ $subject->sks }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('subject.edit', $subject) }}"
                                                            class="btn btn-sm btn-icon btn-primary m-1"><i
                                                                class="fas fa-user-pen"></i></a>
                                                        <form action="{{ route('subject.destroy', $subject) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger btn-icon m-1">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span>
                                        Showing {{ $subjects->firstItem() }}
                                        to {{ $subjects->lastItem() }}
                                        of {{ $subjects->total() }} entries
                                    </span>
                                    <div class="paginate-sm">
                                        {{ $subjects->onEachSide(0)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
