


<div class="modal fade bs-example-modal-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal Content: begins -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <div class="body-message">
                    <h4>Choose category</h4>
                    <select name="category_id" id="category_id" class="cat form-control col-6 form-control-sm" style="font-size: 1.4rem" >
                        <option disabled value="">--choose--</option>
                        @foreach($categories as $category)
                            <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateCategory('{{Auth::id()}}')">Save</button>
            </div>

        </div>

    </div>
</div>




