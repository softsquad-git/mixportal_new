
@foreach($categories as $cat)
    <div class="custom-control custom-checkbox">
        <input value="1" name="cat_{{$cat->id}}" type="checkbox" <?php if(isset($old['cat_'.$cat->id]) && $old['cat_'.$cat->id] == '1')echo 'checked'; ?> class="custom-control-input" id="customCheck{{$cat->id}}">
        <label class="custom-control-label" for="customCheck{{$cat->id}}">{{$cat->text}}</label>
    </div>
@endforeach