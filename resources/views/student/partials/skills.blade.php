<div class="modal fade" id="myModalSkills" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Add Educations</h4>
            </div>
            <div class="modal-body flex SkillsInputs">
                <i class="fas fa-plus addInputs" onclick="addInputsSkill()"></i>
                @if(isset($profile[0]['my_skills']))
                    @foreach(json_decode($profile[0]['my_skills']) as $skill)
                        @if(strlen($skill) > 2)
                            <input  type="text" value="{{$skill}}" class="col-6 field form__field skill"   placeholder="enter skill...">
                        @endif
                    @endforeach
                @else
                    <input  type="text" class="col-6 field form__field skill"   placeholder="enter skill...">
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateSkills('{{Auth::id()}}')">Save changes</button>
            </div>
        </div>
    </div>
</div>
