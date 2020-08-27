 <div class="form-group">
                        <label>Select Category Level</label>                
                        <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                            <option value="0" selected="selected">Main Category</option>    
                            @if(!empty($getCategories))
                             @foreach($getCategories as $categories)
                            <option value="{{$categories->id}}">{{$categories->category_name}}</option>
                                  @if(!empty($categories->subcategories))
                                    @foreach($categories->subcategories as $subcategories)
                                   <option value="{{$subcategories->id}}">&nbsp;&raquo;&nbsp;{{$subcategories->category_name}}</option>
                                   @endforeach
                                   @endif
                            
                            @endforeach
                            @endif
                        </select>                
                    </div>