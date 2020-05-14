<div class="modal fade" id="myModalEducation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Add Educations</h4>
            </div>
            <div class="modal-body flex educationsInputs">
                <i class="fas fa-plus addInputs" onclick="addInputsEdu()"></i>
                @if(isset($profile[0]['education']))
                    @foreach(json_decode($profile[0]['education']) as $edu)
                        @if(strlen($edu) > 2)
                  <input  type="text" value="{{$edu}}" class="col-6 field form__field edu"   placeholder="enter education...">

                        @endif
                    @endforeach
                @else
                    <input  type="text" class="col-6 field form__field edu"   placeholder="enter education...">
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateEducation('{{Auth::id()}}')">Save changes</button>
            </div>
        </div>
    </div>
</div>
