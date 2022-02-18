@extends('admin.admin_master')
@section('admin')

	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!--ADD BRAND-->

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<form method="post" action="{{ route('category.update', $category->id) }}">
						      @csrf           
						      <!--<input type="hidden" name="id" value="{{ $category->id }}">-->
						   
						              <div class="form-group">
						                <h5>Category Name English <span class="text-danger">*</span></h5>
						                <div class="controls">
						                  <input type="text" name="category_name_en" class="form-control" value="{{$category->category_name_en}}">
						                  @error('category_name_en')
						                  <span class="text-danger">{{ $message }}</span>
						                  @enderror
						                </div>
						              </div>

						               <div class="form-group">
						                <h5>Category Name Spanish <span class="text-danger">*</span></h5>
						                <div class="controls">
						                  <input type="text" name="category_name_es" class="form-control" value="{{ $category->category_name_es}}">
						              	  @error('category_name_es')
						                  <span class="text-danger">{{ $message }}</span>
						                  @enderror
						                </div>
						              </div>

						               <div class="form-group">
						                <h5>Category icon<span class="text-danger">*</span></h5>
						                <div class="controls">
						                  <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon}}">
						              	  @error('category_icon')
						                  <span class="text-danger">{{ $message }}</span>
						                  @enderror
						                </div>
						              </div>
	

						            <div class="text-xs-right">
						              <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Category">
						            </div>

						    </form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
         
			</div>			


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  <!--</div>-->

@endsection