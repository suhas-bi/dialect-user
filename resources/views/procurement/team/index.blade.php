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
                                <input id="add-member" type="submit" value="Add Member" class="btn btn-fourth-color">
                            </div>
                        </div>

                        <table id="myTable" class="table team-settings-row">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" onclick="sortTable(1)">Name<i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></th>
                                    <th scope="col" onclick="sortTable(2)">Email<i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></th>
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
                                            <select id="standard-select" class="permission-{{ $member->id }}">
                                                <option value="1" {{ $member->approval_status == 1 ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ $member->approval_status == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-center text-success reduce-padd-td" id="enable-edit-{{ $member->id }}" style="display: none;">
                                        <div class="select-drop3">
                                            <select id="standard-select" class="status-{{ $member->id }}">
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


    <!-- Add Member Model Starts -->
    <div class="modal fade" id="add-member-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Add New Member</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <form id="member-form" action="" method="post">
                        <div class="col-md-12 common-popup">
                            <div class="form-group position-relative">
                                <label>Name<span class="mandatory"> *</span></label>
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control" autocomplete="off">
                                <div class="invalid-msg2"></div>
                            </div>
                        </div>
                        <div class="col-md-12 common-popup">
                            <div class="form-group position-relative">
                                <label>Email<span class="mandatory"> *</span></label>
                                <input id="email" name="email" type="email" placeholder="Email Address" class="form-control" autocomplete="off">
                                <div class="invalid-msg2"></div>
                            </div>
                        </div>
                        <div class="col-md-12 common-popup mt-4">
                            <div class="form-group position-relative">
                                <label>Enquiry Permission<span class="mandatory"> *</span></label>
                                <select id="approval_status" name="approval_status" class="form-select" autocomplete="off">
                                    <option value=" ">Select Permission</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <div class="invalid-msg2"></div>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer model-footer-padd">
                        <div class="d-flex justify-content-end">
                            <div class="form-group proceed-btn">
                                <button type="button" class="btn btn-third cancel-change" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="form-group proceed-btn">
                                <input id="save-member" type="button" value="Save" class="btn btn-secondary">
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <!-- Add member model ends -->

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

$('body').on('click','#add-member',function () {
    $('#add-member-model').modal('show');
});

$('body').on('click','.close, .cancel-change',function () {
    $('#add-member-model').modal('hide');
});

$('#save-member').on('click',function(){
    var formData = $('#member-form').serialize();
    var action = "{{ route('procurement.teamAccount.saveMember') }}";
    axios.post(action, formData)
    .then((response) => {
        // Handle success response
        if(response.data.status === true){
            window.location.href = '/procurement/team-account/settings';
        }
    })
    .catch((error) => {
        // Handle error response
        if (error.response.status == 422) {
            $.each(error.response.data.errors, function(field, errors) {
                var input = $('input[name="' + field + '"]');
                input.addClass('red-border');
                var feedback = input.siblings('.invalid-msg2');
                feedback.text(errors[0]).show();

                var select = $('select[name="' + field + '"]');
                select.addClass('red-border');
                var select = select.siblings('.invalid-msg2');
                select.text(errors[0]).show();
                // if(field == 'approval_status'){
                //    $('#approval_status').parent().find('.invalid-msg2').text(errors[0]).show();
                // }
            });
        }
    });
});


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
    let permission = $('.permission-'+id).val();
    let status = $('.status-'+id).val();
    var action = "{{ route('procurement.teamAccount.updateMember') }}";
    axios.post(action, {id:id,status:status,approval_status:permission})
    .then((response) => {
        // Handle success response
        if(response.data.status === true){
            window.location.href = '/procurement/team-account/settings';
        }
    })
    .catch((error) => {
        // Handle error response
        
    });

    
});


var columnStates = [0, 0, 0]; // Keeps track of sorting order for each column

function sortTable(columnIndex) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, arrow;
  table = document.getElementById("myTable");
  switching = true;
  dir = columnStates[columnIndex] === 0 ? 'asc' : 'desc';
  arrow = dir === 'asc' ? '\u25B2' : '\u25BC';
  columnStates[columnIndex] = columnStates[columnIndex] === 0 ? 1 : 0;

  // Reset arrow indicator for all columns
  for (i = 0; i < table.rows[0].cells.length; i++) {
    table.rows[0].cells[i].classList.remove('asc', 'desc');
    table.rows[0].cells[i].removeAttribute('data-sort');
  }

  // Set arrow indicator for the current column
  table.rows[0].cells[columnIndex].setAttribute('data-sort', dir);
  table.rows[0].cells[columnIndex].classList.add(dir);

  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[columnIndex];
      y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

      if (dir === 'asc') {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir === 'desc') {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>
@endpush
 
@endsection    