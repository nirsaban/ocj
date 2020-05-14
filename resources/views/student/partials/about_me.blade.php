<div class="modal fade" id="aboutMeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-md-left" id="myModalLabel">Write more about your self</h4>
            </div>
            <div class="modal-body">
                <textarea id="about_me" class="form-control"  rows="5" style="min-width: 100%"> {{$profile[0]['about_me'] ?? ''}}</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateAboutMe('{{Auth::id()}}')">Save</button>
            </div>
        </div>
    </div>
</div>
