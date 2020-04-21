


<div class="form-group" id="subSelect">
    <p>sub category<span>*</span></p>
<select   id="category" class="course form-control form-control-sm subTitle @error('course_id') is-invalid @enderror"  onchange="addCategory()">
    <option value="" disabled="disabled">sub title</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->cat_name}}</option>
    @endforeach
</select>

    @error('category_id')
    <div class="validation">{{ $message }}</div>
    @enderror
</div>
