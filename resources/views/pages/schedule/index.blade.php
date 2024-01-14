@extends('layouts.app')

@section('title', 'Schedule')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Schedule</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('schedule.index') }}">subject</a></div>
                    <div class="breadcrumb-item">All Schedules</div>
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
                                <h4>All Schedules</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('schedule.create') }}" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <form action="{{ route('schedule.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="schedules"
                                                value="{{ request('schedules') }}">
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
                                            <th>Subject</th>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room</th>
                                            <th>Attendance Code</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($schedules as $index => $schedule)
                                            <tr>
                                                {{-- <td>
                                                    {{ $schedules->firstItem() + $index }}
                                                </td>
                                                <td>{{ $schedule->title }}</td>
                                                <td>{{ $schedule->lecture->name }}</td>
                                                <td>{{ $schedule->semester }}</td>
                                                <td>{{ $schedule->academic_year }}</td>
                                                <td>{{ $schedule->sks }}</td> --}}
                                                <td>
                                                    {{ $schedules->firstItem() + $index }}
                                                </td>
                                                <td>{{ $schedule->id }} - {{ $schedule->subject->title }}</td>
                                                <td>{{ $schedule->hari }}</td>
                                                <td>{{ $schedule->jam_mulai }}</td>
                                                <td>{{ $schedule->jam_selesai }}</td>
                                                <td>{{ $schedule->ruangan }}</td>
                                                <td>
                                                    <a href="{{ route('generate-qrcode', $schedule) }}"
                                                        class="btn btn-primary btn-sm">Generate QRCode</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('schedule.edit', $schedule) }}"
                                                            class="btn btn-sm btn-icon btn-primary m-1"><i
                                                                class="fas fa-user-pen"></i></a>
                                                        <form action="{{ route('schedule.destroy', $schedule) }}"
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
                                        Showing {{ $schedules->firstItem() }}
                                        to {{ $schedules->lastItem() }}
                                        of {{ $schedules->total() }} entries
                                    </span>
                                    <div class="paginate-sm">
                                        {{ $schedules->onEachSide(0)->links() }}
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
