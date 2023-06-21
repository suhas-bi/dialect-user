@extends('procurement.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('procurement.layouts.header')
    <!-- Header Ends -->


    <!-- Main Content Start -->

    <!-- Team List Section Start-->
    <section class="container-fluid pleft-56">
        <div class="row team-accnt-tab  b-bottom">
            <div class="col-md-12">

                <div class="d-flex w-100 justify-content-between">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs tab mb-2" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link tablinks3" href="{{ route('procurement.teamAccount.approval') }}">Approvals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tablinks3 active" href="{{ route('procurement.teamAccount.settings') }}">Team Settings</a>
                        </li>
                    </ul>
                    <!-- Tabs navs -->
                </div>
            </div>
        </div>
    <!-- Team List Section End -->

    <!-- Team Content Section Start -->
    <div class="tabcontent3" id="received">
    <div class="row">
                <div class="col-md-12">
                    <div class="team-settings-main">

                        <div class="team-settings-head d-flex align-items-center justify-content-between">
                            <h1>Members</h1>

                            <div class="form-group">
                                <input type="submit" value="Add Member" class="btn btn-fourth-color">
                            </div>
                        </div>

                        <table class="table team-settings-row">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name<i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></th>
                                    <th scope="col">Email<i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></th>
                                    <th scope="col">Member since</th>
                                    <th scope="col" class="text-center">Enquiry Permission</th>
                                    <th scope="col" class="text-center">Account Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($members as $key => $member)
                                <tr id="editable-{{ $member->id }}" class="non-editing">
                                    <td scope="row"><a href="#">{{ $member->id }}</a></td>
                                    <td><a href="#">{{ $member->name }}</a> </td>
                                    <td><a href="#">{{ $member->email }}</a></td>
                                    <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d F, Y') }}</td>

                                    <td class="text-center text-success reduce-padd-td" id="yes-edit-{{ $member->id }}" style="display: none;">
                                        <div class="select-drop3">
                                            <select id="standard-select">
                                                <option value="1" {{ $member->approval_status == 1 ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ $member->approval_status == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-center text-success reduce-padd-td" id="enable-edit-{{ $member->id }}" style="display: none;">
                                        <div class="select-drop3">
                                            <select id="standard-select">
                                                <option value="1" {{ $member->status == 1 ? 'selected' : '' }}>Enable</option>
                                                <option value="0" {{ $member->status == 0 ? 'selected' : '' }}>Disable</option>
                                            </select>
                                        </div>
                                    </td>

                                    <td class="text-center text-{{ $member->approval_status == 1 ? 'success' : 'danger' }}" id="yes-non-edit-{{ $member->id }}">{{ $member->approval_status == 1 ? 'Yes' : 'No' }}</td>
                                    <td class="text-center text-{{ $member->status == 1 ? 'success' : 'danger' }}" id="enable-non-edit-{{ $member->id }}">{{ $member->status == 1 ? 'Enabled' : 'Disabled' }}</td>
                                    <td class="text-center">
                                        <a href="#" id="team-edit-{{ $member->id }}" class="team-edit" data-id="{{ $member->id }}" class="team-edit"><img src="{{ asset('assets/images/team-edit-ico.svg') }}"></a>
                                        <a href="#" id="team-save-{{ $member->id }}" class="team-save" data-id="{{ $member->id }}" class="team-save" style="display: none;"><img src="{{ asset('assets/images/team-save-ico.svg') }}"></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                   
                                </tr>
                                @endforelse                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!-- Team Content Section End -->

</section>
<!-- Main Content Ends -->

@push('scripts')
<script>
$('.team-edit').click(function () {
    let id = $(this).data('id');
    $("#yes-non-edit-"+id).hide();
    $("#enable-non-edit-"+id).hide();
    $('#yes-edit-'+id).show();
    $('#enable-edit-'+id).show();
    $('#editable-'+id).addClass('editing');
    $('#editable-'+id).removeClass('non-editing');
    $('#team-edit-'+id).hide();
    $('#team-save-'+id).show();
});

$('.team-save').click(function () {
    let id = $(this).data('id');
    $('#yes-non-edit-'+id).show();
    $('#enable-non-edit-'+id).show();
    $('#yes-edit-'+id).hide();
    $('#enable-edit-'+id).hide();
    $('#editable-'+id).addClass('non-editing');
    $('#editable-'+id).removeClass('editing');
    $('#team-edit-'+id).show();
    $('#team-save-'+id).hide();
});
</script>
@endpush
 
@endsection    