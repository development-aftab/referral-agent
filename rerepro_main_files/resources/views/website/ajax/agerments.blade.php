<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Sender</th><th>Receiver</th><th>Area</th><th>ZipCode</th><th>Lead Type</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referalagreement as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->GetSender->name }}</td><td>{{ $item->GetReceiver->name }}</td><td>{{ $item->location }}</td>
                                    <td>{{ $item->zipcode }}</td><td>{{ $item->lead_type }}</td><td>@if($item->status == 0) Pending @elseif($item->status == 3) Canceled @elseif($item->status == 4) Rejected @elseif($item->status == 2) Agreement Sign Both sides @endif</td>
                                    <td>
                                     <a href="{{ url('get_certificate/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Agreement
                                                </button>
                                     </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                       
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#exampleModalCenter").modal("show");
</script>