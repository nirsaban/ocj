<div class="modal fade" id="myModalLinks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Add Educations</h4>
            </div>
            <div class="modal-body flex LinksInputs">
                <i class="fas fa-plus addInputs" onclick="addInputsLink()"></i>
                @if(isset($profile[0]['links']))
                    @foreach(json_decode($profile[0]['links']) as $link)
                        @if(strlen($link) > 2)
                            <input  type="text" value="{{$link}}" class="col-6 field form__field link"   placeholder="enter project...">
                        @endif
                    @endforeach
                @else
                    <input  type="text" class="col-6 field form__field links"   placeholder="enter education...">
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateLinks('{{Auth::id()}}')">Save changes</button>
            </div>
        </div>
    </div>
</div>
