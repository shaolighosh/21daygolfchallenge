<div class="content">
	<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800 page-title">Add Course</h1>
	 
	 <div class="date-wise-search">
	     
	 </div>
	</div>



	<div class="content-pages-inner">
	 
	   <div class="drillviewSec addModule">
	    <div class="settingsSec">
	        <?php 
	          $attributes = array('class' => 'form', 'id' => 'course-management-form');
	          echo form_open('admin/course-management/add', $attributes);
	        ?>
	            
	            <div class="form-group">
	              <label>Name</label>
	              <input type="text" name="name" class="form-control" placeholder="John" required>
	            </div>
	            <div class="form-group">
	              <label>Date</label>
	               <input type="date" name="date" class="form-control" placeholder="" required>
	            </div>
	            
	            
	            
	            <button type="submit" class="btn customBtn" data-toggle="modal" data-target="#exampleModal" name="Submit" value="Submit">Submit</button>
	        </form>
	    </div>
	</div>

	</div>



	</div>
</div>

             
         