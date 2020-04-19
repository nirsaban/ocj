


<div class="form-group">
    <p>sub category<span>*</span></p>
<select   id="category" class="course form-control form-control-sm subTitle @error('course_id') is-invalid @enderror" name="category_id" onchange="addCategory()">
    <option value="default">sub title</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->cat_name}}</option>
    @endforeach
</select>

    @error('category_id')
    <div class="validation">{{ $message }}</div>
    @enderror
</div>
