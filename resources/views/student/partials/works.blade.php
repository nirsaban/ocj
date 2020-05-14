<div class="modal fade" id="myModalWorks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Add Educations</h4>
            </div>
            <div class="modal-body flex worksInputs">
                <i class="fas fa-plus addInputs" onclick="addInputsWorks()"></i>
                @if(isset($profile[0]['work_experience']))
                    @foreach(json_decode($profile[0]['work_experience']) as $work)
                        @if(strlen($work) > 2)
                            <input  type="text" value="{{$work}}" class="col-6 field form__field work"   placeholder="enter work experience...">
                        @endif
                    @endforeach
                @else
                    <input  type="text" class="col-6 field form__field work"   placeholder="enter work experience...">
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateWorks('{{Auth::id()}}')">Save changes</button>
            </div>
        </div>
    </div>
