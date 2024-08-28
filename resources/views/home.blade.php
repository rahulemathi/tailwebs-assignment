<x-homepage>
    <x-slot:title>
        Home page
    </x-slot:title>
    <x-slot:body>
        <div class="container my-4">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                          <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->subject }}</td>
                            <td>{{ $student->marks }}</td>
                            <td><div class="dropdown">
                              <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              </button>
                              <ul class="dropdown-menu">
                                <li><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit" data-id="{{ $student->id }}" data-name="{{ $student->name }}" data-subject="{{ $student->subject }}" data-marks="{{ $student->marks }}">
                                 Edit
                                </button></li>
                                <li><form action="{{ url('/delete/'.$student->id) }}" method="post">
                                  @csrf
                                {{-- <input type="text" name="id" value="{{ $student->id }}" hidden> --}}
                                <input type="submit" class="btn" value="Delete" onclick="return confirm('are you aure to delete this data')" >
                                </form></li>
                              </ul>
                            </div></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add
            </button>
        </div>
    
    
    {{-- toats --}}
    @if(session('success'))
        <div class="toast-container top-0 end-0 p-3">
            <div id="successToast" class="toast text-bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif


 
 


    @if(session('error'))
    <div class="toast-container top-0 end-0 p-3">
    <div id="errorToast" class="toast text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
    </div>
    @endif


<!-- Button trigger modal -->


<!-- student edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student Marks</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editstudent">
          @csrf
          <input type="text" id="editid" name="id" hidden>
        <div class="my-4">
            <label for="validationDefaultUsername" class="form-label">Student Name</label>
            <div class="input-group">
              <span class="input-group-text" ><i class="bi bi-person"></i></span>
              <input id="editname" type="text" class="form-control"  name="name" placeholder="student name" readonly>
            </div>
          </div>
         
           
          <div class="my-4">
            <label  class="form-label">Subject</label>
            <div class="input-group">
              <span class="input-group-text" ><i class="bi bi-book"></i></span>
              <input id="editsubject" type="text" class="form-control" name="subject" placeholder="subject" readonly>
            </div>
          </div>

          <div class="my-4">
            <label  class="form-label">Marks</label>
            <div class="input-group">
              <span class="input-group-text" ><i class="bi bi-bookmark"></i></span>
              <input id="editmarks" type="text" class="form-control" name="marks" placeholder="marks" required>
            </div>
          </div>
      </div>
      <div class="d-flex justify-content-center my-4">
        <button id="submit" class="btn btn-primary">
            <span id="save-text">Save</span>
            <div id="loading-spinner" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>


    <!-- add student Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addstudent">
              @csrf
            <div class="my-4">
                <label for="validationDefaultUsername" class="form-label">Student Name</label>
                <div class="input-group">
                  <span class="input-group-text" ><i class="bi bi-person"></i></span>
                  <input type="text" class="form-control"  name="name" placeholder="student name" required>
                </div>
              </div>
             
               
              <div class="my-4">
                <label  class="form-label">Subject</label>
                <div class="input-group">
                  <span class="input-group-text" ><i class="bi bi-book"></i></span>
                  <input type="text" class="form-control" name="subject" placeholder="subject" required>
                </div>
              </div>

              <div class="my-4">
                <label  class="form-label">Marks</label>
                <div class="input-group">
                  <span class="input-group-text" ><i class="bi bi-bookmark"></i></span>
                  <input type="text" class="form-control" name="marks" placeholder="marks" required>
                </div>
              </div>
          </div>
          <div class="d-flex justify-content-center my-4">
            <button id="submit" class="btn btn-primary">
                <span id="sumit-text">Add</span>
                <div id="loading-spinner" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
          </div>
        </form>
        </div>
      </div>
    </div>
    

    <script>
        $(document).ready(function(){
            @if(session('success'))
            var successToast = new bootstrap.Toast(document.getElementById('successToast'));
            successToast.show();
           
            
            @endif

            @if(session('error'))
            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
            errorToast.show();
            @endif

          $('#edit').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget);

            var studentId = button.data('id');
            var studentName = button.data('name');
            var studentSubject = button.data('subject');
            var studentMarks = button.data('marks');

            var modal = $(this);

            modal.find('#editid').val(studentId);
            modal.find('#editname').val(studentName);
            modal.find('#editsubject').val(studentSubject);
            modal.find('#editmarks').val(studentMarks);
          })

          $('#editstudent').on('submit',function(e){
            e.preventDefault();

            $('#save-text').hide();
            $('#loading-spinner').show();

            $('#submit').prop('disabled',true)

            var formData = $(this).serialize();

            $.ajax({
              type:'POST',
              url:'{{ url('update') }}',
              data:formData,
              success:function(response){
                  $('#edit-text').show();
                  $('#loading-spinner').hide();

                  $('submit').prop('disabled',false);
                  $('edit').modal('hide');
                  location.reload();
                  alert('Marks has been updated successfully')
              },
              error:function(error){
                alert('Error While updating marks')

                $('#edit-text').show();
                $('#loading-spinner').hide();
                $('submit').prop('disabled',false);
              }
            })
          })



            // add student
            $('#addstudent').on('submit',function(e){
                e.preventDefault();
                let csrfToken = $('input[name="_token"]').val();
                $('#submit-text').hide();
                $('#loading-spinner').hide();

                $('#submit').prop('disabled',true);

                $.ajax({
                    type:'POST',
                    url:'{{ url('add-student') }}',
                    data:$(this).serialize() + '&_token=' + csrfToken,
                    success:function(response){
                        $('#submit-text').show();
                        $('#loading-spinner').hide();
                        $('#submit').prop('disabled',false);
                        if(response.status == 'success'){
                          alert('Student has been successfully added')
                        location.reload();
                        }else if(response.status == 'error'){
                          alert('Student has been already added')
                          location.reload();
                        }
                    },
                    error: function(error){
                        $('#submit-text').show();
                        $('#loading-spinner').hide();
                        $('#submit').prop('disabled',false);
                    }
                })
            })
        })
    </script>
    </x-slot:body>
</x-homepage>